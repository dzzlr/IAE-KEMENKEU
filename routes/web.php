<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuratTugasController;
use App\Http\Controllers\PerizinanController;
use App\Http\Controllers\KebijakanController;
use App\Http\Controllers\ProfesiKeuanganController;
use App\Http\Controllers\SanksiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;


use App\Http\Controllers\ChartJSController;

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
Auth::routes();

Route::get('/', [WebController::class, 'landing'])->name('landing');

// ADMIN
Route::get('/admin/', [AdminController::class, 'index'])->name('admin.index')->middleware('admin_role');
Route::get('/admin/kebijakan', [AdminController::class, 'indexKebijakan'])->name('admin.show.kebijakan')->middleware('admin_role');
Route::get('/admin/kebijakan/tambah', [AdminController::class, 'tambahKebijakan'])->name('admin.tambah.kebijakan')->middleware('admin_role');
Route::post('/admin/kebijakan/store', [AdminController::class, 'storeKebijakan'])->name('admin.store.kebijakan')->middleware('admin_role');
Route::post('/admin/kebijakan/update/{id}', [AdminController::class, 'updateKebijakan'])->name('admin.update.kebijakan')->middleware('admin_role');
Route::get('/admin/kebijakan/status/{id}', [AdminController::class, 'statusKebijakan'])->name('admin.status.kebijakan')->middleware('admin_role');
Route::get('/admin/kebijakan/cari', [AdminController::class, 'cariKebijakan'])->name('admin.cari.kebijakan')->middleware('admin_role');
Route::get('/admin/kebijakan/delete/{id}', [AdminController::class, 'deleteKebijakan'])->name('admin.delete.kebijakan')->middleware('admin_role');
Route::get('/admin/perizinan', [AdminController::class, 'indexPerizinan'])->name('admin.show.perizinan')->middleware('admin_role');
Route::post('/admin/perizinan/terima/{id}', [AdminController::class, 'statusPerizinan'])->name('admin.terima.perizinan')->middleware('admin_role');
Route::post('/admin/perizinan/tolak/{id}', [AdminController::class, 'statusPerizinan'])->name('admin.tolak.perizinan')->middleware('admin_role');
Route::get('/admin/perizinan/cari', [AdminController::class, 'cariPerizinan'])->name('admin.cari.perizinan')->middleware('admin_role');
Route::get('/admin/perizinan/delete/{id}', [AdminController::class, 'deletePerizinan'])->name('admin.delete.perizinan')->middleware('admin_role');
Route::get('/admin/surat-tugas', [AdminController::class, 'indexSuratTugas'])->name('admin.show.surat-tugas')->middleware('admin_role');
Route::post('/admin/surat-tugas/terima/{id}', [AdminController::class, 'statusSuratTugas'])->name('admin.terima.surat-tugas')->middleware('admin_role');
Route::post('/admin/surat-tugas/tolak/{id}', [AdminController::class, 'statusSuratTugas'])->name('admin.tolak.surat-tugas')->middleware('admin_role');
Route::get('/admin/surat-tugas/cari', [AdminController::class, 'cariSuratTugas'])->name('admin.cari.surat-tugas')->middleware('admin_role');
Route::get('/admin/surat-tugas/delete/{id}', [AdminController::class, 'deleteSuratTugas'])->name('admin.delete.surat-tugas')->middleware('admin_role');
Route::get('/admin/sanksi', [AdminController::class, 'indexSanksi'])->name('admin.show.sanksi')->middleware('admin_role');
Route::get('/admin/sanksi/tambah', [AdminController::class, 'tambahSanksi'])->name('admin.tambah.sanksi')->middleware('admin_role');
Route::post('/admin/sanksi/store', [AdminController::class, 'storeSanksi'])->name('admin.store.sanksi')->middleware('admin_role');
Route::post('/admin/sanksi/update/{id}', [AdminController::class, 'updateSanksi'])->name('admin.update.sanksi')->middleware('admin_role');
Route::get('/admin/sanksi/status/{id}', [AdminController::class, 'statusSanksi'])->name('admin.status.sanksi')->middleware('admin_role');
Route::get('/admin/sanksi/cari', [AdminController::class, 'cariSanksi'])->name('admin.cari.sanksi')->middleware('admin_role');
Route::get('/admin/sanksi/delete/{id}', [AdminController::class, 'deleteSanksi'])->name('admin.delete.sanksi')->middleware('admin_role');

