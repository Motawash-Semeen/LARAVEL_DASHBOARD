<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\cateController;
use App\Http\Controllers\Backend\itemController;
use App\Http\Controllers\Backend\subCateController;

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


Route::get('/gotogoogle',[SocialLoginController::class, 'gotogoogle'])->name('gotogoogle');

Route::get('/apigstore',[SocialLoginController::class, 'apigstore']);





//for CRUD

Route::get('/dashboard/addItem', [BackendController::class, 'item']);

Route::post('/dashboard/insertItem', [itemController::class, 'insert']);

Route::get('/dashboard/managetItem', [itemController::class, 'show']);

Route::get('/dashboard/itemActive/{id}', [itemController::class, 'itemActive']);

Route::get('/dashboard/itemInactive/{id}', [itemController::class, 'itemInactive']);

Route::get('/dashboard/itemDelete/{id}', [itemController::class, 'itemDelete']);

Route::get('/dashboard/itemEdit/{id}', [itemController::class, 'edit']);

Route::post('/dashboard/itemUpdate/{id}', [itemController::class, 'update']);



Route::get('/dashboard/addCategory', [BackendController::class, 'Cate']);

Route::post('/dashboard/insertCate', [cateController::class, 'insertCate']);

Route::get('/dashboard/manageCategory', [cateController::class, 'showCate']);

Route::get('/dashboard/activeCate/{id}', [cateController::class, 'activeCate']);

Route::get('/dashboard/InactiveCate/{id}', [cateController::class, 'inactiveCate']);

Route::get('/dashboard/DeleteCate/{id}', [cateController::class, 'deleteCate']);

Route::get('/dashboard/EditCate/{id}', [cateController::class, 'editCate']);

Route::post('/dashboard/UpdateCate/{id}', [cateController::class, 'upCate']);




Route::get('/dashboard/addSubCategory', [BackendController::class, 'Sub_Cate']);

Route::post('/dashboard/insertSubCategory', [subCateController::class, 'insert_sub']);

Route::get('/dashboard/showSubCategory', [subCateController::class, 'show_sub']);

Route::get('/dashboard/Activesub/{id}', [subCateController::class, 'active_sub']);

Route::get('/dashboard/inActiveSub/{id}', [subCateController::class, 'inActive_sub']);

Route::get('/dashboard/DeleteSub/{id}', [subCateController::class, 'delete_sub']);

Route::get('/dashboard/EditSub/{id}', [subCateController::class, 'edit_sub']);

Route::post('/dashboard/upSub/{id}', [subCateController::class, 'up_sub']);



// Route::group(['prefix'=>'contact'],function(){
//  Route::get('/head', function(){
// return "Head";
//  });
//  Route::get('/body', function(){
//     return "body";

//  });
//  Route::get('/footer', function(){
//     return "footer";

//  });
// });

// Route::prefix('admin')->group(function () {
//     Route::get('/users', function () {
//         return "users";
//     });
//     Route::get('/dashboard', function () {
//         return "dashboard";
//     });
//     Route::get('/contact', function () {
//         return "contact";
//     });
// });





Route::get('/dashboard', function () {
    return view('chartbody');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
