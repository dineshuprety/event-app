<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Dashboard');
})->name('home');

/**
 * Event routes
 */
Route::prefix('event')->group(function () {
    Route::get('index', [EventController::class, 'index'])->name('index');
    Route::get('create', [EventController::class, 'create'])->name('create');
    Route::post('store', [EventController::class, 'store'])->name('store');
    Route::get('edit/{event}', [EventController::class, 'edit'])->name('edit');
    Route::put('update/{event}', [EventController::class, 'update'])->name('update');
    Route::delete('delete/{event}', [EventController::class, 'destroy'])->name('destroy');
});
