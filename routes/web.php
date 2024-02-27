<?php

use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MenuController;

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

//login
Route::get('/', function () {
    return view('login');
})->name('loginIndex');

Route::controller(AuthController::class)->group(function(){
    Route::post('/login','authLogin')->name('login');
    Route::get('/logout','authLogout')->name('logout');
});

Route::middleware(['auth'])->group(function(){

    //============================ Master Data =================================================
    Route::controller(ApplicationController::class)->group(function(){
        Route::get('/applications','applicationIndex')->name('applicationIndex');
        Route::get('/applications/add','applicationAdd')->name('applicationAdd');
        Route::post('/applications/submit','applicationSubmit')->name('applicationSubmit');

        Route::get('/application/edit/{id}','applicationEdit')->name('applicationEdit');
        Route::post('/application/update/{id}','applicationUpdate')->name('applicationUpdate');
    });

    Route::controller(BusinessController::class)->group(function(){
        Route::get('/businesses','businessIndex')->name('businessIndex');
        Route::post('/businesses/submit','businessSubmit')->name('businessSubmit');
        Route::get('/businesses/add','businessAdd')->name('businessAdd');
        Route::get('/business/edit/{id}','businessEdit')->name('businessEdit');
        Route::post('/business/update/{id}','businessUpdate')->name('businessUpdate');
    });

    Route::controller(UserController::class)->group(function(){
        Route::get('/users','userIndex')->name('userIndex');
        Route::post('/users/submit','userSubmit')->name('userSubmit');
        Route::get('/users/add','userAdd')->name('userAdd');
        Route::get('/user/edit/{id}','userEdit')->name('userEdit');
        Route::post('/user/update/{id}','userUpdate')->name('userUpdate');
        Route::post('/user/update-password/{id}','userUpdatePassword')->name('userUpdatePassword');
    });

    Route::controller(RoleController::class)->group(function(){
        Route::get('/roles','roleIndex')->name('roleIndex');
        Route::get('/roles/add','roleAdd')->name('roleAdd');
        Route::post('/roles/submit','roleSubmit')->name('roleSubmit');
        Route::get('/roles/edit/{idRole}','roleEdit')->name('roleEdit');
        Route::post('/roles/update/{idRole}','roleUpdate')->name('roleUpdate');
    });

    //============================ Transaksi Data =================================================
    Route::controller(MenuController::class)->group(function(){
        Route::get('/menus','menuIndex')->name('menuIndex');
        Route::post('/menus/submit','menuSubmit')->name('menuSubmit');
        Route::get('/menus/add','menuAdd')->name('menuAdd');
        Route::get('/menu/edit/{id}','menuEdit')->name('menuEdit');
        Route::post('/menu/update/{id}','menuUpdate')->name('menuUpdate');
        Route::post('/menurole/{id}','menuRole')->name('menuRole');
    });
    Route::controller(CompanyController::class)->group(function(){
        Route::get('/companys','companyIndex')->name('companyIndex');
        Route::post('/companys/submit','companySubmit')->name('companySubmit');
        Route::get('/companys/add','companyAdd')->name('companyAdd');
        Route::get('/company/edit/{id}','companyEdit')->name('companyEdit');
        Route::post('/company/update/{id}','companyUpdate')->name('companyUpdate');
    });

    Route::get('/dashboard', [DashboardController::class,'dashboardIndex'])->name('dashboardIndex');

});
