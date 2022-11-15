<?php

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
    return Inertia::render('Frontend/Index', [
        'name' => 'Dinesh Uprety'
    ]);
})->name('home');

Route::get('/about', function () {
    sleep(3);
    return Inertia::render('Frontend/About', [
        'name' => 'Dinesh Uprety'
    ]);
})->name('about');

Route::get('/service', function () {
    sleep(3);
    return Inertia::render('Frontend/Service', [
        'name' => 'Dinesh Uprety'
    ]);
})->name('service');

Route::get('/teams', function () {
    sleep(3);
    return Inertia::render('Frontend/Teams', [
        'name' => 'Dinesh Uprety'
    ]);
})->name('teams');

Route::get('/contact', function () {
    sleep(3);
    return Inertia::render('Frontend/Contact', [
        'name' => 'Dinesh Uprety'
    ]);
})->name('contact');
