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
        Schema::table('projects', function (Blueprint $table) {
            //
            $table->string('link')->nullable()->after('name')->unique();

            // DropColumns
            $table->dropColumn('name');
            $table->string('name_ar')->after('id');
            $table->string('name_en')->after('name_ar');

            $table->dropColumn('description');
            $table->string('description_ar')->after('name_en');
            $table->string('description_en')->after('description_ar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //
            $table->dropColumn('link');
            $table->dropColumn('name_ar');
            $table->dropColumn('name_en');
            $table->dropColumn('description_ar');
            $table->dropColumn('description_en');

            $table->string('name')->after('id');
            $table->string('description')->after('name');
        });
    }
};
