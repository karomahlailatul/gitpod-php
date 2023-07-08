<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string("name", 255);
            $table->text("description");
            $table->text("image");
            $table->integer("price");
            $table->unsignedBigInteger("category_courses_id");
            $table->boolean("active")->default(true);
            $table->timestamps();
            $table->foreign("category_courses_id")->references("id")->on("category_courses")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
