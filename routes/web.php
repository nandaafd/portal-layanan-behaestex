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
Route::get('/inventaris', function () {
    return view('fitur.inventaris');
});

Route::post('proses-login', [LoginController::class, 'proses']);  
Route::get('login', [LoginController::class, 'index']);
Route::get('/logout', 'App\Http\Controllers\LogoutController@perform');


// Route::group(['middleware' => 'prevent-back-history'],function(){
    
//     Auth::routes(
//         [
//         'register' => false, // Register Routes...
//         'reset' => false, // Reset Password Routes...
//         'verify' => false, // Email Verification Routes...
//         ],
//     );
    
    Route::get('/sewazoom','App\Http\Controllers\SewaZoomController@index');
    Route::get('/aksesinternet','App\Http\Controllers\AksesinternetController@index');
    Route::get('/aksesprogram','App\Http\Controllers\AksesProgramController@index');
    Route::resource('/revisidata',App\Http\Controllers\RevisiDataController::class);
    Route::resource('/sewazoom',App\Http\Controllers\SewaZoomController::class);
   



//     Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//     Route::group(['middleware' => ['auth', 'role:superadmin']], function () {
//         // Route::get('superadmin/home', [App\Http\Controllers\HomeController::class, 'superadminHome'])->name('superadmin.home');
//     });
    
//     Route::group(['middleware' => ['auth', 'role:admin']], function () {
//     });
    
//     Route::group(['middleware' => ['auth', 'role:user']], function () {
//     });
// });

Route::get('/login', 'App\Http\Controllers\ErrorController@failedLogin')->name('failedLogin');
?>