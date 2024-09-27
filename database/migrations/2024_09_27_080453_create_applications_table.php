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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->unsignedBigInteger('job_id'); // Foreign key to jobs table
            $table->unsignedBigInteger('user_id')->nullable(); // Foreign key to users table (applicant)
            $table->text('cover_letter')->nullable(); // Cover letter or message from the applicant
            $table->string('resume')->nullable(); // Path to the resume (if uploaded)
            $table->enum('status', ['pending', 'reviewed', 'accepted', 'rejected'])->default('pending'); // Status of the application
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('job_id')->references('id')->on('jobs_advertisement')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
