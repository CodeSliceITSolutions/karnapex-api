<?php

use App\Http\Controllers\ContentController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Mime\Encoder\ContentEncoderInterface;

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

Route::get('/', function () {
    return abort(404);
});

Route::prefix('karnapex')->group(function () {
    Route::get('/1', [ContentController::class, 'viewLogo'])->name('view-karnapex-logo');
    Route::get('/2', [ContentController::class, 'viewhampi'])->name('view-karnapex-hampi');
    Route::get('/3', [ContentController::class, 'viewGumbaz'])->name('view-karnapex-Gumbaz');
    Route::get('/4', [ContentController::class, 'viewbangalore'])->name('view-karnapex-bangalore');
    Route::get('/5', [ContentController::class, 'viewFalls'])->name('view-karnapex-Falls');
    Route::get('/6', [ContentController::class, 'viewKuvempu'])->name('view-karnapex-Kuvempu');
    Route::get('/7', [ContentController::class, 'viewBandipur'])->name('view-bandipur');
    Route::get('/8', [ContentController::class, 'viewkambala'])->name('view-karnapex-kambala');
    Route::get('/9', [ContentController::class, 'viewBelur'])->name('view-karnapex-belur');
    Route::get('/10', [ContentController::class, 'viewMascot'])->name('view-karnapex-mascot ');
});