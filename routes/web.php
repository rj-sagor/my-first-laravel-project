<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//  start user role
Route::get('/deleteuser/{id}',[HomeController::class,'deleteuser']);
Route::get('/userrole',[RoleController::class,'roleuser']);
Route::post('/roleuser',[RoleController::class,'userrole']);
// end user role 
// start category rouots 
Route::prefix('category')->group(function(){

    Route::get('/create',[CategoryController::class,'create']);
    Route::post('/store',[CategoryController::class,'store']);
    Route::get('/index',[CategoryController::class,'index'])->name('category.index');
    
    Route::get('/delete/{id}',[CategoryController::class,'destroy'])->name('delete.category');
    Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('edit');
    
    Route::post('/update/{id}',[CategoryController::class,'update'])->name('update.category');
    Route::get('/trush',[CategoryController::class,'deletedcategory'])->name('category.trush');
    Route::get('/restore/{id}',[CategoryController::class,'restore'])->name('category.restore');
    Route::get('/parmanentdelete/{id}',[CategoryController::class,'delete'])->name('category.parmanentdelete');
    

});
Route::get('/user/dashboard',function(){
    return "use letter";
});
