<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\SideController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\CountyController;
use App\Http\Controllers\CentreController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CsvController;
use App\Http\Controllers\MarkazAdminController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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



Route::controller(RegionController::class)->prefix('region')->name('region.')->middleware(['auth','admin'])->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}/skip', 'skip')->name('skip');
    Route::get('/{id}/back', 'back')->name('back');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}/update', 'update')->name('update');
    Route::get('/{id}/delete', 'delete')->name('delete');
});

Route::controller(CountyController::class)->prefix('county')->name('county.')->middleware(['auth','admin'])->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}/update', 'update')->name('update');
    Route::get('/{id}/delete', 'delete')->name('delete');
});

    Route::controller(UserController::class)->prefix('user')->name('user.')->middleware(['auth','admin'])->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::post('/{id}/update', 'update')->name('update');
        Route::get('/{id}/delete', 'delete')->name('delete');
        Route::post('/dropdown-countries', 'dropdown')->name('dropdown');


    });
    
    
    Route::controller(SideController::class)->prefix('sideimage')->name('sideimage.')->middleware(['auth','admin'])->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
         Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::post('/{id}/update', 'update')->name('update');
        Route::get('/{id}/delete', 'delete')->name('delete');
    
    });
    
Route::controller(CentreController::class)->prefix('centre')->name('centre.')->middleware(['auth','admin'])->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}/update', 'update')->name('update');
    Route::get('/{id}/delete', 'delete')->name('delete');
    Route::post('/dropdown-countries', 'dropdown')->name('dropdown');
});
// =========================================


// markaz admin route
Route::controller(MarkazAdminController::class)->prefix('markaz_admin')->name('markaz_admin.')->middleware(['auth','user'])->group(function () {
    Route::get('/', 'm_index')->name('m_index');
    Route::get('/timings', 'ViewTiming')->name('timings');
    Route::get('/AzanTimings', 'AzanTimings')->name('AzanTimings');
    Route::post('double_update', 'double_update')->name('double_update');
    Route::get('/m_create', 'm_create')->name('m_create');
    Route::post('/upload/csv', 'upload')->name('upload.csv');
    Route::get('/{id}/m_edit', 'm_edit')->name('m_edit');
    Route::post('/{id}/m_update', 'm_update')->name('m_update');
    Route::get('/{id}/delete', 'delete')->name('delete');



});

// markaz slider  route
Route::controller(SliderController::class)->prefix('slider')->name('slider.')->middleware(['auth','user'])->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/imageuploader', 'imageuploader')->name('imageuploader');
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}/update', 'update')->name('update');
    Route::get('/{id}/delete', 'delete')->name('delete');


});

// markaz logo  route
Route::controller(LogoController::class)->prefix('logo')->name('logo.')->middleware(['auth','user'])->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/logouploader', 'logouploader')->name('logouploader');
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}/update', 'update')->name('update');
    Route::get('/{id}/delete', 'delete')->name('delete');
});
// markaz news  route

Route::controller(NewsController::class)->prefix('news')->name('news.')->middleware(['auth','user'])->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/uploadcsv', 'create')->name('create');
     Route::post('/store', 'store')->name('store');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}/update', 'update')->name('update');
    Route::get('/{id}/delete', 'delete')->name('delete');

});

// Route::controller(CsvController::class)->prefix('csv')->name('csv.')->middleware(['auth','user'])->group(function () {
//     Route::get('/', 'index')->name('index');
    
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\RegionController::class, 'index'])->middleware(['auth','admin'])->name('region');

Route::get('/{slug}/screen', [App\Http\Controllers\ScreenViewController::class, 'frontend'])->name('frontend');

Route::get('/show', [App\Http\Controllers\HomeController::class, 'showImage'])->name('showimage');



