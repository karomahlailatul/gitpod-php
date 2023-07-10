<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\CategoryCourse;
use App\Models\Course;
use App\Models\CourseSection;
use App\Models\CourseSectionPart;
use App\Models\CourseSectionQna;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(JabatansSeeder::class);
        // $this->call(KaryawansSeeder::class);
        // \App\Models\User::factory(10)->create();
        // Create some users
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin'),
            'phone' => '123456789',
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Teacher',
            'email' => 'teacher@mail.com',
            'password' => bcrypt('teacher'),
            'phone' => '987654321',
            'role' => 'teacher',
        ]);

        // Create some category courses
        CategoryCourse::create([
            'name' => 'Category 1',
        ]);

        CategoryCourse::create([
            'name' => 'Category 2',
        ]);

        // Create some courses
        Course::create([
            'name' => 'Course 1',
            'description' => 'Description for Course 1',
            'image' => 'course1.jpg',
            'price' => 100,
            'category_courses_id' => 1,
            'active' => true,
        ]);

        Course::create([
            'name' => 'Course 2',
            'description' => 'Description for Course 2',
            'image' => 'course2.jpg',
            'price' => 200,
            'category_courses_id' => 2,
            'active' => true,
        ]);

        // Create some course sections
        CourseSection::create([
            'name' => 'Section 1',
            'description' => 'Description for Section 1',
            'courses_id' => 1,
        ]);

        CourseSection::create([
            'name' => 'Section 2',
            'description' => 'Description for Section 2',
            'courses_id' => 2,
        ]);

        // Create some course section parts
        CourseSectionPart::create([
            'name' => 'Part 1',
            'description' => 'Description for Part 1',
            'course_sections_id' => 1,
        ]);

        CourseSectionPart::create([
            'name' => 'Part 2',
            'description' => 'Description for Part 2',
            'course_sections_id' => 2,
        ]);

        // Create some course section Q&As
        CourseSectionQna::create([
            'question' => 'Question 1',
            'answer' => 'Answer for Question 1',
            'description' => 'Description for Question 1',
            'course_sections_id' => 1,
        ]);

        CourseSectionQna::create([
            'question' => 'Question 2',
            'answer' => 'Answer for Question 2',
            'description' => 'Description for Question 2',
            'course_sections_id' => 2,
        ]);
    }
}
