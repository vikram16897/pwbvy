<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;

    protected $table = 'tbl_download';

    protected $primarykey = 'id';

    protected $fillable = [
        'title',
        'file',
        'status',

    ];

    protected $hidden = [
        'remember_token',
    ];

    protected $dates = ['name_field'];
}

