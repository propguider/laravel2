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

 Route::get('/collegestud',function(){
 $collegestud = collegestud::find(2)->role;
  dd($collegestud);
  });

  Route::get('/post',[postcontroller::class,'post']);

  Route::get('/category',[categoriescontroller::class,'category']);

  Route::get('/comment',[commentcontroller::class,'comment']);

  Route::get('/tag',[tagcontroller::class,'tag']);
