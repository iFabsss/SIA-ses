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
        Schema::create('Students', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('accID')->unsigned();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('middleNameName')->nullable();
            $table->string('gender');
            $table->tinyInteger('age');
            $table->date('birthdate');
            $table->string('address');
            $table->string('contactNumber');
            $table->string('email')->unique();
            $table->tinyInteger('courseYear');
            $table->string('program');
            $table->foreign('program')->references('programName')->on('Programs')->onDelete('cascade');
            $table->foreign('accID')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Students');
    }
};
