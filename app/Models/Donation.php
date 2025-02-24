<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $table = 'tbl_donation';

    protected $primarykey = 'id';

    protected $fillable = [
        'amount_advanced',
        'aamountother',
        'amount',
        'name',
        'email',
        'txtphone',
        'address',
        'country',
        'donationtype',
        'dob',
        'txtpan',
        'declaration',
        'order_id',
        'donor_id',
        'razorpay_payment_id',
        'addon',
        'payment',
        'status',
        'mode',
        'manual_receipt',
        'ip_address',
        'browser',
    ];

    protected $hidden = [
        'remember_token',
    ];

    protected $dates = ['name_field'];
}

