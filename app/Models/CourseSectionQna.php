<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSectionQna extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
        'description',
        'course_sections_id',
    ];

    public function courseSection()
    {
        return $this->belongsTo(CourseSection::class, 'course_sections_id');
    }
}
