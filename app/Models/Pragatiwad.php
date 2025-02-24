<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pragatiwad extends Model
{
    use HasFactory;

    protected $table = 'tbl_volunteer';

    protected $primarykey = 'id';

    protected $fillable = [
        'reg_no',
        'name',
        'fname',
        'dob',
        'age',
        'gender',
        'adhar',
        'language',
        'caste',
        'address',
        'ward',
        'panchayat',
        'post_office',
        'block',
        'sub_division',
        'district',
        'state',
        'pincode',
        'email',
        'qualification',
        'work_experience',
        'mob1',
        'eighth',
        'tenth',
        'twelveth',
        'photo',
        'sign',
        'aadhar',
        'pan',
        'designation',
        'post_area',
        'valid',
        'code',
        'status',
        'approve',
        'ip_address',
        'browser',

    ];

    protected $hidden = [
        'remember_token',
    ];

    protected $dates = ['name_field'];
}



