<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mpesa extends Model
{
    protected $fillable = ['RRN', 'ResponseCode', 'ResponseDescription', 'MpesaTranID',
        'ReceiverName', 'ReceiverMsisdn', 'MobileNumber', 'Amount'];
}
