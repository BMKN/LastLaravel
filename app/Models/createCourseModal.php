<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class   createCourseModal extends Model
{
    use HasFactory;

    protected $fillable = [
        'courseName',
        'subjectCourse',
    ];
}
