<?php

use App\Company;
use App\Mail\MemberMail;
use App\Member;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::get('/send', function () {
    $member = Member::first();
    Mail::to(env('MAIL_USERNAME'))->send(new MemberMail($member));
});

// 一個瀏覽器不允許同時寫入兩個 session
Route::get('/logins', function () {
    $user = User::first();
    // Auth::attempt(['name' => $user->name, 'password' => 'password']);
    $member = Member::first();
    Auth::guard('member')->attempt(['name' => $member->name, 'password' => 'password']);
    return response()->json(['message' => 'Successful Login'], 200);

});

Route::get('/user', function (Request $request) {
    return response()->json(['checked' => Auth::guard('member')->check()], 200);

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