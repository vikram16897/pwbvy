<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programs extends Model
{
    use HasFactory;
    protected $table = 'tbl_services';

    protected $primarykey = 'id';

    protected $fillable = [
        'photo',
        'title',
        'description',
        'status',

    ];

    protected $hidden = [
        'remember_token',
    ];

    protected $dates = ['name_field'];
}

