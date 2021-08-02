<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VMServiceController;
use App\Http\Controllers\WebHostingServiceController;
use App\Http\Controllers\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::permanentRedirect('/', '/dashboard');

Route::get('/dashboard', [Dashboard::class, 'index'])->middleware(['auth'])->name('dashboard');

// Virtual Machine service route ...
Route::get('/vm', [VMServiceController::class, 'index'])
  ->middleware('auth')
  ->name('vm');
Route::get('/vm/create', [VMServiceController::class, 'create'])
  ->middleware('auth')
  ->name('vm-create');
Route::post('/vm/create', [VMServiceController::class, 'store'])
  ->middleware('auth')
  ->name('vm-create-post');
Route::delete('/vm/delete/{id}', [VMServiceController::class, 'destroy'])
  ->middleware('auth')
  ->name('vm-delete');

// Web Hosting service routes ...
Route::get('/hosting', [WebHostingServiceController::class, 'index'])
  ->middleware('auth')
  ->name('hosting');
Route::get('/hosting/create', [WebHostingServiceController::class, 'create'])
  ->middleware('auth')
  ->name('hosting-create');
Route::post('/hosting/create', [WebHostingServiceController::class, 'store'])
  ->middleware('auth')
  ->name('hosting-create-post');
Route::delete('/hosting/delete/{id}', [WebHostingServiceController::class, 'destroy'])
  ->middleware('auth')
  ->name('hosting-delete');

require __DIR__.'/auth.php';
