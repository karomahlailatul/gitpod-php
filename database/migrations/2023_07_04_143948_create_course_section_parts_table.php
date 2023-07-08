<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseSectionPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_section_parts', function (Blueprint $table) {
            $table->id();
            $table->string("name", 255);
            $table->text("description");
            $table->unsignedBigInteger("course_sections_id");
            
            $table->timestamps();
            $table->foreign("course_sections_id")->references("id")->on("course_sections")->onDelete("cascade");
               
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_section_parts');
    }
}
