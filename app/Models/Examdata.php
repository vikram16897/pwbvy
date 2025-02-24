<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examdata extends Model
{
    use HasFactory;
    protected $table = 'examdatas';

    protected $primarykey = 'id';

    protected $fillable = [
        'user_id',
        'question_id',
        'student_ans',
    ];
}
