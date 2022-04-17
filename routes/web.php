<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaController;
use App\Http\Controllers\TraderController;
use App\Http\Controllers\admin\DistrictController;
use App\Http\Controllers\admin\MandalController;
use App\Http\Controllers\admin\DesignationController;
use App\Http\Controllers\admin\AMCController;
use App\Http\Controllers\admin\LicensetypeController;
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
    return view('front/index');
});


/*
/ Web Routes for CA(commision agent) with CaController 
/
*/

Route::get('ca-register',[CaController::class,'caRegister']);
Route::post('save-ca-details',[CaController::class,'saveCaDetails']);
Route::post('fetch-districts',[CaController::class,'fetchDistricts']);


/*
/ Web Routes for Trader with TraderController 
/
*/


Route::get('trader-register',[TraderController::class,'traderregister']);
Route::post('save-trader-details',[TraderController::class,'saveTraderDetails']);

/*
/ Web Routes for ADMIN(super admin) with CaController 
/
*/
  Route::get('admin/login', function () {
        return view('admin/login');
    })->name("adminlogin");
   Route::post('admin/post-login',[AuthController::class,'loginsubmit']);
Route::group(['prefix' => 'admin','middleware'=>'auth'], function () {
  
   
    Route::get('/',[CaController::class,'dashboard']);
    // For Manage mandal,district,state

Route::resource('district', DistrictController::class);
Route::resource('mandal', MandalController::class);
Route::resource('designation', DesignationController::class);
Route::resource('amc', AMCController::class);
Route::resource('licensetype', LicensetypeController::class);


});






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
