<?php
namespace App\Http\Controllers;

use Alert;
use Illuminate\Http\Request;

class MpesaController extends Controller
{
    // Book house alert
    // Will use the offers to assign bookings
    // public function houseOffer(Request $request)
    // {

    //     $validator = Validator::make($request->all(), [
    //         'offeramount' => "required|regex:/^\d+(\.\d{1,2})?$/",
    //     ]);

    //     $property = Property::find(request('propertyid'));

    //     if ($property->user_id == auth()->id()) {

    //         Alert::warning('You can not book your own properties!', 'Rejected')->autoclose(3000);
    //         return back()->with("warning", "YYou can not book your own properties!");
    //     }

    //     if ($validator->fails()) {
    //         Alert::error('Please check your inputs and correct the following errors', 'Invalid Attempt')->autoclose(3000);
    //         return back()->withErrors($validator);
    //     }

    //     if (House::find(request('houseid'))->offers->count() > 0) {

    //         $currentMax = House::find(request('houseid'))->offers->sortBy('offerAmount')->last()->offerAmount;
    //     }

    //     $offer = new Offer();
    //     $offer->property_id = request('propertyid');
    //     $offer->house_id = request('houseid');
    //     $offer->offeredUser = auth()->id();
    //     $offer->offerAmount = request('offeramount');
    //     $offer->save();

    //     Alert::success('Your Property has been booked successfully!')->autoclose(3000);
    //     return back()->with("success", "Your Property has been booked successfully!");
    // }

    // M-pesa push to initialize payment
    public function mpesaCheckout(Request $request)
    {

// Initialize the variables
        $consumer_key = 'X3gEgUrk3NiT3fbLM8L72axL8aGCKKQT';
        $consumer_secret = 'E5NAAwbGRbcdIyNe';
        $Business_Code = '174379';
        $Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        $Type_of_Transaction = 'CustomerPayBillOnline';
        $Token_URL = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        $phone_number = $request['phone_number'];
        $OnlinePayment = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $total_amount = "1";
        $CallBackURL = 'https://2f50f430.ngrok.io/callback.php';
        $Time_Stamp = date("Ymdhis");
        $password = base64_encode($Business_Code . $Passkey . $Time_Stamp);

        // curl_Tranfer is the variable for the curl handle
        $curl_Tranfer = curl_init();
        // This sends the request to the token url
        curl_setopt($curl_Tranfer, CURLOPT_URL, $Token_URL);
        $credentials = base64_encode($consumer_key . ':' . $consumer_secret);
        curl_setopt($curl_Tranfer, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $credentials));
        curl_setopt($curl_Tranfer, CURLOPT_HEADER, false);
        curl_setopt($curl_Tranfer, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_Tranfer, CURLOPT_SSL_VERIFYPEER, false);
        $curl_Tranfer_response = curl_exec($curl_Tranfer);

        $token = json_decode($curl_Tranfer_response)->access_token;

        $curl_Tranfer2 = curl_init();
        curl_setopt($curl_Tranfer2, CURLOPT_URL, $OnlinePayment);
        curl_setopt($curl_Tranfer2, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $token));

        $curl_Tranfer2_post_data = [
            'BusinessShortCode' => $Business_Code,
            'Password' => $password,
            'Timestamp' => $Time_Stamp,
            'TransactionType' => $Type_of_Transaction,
            'Amount' => $total_amount,
            'PartyA' => $phone_number,
            'PartyB' => $Business_Code,
            'PhoneNumber' => $phone_number,
            'CallBackURL' => $CallBackURL,
            'AccountReference' => 'Hyrax Renting Business',
            'TransactionDesc' => 'Hyrax Renting Business',
        ];

        $data2_string = json_encode($curl_Tranfer2_post_data);

        curl_setopt($curl_Tranfer2, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_Tranfer2, CURLOPT_POST, true);
        curl_setopt($curl_Tranfer2, CURLOPT_POSTFIELDS, $data2_string);
        curl_setopt($curl_Tranfer2, CURLOPT_HEADER, false);
        curl_setopt($curl_Tranfer2, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl_Tranfer2, CURLOPT_SSL_VERIFYHOST, 0);
        $curl_Tranfer2_response = json_decode(curl_exec($curl_Tranfer2));

        // echo json_encode($curl_Tranfer2_response, JSON_PRETTY_PRINT);

        if (isset($curl_Tranfer2_response->ResponseCode)) {
            if ($curl_Tranfer2_response->ResponseCode == 0) {

                Alert::warning('Please check your phone to complete the transaction!', 'Success')->autoclose(3000);
                return back()->with("success", "Please Check your phone to complete the transaction!");

            }
        }
        if (isset($curl_Tranfer2_response->errorCode)) {
            if ($curl_Tranfer2_response->errorCode == '400.002.02') {

                Alert::warning('You can not book your own properties!', 'Rejected')->autoclose(3000);
                return back()->with("warning", "Invalid Number. Try Again!");
            }
        }

    }
}
