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
            $table->increments('id');
            $table->string('pc_name');
            $table->string('username')->nullable();
            $table->string('operator_name')->nullable();
            $table->string('type')->nullable();
            $table->string('os_type')->nullable();
            $table->string('os_build')->nullable();
            $table->string('ip_valid')->nullable();
            $table->string('ip_local')->nullable();
            $table->string('mac')->nullable();
            $table->string('net_type')->nullable();
            $table->string('switch')->nullable();
            $table->string('port')->nullable();
            $table->string('location')->nullable();
            $table->string('location_type')->nullable();
            $table->string('unit')->nullable();
            $table->boolean('shutdown')->default(1);
            $table->string('vlan')->nullable();
            $table->string('motherboard')->nullable();
            $table->string('cpu')->nullable();
            $table->string('ram')->nullable();
            $table->string('hdd')->nullable();
            $table->string('upgrade_hw')->nullable();
            $table->string('upgrade_win')->nullable();
            $table->date('clean_at')->nullable();
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
