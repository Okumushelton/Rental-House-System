<?php

namespace App\Http\Controllers\Api;

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CallbackRequest;
use App\Mpesa;
use Illuminate\Http\Request;

class MpesaCallbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'RRN' => [],
            'ResponseCode' => [],
            'ResponseDescription' => null,
            'MpesaTranID' => true,
            'ReceiverName' => true,
            'ReceiverMsisdn' => null,
            'MobileNumber' => true,
            "TimeStamp" => "required",
            'Amount' => true,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CallbackRequest $request)
    {
        // dd($request->all());
        $mpesa = new Mpesa();
        $mpesa->RRN = $request->RRN;
        $mpesa->ResponseCode= $request->ResponseCode;
        $mpesa->ResponseDescription = $request->ResponseDescription;
        $mpesa->MpesaTranID = $request->MpesaTranID;
        $mpesa->ReceiverName = $request->ReceiverName;
        $mpesa->ReceiverMsisdn = $request->ReceiverMsisdn;
        $mpesa->MobileNumber = $request->MobileNumber;
        $mpesa->TimeStamp = $request->TimeStamp;
        $mpesa->Amount = $request->Amount;

        $mpesa->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mpesa  $mpesa
     * @return \Illuminate\Http\Response
     */
    public function show(Mpesa $mpesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mpesa  $mpesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mpesa $mpesa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mpesa  $mpesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mpesa $mpesa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mpesa  $mpesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mpesa $mpesa)
    {
        //
    }
}
