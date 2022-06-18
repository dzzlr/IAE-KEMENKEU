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
use Illuminate\Support\Facades\Auth;



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
Route::get('/admin/', [AdminController::class, 'index'])->name('admin.index')->middleware('checkRole:admin');
Route::get('/admin/kebijakan', [AdminController::class, 'indexKebijakan'])->name('admin.show.kebijakan')->middleware('checkRole:admin');
Route::get('/admin/kebijakan/tambah', [AdminController::class, 'tambahKebijakan'])->name('admin.tambah.kebijakan')->middleware('checkRole:admin');
Route::post('/admin/kebijakan/store', [AdminController::class, 'storeKebijakan'])->name('admin.store.kebijakan')->middleware('checkRole:admin');
Route::post('/admin/kebijakan/update/{id}', [AdminController::class, 'updateKebijakan'])->name('admin.update.kebijakan')->middleware('checkRole:admin');
Route::get('/admin/kebijakan/status/{id}', [AdminController::class, 'statusKebijakan'])->name('admin.status.kebijakan')->middleware('checkRole:admin');
Route::get('/admin/kebijakan/cari', [AdminController::class, 'cariKebijakan'])->name('admin.cari.kebijakan')->middleware('checkRole:admin');
Route::get('/admin/kebijakan/delete/{id}', [AdminController::class, 'deleteKebijakan'])->name('admin.delete.kebijakan')->middleware('checkRole:admin');
Route::get('/admin/perizinan', [AdminController::class, 'indexPerizinan'])->name('admin.show.perizinan')->middleware('checkRole:admin');
Route::post('/admin/perizinan/terima/{id}', [AdminController::class, 'statusPerizinan'])->name('admin.terima.perizinan')->middleware('checkRole:admin');
Route::post('/admin/perizinan/tolak/{id}', [AdminController::class, 'statusPerizinan'])->name('admin.tolak.perizinan')->middleware('checkRole:admin');
Route::get('/admin/perizinan/cari', [AdminController::class, 'cariPerizinan'])->name('admin.cari.perizinan')->middleware('checkRole:admin');
Route::get('/admin/perizinan/delete/{id}', [AdminController::class, 'deletePerizinan'])->name('admin.delete.perizinan')->middleware('checkRole:admin');
Route::get('/admin/surat-tugas', [AdminController::class, 'indexSuratTugas'])->name('admin.show.surat-tugas')->middleware('checkRole:admin');
Route::post('/admin/surat-tugas/terima/{id}', [AdminController::class, 'statusSuratTugas'])->name('admin.terima.surat-tugas')->middleware('checkRole:admin');
Route::post('/admin/surat-tugas/tolak/{id}', [AdminController::class, 'statusSuratTugas'])->name('admin.tolak.surat-tugas')->middleware('checkRole:admin');
Route::post('/admin/surat-tugas/update/{id}', [AdminController::class, 'updateSuratTugas'])->name('admin.update.surat-tugas')->middleware('checkRole:admin');
Route::get('/admin/surat-tugas/cari', [AdminController::class, 'cariSuratTugas'])->name('admin.cari.surat-tugas')->middleware('checkRole:admin');
Route::get('/admin/surat-tugas/delete/{id}', [AdminController::class, 'deleteSuratTugas'])->name('admin.delete.surat-tugas')->middleware('checkRole:admin');
Route::get('/admin/sanksi', [AdminController::class, 'indexSanksi'])->name('admin.show.sanksi')->middleware('checkRole:admin');
Route::get('/admin/sanksi/tambah', [AdminController::class, 'tambahSanksi'])->name('admin.tambah.sanksi')->middleware('checkRole:admin');
Route::post('/admin/sanksi/store', [AdminController::class, 'storeSanksi'])->name('admin.store.sanksi')->middleware('checkRole:admin');
Route::post('/admin/sanksi/update/{id}', [AdminController::class, 'updateSanksi'])->name('admin.update.sanksi')->middleware('checkRole:admin');
Route::get('/admin/sanksi/status/{id}', [AdminController::class, 'statusSanksi'])->name('admin.status.sanksi')->middleware('checkRole:admin');
Route::get('/admin/sanksi/cari', [AdminController::class, 'cariSanksi'])->name('admin.cari.sanksi')->middleware('checkRole:admin');
Route::get('/admin/sanksi/delete/{id}', [AdminController::class, 'deleteSanksi'])->name('admin.delete.sanksi')->middleware('checkRole:admin');

