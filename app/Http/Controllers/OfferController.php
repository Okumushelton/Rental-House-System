<?php

namespace App\Http\Controllers;

use Alert;
use App\Apartment;
use App\House;
use App\Offer;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function houseOffer(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'offeramount' => "required|regex:/^\d+(\.\d{1,2})?$/",
        ]);

        $property = Property::find(request('propertyid'));

        if ($property->user_id == auth()->id()) {

            Alert::warning('You can not submit offer for your own properties!', 'Offer Rejected')->autoclose(3000);
            return back()->with("warning", "You can not submit offer for your own properties!");
        }

        if ($validator->fails()) {
            Alert::error('Please check your inputs and correct the following errors', 'Invalid Attempt')->autoclose(3000);
            return back()->withErrors($validator);
        }

        if (House::find(request('houseid'))->offers->count() > 0) {

            $currentMax = House::find(request('houseid'))->offers->sortBy('offerAmount')->last()->offerAmount;

            if ($currentMax > request('offeramount')) {

                Alert::warning('Your offer should be higher than the current offer!', 'Offer Rejected')->autoclose(3000);
                return back()->with("warning", "Your offer should be higher than the current offer!");
            }
        }

        $offer = new Offer();
        $offer->property_id = request('propertyid');
        $offer->house_id = request('houseid');
        $offer->offeredUser = auth()->id();
        $offer->offerAmount = request('offeramount');
        $offer->save();

        Alert::success('Your offer has been submitted successfully!', 'Offer Submitted')->autoclose(3000);
        return back()->with("success", "Your offer has been submitted successfully!");
    }
    public function apartmentOffer(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'offeramount' => "required|regex:/^\d+(\.\d{1,2})?$/",
        ]);

        $property = Property::find(request('propertyid'));

        if ($property->user_id == auth()->id()) {

            Alert::warning('You can not submit offer for your own properties!', 'Offer Rejected')->autoclose(3000);
            return back()->with("warning", "You can not submit offer for your own properties!");
        }

        if ($validator->fails()) {
            Alert::error('Please check your inputs and correct the following errors', 'Invalid Attempt')->autoclose(3000);
            return back()->withErrors($validator);
        }

        if (Apartment::find(request('apartmentid'))->offers->count() > 0) {

            $currentMax = Apartment::find(request('apartmentid'))->offers->sortBy('offerAmount')->last()->offerAmount;

            if ($currentMax > request('offeramount')) {

                Alert::warning('Your offer should be higher than the current offer!', 'Offer Rejected')->autoclose(3000);
                return back()->with("warning", "Your offer should be higher than the current offer!");
            }
        }
        $offer = new Offer();
        $offer->property_id = request('propertyid');
        $offer->apartment_id = request('apartmentid');
        $offer->offeredUser = auth()->id();
        $offer->offerAmount = request('offeramount');
        $offer->save();

        Alert::success('Your offer has been submitted successfully!', 'Offer Submitted')->autoclose(3000);
        return back()->with("success", "Your offer submitted successfully !");
    }

}
