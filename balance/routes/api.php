<?php


use Illuminate\Support\Facades\Route;
use App\Http\Procedures\BalanceProcedures;

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




Route::rpc("/jsonrpc", [BalanceProcedures::class],'.')->name('balance.userBalance');
Route::rpc("/jsonrpc", [BalanceProcedures::class],'.')->name('balance.history');


