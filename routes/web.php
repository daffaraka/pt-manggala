<?php

use App\Models\Pegawai;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgamaController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\NegaraController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PengalamanController;
use App\Http\Controllers\SatuManggalaController;
use App\Http\Controllers\GolonganDarahController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
  
    Route::get('/', [DashboardController::class,'index']);
    Route::get('pegawai/pdf', [PegawaiController::class,'pdf'])->name('pegawai-pdf');
    Route::resource('pegawai', PegawaiController::class);    
    Route::resource('pendidikan', PendidikanController::class);
    Route::resource('pelatihan', PelatihanController::class);
    Route::resource('pengalaman', PengalamanController::class);    
    Route::resource('agama', AgamaController::class);
    Route::resource('negara', NegaraController::class);
    Route::resource('darah', GolonganDarahController::class);
    Route::resource('keluarga', KeluargaController::class);
    Route::get('chart', [DashboardController::class,'chart']);
    Route::get('pegawai/pelatihan/{id}',[PelatihanController::class,'pel']);
    Route::resource('pegawai.pelatihan', PelatihanController::class);
    Route::get('pegawai/pendidikan/{id}',[PendidikanController::class,'pel']);
    Route::resource('pegawai.pendidikan', PendidikanController::class);
    Route::get('pegawai/pengalaman/{id}',[PengalamanController::class,'pel']);
    Route::resource('pegawai.pengalaman', PengalamanController::class);
    Route::get('pegawai/pdf', [PegawaiController::class,'pdf'])->name('pegawai-pdf');

    
    Route::get('/exportexcel', [PegawaiController::class,'exportexcel'])->name('exportexcel');
    Route::get('/tampilfoto/{id}', [PegawaiController::class, 'tampilfoto'])->name('tampilfoto');
    Route::post('/hapusfoto/{id}', [PegawaiController::class, 'hapusfoto'])->name('hapusfoto');
    // Route::get('/tampildokumensatu/{id}', [PegawaiController::class, 'tampildokumensatu'])->name('tampildokumensatu');
    // Route::post('/hapusdokumensatu/{id}', [PegawaiController::class, 'hapusdokumensatu'])->name('hapusdokumensatu');

    

    // Route::resource('pegawai', PegawaiController::class);
    // Route::get('pegawai/{pegawai}/remove-file/{field}', [PegawaiController::class, 'removeFile'])->name('pegawai.removeFile');


    
    


    // Route::get('/homeku', [HomeController::class, 'index'])->name('homeku');
    

});



Route::get('/homeku', [HomeController::class, 'index'])->name('homeku');
Route::get('/satumanggala', [SatuManggalaController::class, 'index'])->name('satumanggla');

require __DIR__.'/auth.php';
