<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
     public function up()
    {
        Schema::table('death_records', function (Blueprint $table) {
            $table->decimal('lat', 10, 8)->after('location');
            $table->decimal('lng', 11, 8)->after('lat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('death_records', function (Blueprint $table) {
            $table->dropColumn(['lat', 'lng']);
        });
    }
};
