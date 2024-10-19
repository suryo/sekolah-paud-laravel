<?php

use App\Http\Controllers\Backend\SettingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Backend\Website\BKController;
use App\Http\Controllers\Backend\Website\BKTanggapanController;
use App\Http\Controllers\Backend\Website\BKKarirController;
use App\Http\Controllers\Backend\Website\BKKonselingKelompokController;
use App\Http\Controllers\Backend\Website\BKKelompokController;
use App\Http\Controllers\Backend\Website\BKPribadiController;

// use PhotoController;
use App\Http\Controllers\Backend\Pengguna\PengajarController;
use App\Http\Controllers\Backend\Pengguna\MuridController;


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

// ======= FRONTEND ======= \\

Route::get('/', 'Frontend\IndexController@index');

///// MENU \\\\\
//// PROFILE SEKOLAH \\\\
Route::get('profile-sekolah', [App\Http\Controllers\Frontend\IndexController::class, 'profileSekolah'])->name('profile.sekolah');

//// VISI dan MISI
Route::get('visi-dan-misi', [App\Http\Controllers\Frontend\IndexController::class, 'visimisi'])->name('visimisi.sekolah');

//// PROGRAM STUDI \\\\
Route::get('program/{slug}', [App\Http\Controllers\Frontend\MenuController::class, 'programStudi']);
//// PROGRAM STUDI \\\\
Route::get('kegiatan/{slug}', [App\Http\Controllers\Frontend\MenuController::class, 'kegiatan']);

/// BERITA \\\
Route::get('berita', [App\Http\Controllers\Frontend\IndexController::class, 'berita'])->name('berita');
Route::get('berita/{slug}', [App\Http\Controllers\Frontend\IndexController::class, 'detailBerita'])->name('detail.berita');

/// EVENT \\\
Route::get('event/{slug}', [App\Http\Controllers\Frontend\IndexController::class, 'detailEvent'])->name('detail.event');
Route::get('event', [App\Http\Controllers\Frontend\IndexController::class, 'events'])->name('event');
Route::get('gallery', [App\Http\Controllers\Frontend\IndexController::class, 'gallery'])->name('gallery');
// Route::get('pendaftaran', [App\Http\Controllers\Frontend\IndexController::class, 'gallery'])->name('gallery');

Auth::routes(['register' => false]);


// ======= BACKEND ======= \\
Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    /// PROFILE \\\
    Route::resource('profile-settings', Backend\ProfileController::class);
    /// SETTINGS \\\
    Route::prefix('settings')->group(function () {
        // BANK
        Route::get('/', [App\Http\Controllers\Backend\SettingController::class, 'index'])->name('settings');
        // TAMBAH BANK
        Route::post('add-bank', [App\Http\Controllers\Backend\SettingController::class, 'addBank'])->name('settings.add.bank');
        // NOTIFICATIONS
        Route::put('notifications/{id}', [SettingController::class, 'notifications']);
    });


    /// CHANGE PASSWORD
    Route::put('profile-settings/change-password/{id}', [App\Http\Controllers\Backend\ProfileController::class, 'changePassword'])->name('profile.change-password');

    Route::prefix('/')->middleware('role:Admin')->group(function () {

        Route::resource('admin/photos', PhotoController::class);

      
        ///// WEBSITE \\\\\
        Route::resources([
            /// PROFILE SEKOLAH \\
            'backend-profile-sekolah'   => Backend\Website\ProfilSekolahController::class,
            /// VISI & MISI \\\
            'backend-visimisi'  => Backend\Website\VisidanMisiController::class,
            //// PROGRAM STUDI \\\\
            'program-studi' =>  Backend\Website\ProgramController::class,
            /// KEGIATAN \\\
            'backend-kegiatan' => Backend\Website\KegiatanController::class,
            /// IMAGE SLIDER \\\
            'backend-imageslider' => Backend\Website\ImageSliderController::class,
            /// ABOUT \\\
            'backend-about' => Backend\Website\AboutController::class,
            /// VIDEO \\\
            'backend-video' => Backend\Website\VideoController::class,
            /// KATEGORI BERITA \\\
            'backend-kategori-berita'   => Backend\Website\KategoriBeritaController::class,
            /// BERITA \\\
            'backend-berita' => Backend\Website\BeritaController::class,
            /// EVENT \\\
            'backend-event' => Backend\Website\EventsController::class,
            /// FOOTER \\\
            'backend-footer'    => Backend\Website\FooterController::class,
        ]);

        ///// PENGGUNA \\\\\
        Route::resources([
            /// PENGAJAR \\\
            'backend-pengguna-pengajar' => Backend\Pengguna\PengajarController::class,
            /// STAF \\\
            'backend-pengguna-staf' => Backend\Pengguna\StafController::class,
            /// MURID \\\
            'backend-pengguna-murid' => Backend\Pengguna\MuridController::class,
            /// PPDB \\\
            'backend-pengguna-ppdb' => Backend\Pengguna\PPDBController::class,
            /// PERPUSTAKAAN \\\
            'backend-pengguna-perpus' => Backend\Pengguna\PerpusController::class,
            /// BENDAHARA \\\
            'backend-pengguna-bendahara'  => Backend\Pengguna\BendaharaController::class
        ]);


        Route::get('bimbingan-konseling/all', [BKController::class, 'index'])->name('all.bimbingan.masuk');
        Route::get('bimbingan-konseling/all/lihat/{bk}', [BKController::class, 'show'])->name('all.bimbingan.masuk.show');
        Route::get('bimbingan-konseling/all/tanggapi/{bk}', [BKController::class, 'edit'])->name('all.bimbingan.masuk.tanggapi');
        Route::put('bimbingan-konseling/all/{bk}', [BKController::class, 'update'])->name('all.bimbingan.masuk.update');

        Route::get('bimbingan-konseling/ditanggapi', [BKTanggapanController::class, 'index'])->name('bimbingan.ditanggapi');
        Route::get('bimbingan-konseling/ditanggapi/lihat/{bk}', [BKTanggapanController::class, 'show'])->name('bimbingan.ditanggapi.show');

        Route::get('backend-laporanakademik', [PengajarController::class, 'ListLaporanAkademik'])->name('backend-laporanakademik.index');
        Route::post('backend-laporanakademik-store', [PengajarController::class, 'LaporanAkademikstore'])->name('backend-laporanakademik.store');
        Route::get('backend-laporanakademik-edit/{id}', [PengajarController::class, 'LaporanAkademikedit'])->name('backend-laporanakademik.edit');
        Route::post('backend-laporanakademik-update/{id}', [PengajarController::class, 'LaporanAkademikupdate'])->name('backend-laporanakademik.update');
   


        Route::get('bimbingan-konseling/karir', [BKKarirController::class, 'index'])->name('bimbingan.karir');
        Route::get('bimbingan-konseling/karir/create', [BKKarirController::class, 'create'])->name('bimbingan.karir.create');
        Route::post('bimbingan-konseling/karir', [BKKarirController::class, 'store'])->name('bimbingan.karir.store');
        Route::get('bimbingan-konseling/karir/{data_bk}/show', [BKKarirController::class, 'show'])->name('bimbingan.karir.show');

        Route::get('bimbingan-konseling/konseling-kelompok', [BKKonselingKelompokController::class, 'index'])->name('bimbingan.konseling.kelompok');
        Route::get('bimbingan-konseling/konseling-kelompok/create', [BKKonselingKelompokController::class, 'create'])->name('bimbingan.konseling.kelompok.create');
        Route::post('bimbingan-konseling/konseling-kelompok', [BKKonselingKelompokController::class, 'store'])->name('bimbingan.konseling.kelompok.store');
        Route::get('bimbingan-konseling/konseling-kelompok/{data_bk}/show', [BKKonselingKelompokController::class, 'show'])->name('bimbingan.konseling.kelompok.show');

        Route::get('bimbingan-konseling/kelompok', [BKKelompokController::class, 'index'])->name('bimbingan.kelompok');
        Route::get('bimbingan-konseling/kelompok/create', [BKKelompokController::class, 'create'])->name('bimbingan.kelompok.create');
        Route::post('bimbingan-konseling/kelompok', [BKKelompokController::class, 'store'])->name('bimbingan.kelompok.store');
        Route::get('bimbingan-konseling/kelompok/{data_bk}/show', [BKKelompokController::class, 'show'])->name('bimbingan.kelompok.show');

        Route::get('bimbingan-konseling/pribadi', [BKPribadiController::class, 'index'])->name('bimbingan.pribadi');
        Route::get('bimbingan-konseling/pribadi/create', [BKPribadiController::class, 'create'])->name('bimbingan.pribadi.create');
        Route::post('bimbingan-konseling/pribadi', [BKPribadiController::class, 'store'])->name('bimbingan.pribadi.store');
        Route::get('bimbingan-konseling/pribadi/{data_bk}/show', [BKPribadiController::class, 'show'])->name('bimbingan.pribadi.show');

        
    });
});



