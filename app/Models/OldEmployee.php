<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OldEmployee extends Model
{
    use HasFactory;

    protected $table = 'tbl_employee';

    protected $primarykey = 'id';

    protected $fillable = [
        'sponcer_rank',
        'name',
        'fname',
        'dob',
        'mob',
        'email',
        'gender',
        'pin',
        'address',
        'state',
        'district',
        'block',
        'panchayat',
        'work_area',
        'profile_pic',
        'bank',
        'branch',
        'ac_no',
        'ifsc',
        'pan',
        'aadhar',
        'status',
        'user',
        'pass',

    ];

    protected $hidden = [
        'remember_token',
    ];

    protected $dates = ['name_field'];
}


