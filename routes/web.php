<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('home');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/logout', function () {
    return view('welcome');
})->name('logout');

Route::get('/user/index', function () {
    return view('users.index');
})->name('user.index');

Route::get('/icons', function () {
    return view('pages.icons');
})->name('icons');

Route::get('/map', function () {
    return view('pages.maps');
})->name('map');

Route::get('/table', function () {
    return view('pages.tables');
})->name('table');

Route::get('/upgrade', function () {
    return view('pages.upgrade');
})->name('upgrade');

Route::get('/profile/edit', function () {
    return view('welcome');
})->name('profile.edit');

Route::get('/karyawan', function () {
    $query = DB::connection('karyawan')->select("SELECT bidang.nama_bidang AS NamaBidang, COUNT(anggota.id_anggota) AS JumlahPegawai, 
        COUNT(CASE WHEN anggota.kd_gol = 1 THEN 1 END) AS Gol1,
        COUNT(CASE WHEN anggota.kd_gol = 2 THEN 1 END) AS Gol2,
        COUNT(CASE WHEN anggota.kd_gol = 3 THEN 1 END) AS Gol3
        FROM anggota
        JOIN bidang ON anggota.kd_bidang=bidang.kd_bidang
        GROUP BY bidang.kd_bidang;");
    return view('karyawan', ['resultSet' => $query]);
})->name('karyawan');

Route::get('/kota', function () {
    $query = DB::select("SELECT * FROM kota;");
    return view('kota', ['resultSet' => $query]);
})->name('kota.home');

Route::get('/kota/{id}', function ($id) {
    $query = DB::selectOne("SELECT * FROM kota WHERE id_kota=$id");
    return view('kota.edit', ['result' => $query]);
})->name('kota.edit.form');

Route::post('/kota/edit/{id}', function (Request $request, $id) {
    $result = 'Data gagal diubah';
    $status = 'danger';

    if ($id != $request->input('id_kota'))
        return redirect()->route('kota.home')->with('status', $status)->with('message', 'Terjadi kesalahan, silahkan ulangi');

    if(DB::update("UPDATE kota SET nama_kota=:nama_kota WHERE id_kota=$id", ['nama_kota' => $request->nama_kota]) > 0) {
        $result = 'Data berhasil diubah';
        $status = 'success';
    }
    return redirect()->route('kota.home')->with('status', $status)->with('message', $result);
})->name('kota.edit');

Route::post('/kota/delete', function (Request $request) {
    $result = 'Data gagal dihapus';
    $status = 'danger';
    if(DB::delete("DELETE FROM kota WHERE id_kota=:id", ['id' => $request->input('id_kota')])) {
        $result = 'Data berhasil dihapus';
        $status = 'success';
    }
    return redirect()->route('kota.home')->with('status', $status)->with('message', $result);
})->name('kota.delete');

Route::post('/kota/create', function (Request $request) {
    $result = 'Data gagal ditambahkan';
    $status = 'danger';
    if(DB::insert("INSERT INTO kota (nama_kota) VALUES (:nama_kota);", ['nama_kota' => $request->input('nama_kota')])) {
        $result = 'Data berhasil ditambahkan';
        $status = 'success';
    }
    return redirect()->route('kota.home')->with('status', $status)->with('message', $result);
})->name('kota.insert');