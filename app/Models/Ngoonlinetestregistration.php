<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ngoonlinetestregistration extends Model
{
    use HasFactory;

    protected $table = 'ngoonlinetestregistrations';

    protected $primarykey = 'id';
    protected $fillable = [
        'registrationid',
        'user_id',
        'name',
        'fname',
        'mname',
        'email',
        'mobile',
        'aadhar',
        'dob',
        'screenshot',
        'exam_status',
        'school',
        'category',
        'class',
        'bank',
        'accountholder',
        'accountno',
        'ifsc',
        'status',
        'added_on',
    ];
}
