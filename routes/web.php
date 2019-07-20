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

// Authorization
Route::get('login', 'Auth\SessionController@getLogin')->name('auth.login.form');
Route::post('login', 'Auth\SessionController@postLogin')->name('auth.login.attempt');
Route::any('logout', 'Auth\SessionController@getLogout')->name('auth.logout');

// Registration
Route::get('register', 'Auth\RegistrationController@getRegister')->name('auth.register.form');
Route::post('register', 'Auth\RegistrationController@postRegister')->name('auth.register.attempt');

// Activation
Route::get('activate/{code}', 'Auth\RegistrationController@getActivate')->name('auth.activation.attempt');
Route::get('resend', 'Auth\RegistrationController@getResend')->name('auth.activation.request');
Route::post('resend', 'Auth\RegistrationController@postResend')->name('auth.activation.resend');

// Password Reset
Route::get('password/reset/{code}', 'Auth\PasswordController@getReset')->name('auth.password.reset.form');
Route::post('password/reset/{code}', 'Auth\PasswordController@postReset')->name('auth.password.reset.attempt');
Route::get('password/reset', 'Auth\PasswordController@getRequest')->name('auth.password.request.form');
Route::post('password/reset', 'Auth\PasswordController@postRequest')->name('auth.password.request.attempt');

// Users
Route::resource('users', 'Admin\UserController');

// Roles
Route::resource('roles', 'Admin\RoleController');

// Simulator
Route::prefix('simulator')->group(function () {
    Route::get('/', ['as' => 'simulator', 'uses' => 'App\ParkingsController@selectParking']);
    Route::post('/', ['as' => 'form_simulator', 'uses' => 'App\SimulatorController@startParkingSimulation']);
    Route::get('/help', ['as' => 'help_simulator', 'uses' => 'SelectController@helper']);
    Route::get('/{slug}', ['as' => 'parking_simulator', 'uses' => 'SelectController@view_parking']);
});

// Navbar
Route::get('/', ['as' => 'home', 'uses' => 'App\NavigationController@index']);

Route::get('dashboard',
    ['as' => 'dashboard', 'uses' => 'App\NavigationController@dashboard', 'middleware' => 'sentinel.auth']);
Route::post('dashboard',
    ['as' => 'profile_form', 'uses' => 'App\NavigationController@updateProfile', 'middleware' => 'sentinel.auth']);

Route::group(['prefix' => 'view', 'middleware' => 'sentinel.auth'], function () {
    Route::get('/', ['as' => 'view_parking', 'uses' => 'App\ParkingsController@selectParking']);
    Route::post('/', ['as' => 'form_view_parking', 'uses' => 'App\ParkingsController@getParking']);
    Route::get('/{slug}', ['as' => 'view_parking_lot', 'uses' => 'App\ParkingsController@viewParkingLot']);
    Route::post('/{slug}', ['as' => 'reservation_parking', 'uses' => 'App\ReservationsController@createReservation']);
});

Route::get('register_parking',
    ['as' => 'register_edit_parking', 'uses' => 'App\ParkingsController@registerOrEdit']);
Route::post('register_parking',
    ['as' => 'store_parking', 'uses' => 'App\ParkingsController@store']);

Route::group(['prefix' => 'update', 'middleware' => 'sentinel.auth'], function() {
    Route::get('/', ['as' => 'edit_parking', 'uses' => 'App\ParkingsController@selectParking']);
    Route::post('/', ['as' => 'update_parking', 'uses' => 'App\ParkingsController@registerOrEdit']);
});
