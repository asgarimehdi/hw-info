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
        Schema::table('death_records', function (Blueprint $table) {
            $table->string('national_id', 10)->unique()->after('user_id'); // کد ملی، یکتا باشد
            $table->text('description')->nullable()->after('cause_of_death'); // توضیحات
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       
        Schema::table('death_records', function (Blueprint $table) {
            $table->dropColumn(['national_id', 'description']);
        });
    }
};
