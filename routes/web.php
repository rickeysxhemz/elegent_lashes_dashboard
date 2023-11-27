<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\OwnerController;

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

Route::get('/',[HomeController::class,'index'])->name('home');
Route::post('manager-login',[AuthController::class,'managerLogin'])->name('login');

Route::middleware(['auth','role:manager'])->group(function () {
    
    Route::prefix('manager')->group(function () {

        Route::get('settings',[ManagerController::class,'managerSettings'])->name('manager.settings');
        Route::post('update-location',[ManagerController::class,'updateLocation'])->name('update.location');

        Route::get('logout', function () {
            Auth::logout();
            return redirect()->route('home');
        })->name('manager.logout');
    });

    Route::prefix('user')->group(function () {

        Route::get('checkin',[UserController::class,'checkin'])->name('user.checkin');
        Route::post('perform-checkin',[UserController::class,'performCheckin'])->name('user.perfomCheckin');
        Route::get('register-page',[UserController::class,'userRegisterPage'])->name('user.registerPage');
        Route::post('register',[UserController::class,'userRegister'])->name('user.register');
        Route::get('waiver',[UserController::class,'waiver'])->name('user.waiver');
        Route::post('generate-signed-waiver',[UserController::class,'generateSignedWaiver'])->name('user.generateSignedWaiver');
        Route::get('dashboard',[UserController::class,'dashboard'])->name('user.dashboard');
        Route::get('logout',[UserController::class,'logout'])->name('user.logout');
        
    });
    
    
    
});

////////////////////////////////  Owner Routes  /////////////////////////////////////////
Route::prefix('owner')->group(function () {
Route::get('login-page',[OwnerController::class,'loginPage'])->name('owner.loginPage');
Route::post('login',[OwnerController::class,'login'])->name('owner.login');
});
////////////////////////////////  Owner Routes  /////////////////////////////////////////
Route::middleware(['auth','role:owner'])->group(function () {

Route::prefix('owner')->group(function () {
Route::get('dashboard',[OwnerController::class,'dashboard'])->name('owner.dashboard');
});

});