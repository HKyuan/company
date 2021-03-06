<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', function (Request $request) {
    Auth::guard('member')->attempt(['name' => $request->name, 'password' => $request->password]);
    return response()->json(['message' => 'successful login'], 200);
});

Route::get('/user', function (Request $request) {
    $member = Auth::guard('member')->user();
    return response()->json(['member' => $member], 200);
});