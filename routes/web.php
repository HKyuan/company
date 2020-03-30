<?php

use App\Company;

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
    return view('welcome');
})->name('page');

Route::get('/login', function () {
    $name = 'Esperanza VonRueden';
    $email = 'godfrey.willms@example.com';
    $password = 'password';
    $memberName = 'jamarcus16';
    $memberEmail = 'grimes.van@yahoo.com';
    // Auth::guard('member')->attempt(['name' => $memberName, 'password' => $password]);
    Auth::attempt(['name' => $memberName, 'password' => $password]);
    // $memberAuth = Auth::guard('member');
    // dump($memberAuth->user()->id);
    // dump($memberAuth->user()->company()->first()->name);
    // return Auth::guard('member')->check() ? 'Yes' : 'No';
    return Auth::check() ? 'Yes' : 'No';
    // dump(Auth::user());
});

Route::get('/logout', function () {
    // $email = 'zulauf.krystina@example.org';
    // $password = 'password';
    Auth::guard('member')->logout();
    Auth::logout();
    // dump(Auth::guard('member'));
    // dump(Auth::User());
    return Auth::check() ? 'Yes' : 'No';
    return Auth::guard('member')->check() ? 'Yes' : 'No';
});

Auth::routes();
Route::get('/company/{company}', function (Company $company) {
    return $company;
})->middleware('can:view,company');

Route::group(['prefix' => 'member'], function () {
    Route::get('/', 'MemberController@getHandle')->name('member.index');
    Route::put('/{member}', 'MemberController@updateHandle')->name('member.update');
    Route::delete('/{member}', 'MemberController@deleteHandle')->name('member.delete');
});