//USER
Route::get('/home', [UserController::class, 'index'])->name('user.index')->middleware('checkRole:user,perizinan,st,sanksi,kebijakan,profkeu');
Route::get('/profile', [UserController::class, 'profile'])->name('user.profile')->middleware('checkRole:user,perizinan,st,sanksi,kebijakan,profkeu');
Route::post('/profile/update/{id}', [UserController::class, 'profileUpdate'])->name('update.profile')->middleware('checkRole:user,perizinan,st,sanksi,kebijakan,profkeu');
Route::get('/kebijakan', [UserController::class, 'indexKebijakan'])->name('kebijakan.index')->middleware('checkRole:user,perizinan,st,sanksi,kebijakan,profkeu');
Route::get('/kebijakan/tambah', [AdminController::class, 'tambahKebijakan'])->name('admin.tambah.kebijakan')->middleware('checkRole:kebijakan');
Route::post('/kebijakan/store', [AdminController::class, 'storeKebijakan'])->name('admin.store.kebijakan')->middleware('checkRole:kebijakan');
Route::post('/kebijakan/update/{id}', [AdminController::class, 'updateKebijakan'])->name('admin.update.kebijakan')->middleware('checkRole:kebijakan');
Route::get('/kebijakan/status/{id}', [AdminController::class, 'statusKebijakan'])->name('admin.status.kebijakan')->middleware('checkRole:kebijakan');
Route::get('/kebijakan/cari', [AdminController::class, 'cariKebijakan'])->name('admin.cari.kebijakan')->middleware('checkRole:user,perizinan,st,sanksi,kebijakan,profkeu');
Route::get('/kebijakan/delete/{id}', [AdminController::class, 'deleteKebijakan'])->name('admin.delete.kebijakan')->middleware('checkRole:kebijakan');
Route::get('/perizinan', [UserController::class, 'indexPerizinan'])->name('perizinan.index')->middleware('checkRole:user,perizinan,st,sanksi,kebijakan,profkeu');
Route::get('/perizinan/cari', [UserController::class, 'cariPerizinan'])->name('perizinan.cari')->middleware('checkRole:user');
Route::post('/perizinan/pengajuan/simpan', [UserController::class, 'storePerizinan'])->name('perizinan.store')->middleware('checkRole:user,profkeu,perizinan');
Route::post('/perizinan/pengajuan/update/{id}', [UserController::class, 'updatePerizinan'])->name('perizinan.update')->middleware('checkRole:user,profkeu,perizinan');
Route::post('/perizinan/terima/{id}', [AdminController::class, 'statusPerizinan'])->name('admin.terima.perizinan')->middleware('checkRole:perizinan');
Route::post('/perizinan/tolak/{id}', [AdminController::class, 'statusPerizinan'])->name('admin.tolak.perizinan')->middleware('checkRole:perizinan');
Route::get('/perizinan/delete/{id}', [UserController::class, 'destroyPerizinan'])->name('perizinan.destroy')->middleware('checkRole:user,perizinan');
Route::get('/sanksi', [UserController::class, 'indexSanksi'])->name('sanksi.index')->middleware('checkRole:user,perizinan,st,sanksi,kebijakan,profkeu');
Route::get('/sanksi/tambah', [AdminController::class, 'tambahSanksi'])->name('admin.tambah.sanksi')->middleware('checkRole:sanksi');
Route::post('/sanksi/store', [AdminController::class, 'storeSanksi'])->name('admin.store.sanksi')->middleware('checkRole:sanksi');
Route::post('/sanksi/update/{id}', [AdminController::class, 'updateSanksi'])->name('admin.update.sanksi')->middleware('checkRole:sanksi');
Route::get('/sanksi/status/{id}', [AdminController::class, 'statusSanksi'])->name('admin.status.sanksi')->middleware('checkRole:sanksi');
Route::get('/sanksi/delete/{id}', [AdminController::class, 'deleteSanksi'])->name('admin.delete.sanksi')->middleware('checkRole:sanksi');
Route::get('/sanksi/cari', [UserController::class, 'cariSanksi'])->name('sanksi.cari')->middleware('checkRole:user');
Route::get('/surat-tugas', [UserController::class, 'indexSuratTugas'])->name('st.index')->middleware('checkRole:user,perizinan,st,sanksi,kebijakan,profkeu');
Route::post('/surat-tugas/simpan', [UserController::class, 'storeSuratTugas'])->name('st.store')->middleware('checkRole:user,st');
Route::post('/surat-tugas/update/{id}', [UserController::class, 'updateSuratTugas'])->name('st.update')->middleware('checkRole:user,st');
Route::get('/surat-tugas/cari', [UserController::class, 'cariSuratTugas'])->name('st.cari')->middleware('checkRole:user,st');
Route::post('/surat-tugas/terima/{id}', [AdminController::class, 'statusSuratTugas'])->name('admin.terima.surat-tugas')->middleware('checkRole:st');
Route::post('/surat-tugas/tolak/{id}', [AdminController::class, 'statusSuratTugas'])->name('admin.tolak.surat-tugas')->middleware('checkRole:st');
Route::get('/surat-tugas/delete/{id}', [UserController::class, 'destroySuratTugas'])->name('st.destroy')->middleware('checkRole:user,st');