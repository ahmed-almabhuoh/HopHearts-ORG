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
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name', 100)->default('My Website');
            $table->string('site_logo')->nullable();
            $table->string('contact_email')->nullable();
            $table->text('address')->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->json('social_media_links')->nullable(); // This could be a JSON column if you store multiple links
            $table->text('about_us')->nullable();
            $table->boolean('is_maintenance_mode')->default(false);
            $table->string('maintenance_message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_settings');
    }
};
