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
use App\Http\Controllers\admin\UserTypeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AMCController as FAMCController;
use App\Http\Controllers\ADController;
use App\Http\Controllers\CommissionerController;

use App\Http\Controllers\admin\UserController;

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

Route::get('ca-register', [CaController::class, 'caRegister']);
Route::post('save-ca-details', [CaController::class, 'saveCaDetails']);
Route::post('fetch-districts', [CaController::class, 'fetchDistricts']);

Route::get('ca-payment/{id}', [CaController::class, 'capayment']);

Route::get('ca-regpay-success/{id}', [CaController::class, 'caRegPaySuccess']);

/*
/ Web Routes for Trader with TraderController 
/
*/


Route::get('trader-register', [TraderController::class, 'traderregister']);
Route::post('save-trader-details', [TraderController::class, 'saveTraderDetails']);
Route::get('trader-payment/{id}', [TraderController::class, 'traderpayment']);
Route::get('trader-regpay-success/{id}', [TraderController::class, 'traderRegPaySuccess']);
//for final payment for trader

Route::get('trader-final-payment/{id}', [TraderController::class, 'traderFinalPay']);
Route::get('trader-final-payment-success/{id}', [TraderController::class, 'traderFinalPaySuccess']);

/*
/ Web Routes for ADMIN(super admin) with CaController 
/
*/
Route::get('admin/login', function () {
	return view('admin/login');
})->name("adminlogin");
Route::post('admin/post-login', [AuthController::class, 'loginsubmit']);
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
	Route::get('/', [HomeController::class, 'dashboard']);
	Route::resource('district', DistrictController::class);
	Route::resource('mandal', MandalController::class);
	Route::resource('designation', DesignationController::class);
	Route::resource('amc', AMCController::class);
	Route::resource('licensetype', LicensetypeController::class);
	Route::resource('usertype', UserTypeController::class);
	Route::resource('user', UserController::class);
});


Route::group(['prefix' => 'ca', 'middleware' => 'ca'], function () {

	Route::get('/', [CaController::class, 'dashboard']);
	// For Manage mandal,district,state
	Route::get('/approval-status/{app_id}', [CaController::class, 'approvalstatus']);

	Route::get('/my-application-list', [CaController::class, 'applicationlist']);

	Route::get('/final-payment/{id}', [CaController::class, 'caFinalPay']);
	Route::get('/final-payment-success/{id}', [CaController::class, 'caFinalPaySuccess']);
});

Route::group(['prefix' => 'trader', 'middleware' => 'trader'], function () {

	Route::get('/', [TraderController::class, 'dashboard']);
	// For Manage mandal,district,state
	Route::get('/approval-status/{app_id}', [TraderController::class, 'approvalstatus']);
	Route::get('/my-application-list', [TraderController::class, 'applicationlist']);
});




Route::group(['prefix' => 'amc', 'middleware' => 'amc'], function () {

	Route::get('/', [FAMCController::class, 'dashboard']);
	// For Manage mandal,district,state
	Route::get('/traderapplylist', [FAMCController::class, 'traderapplylist']);
	Route::get('/traderapproval/{id}', [FAMCController::class, 'traderapproval']);

	Route::get('/caapplylist', [FAMCController::class, 'caapplylist']);
	Route::get('/caapproval/{id}', [FAMCController::class, 'caapproval']);
});

Route::group(['prefix' => 'ad', 'middleware' => 'ad'], function () {

	Route::get('/', [ADController::class, 'dashboard']);
	// For Manage mandal,district,state

	Route::get('/traderapplylist', [ADController::class, 'traderapplylist']);
	Route::get('/traderapproval/{id}', [ADController::class, 'traderapproval']);

	Route::get('/caapplylist', [ADController::class, 'caapplylist']);
	Route::get('/caapproval/{id}', [ADController::class, 'caapproval']);
});

Route::group(['prefix' => 'commissioner', 'middleware' => 'commissioner'], function () {

	Route::get('/', [CommissionerController::class, 'dashboard']);
	// For Manage mandal,district,state
	Route::get('/traderapplylist', [CommissionerController::class, 'traderapplylist']);
	Route::get('/traderapproval/{id}', [CommissionerController::class, 'traderapproval']);

	Route::get('/caapplylist', [CommissionerController::class, 'caapplylist']);
	Route::get('/caapproval/{id}', [CommissionerController::class, 'caapproval']);
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
