<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSection extends Model
{
    // use HasFactory;

    // protected $fillable = [
    //     'name',
    //     'description',
    //     'courses_id',
    // ];

    // public function course()
    // {
    //     return $this->belongsTo(Course::class, 'courses_id');
    // }

    // public function courseSectionParts()
    // {
    //     return $this->hasMany(CourseSectionPart::class);
    // }

    // public function courseSectionQnas()
    // {
    //     return $this->hasMany(CourseSectionQna::class);
    // }
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'courses_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'courses_id');
    }

    public function parts()
    {
        return $this->hasMany(CourseSectionPart::class, 'course_sections_id');
    }

    public function qnas()
    {
        return $this->hasMany(CourseSectionQna::class, 'course_sections_id');
    }
}
