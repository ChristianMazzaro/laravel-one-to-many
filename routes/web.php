<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function(){
        Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
        Route::resource('projects',ProjectController::class);
        Route::get('/projects',[ProjectController::class,'index'])->name('projects');
        Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
        Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
        Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
