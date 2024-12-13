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
        Schema::create('Sections', function (Blueprint $table) {
            $table->string('sectionID')->primary();
            $table->string('courseID');
            $table->foreign('courseID')->references('courseID')->on('Courses')->onDelete('cascade');
            $table->bigInteger('professor')->unsigned();
            $table->foreign('professor')->references('id')->on('Professors')->onDelete('cascade');
            $table->json('schedule');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Sections');
    }
};
