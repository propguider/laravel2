<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\categoriescontroller;
use App\Http\Controllers\tagcontroller;

use App\models\collegestud;


use Illuminate\Support\Facades\response;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

 Route::get('/',function(){
 $collegestud = collegestud::find(2)->role;
  dd($collegestud);
  });

  Route::get('/',[postcontroller::class,'post']);

  Route::get('/',[categoriescontroller::class,'category']);

  Route::get('/',[commentcontroller::class,'comment']);

  Route::get('/',[tagcontroller::class,'tag']);
