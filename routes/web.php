<?php

use App\Company;
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

// 一個瀏覽器不允許同時寫入兩個 session
Route::get('/logins', function () {
    $user = User::first();
    // Auth::attempt(['name' => $user->name, 'password' => 'password']);
    $member = Member::first();
    Auth::guard('member')->attempt(['name' => $member->name, 'password' => 'password']);
    // dump(Auth::guard('member')->user());
    // dump(Auth::user());
    // dump($memberAuth->user()->id);
    // dump($memberAuth->user()->company()->first()->name);
    // dump(Auth::guard('member')->check());
    // dump(Auth::check());
    // return redirect()->intended('/user');
    // return response()->json(['message' => 'successful login'], 200);
    // dump(Auth::id());
    // dump(Auth::guard('member')->user()->id);
});

Route::get('/user', function (Request $request) {
    // dump(Auth::user());
    dump(Auth::guard('member')->user()->id);
    // dump(Auth::user()->id);
    return response()->json(['checked' => Auth::guard('member')->check()], 200);
    // dump(Auth::user());
    // Auth::guard('member')->logout();
    // Auth::logout();
    // dump(Auth::check());
    // return Auth::check() ? 'Yes' : 'No';
    // return Auth::guard('member')->check() ? 'Yes' : 'No';
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