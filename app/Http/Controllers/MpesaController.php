<?php
namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Alert;
use App\Property;
use App\Transfer;
use Illuminate\Http\Request;

class MpesaController extends Controller
{
    // M-pesa push to initialize payment
    public function mpesaCheckout(Request $request)
    {

        // Initialize the variables
        $consumer_key = 'X3gEgUrk3NiT3fbLM8L72axL8aGCKKQT';
        $consumer_secret = 'E5NAAwbGRbcdIyNe';
        $Business_Code = '174379';
         $Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        $Token_URL = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        $Time_Stamp = date("Ymdhis");


/*
        // curl_Tranfer is the variable for the curl handle
        $curl_Tranfer = curl_init();
        curl_setopt($curl_Tranfer, CURLOPT_URL, $Token_URL);
        $credentials = base64_encode($consumer_key . ':' . $consumer_secret);
        curl_setopt($curl_Tranfer, CURLOPT_HTTPHEADER, array('Authorization:Basic ' . $credentials));
        // curl_setopt($curl_Tranfer, CURLOPT_HEADER, false);
        curl_setopt($curl_Tranfer, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_Tranfer, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl_Tranfer, CURLOPT_FAILONERROR, true);
        $curl_Tranfer_response = curl_exec($curl_Tranfer);

        if (curl_errno($curl_Tranfer)) {
            $error_msg = curl_error($curl_Tranfer);
        }
        curl_close($curl_Tranfer);

        if (isset($error_msg)) {
            return $error_msg . "  ::::::: ";
        }*/

        $ch = curl_init('https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Basic cFJZcjZ6anEwaThMMXp6d1FETUxwWkIzeVBDa2hNc2M6UmYyMkJmWm9nMHFRR2xWOQ==']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $curl_Tranfer_response = curl_exec($ch);

        $token = json_decode($curl_Tranfer_response)->access_token;

        $Type_of_Transaction = 'CustomerPayBillOnline';
        $phone_number = $request['phone_number'];
        $OnlinePayment = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $total_amount = "1";
        $CallBackURL = 'https://2f50f430.ngrok.io/callback.php';
        $password = base64_encode($Business_Code . $Passkey . $Time_Stamp);

        //  $token = json_decode($curl_Tranfer_response)->access_token;

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
        $this->bookHouse();

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

    public function bookHouse()
    {
        $property = Property::find(request('propertyid'));

        $transfer = new Transfer();
        $transfer->property_id = request('propertyid');
        $transfer->house_id = request('houseid');
        $transfer->booking_user = auth()->id();
        $transfer->Amount = 500;
        $transfer->save();

        Alert::success('Booking successful!', 'Offer Submitted')->autoclose(3000);
        return back()->with("success", "House Booked successful!");
    }

    public function updateBookHouse(){

        $transfer = Transfer::find(request('RRN'));

        if(request("ResponseCode")==="0"){
            $transfer->status = "booked";
            $transfer->save();
        }

        return response()->json([
            'status' => true,
            'message' => "Posted successfully!",
            'post' => $transfer,
        ], 200);

    }

    public function bookApartment()
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
