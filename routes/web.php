<?php

use App\Http\Controllers\LoginController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/portal', function () {
    return view('portal');
});

Route::get('/register', function () {
    return view('auth.register');
});


Route::post('/proses-login', [LoginController::class, 'proses']);  
Route::get('login', [LoginController::class, 'index']);
Route::get('/logout', 'App\Http\Controllers\LogoutController@perform')->name('logout');






Route::middleware(['isLogin'])->group(function () {
    Route::resource('inventaris', \App\Http\Controllers\PeminjamanInventarisController::class);
    Route::resource('profile',\App\Http\Controllers\ProfileController::class);
    Route::resource('/aksesprogram', App\Http\Controllers\AksesProgramController::class);
    Route::post('aksesprogram/{id}/update', 'App\Http\Controllers\AksesProgramController@update_status');
    Route::resource('/aksesinternet',App\Http\Controllers\AksesInternetController::class);
    Route::post('/aksesinternet/{id}/update','App\Http\Controllers\AksesInternetController@update_status');
    Route::resource('/revisidata',App\Http\Controllers\RevisiDataController::class);
    Route::post('/revisidata/{id}/update','App\Http\Controllers\RevisiDataController@update_status');
    Route::resource('/sewazoom',App\Http\Controllers\SewaZoomController::class);
    Route::post('/sewazoom/{id}/update','App\Http\Controllers\SewaZoomController@update_status');
    });

   

    


?>