Route::prefix('/')->middleware('role:Guru')->group(
    function () {
        // guru
        Route::get('bimbingan-konseling/masuk', [BKController::class, 'index'])->name('bimbingan.masuk');
        Route::get('bimbingan-konseling/masuk/lihat/{bk}', [BKController::class, 'show'])->name('guru.bimbingan.masuk.show');
        Route::get('bimbingan-konseling/masuk/tanggapi/{bk}', [BKController::class, 'edit'])->name('guru.bimbingan.masuk.tanggapi');
        Route::put('bimbingan-konseling/masuk/{bk}', [BKController::class, 'update'])->name('bimbingan.masuk.update');

        Route::get('bimbingan-konseling/ditanggapi', [BKTanggapanController::class, 'index'])->name('bimbingan.ditanggapi');
        Route::get('bimbingan-konseling/ditanggapi/lihat/{bk}', [BKTanggapanController::class, 'show'])->name('bimbingan.ditanggapi.show');

        Route::get('backend-laporanakademik', [PengajarController::class, 'ListLaporanAkademik'])->name('backend-laporanakademik.index');
        Route::post('backend-laporanakademik-store', [PengajarController::class, 'LaporanAkademikstore'])->name('backend-laporanakademik.store');
        Route::get('backend-laporanakademik-edit/{id}', [PengajarController::class, 'LaporanAkademikedit'])->name('backend-laporanakademik.edit');
        Route::post('backend-laporanakademik-update/{id}', [PengajarController::class, 'LaporanAkademikupdate'])->name('backend-laporanakademik.update');
    }
);


Route::prefix('/')->middleware('role:Murid')->group(
    function () {
        // murid

        Route::get('bimbingan-konseling/pribadi', [BKPribadiController::class, 'index'])->name('bimbingan.pribadi');
        Route::get('bimbingan-konseling/pribadi/create', [BKPribadiController::class, 'create'])->name('bimbingan.pribadi.create');
        Route::post('bimbingan-konseling/pribadi', [BKPribadiController::class, 'store'])->name('bimbingan.pribadi.store');
        Route::get('bimbingan-konseling/pribadi/{data_bk}/show', [BKPribadiController::class, 'show'])->name('bimbingan.pribadi.show');

        Route::get('backend-laporanakademikmurid', [MuridController::class, 'laporanakademikmurid'])->name('backend-laporanakademik.murid');
    }
);
