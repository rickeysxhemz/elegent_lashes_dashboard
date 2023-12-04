<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\OwnerCheckInController;
use App\Http\Controllers\ManagerDashboardController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\OwnerPaymentController;

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

Route::get('/dasboard', function () {
    return view('dashboard.main');
})->name('dashboard');
////////////////////////////////  Owner Routes  /////////////////////////////////////////
Route::prefix('owner')->group(function () {
Route::get('login-page',[OwnerController::class,'loginPage'])->name('owner.loginPage');
Route::post('login',[OwnerController::class,'login'])->name('owner.login');
});
////////////////////////////////  Owner Routes  /////////////////////////////////////////
Route::middleware(['auth','role:owner'])->group(function () {

Route::prefix('owner')->group(function () {

    //////////////////////////////////Dashboard Routes/////////////////////////////////////////
    Route::get('dashboard',[OwnerController::class,'dashboard'])->name('owner.dashboard');
    Route::get('logout',[OwnerController::class,'logout'])->name('owner.logout');
    Route::get('change-password-page',[OwnerController::class,'changePasswordPage'])->name('owner.changePasswordPage');
    Route::patch('change-password',[OwnerController::class,'changePassword'])->name('owner.changePassword');
    //////////////////////////////////Manager Management Routes by owner/////////////////////////////////////////

    Route::prefix('manage')->group(function () {
        Route::get('manager',[OwnerController::class,'manageManager'])->name('owner.manageManager');
        Route::get('technician',[OwnerController::class,'manageTechnician'])->name('owner.manageTechnician');
        Route::get('location',[OwnerController::class,'manageLocation'])->name('owner.manageLocation');
        Route::get('create-manager-page',[OwnerController::class,'createManagerPage'])->name('owner.createManagerPage');
        Route::post('create-manager',[OwnerController::class,'createManager'])->name('owner.createManager');
        Route::get('edit-manager-page/{id}',[OwnerController::class,'editManagerPage'])->name('owner.editManagerPage');
        Route::put('update-manager/{id}',[OwnerController::class,'updateManager'])->name('owner.updateManager');
        Route::get('delete-manager/{id}',[OwnerController::class,'deleteManager'])->name('owner.deleteManager');

        ////////////////////////////////Location Management Routes by owner/////////////////////////////////////////

        Route::get('create-location-page',[OwnerController::class,'createLocationPage'])->name('owner.createLocationPage');
        Route::post('create-location',[OwnerController::class,'createLocation'])->name('owner.createLocation');
        Route::get('delete-location/{id}',[OwnerController::class,'deleteLocation'])->name('owner.deleteLocation');

        ////////////////////////////////Technician Management Routes by owner/////////////////////////////////////////

        Route::get('create-technician-page',[OwnerController::class,'createTechnicianPage'])->name('owner.createTechnicianPage');
        Route::post('create-technician',[OwnerController::class,'createTechnician'])->name('owner.createTechnician');
        Route::get('edit-technician-page/{id}',[OwnerController::class,'editTechnicianPage'])->name('owner.editTechnicianPage');
        Route::put('update-technician/{id}',[OwnerController::class,'updateTechnician'])->name('owner.updateTechnician');
        Route::get('delete-technician/{id}',[OwnerController::class,'deleteTechnician'])->name('owner.deleteTechnician');
    });

        /////////////////////////////Clients-CheckIns Management/////////////////////////////////////////

    Route::prefix('clients')->group(function () {
        Route::get('list-checkins',[OwnerCheckInController::class,'listCheckins'])->name('owner.listCheckins');
        Route::get('list-checkins/{id}',[OwnerCheckInController::class,'listCheckinsByUser'])->name('owner.listCheckinsByUser');
    });
    
    /////////////////////////////Clients-Waivers Management/////////////////////////////////////////
    
    Route::prefix('waiver')->group(function(){
        Route::get('list-waivers',[OwnerCheckInController::class,'listWaivers'])->name('owner.listWaivers');
        // Route::get('list-waivers/{id}',[OwnerCheckInController::class,'listWaiversByUser'])->name('owner.listWaiversByUser');
    });
    
    /////////////////////////////Clients-Payments Management/////////////////////////////////////////
    
    Route::prefix('payment')->group(function(){
        Route::get('list',[OwnerPaymentController::class,'paymentPage'])->name('owner.listPayments');
        Route::get('revenue-calculator-page',[OwnerPaymentController::class,'revenueCalculatorPage'])->name('owner.revenueCalculatorPage');
        Route::post('revenue-calculate',[OwnerPaymentController::class,'revenueCalculate'])->name('owner.revenueCalculate');
    });

    });

});

////////////////////////////////// Manager Routes ////////////////////////////////////////
Route::prefix('manager')->group(function () {
    Route::get('login-page',[ManagerDashboardController::class,'loginPage'])->name('manager.loginPage');
    Route::post('login',[ManagerDashboardController::class,'login'])->name('manager.login');
    });

Route::middleware(['auth','role:manager'])->group(function () {

Route::prefix('manager')->group(function () {

        //////////////////////////////////Dashboard Routes/////////////////////////////////////////
        Route::get('dashboard',[ManagerDashboardController::class,'dashboard'])->name('manager.dashboard');
        Route::get('logout',[ManagerDashboardController::class,'logout'])->name('manager.logout');

        Route::prefix('manage')->group(function(){
            Route::get('assign-check-in-page/{id}',[ManagerDashboardController::class,'assignCheckInPage'])->name('manager.assignCheckInPage');
            Route::post('assign-check-in',[ManagerDashboardController::class,'assignCheckIn'])->name('manager.assignCheckIn');
        });

    });
});    

       //////////////////////////////// Technician Routes ////////////////////////////////////////
Route::prefix('technician')->group(function () {
    Route::get('login-page',[TechnicianController::class,'loginPage'])->name('technician.loginPage');
    Route::post('login',[TechnicianController::class,'login'])->name('technician.login');
    });

Route::middleware(['auth','role:technician'])->group(function () {

    //////////////////////////////// Dashboard Routes ////////////////////////////////////////
    Route::prefix('technician')->group(function () {
        Route::get('dashboard',[TechnicianController::class,'dashboard'])->name('technician.dashboard');
        Route::get('logout',[TechnicianController::class,'logout'])->name('technician.logout');
    });
    Route::prefix('payment')->group(function () {
        Route::get('add-page/{id}',[TechnicianController::class,'addPayments'])->name('technician.addPayments');
        Route::post('add',[TechnicianController::class,'addPaymentsStore'])->name('technician.addPaymentsStore');
    });
});