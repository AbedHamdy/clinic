<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route; // Ensure this line is present and correctly spelled
use App\Http\Controllers\ClintHomeController;
use App\Http\Controllers\ClintMajorController;
use App\Http\Controllers\ClintDoctorsController;
use App\Http\Controllers\ClintBookingController;
use App\Http\Controllers\ClintLoginController;
use App\Http\Controllers\ClintRegisterController;
use App\Http\Controllers\ShowDoctorsToMajor;
use App\Http\Controllers\CreateDoctor;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ClintHomeController::class,"index"])->name("clint-home");

Route::middleware('auth')->group(function () {
    
    Route::get('/booking/{id}' , [ClintBookingController::class,"index"])->name("clint-booking");
    Route::post('/create-booking' , [ClintBookingController::class,"create"])->name("create-booking");
});

Route::middleware(["auth" , "CheckRole:admin"])->group(function(){

    Route::get('/store-major' , [ClintMajorController::class,"create"])->name("create-major");
    Route::post('/store-major' , [ClintMajorController::class,"store"])->name("store-major");
    Route::get('/show-major/{id}' , [ClintMajorController::class,"show"])->name("show-major");
    Route::put('/update-major' , [ClintMajorController::class,"update"])->name("update-major");
    Route::delete('/delete-major/{id}' , [ClintMajorController::class,"destroy"])->name("delete-major");
    
    Route::get('/create-doctor' , [CreateDoctor::class,"index"])->name("create-doctor");
    Route::post('/store-doctor' , [CreateDoctor::class,"store"])->name("store-doctor"); 
    Route::get('/show-doctor\{id}' , [CreateDoctor::class,"show"])->name("show-doctor"); 
    Route::put('/update-doctor' , [CreateDoctor::class,"update"])->name("update-doctor"); 
    Route::delete('/delete-doctor/{id}' , [CreateDoctor::class,"destroy"])->name("delete-doctor"); 
});



// Route::get('/login' , [ClintLoginController::class,"index"])->name("clint-login");
// Route::get('/register' , [ClintRegisterController::class,"index"])->name("clint-register");

Route::get('/majors' , [ClintMajorController::class,"index"])->name("clint-majors");

Route::get('/show-doctors/{id}' , [ShowDoctorsToMajor::class,"show"])->name("show-doctors");

Route::get('/doctors' , [ClintDoctorsController::class,"index"])->name("clint-doctors");


require __DIR__.'/auth.php';
