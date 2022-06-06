<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NftController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NftLikeController;
/*

Route::get('/home', function () {
    return view('home.index');
})->middleware(['auth'])->name('home');
|
*/

/*
Route::get('/', function () { return view('home.index');})->middleware(['auth']);





 
Route::Resource('nfts',NftController::class);
Route::Resource('collections',CollectionController::class);


*/
require __DIR__.'/auth.php';
 
Route::Resource('/',HomeController::class);
Route::Resource('nfts',NftController::class);
Route::Resource('collections',CollectionController::class);

Route::resource('nfts.likes', NftLikeController::class)
    ->only(['store', 'destroy'])->middleware(['auth']);




/*
Route::middleware(['auth'])->group(function () {

});





Route::group(['middleware' => 'auth'], function() {
  Route::resource('task', 'TaskController');
});


*/