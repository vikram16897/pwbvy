<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $table = 'tbl_branch';

    protected $primarykey = 'id';

    protected $fillable = [
        'c_code',
        'w_num',
        'place',
        'panchayat',
        'prakhand',
        'sevika',
        'shayika',
        'supervisor',
        'status',


    ];

    protected $hidden = [
        'remember_token',
    ];

    protected $dates = ['name_field'];
}

