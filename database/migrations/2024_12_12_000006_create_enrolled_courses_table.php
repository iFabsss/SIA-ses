<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Enrolled_courses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('studentID')->unsigned();
            $table->string('courseID');
            $table->foreign('studentID')->references('id')->on('Students')->onDelete('cascade');
            $table->foreign('courseID')->references('courseID')->on('Courses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Enrolled_courses');
    }
};
