<?php

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AppointementController;

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
    return view('auth.login');
});


Route::get('/rendez-vous', [AppointementController::class, 'index'])->middleware(['auth', 'verified'])->name('rdv.index');

Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('users.index');
    Route::post('dashboard', [UserController::class, 'store'])->name('users.store');
    Route::patch('/rdv/confirmer/{id}', [AppointementController::class, 'confirmer'])->name('rdv.confirmer');
    Route::patch('/rdv/annuler/{id}', [AppointementController::class, 'annuler'])->name('rdv.annuler'); 

});

Route::middleware(['auth','role:patient'])->group(function () {
    //Profil
    Route::post('rendez-vous', [AppointementController::class, 'store'])->name('rdv.store');
    
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
