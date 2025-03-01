<?php

use App\Livewire\ChartExample;
use App\Livewire\CreateDevice;
use App\Livewire\CreateUser;
use App\Livewire\DeathDashboard;
use App\Livewire\Devices;
use App\Livewire\Users;
use Illuminate\Support\Facades\Route;


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

});

//*****************************************
use App\Livewire\ShowMap;

Route::get('/map', ShowMap::class)->name('map');
//**************************************** */
use App\Livewire\DeathRecordForm;
use App\Livewire\TestComponent;

Route::get('/death-record/create', DeathRecordForm::class)->name('death-record.create');
//************************************************* */
Route::get('/death-record/dashboard', DeathDashboard::class)->name('death-record.dashboard');
//************************************************* */
Route::get('/death-record/chart', ChartExample::class)->name('death-record.chart');
//************************************************* */
Route::get('/death-record/test', TestComponent::class)->name('death-record.test');