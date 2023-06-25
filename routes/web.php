<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BusinessHourController;
use App\Http\Controllers\HomeController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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


Route::get('/',[HomeController::class,'index']);

Route::get('/home',[HomeController::class,'redirect'])->Middleware('auth','verified');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/add_doctor_view',[AdminController::class,'addview']);
Route::post('/upload_doctor',[AdminController::class,'upload']);

Route::post('/appointment',[homeController::class,'appointment']);
Route::get('/myappointment',[homeController::class,'myappointment']);
Route::get('/cancel_appoint/{id}',[homeController::class,'cancel_appoint']);

Route::get('/showappointment',[AdminController::class,'showappointment']);
Route::get('/approved/{id}',[adminController::class,'approved']);
Route::get('/canceled/{id}',[adminController::class,'canceled']);


Route::get('/showdoctor',[AdminController::class,'showdoctor']);

Route::get('/deletedoctor/{id}',[adminController::class,'deletedoctor']);

Route::get('/updatedoctor/{id}',[adminController::class,'updatedoctor']);
Route::post('/editdoctor/{id}',[adminController::class,'editdoctor']);


Route::get('/emailview/{id}',[adminController::class,'emailview']);
Route::post('/sendemail/{id}',[adminController::class,'sendemail']);

Route::get('/business-hours/{id}', [BusinessHourController::class, 'index'])->name('business-hours.index');;
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/business-hours/update/{id}', [BusinessHourController::class, 'update']);
