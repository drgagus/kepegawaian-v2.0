<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{EmployeController, UserController, GuestController};
use App\Http\Controllers\Pegawai\{PegawaiController};
use App\Http\Controllers\Guest\{TamuController};
use App\Http\Controllers\Auth\{LoginController, LogoutController, SettingController};

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

Route::middleware('auth','admin')->group(function(){ 
// START ADMIN ===================================================================================================================
Route::get( '/admin', [EmployeController::class, 'dashboard']) -> name('admin');
Route::get( '/admin/pegawai', [EmployeController::class, 'dashboard']) -> name('admin.pegawai');
Route::get( '/admin/pegawai/create', [EmployeController::class, 'create']) -> name('admin.pegawai.create');
Route::post( '/admin/pegawai/create', [EmployeController::class, 'store']) -> name('admin.pegawai.create');
Route::get( '/admin/pegawai/{id}', [EmployeController::class, 'show'])->name('admin.pegawai.show');
// START ADMIN ===================================================================================================================

// START EDIT ===================================================================================================================
Route::get( '/admin/pegawai/{id}/datapegawai', [EmployeController::class, 'editdatapegawai']) -> name('admin.pegawai.datapegawai');
Route::patch( '/admin/pegawai/{id}/datapegawai', [EmployeController::class, 'updatedatapegawai']) -> name('admin.pegawai.datapegawai');

Route::get( '/admin/pegawai/{id}/datapenduduk', [EmployeController::class, 'editdatapenduduk']) -> name('admin.pegawai.datapenduduk');
Route::patch( '/admin/pegawai/{id}/datapenduduk', [EmployeController::class, 'updatedatapenduduk']) -> name('admin.pegawai.datapenduduk');

Route::get( '/admin/pegawai/{id}/datapribadi', [EmployeController::class, 'editdatapribadi']) -> name('admin.pegawai.datapribadi');
Route::patch( '/admin/pegawai/{id}/datapribadi', [EmployeController::class, 'updatedatapribadi']) -> name('admin.pegawai.datapribadi');

Route::get( '/admin/pegawai/{id}/datapendidikan', [EmployeController::class, 'editdatapendidikan']) -> name('admin.pegawai.datapendidikan');
Route::patch( '/admin/pegawai/{id}/datapendidikan', [EmployeController::class, 'updatedatapendidikan']) -> name('admin.pegawai.datapendidikan');

Route::get( '/admin/pegawai/{id}/datastr', [EmployeController::class, 'editdatastr']) -> name('admin.pegawai.datastr');
Route::patch( '/admin/pegawai/{id}/datastr', [EmployeController::class, 'updatedatastr']) -> name('admin.pegawai.datastr');

Route::get( '/admin/pegawai/{id}/datapelatihan', [EmployeController::class, 'editdatapelatihan']) -> name('admin.pegawai.datapelatihan');
Route::patch( '/admin/pegawai/{id}/datapelatihan', [EmployeController::class, 'updatedatapelatihan']) -> name('admin.pegawai.datapelatihan');
// END EDIT ===================================================================================================================

// START LIST PEGAWAI===================================================================================================================
Route::get( '/admin/pegawai-aktif', [EmployeController::class, 'aktif']) -> name('admin.pegawai.aktif');
Route::get( '/admin/pegawai-nakes', [EmployeController::class, 'nakes']) -> name('admin.pegawai.nakes');
Route::get( '/admin/pegawai-nonnakes', [EmployeController::class, 'nonnakes']) -> name('admin.pegawai.nonnakes');

Route::get( '/admin/pegawai-nonaktif', [EmployeController::class, 'nonaktif']) -> name('admin.pegawai.nonaktif');
Route::get( '/admin/pegawai-nonaktif-nakes', [EmployeController::class, 'nonaktifnakes']) -> name('admin.pegawai.nonaktif.nakes');
Route::get( '/admin/pegawai-nonaktif-nonnakes', [EmployeController::class, 'nonaktifnonnakes']) -> name('admin.pegawai.nonaktif.nonnakes');
// END LIST PEGAWAI===================================================================================================================

// START GUEST ACCOUNT===================================================================================================================
Route::get( '/admin/guest', [GuestController::class, 'index']) -> name('admin.guest');
Route::get( '/admin/guest/hakakses', [GuestController::class, 'hakakses']) -> name('admin.guest.hakakses');
Route::patch( '/admin/guest/hakakses', [GuestController::class, 'akses']) -> name('admin.guest.akses');
Route::patch( '/admin/guest/hakakses-pegawai', [GuestController::class, 'hakaksespegawai']) -> name('admin.guest.aksespegawai');
Route::get( '/admin/guest/pengaturan', [GuestController::class, 'pengaturan']) -> name('admin.guest.pengaturan');
Route::patch( '/admin/guest/pengaturan', [GuestController::class, 'ubahpengaturan']) -> name('admin.guest.pengaturan');
// END GUEST ACCOUNT===================================================================================================================

// START AKUN===================================================================================================================
Route::get( '/admin/akun/create/{id}', [UserController::class, 'create']) -> name('admin.akun');
Route::post( '/admin/akun/create/{id}', [UserController::class, 'store']) -> name('admin.akun.create');
Route::delete( '/admin/akun/{id}', [UserController::class, 'destroy'])->name('admin.akun.delete');
Route::post( '/admin/akun/reset/{id}', [UserController::class, 'reset'])->name('admin.akun.reset');
// END AKUN===================================================================================================================

// START PORTAL&AKTIF===================================================================================================================
Route::post( '/admin/pegawai/portal/{id}', [EmployeController::class, 'portal']) -> name('admin.pegawai.portal');
Route::patch( '/admin/pegawai/aktifnonaktif/{id}', [EmployeController::class, 'active']) -> name('admin.pegawai.aktifnonaktif');
// END PORTAL&AKTIF===================================================================================================================
});


