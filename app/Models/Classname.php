<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classname extends Model
{
    use HasFactory;
    protected $table = 'classnames';

    protected $primarykey = 'id';

    protected $fillable = [
        'class_name',

    ];
}
