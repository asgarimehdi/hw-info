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
        Schema::create('devices', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('pc_name');
            $table->string('type')->nullable();
            $table->string('os_type')->nullable();
            $table->string('os_version')->nullable();
            $table->string('ip')->nullable();
            $table->string('username')->nullable();
            $table->string('operator_name')->nullable();
            $table->string('mac')->nullable();
            $table->string('switch')->nullable();
            $table->string('port')->nullable();
            $table->string('location')->nullable();
            $table->string('unit')->nullable();
            $table->boolean('shutdown')->default(1);
            $table->string('vlan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
