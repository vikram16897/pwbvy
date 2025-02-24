<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;

    protected $table = 'tbl_carrer1';

    protected $primarykey = 'id';

    protected $fillable = [
        'post1',
        'sallery',
        'blank_place',
        'qualification',
        'reg_charge',
        'status',
    ];

    protected $hidden = [
        'remember_token',
    ];

    protected $dates = ['name_field'];
}