Route::middleware('auth','pegawai')->group(function(){ 
// START PEGAWAI===================================================================================================================
Route::get( '/pegawai', [PegawaiController::class, 'dashboard']) -> name('pegawai');
Route::get( '/pegawai/profil', [PegawaiController::class, 'profil']) -> name('pegawai.profil');

Route::get( '/pegawai/dokumen', [PegawaiController::class, 'dokumen']) -> name('pegawai.dokumen');
Route::post( '/pegawai/dokumen', [PegawaiController::class, 'inputdokumen']) -> name('pegawai.dokumen');
Route::get( '/pegawai/dokumen/{id}/edit', [PegawaiController::class, 'editdokumen']) -> name('pegawai.dokumen.edit');
Route::patch( '/pegawai/dokumen/{id}/edit', [PegawaiController::class, 'updatedokumen']) -> name('pegawai.dokumen.edit');
Route::delete( '/pegawai/dokumen/{id}', [PegawaiController::class, 'deletedokumen']) -> name('pegawai.dokumen.delete');

Route::get( '/pegawai/datapegawai', [PegawaiController::class, 'editdatapegawai']) -> name('pegawai.datapegawai');
Route::patch( '/pegawai/datapegawai', [PegawaiController::class, 'updatedatapegawai']) -> name('pegawai.datapegawai');

Route::get( '/pegawai/datapenduduk', [PegawaiController::class, 'editdatapenduduk']) -> name('pegawai.datapenduduk');
Route::patch( '/pegawai/datapenduduk', [PegawaiController::class, 'updatedatapenduduk']) -> name('pegawai.datapenduduk');

Route::get( '/pegawai/datapribadi', [PegawaiController::class, 'editdatapribadi']) -> name('pegawai.datapribadi');
Route::patch( '/pegawai/datapribadi', [PegawaiController::class, 'updatedatapribadi']) -> name('pegawai.datapribadi');

Route::get( '/pegawai/datapendidikan', [PegawaiController::class, 'editdatapendidikan']) -> name('pegawai.datapendidikan');
Route::patch( '/pegawai/datapendidikan', [PegawaiController::class, 'updatedatapendidikan']) -> name('pegawai.datapendidikan');

Route::get( '/pegawai/datastr', [PegawaiController::class, 'editdatastr']) -> name('pegawai.datastr');
Route::patch( '/pegawai/datastr', [PegawaiController::class, 'updatedatastr']) -> name('pegawai.datastr');

Route::get( '/pegawai/datapelatihan', [PegawaiController::class, 'editdatapelatihan']) -> name('pegawai.datapelatihan');
Route::patch( '/pegawai/datapelatihan', [PegawaiController::class, 'updatedatapelatihan']) -> name('pegawai.datapelatihan');
// END PEGAWAI===================================================================================================================
});

Route::middleware('auth','guestAccount')->group(function(){ 
// START GUEST===================================================================================================================
Route::get( '/guest', [TamuController::class, 'dashboard']) -> name('guest');
// END GUEST===================================================================================================================
});

// ===================================================================================================================
Route::middleware('guest')->group(function(){ 
Route::get( '/login', [LoginController::class, 'formlogin']) -> name('login');
Route::post( '/login', [LoginController::class, 'login']) -> name('login');
});

Route::middleware('auth')->group(function(){ 
Route::post( '/logout', LogoutController::class) -> name('logout');
Route::get( '/pengaturan', [SettingController::class, 'pengaturan']) -> name('pengaturan');
Route::patch( '/password', [SettingController::class, 'password']) -> name('password');
Route::patch( '/username', [SettingController::class, 'username']) -> name('username');
Route::patch( '/photoprofil', [SettingController::class, 'photoprofil']) -> name('photoprofil');

Route::get('/', function () {
    return view('home');
})->name('home');
});
// ===================================================================================================================

