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
        Schema::create('students', function (Blueprint $table) {
            $table->id('student_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('faculty_id');
            $table->string('name');
            $table->timestamps();
            $table->softdeletes();

            $table->foreign('user_id')->references('user_id')->on('users')->ondelete('cascade');
            $table->foreign('faculty_id')->references('faculty_id')->on('faculties')->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
