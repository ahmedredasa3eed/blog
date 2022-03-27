<?php

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

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

define('PAGINATION_COUNT',5);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return 'Oday';
});

Route::get('/test2/{id}', function ($id) {
    return $id;
});

Route::get('/test3/{id}', function ($id) {
    return $id;
})->name('ahmed');


Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');



Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

    Route::group(['prefix' => 'offers'], function () {
        Route::get('create', 'OffersController@create');
        Route::post('store', 'OffersController@store');
        Route::get('all', 'OffersController@getAllOffers')->name('offers.all');
        Route::get('all-offers-by-lang', 'OffersController@getAllOffersByLang');
        Route::get('edit/{offerId}', 'OffersController@editOffer');
        Route::post('update/{offerId}', 'OffersController@updateOffer');
        Route::get('delete/{offerId}', 'OffersController@deleteOffer');
    });
});

##### Ajax Routes
Route::group(['prefix'=>'ajax-offers'],function (){
    Route::get('create','OfferAjaxController@create');
    Route::post('store','OfferAjaxController@store')->name('ajax-store.store');
    Route::get('show','OfferAjaxController@show')->name('ajax-store.show');
    Route::get('details/{offerId}','OfferAjaxController@details')->name('ajax-offer.details');
    Route::post('delete','OfferAjaxController@delete')->name('ajax-offers.delete');
    Route::get('edit/{offerId}','OfferAjaxController@edit')->name('ajax-offers.edit');
    Route::post('update','OfferAjaxController@update')->name('ajax-offers.update');
});


##### MiddleWare Routes

Route::group(['middleware'=>'auth'],function (){
    Route::get('adult','AuthController@adult')->middleware('CustomAuth');
    Route::get('not-adult',function (){
        return 'Sorry you are not adult';
    })->name('not-adult');
});

##### Admin Guard Routes###############

Route::get('site','AuthController@site')->middleware('auth:web');
Route::get('admin','AuthController@admin')->middleware('auth:admin')->name('admin');
Route::get('admin-login','AuthController@loadAdminLoginForm');
Route::post('admin-login-process','AuthController@adminLogin')->name('adminLogin.process');



########SuperVisor Guard Routes ###########
Route::group(['prefix'=>'supervisor'],function (){
    Route::get('login','SupervisorAuthController@loadSupervisorLoginForm')->name('supervisor.loginForm');
    Route::post('login','SupervisorAuthController@supervisorLogin')->name('supervisor.login-process');
    Route::get('dashboard','SupervisorAuthController@dashboard')->middleware('auth:supervisor')->name('supervisor.dashboard');
    Route::get('logout', 'SupervisorAuthController@logout')->name('supervisor.logout');

});


######## ONE TO ONE Relations Routes ###########
Route::get('has-one','Relations\RelationsController@hasOneRelation');
Route::get('has-one-reverse','Relations\RelationsController@hasOneRelationReverse');
Route::get('getUserOwnsMobile','Relations\RelationsController@getUserOwnsMobile');

######## ONE TO MANY Relations Routes ###########
Route::get('getAllDoctorDetails','Relations\RelationsController@getAllDoctorDetails');
Route::get('getOneDoctor/{doctor_id}','Relations\RelationsController@getOneDoctor');
Route::get('getAllHospitalInfo','Relations\RelationsController@getAllHospitalInfo')->name('getAllHospitalInfo');
Route::get('getDoctorsInSelectedHospital/{hospital_id}','Relations\RelationsController@getDoctorsInSelectedHospital');
Route::get('getHospitalThatHaveDoctorsOnly','Relations\RelationsController@getHospitalThatHaveDoctorsOnly');
Route::get('deleteHospital/{hospital_id}','Relations\RelationsController@deleteHospital');

######## MANY TO MANY Relations Routes ###########
Route::get('getDoctorServices','Relations\RelationsController@getDoctorServices');
Route::get('doctorServices/{doctor_id}','Relations\RelationsController@doctorServices');
Route::post('saveDoctorServices','Relations\RelationsController@saveDoctorServices');


######## HAS ONE through Relations Routes ###########
Route::get('getDoctorOfPatients','Relations\RelationsController@getDoctorOfPatients');
Route::get('getPatientOfDoctor','Relations\RelationsController@getPatientOfDoctor');

######## HAS MANY through Relations Routes ###########
Route::get('getDoctorsOfCountry','Relations\RelationsController@getDoctorsOfCountry');


#########
Route::get('getHospitalOfCountry','Relations\RelationsController@getHospitalOfCountry');


############# Collection Routes #######

Route::get('index','Collections\CollectionController@index');
Route::get('filter','Collections\CollectionController@filter');
Route::get('transform','Collections\CollectionController@transform');



######################### Payment ###########################
Route::group(['middleware'=>'auth','namespace'=>'Payment'],function (){
    Route::get('checkout/{offerId}/{offerPrice}','PaymentProviderController@checkout');
    #### to check payment status in offer details route as it the shoper url
});

Route::get('sendEmails','Backend\UsersController@sendEmailsToUsers');



