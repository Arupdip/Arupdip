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

Route::get('/home', function () {
	return redirect('/');
});
Route::any('logout', function () {
	if (Auth::user()->user_type == 0) {
		$redirect = 'admin/login';
	}elseif(Auth::user()->user_type == 3 || Auth::user()->user_type == 4 || Auth::user()->user_type == 5){
		$redirect = 'login';
	}else{
		$redirect = '/';
	}
	
	Auth::logout();
	return redirect($redirect);
	
})->name("logout");


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

Route::get('pdfdownload/{id}', [HomeController::class, 'pdfdownload']);
Route::get('capdfdownload/{id}', [HomeController::class, 'capdfdownload']);

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

Route::get('email-validation/{id?}', [UserController::class, 'emailValidation']);
Route::get('phone-validation/{id?}', [UserController::class, 'phoneValidation']);
Route::get('employee-id-validation/{id?}', [UserController::class, 'employeeIdValidation']);

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

	Route::get('/recheck/{app_id}', [CaController::class, 'recheck']);
	Route::post('reset-ca-details', [CaController::class, 'resetCaDetails']);



	Route::get('/renew/{app_id}', [CaController::class, 'renew']);
	Route::post('renew-ca-details', [CaController::class, 'renewCaDetails']);
	Route::get('ca-payment-renew/{id}', [CaController::class, 'paymentrenew']);
	Route::get('ca-regpay-success-renew/{id}', [CaController::class, 'caRegPaySuccessrenew']);
	

});

Route::group(['prefix' => 'trader', 'middleware' => 'trader'], function () {

	Route::get('/', [TraderController::class, 'dashboard']);
	// For Manage mandal,district,state
	Route::get('/approval-status/{app_id}', [TraderController::class, 'approvalstatus']);
	Route::get('/my-application-list', [TraderController::class, 'applicationlist']);

	Route::get('/recheck/{app_id}', [TraderController::class, 'recheck']);
	Route::post('reset-trader-details', [TraderController::class, 'resetTraderDetails']);


	
	Route::get('/renew/{app_id}', [TraderController::class, 'renew']);

	Route::post('renew-trader-details', [TraderController::class, 'renewTraderDetails']);
Route::get('trader-payment-renew/{id}', [TraderController::class, 'traderpaymentrenew']);
Route::get('trader-regpay-success-renew/{id}', [TraderController::class, 'traderRegPaySuccessrenew']);


});




Route::group(['prefix' => 'amc', 'middleware' => 'amc'], function () {

	Route::get('/', [FAMCController::class, 'dashboard']);
	// For Manage mandal,district,state
	Route::get('/trader-signature-upload', [FAMCController::class, 'tradersignatureupload']);
	Route::post('/upload-trader-sign', [FAMCController::class, 'uploadtraderesign']);

	Route::get('/trader-signature-upload-success', [FAMCController::class, 'tradersignatureuploadsuccess']);


	Route::get('/traderapplylist', [FAMCController::class, 'traderapplylist']);
	Route::get('/traderapproval/{id}', [FAMCController::class, 'traderapproval']);
	Route::get('/traderviewdetails/{id}', [FAMCController::class, 'traderViewDetails']);
	Route::post('/traderapprovesubmit', [FAMCController::class, 'traderApproveSubmit']);

	Route::get('/caapplylist', [FAMCController::class, 'caapplylist']);
	Route::get('/caapproval/{id}', [FAMCController::class, 'caapproval']);

	Route::get('/caviewdetails/{id}', [FAMCController::class, 'caViewDetails']);
	Route::post('/caapprovesubmit', [FAMCController::class, 'caApproveSubmit']);

	Route::get('/ca-signature-upload', [FAMCController::class, 'casignatureupload']);
	Route::post('/upload-ca-sign', [FAMCController::class, 'uploadcasign']);
	Route::get('/ca-signature-upload-success', [FAMCController::class, 'casignatureuploadsuccess']);
});

Route::group(['prefix' => 'ad', 'middleware' => 'ad'], function () {

	Route::get('/', [ADController::class, 'dashboard']);
	// For Manage mandal,district,state

	Route::get('/traderapplylist', [ADController::class, 'traderapplylist']);
	Route::get('/traderapproval/{id}', [ADController::class, 'traderapproval']);

	Route::get('/traderviewdetails/{id}', [ADController::class, 'traderViewDetails']);
	Route::post('/traderapprovesubmit', [ADController::class, 'traderApproveSubmit']);


	Route::get('/caapplylist', [ADController::class, 'caapplylist']);
	Route::get('/caapproval/{id}', [ADController::class, 'caapproval']);

	Route::get('/caviewdetails/{id}', [ADController::class, 'caViewDetails']);
	Route::post('/caapprovesubmit', [ADController::class, 'caApproveSubmit']);
});

Route::group(['prefix' => 'commissioner', 'middleware' => 'commissioner'], function () {

	Route::get('/', [CommissionerController::class, 'dashboard']);
	// For Manage mandal,district,state
	Route::get('/traderapplylist', [CommissionerController::class, 'traderapplylist']);
	Route::get('/traderapproval/{id}', [CommissionerController::class, 'traderapproval']);

	Route::get('/traderviewdetails/{id}', [CommissionerController::class, 'traderViewDetails']);
	Route::post('/traderapprovesubmit', [CommissionerController::class, 'traderApproveSubmit']);


	Route::get('/caapplylist', [CommissionerController::class, 'caapplylist']);
	Route::get('/caapproval/{id}', [CommissionerController::class, 'caapproval']);

	Route::get('/caviewdetails/{id}', [CommissionerController::class, 'caViewDetails']);
	Route::post('/caapprovesubmit', [CommissionerController::class, 'caApproveSubmit']);
});
Route::get('/edittradercomply/{id}', [CommissionerController::class, 'edittradercomply']);

Route::post('/submitcomply', [CommissionerController::class, 'submitcomply']);

Route::get('/viewtradercomply/{id}', [CommissionerController::class, 'viewtradercomply']);



Route::get('/editcacomply/{id}', [CommissionerController::class, 'editcacomply']);

Route::post('/submitcomplyca', [CommissionerController::class, 'submitcomplyca']);

Route::get('/viewcacomply/{id}', [CommissionerController::class, 'viewcacomply']);





Auth::routes();
