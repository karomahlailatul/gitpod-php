<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'category_courses_id',
        'active',
    ];

    public function category()
    {
        return $this->belongsTo(CategoryCourse::class, 'category_courses_id');
    }

    public function courseSections()
    {
        return $this->hasMany(CourseSection::class);
    }
}
