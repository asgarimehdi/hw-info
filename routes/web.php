<?php

use App\Livewire\ChartExample;
use App\Livewire\Device\CreateDevice;
use App\Livewire\CreateUser;
use App\Livewire\DeathDashboard;
use App\Livewire\Device\Devices;
use App\Livewire\Users;
use Illuminate\Support\Facades\Route;

use App\Livewire\SalesChart;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',function () {
    return view('auth/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/users', Users::class)->name('users');

    Route::get('/create-user', CreateUser::class)->name('create-user');
    Route::get('/create-device', CreateDevice::class)->name('create-device');
    Route::get('/devices', Devices::class)->name('devices');
    Route::get('/devices/{deviceId}/edit', CreateDevice::class)->name('devices.edit');

});

//*****************************************



Route::get('/sales-chart', SalesChart::class);
