<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyCRUDController;

use App\Http\Controllers\MyController;

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
});

// Route::get('/', function () {
//     return redirect('contact');
// });

// Route::get('/{name}', function ($name) {
//     echo $name;
//     return view('welcome');
// });

// Route::get('/{name}', function ($name) {
//     return view('welcome',['name'=>$name]);
// });

// Route::resource('companies', CompanyCRUDController::class);


// Route::get('/about/{paaram}', function ($name) {
//     return view('about',['param'=>$name]);
// });

// Route::view('first','/first');

// Route::view('about','/about');

// Route::view('contact','/contact');

// Route::get("me",[MyController::class,'loadView']);

// Route::get("me/{id}",[MyController::class,'loadView']);

Route::view('user','users');
Route::view('about','about');
