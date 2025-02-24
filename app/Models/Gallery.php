<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'tbl_photo';

    protected $primarykey = 'id';

    protected $fillable = [
        'caption',
        'photo',
        'title',
        'link',
        'status',

    ];

    protected $hidden = [
        'remember_token',
    ];

    protected $dates = ['name_field'];
}
