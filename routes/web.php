<?php

use Illuminate\Support\Facades\Route;
use Yajra\DataTables\Facades\DataTables;

use App\Http\Controllers\DrugController;
use App\Http\Controllers\TypeDrugController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\SatuanController;
// use App\Http\Controllers\StokController;
use App\Http\Controllers\StockObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\JualansController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\BeliController;
use App\Http\Controllers\JualsController;
// use App\Http\Controllers\LoginController;

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
    return view('welcome3');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'App\Http\Controllers\BerandaController@index');
});


Route::get('/login', function () {
    return view('layouts.login');
})->name('login');

Route::get('brand.index', [BrandController::class, 'index'])->name('brand.index'); 
Route::post('brand.store', [BrandController::class, 'store'])->name('brand.store');
Route::post('brand.edits', [BrandController::class, 'edits'])->name('brand.edits');
Route::post('brand.updates', [BrandController::class, 'updates'])->name('brand.updates');
Route::post('brand.hapus', [BrandController::class, 'hapus'])->name('brand.hapus');

Route::get('type.index', [TypeDrugController::class, 'index'])->name('type.index');
Route::post('type.store', [TypeDrugController::class, 'store'])->name('type.store');
Route::post('type.edits', [TypeDrugController::class, 'edits'])->name('type.edits');
Route::post('type.updates', [TypeDrugController::class, 'updates'])->name('type.updates');
Route::post('type.hapus', [TypeDrugController::class, 'hapus'])->name('type.hapus');

Route::get('category.index', [CategoryController::class, 'index'])->name('category.index');
Route::post('category.store', [CategoryController::class, 'store'])->name('category.store');
Route::post('category.edits', [CategoryController::class, 'edits'])->name('category.edits');
Route::post('category.updates', [CategoryController::class, 'updates'])->name('category.updates');
Route::post('category.hapus', [CategoryController::class, 'hapus'])->name('category.hapus');

Route::get('obat.index', [ObatController::class, 'index'])->name('obat.index');
Route::post('obat.store', [ObatController::class, 'store'])->name('obat.store');
Route::post('obat.edits', [ObatController::class, 'edits'])->name('obat.edits');
Route::post('obat.updates', [ObatController::class, 'updates'])->name('obat.updates');
Route::post('obat.hapus', [ObatController::class, 'hapus'])->name('obat.hapus');

Route::get('satuan.index', [SatuanController::class, 'index'])->name('satuan.index');
Route::post('satuan.store', [SatuanController::class, 'store'])->name('satuan.store');
Route::post('satuan.edits', [SatuanController::class, 'edits'])->name('satuan.edits');
Route::post('satuan.updates', [SatuanController::class, 'updates'])->name('satuan.updates');
Route::post('satuan.hapus', [SatuanController::class, 'hapus'])->name('satuan.hapus');

// Route::get('stok.index', [StokController::class, 'index'])->name('stok.index');
// Route::get('stok.store', [StokController::class, 'store'])->name('stok.store');
// Route::post('getObat', [StokController::class, 'getObat'])->name('getObat');
// Route::post('stok.edits', [StokController::class, 'edits'])->name('stok.edits');
// Route::post('stok.updates', [StokController::class, 'updates'])->name('stok.updates');
// Route::post('stok.hapus', [StokController::class, 'hapus'])->name('stok.hapus');

// Route::get('stocks.index', [StockObatController::class, 'index'])->name('stock.index');
Route::get('stocks.index', [StockObatController::class, 'index'])->name('stocks.index');
Route::post('stocks.store', [StockObatController::class, 'store'])->name('stocks.store');
Route::post('getObat', [StockObatController::class, 'getObat'])->name('getObat');
Route::post('stock.edits', [StockObatController::class, 'edits'])->name('stock.edits');
Route::post('stock.updates', [StockObatController::class, 'updates'])->name('stock.updates');
Route::post('stock.hapus', [StockObatController::class, 'hapus'])->name('stock.hapus');

Route::get('pasien.index', [PasienController::class, 'index'])->name('pasien.index');
Route::post('pasien.store', [PasienController::class, 'store'])->name('pasien.store');
Route::post('pasien.edits', [PasienController::class, 'edits'])->name('pasien.edits');
Route::post('pasien.updates', [PasienController::class, 'updates'])->name('pasien.updates');
Route::post('pasien.hapus', [PasienController::class, 'hapus'])->name('pasien.hapus');

Route::resource('jualans', JualansController::class);
Route::post('getDataObat', [StockObatController::class, 'getDataObat'])->name('getDataObat'); 
Route::post('jualan.store', [JualansController::class, 'store'])->name('jualan.store'); 
Route::get('jualans.home', [ JualansController::class, 'tampilkan'])->name('jualans.home');
Route::post('jualans.hapus', [JualansController::class, 'hapus'])->name('jualans.hapus');

// Route::resource('juals', JualansController::class);
// Route::post('getDataObat', [StockObatController::class, 'getDataObat'])->name('getDataObat'); 
// Route::post('juals.store', [JualansController::class, 'store'])->name('juals.store'); 
// Route::get('juals.dataTable',[JualansController::class, 'dataTable'])->name('juals.dataTable');
// Route::get('juals.home', [ JualansController::class, 'tampilkan'])->name('juals.home');




Route::get('pengaduan.index', [PengaduanController::class, 'index'])->name('pengaduan.index');
Route::post('pengaduan.store', [PengaduanController::class, 'store'])->name('pengaduan.store');
Route::post('pengaduan.edits', [PengaduanController::class, 'edits'])->name('pengaduan.edits');
Route::post('pengaduan.updates', [PengaduanController::class, 'updates'])->name('pengaduan.updates');
Route::post('pengaduan.hapus', [PengaduanController::class, 'hapus'])->name('pengaduan.hapus');
Route::get('pengaduan.show', [PengaduanController::class, 'show'])->name('pengaduan.show');

Route::resource('pembelians', BeliController::class);
Route::post('dataObat', [StockObatController::class, 'dataObat'])->name('dataObat'); 


// Route::resource('drugs', DrugController::class);
// Route::resource('types', TypeDrugController::class);
// Route::resource('categories', CategoryController::class);
// Route::resource('brands', BrandController::class);

Route::post('/postlogin', 'App\Http\Controllers\LoginController@postlogin')->name('postlogin');
Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');