//MODUL PERIZINAN
Route::get('/perizinan', [PerizinanController::class, 'index'])->name('perizinan.index')->middleware('perizinan_role');
Route::post('/perizinan/update/{id}', [PerizinanController::class, 'update'])->name('perizinan.update')->middleware('perizinan_role');
Route::get('/perizinan/pengajuan', [PerizinanController::class, 'request'])->name('perizinan.request')->middleware('perizinan_role');
Route::post('/perizinan/pengajuan/simpan', [PerizinanController::class, 'store'])->name('perizinan.store')->middleware('perizinan_role');
Route::get('/perizinan/cari', [PerizinanController::class, 'find'])->name('perizinan.find')->middleware('perizinan_role');
Route::get('/perizinan/delete/{id}', [PerizinanController::class, 'destroy'])->name('perizinan.destroy')->middleware('perizinan_role');

//MODUL SURAT TUGAS
Route::get('/surat-tugas', [SuratTugasController::class, 'index'])->name('st.index')->middleware('st_role');
Route::post('/surat-tugas/update/{id}', [SuratTugasController::class, 'update'])->name('st.update')->middleware('st_role');
Route::get('/surat-tugas/pengajuan', [SuratTugasController::class, 'request'])->name('st.request')->middleware('st_role');
Route::post('/surat-tugas/pengajuan/simpan', [SuratTugasController::class, 'store'])->name('st.store')->middleware('st_role');
Route::get('/surat-tugas/cari', [SuratTugasController::class, 'find'])->name('st.find')->middleware('st_role');
Route::get('/surat-tugas/delete/{id}', [SuratTugasController::class, 'destroy'])->name('st.destroy')->middleware('st_role');

//MODUL SANKSI
Route::get('/sanksi', [SanksiController::class, 'index'])->name('sanksi.index')->middleware('sanksi_role');
Route::post('/sanksi/update/{id}', [SanksiController::class, 'update'])->name('sanksi.update')->middleware('sanksi_role');
Route::get('/sanksi/pengajuan', [SanksiController::class, 'request'])->name('sanksi.request ')->middleware('sanksi_role');
Route::post('/sanksi/pengajuan/simpan', [SanksiController::class, 'store'])->name('sanksi.store')->middleware('sanksi_role');
Route::get('/sanksi/cari', [SanksiController::class, 'find'])->name('sanksi.find')->middleware('sanksi_role');
Route::get('/sanksi/delete/{id}', [SanksiController::class, 'destroy'])->name('sanksi.destroy')->middleware('sanksi_role');

//MODUL SANKSI
Route::get('/kebijakan', [KebijakanController::class, 'index'])->name('kebijakan.index')->middleware('kebijakan_role');
Route::post('/kebijakan/update/{id}', [KebijakanController::class, 'update'])->name('kebijakan.update')->middleware('kebijakan_role');
Route::get('/kebijakan/pengajuan', [KebijakanController::class, 'request'])->name('kebijakan.request ')->middleware('kebijakan_role');
Route::post('/kebijakan/pengajuan/simpan', [KebijakanController::class, 'store'])->name('kebijakan.store')->middleware('kebijakan_role');
Route::get('/kebijakan/cari', [KebijakanController::class, 'find'])->name('kebijakan.find')->middleware('kebijakan_role');
Route::get('/kebijakan/delete/{id}', [KebijakanController::class, 'destroy'])->name('kebijakan.destroy')->middleware('kebijakan_role');

//USER
Route::get('/home', [UserController::class, 'index'])->name('user.index')->middleware('user_role');
Route::get('/kebijakan', [UserController::class, 'indexKebijakan'])->name('kebijakan.index')->middleware('user_role');
Route::get('/sanksi', [UserController::class, 'indexSanksi'])->name('sanksi.index')->middleware('user_role');
Route::get('/surat-tugas', [UserController::class, 'indexSuratTugas'])->name('st.index')->middleware('st_role');