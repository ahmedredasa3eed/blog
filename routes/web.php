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
    Route::post('delete','OfferAjaxController@delete')->name('ajax-offers.delete');
    Route::get('edit/{offerId}','OfferAjaxController@edit')->name('ajax-offers.edit');
    Route::post('update','OfferAjaxController@update')->name('ajax-offers.update');
});
