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

Route::post('/updatepass{email}', [SocialLoginController::class, 'updatepass'])->name('updatepass');



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

Route::prefix('/dashboard')->group(function () {
    
Route::get('/addItem', [BackendController::class, 'item'])->middleware(['auth', 'verified'])->name('sub-items');

Route::post('/insertItem', [itemController::class, 'insert'])->middleware(['auth', 'verified'])->name('sub-items');

Route::get('/managetItem', [itemController::class, 'show'])->middleware(['auth', 'verified'])->name('sub-items');

Route::get('/itemActive/{id}', [itemController::class, 'itemActive'])->middleware(['auth', 'verified'])->name('sub-items');

Route::get('/itemInactive/{id}', [itemController::class, 'itemInactive'])->middleware(['auth', 'verified'])->name('sub-items');

Route::get('/itemDelete/{id}', [itemController::class, 'itemDelete'])->middleware(['auth', 'verified'])->name('sub-items');

Route::get('/itemEdit/{id}', [itemController::class, 'edit'])->middleware(['auth', 'verified'])->name('sub-items');

Route::post('/itemUpdate/{id}', [itemController::class, 'update'])->middleware(['auth', 'verified'])->name('sub-items');





//for CRUD




Route::get('/addCategory', [BackendController::class, 'Cate'])->middleware(['auth', 'verified'])->name('sub-items');

Route::post('/insertCate', [cateController::class, 'insertCate'])->middleware(['auth', 'verified'])->name('sub-items');

Route::get('/manageCategory', [cateController::class, 'showCate'])->middleware(['auth', 'verified'])->name('sub-items');

Route::get('/activeCate/{id}', [cateController::class, 'activeCate'])->middleware(['auth', 'verified'])->name('sub-items');

Route::get('/InactiveCate/{id}', [cateController::class, 'inactiveCate'])->middleware(['auth', 'verified'])->name('sub-items');

Route::get('/DeleteCate/{id}', [cateController::class, 'deleteCate'])->middleware(['auth', 'verified'])->name('sub-items');

Route::get('/EditCate/{id}', [cateController::class, 'editCate'])->middleware(['auth', 'verified'])->name('sub-items');

Route::post('/UpdateCate/{id}', [cateController::class, 'upCate'])->middleware(['auth', 'verified'])->name('sub-items');




Route::get('/addSubCategory', [BackendController::class, 'Sub_Cate'])->middleware(['auth', 'verified'])->name('sub-items');

Route::post('/insertSubCategory', [subCateController::class, 'insert_sub'])->middleware(['auth', 'verified'])->name('sub-items');

Route::get('/showSubCategory', [subCateController::class, 'show_sub'])->middleware(['auth', 'verified'])->name('sub-items');

Route::get('/Activesub/{id}', [subCateController::class, 'active_sub'])->middleware(['auth', 'verified'])->name('sub-items');

Route::get('/inActiveSub/{id}', [subCateController::class, 'inActive_sub'])->middleware(['auth', 'verified'])->name('sub-items');

Route::get('/DeleteSub/{id}', [subCateController::class, 'delete_sub'])->middleware(['auth', 'verified'])->name('sub-items');

Route::get('/EditSub/{id}', [subCateController::class, 'edit_sub'])->middleware(['auth', 'verified'])->name('sub-items');

Route::post('/upSub/{id}', [subCateController::class, 'up_sub'])->middleware(['auth', 'verified'])->name('sub-items');



});





Route::get('/dashboard', function () {
    return view('chartbody');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
