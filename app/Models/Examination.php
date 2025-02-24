<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    use HasFactory;

    protected $table = 'examinations';

    protected $primarykey = 'id';

    protected $fillable = [
        'class_id',
        'question',
        'option_1',
        'option_2',
        'option_3',
        'option_4',
        'answer',

    ];
}
