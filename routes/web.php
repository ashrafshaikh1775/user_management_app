<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

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

Route::get('/',[DataController::class,"login"])->middleware('alreadyLoggedIn');
Route::get('/register',[DataController::class,'register'])->middleware('alreadyLoggedIn');
Route::post('/registerData',[DataController::class,'registerUser']);
Route::post('/loginData',[DataController::class,'loginUser']);
Route::get('/dashboard',[DataController::class,'dashboard'])->middleware('isLoggedIn');
Route::get('/logout',[DataController::class,'logoutUser']);
Route::post('/updateUserInfo',[DataController::class,'updateUserData']);