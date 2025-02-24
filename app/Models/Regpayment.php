<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regpayment extends Model
{
    use HasFactory;

    protected $table = 'regpayments';

    protected $primarykey = 'id';

    protected $fillable = [
        'transaction_id',
        'reference_Id',
        'amount',
        'payment',
        'status',
        'mode',
        'registrationid',
    ];
}
