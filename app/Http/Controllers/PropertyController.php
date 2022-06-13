<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\House;
use App\Property;
use Illuminate\Http\Request;
use Image;

class PropertyController extends Controller
{
    public function addHouse(Request $request)
    {

        // $request->validate([
        //     'name' => 'required|max:50|min:3',
        //     'type' => 'required',
        //     'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        //     'city' => 'required',
        //     'postalcode' => 'required|integer',
        //     'province' => 'required',
        //     'description' => 'required|min:100',
        //     'contactno' => 'required|regex:/^[0-9]{10}$/',
        //     'contactemail' => 'email|required',
        //     'filename' => 'required',
        //     'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        //     'lat' => 'required',
        //     'lng' => 'required',
        //     'rooms' => 'required|integer',
        //     'kitchen' => 'required|integer',
        //     'floor' => 'required|integer',
        //     'washroom' => 'required|integer',
        //     'size' => 'required|integer',
        //     'swimming' => 'required',
        //     'garden' => 'required',
        //     'nschool' => 'required',
        //     'nrailway' => 'required',
        //     'nbus' => 'required',

        // ]);
        // $data[] = new Array();
        $data = [];
        if ($request->hasfile('filename')) {

            foreach ($request->file('filename') as $image) {
                $name = uniqid('real_') . '.' . $image->getClientOriginalExtension();
                // $image->move(public_path().'/uploads/property/house', $name);
                Image::make($image)->resize(1280, 876)->save(\public_path('/uploads/property/house/' . $name));
                $data[] = $name;
            }

        }

        $property = new Property;
        $property->user_id = auth()->id();
        $property->name = request('name');
        $property->type = request('type');
        $property->amount = request('amount');
        $property->city = request('city');
        $property->postalCode = request('postalcode');
        $property->province = request('province');
        $property->description = request('description');
        $property->contactNo = request('contactno');
        $property->contatctEmail = request('contactemail');
        // $property->images = json_encode('1');
        $property->images = json_encode($data);
        $property->latitude = request('lat');
        $property->longitude = request('lng');
        $property->availability = ('YES');
        $property->save();

        $house = new House;
        $house->property()->associate($property);
        $house->noOfRooms = request('rooms');
        $house->noOfKitchen = request('kitchen');
        $house->noOfFloors = request('floor');
        $house->noOfWashrooms = request('washroom');
        $house->size = request('size');
        $house->swimmingPool = request('swimming');
        $house->garden = request('garden');
        $house->nearestSchool = request('nschool');
        $house->nearestRailway = request('nrailway');
        $house->nearestBusStop = request('nbus');
        $house->save();

        return back()->with('message', 'Your property has been successfully added!');

    }

    public function addApartment(Request $request)
    {

        // $request->validate([
        //     'name' => 'required|max:30|min:3',
        //     'type' => 'required',
        //     'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        //     'city' => 'required',
        //     'postalcode' => 'required|integer',
        //     'province' => 'required',
        //     'description' => 'required|min:100',
        //     'contactno' => 'required|regex:/^[0-9]{10}$/',
        //     'contactemail' => 'email|required',
        //     'filename' => 'required',
        //     'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        //     'lat' => 'required',
        //     'lng' => 'required',
        //     'rooms' => 'required',
        //     'kitchen' => 'required',
        //     'size' => 'required|integer',
        //     'washroom' => 'required',
        //     'nschool' => 'required',
        //     'nrailway' => 'required',
        //     'nbus' => 'required',

        // ]);

        $data = [];
        if ($request->hasfile('filename')) {

            foreach ($request->file('filename') as $image) {
                $name = uniqid('real_') . '.' . $image->getClientOriginalExtension();
                //$image->move(public_path().'/uploads/property/house', $name);
                Image::make($image)->resize(1280, 876)->save(\public_path('/uploads/property/apartment/' . $name));
                $data[] = $name;
            }
        }

        $property = new Property;
        $property->user_id = auth()->id();
        $property->name = request('name');
        $property->type = request('type');
        $property->amount = request('amount');
        $property->city = request('city');
        $property->postalCode = request('postalcode');
        $property->province = request('province');
        $property->description = request('description');
        $property->contactNo = request('contactno');
        $property->contatctEmail = request('contactemail');
        $property->images = json_encode($data);
        $property->latitude = request('lat');
        $property->longitude = request('lng');
        $property->availability = ('YES');
        $property->save();

        $apartment = new Apartment();
        $apartment->property()->associate($property);
        $apartment->noOfRooms = request('rooms');
        $apartment->noOfKitchen = request('kitchen');
        $apartment->noOfWashrooms = request('washroom');
        $apartment->size = request('size');
        $apartment->nearestSchool = request('nschool');
        $apartment->nearestRailway = request('nrailway');
        $apartment->nearestBusStop = request('nbus');
        $apartment->save();

        return back()->with('message', 'Your property has been successfully added!');

    }
}
