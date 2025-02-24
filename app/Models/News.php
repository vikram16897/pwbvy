<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'tbl_news';

    protected $primarykey = 'id';

    protected $fillable = [
        'news',
        'status',

    ];

    protected $hidden = [
        'remember_token',
    ];

    protected $dates = ['name_field'];
}

