<?php

use App\Http\Controllers\DisplayImageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return redirect('input_code');
})->name('index');

Route::post('/submit-personal', [App\Http\Controllers\DataFormController::class, 'submit'])->name('submit-personal');

Route::get('/form_update_data_perpajakan', [App\Http\Controllers\UpdateDataPerpajakanController::class, 'create'])->name('form_update_data_perpajakan_create');
Route::post('/form_update_data_perpajakan', [App\Http\Controllers\UpdateDataPerpajakanController::class, 'store'])->name('form_update_data_perpajakan_store');

Route::get('/input_code', [App\Http\Controllers\DataFormController::class, 'code'])->name('form_data_personal_create_code');
Route::post('/input_code', [App\Http\Controllers\DataFormController::class, 'storeCode'])->name('form_data_personal_post_code');
Route::get('/form_data_personal', [App\Http\Controllers\DataFormController::class, 'create'])->name('form_data_personal_create');

// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/show-image/{nik}/{filename}', [App\Http\Controllers\DataFormController::class, 'showImage'])->name('showImage');
    Route::get('/data-personal/export', [App\Http\Controllers\DataFormController::class, 'export'])->name('export');
    Route::get('/data-personal/show/{id}', [App\Http\Controllers\DataFormController::class, 'show'])->name('data-personal.show');
    Route::resource('/data-personal', App\Http\Controllers\DataFormController::class);
    Route::resource('/update_data_perpajakan', App\Http\Controllers\UpdateDataPerpajakanController::class);
    Route::get('/data-personal/filter', [App\Http\Controllers\DataFormController::class, 'filter'])->name('data-personal.filter');

    Route::get('kk/{filename}', [DisplayImageController::class, 'get_doc_kk'])->name('diplay.kk');
    Route::get('ktp/{filename}', [DisplayImageController::class, 'get_doc_ktp'])->name('diplay.ktp');
    Route::get('file_npwp/{filename}', [DisplayImageController::class, 'file_npwp'])->name('diplay.npwp');
    Route::get('domisili/{filename}', [DisplayImageController::class, 'get_doc_domisili'])->name('diplay.domisili');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
