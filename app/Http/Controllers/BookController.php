<?php

namespace App\Http\Controllers;

use Alert;
use App\Property;
use App\Transfer;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function bookApartment(Request $request)
    {
        $property = Property::find(request('propertyid'));

        $transfer = new Transfer();
        $transfer->property_id = request('propertyid');
        $transfer->apartment_id = request('apartmentid');
        $transfer->booking_user = auth()->id();
        $transfer->Amount = 500;
        $transfer->save();

        Alert::success('Booking successful!', 'Offer Submitted')->autoclose(3000);
        return back()->with("success", "Apartment Booked successful!");
    }
}
