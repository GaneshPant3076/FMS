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
        Schema::create('notes', function (Blueprint $table) {
            $table->id('note_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('subject_id');
            $table->string('name');
            $table->softdeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->ondelete('cascade');
            $table->foreign('subject_id')->references('subject_id')->on('subjects')->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
