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
        Schema::create('assignment_submissions', function (Blueprint $table) {
            $table->id('assignment_submission_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('assignment_id');
            $table->string('file');
            $table->softdeletes();
            $table->timestamps();

            $table->foreign('student_id')->references('student_id')->on('students')->ondelete('cascade');
            $table->foreign('assignment_id')->references('assignment_id')->on('assignments')->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignment_submissions');
    }
};
