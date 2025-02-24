<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'tbl_slider';

    protected $primarykey = 'id';

    protected $fillable = [
        'photo',
        'title',
        'button_url',
        'status',

    ];

    protected $hidden = [
        'remember_token',
    ];

    protected $dates = ['name_field'];
}
