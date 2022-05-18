<?php

use Illuminate\Database\QueryException;
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

// Karyawan

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

// Kota

Route::get('/kota', function () {
    $query = DB::select("SELECT * FROM kota;");
    return view('kota', ['resultSet' => $query]);
})->name('kota.home');

Route::get('/kota/edit/{id}', function ($id) {
    $query = DB::selectOne("SELECT * FROM kota WHERE id_kota=$id");
    $titikShuttleQuery = DB::select("SELECT * FROM titik_shuttle WHERE id_kota=$id");
    return view('kota.edit', ['result' => $query, 'result_titik_shuttle' => $titikShuttleQuery]);
})->name('kota.edit.form');

Route::post('/kota/edit/{id}', function (Request $request, $id) {
    $result = 'Tidak ada data yang berubah';
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
    try {
        if(DB::delete("DELETE FROM kota WHERE id_kota=:id", ['id' => $request->input('id_kota')])) {
            $result = 'Data berhasil dihapus';
            $status = 'success';
        }
    } catch (QueryException $e) {
        $result = 'Data tidak bisa dihapus';
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

// Shuttle

Route::get('/shuttle', function () {
    $query = DB::select("SELECT * FROM shuttle;");
    return view('shuttle', ['resultSet' => $query]);
})->name('shuttle.home');

Route::post('/shuttle/create', function (Request $request) {
    $result = 'Data gagal ditambahkan';
    $status = 'danger';
    if(DB::insert("INSERT INTO shuttle (nama_shuttle) VALUES (:nama_shuttle);", ['nama_shuttle' => $request->input('nama_shuttle')])) {
        $result = 'Data berhasil ditambahkan';
        $status = 'success';
    }
    return redirect()->route('shuttle.home')->with('status', $status)->with('message', $result);
})->name('shuttle.insert');

Route::get('/shuttle/edit/{id}', function ($id) {
    $query = DB::selectOne("SELECT * FROM shuttle WHERE id_shuttle=$id");
    return view('shuttle.edit', ['result' => $query]);
})->name('shuttle.edit.form');

Route::post('/shuttle/edit/{id}', function (Request $request, $id) {
    $result = 'Tidak ada data yang diubah';
    $status = 'danger';

    if ($id != $request->input('id_shuttle'))
        return redirect()->route('shuttle.home')->with('status', $status)->with('message', 'Terjadi kesalahan, silahkan ulangi');

    if(DB::update("UPDATE shuttle SET nama_shuttle=:nama_shuttle WHERE id_shuttle=$id", ['nama_shuttle' => $request->nama_shuttle]) > 0) {
        $result = 'Data berhasil diubah';
        $status = 'success';
    }
    return redirect()->route('shuttle.home')->with('status', $status)->with('message', $result);
})->name('shuttle.edit');

Route::post('/shuttle/delete', function (Request $request) {
    $result = 'Data gagal dihapus';
    $status = 'danger';
    if(DB::delete("DELETE FROM shuttle WHERE id_shuttle=:id", ['id' => $request->input('id_shuttle')])) {
        $result = 'Data berhasil dihapus';
        $status = 'success';
    }
    return redirect()->route('shuttle.home')->with('status', $status)->with('message', $result);
})->name('shuttle.delete');

// Titik Shuttle

Route::get('/titik_shuttle/edit/{id}', function ($id) {
    $query = DB::selectOne("SELECT * FROM titik_shuttle WHERE id_titik_shuttle=$id");
    return view('titik_shuttle.edit', ['result' => $query]);
})->name('titik_shuttle.edit.form');

Route::post('/titik_shuttle/edit/{id}', function (Request $request, $id) {
    $result = 'Tidak ada data yang diubah';
    $status = 'danger';

    if ($id != $request->input('id_titik_shuttle'))
        return redirect()->route('titik_shuttle.home')->with('status', $status)->with('message', 'Terjadi kesalahan, silahkan ulangi');

    if(DB::update("UPDATE titik_shuttle SET nama_titik_shuttle=:nama_titik_shuttle WHERE id_titik_shuttle=:id", 
        [
            'nama_titik_shuttle' => $request->nama_titik_shuttle, 
            'id' => $request->id_titik_shuttle
        ]) > 0) {
        $result = 'Data berhasil diubah';
        $status = 'success';
    }
    return redirect()->route('kota.edit.form', ['id' => $request->input('id_kota')])->with('status', $status)->with('message', $result);
})->name('titik_shuttle.edit');

Route::post('/titik_shuttle/delete', function (Request $request) {
    $result = 'Data gagal dihapus';
    $status = 'danger';
    if(DB::delete("DELETE FROM titik_shuttle WHERE id_titik_shuttle=:id", ['id' => $request->input('id_kota')])) {
        $result = 'Data berhasil dihapus';
        $status = 'success';
    }
    return redirect()->route('kota.edit.form', ['id' => $request->input('id_kota')])->with('status', $status)->with('message', $result);
})->name('titik_shuttle.delete');

Route::post('/titik_shuttle/create', function (Request $request) {
    $result = 'Data gagal ditambahkan';
    $status = 'danger';
    if(DB::insert("INSERT INTO titik_shuttle (nama_titik_shuttle, id_kota) VALUES (:nama_titik_shuttle, :id_kota);", 
        [
            'nama_titik_shuttle' => $request->input('nama_titik_shuttle'),
            'id_kota' => $request->input('id_kota')
        ])) {
        $result = 'Data berhasil ditambahkan';
        $status = 'success';
    }
    return redirect()->route('kota.edit.form', ['id' => $request->input('id_kota')])->with('status', $status)->with('message', $result);
})->name('titik_shuttle.insert');

// Travel Shuttle

Route::get('/travel_shuttle', function () {
    $query = DB::select("SELECT * FROM travel_shuttle;");
    return view('travel_shuttle', ['resultSet' => $query]);
})->name('travel_shuttle.home');

Route::get('/travel_shuttle/edit/{id}', function ($id) {
    $query = DB::selectOne("SELECT * FROM travel_shuttle WHERE id_travel_shuttle=$id");
    return view('travel_shuttle.edit', ['result' => $query]);
})->name('travel_shuttle.edit.form');

Route::post('/travel_shuttle/edit/{id}', function (Request $request, $id) {
    $result = 'Tidak ada data yang diubah';
    $status = 'danger';

    if ($id != $request->input('id_travel_shuttle'))
        return redirect()->route('travel_shuttle.home')->with('status', $status)->with('message', 'Terjadi kesalahan, silahkan ulangi');

    if(DB::update("UPDATE travel_shuttle SET id_titik_shuttle_berangkat=:id_titik_shuttle_berangkat, id_titik_shuttle_tujuan=:id_titik_shuttle_tujuan, 
    id_shuttle=:id_shuttle, harga_travel=:harga_travel  WHERE id_travel_shuttle=:id", 
        [
            'id_titik_shuttle_berangkat' => $request->id_titik_shuttle_berangkat, 
            'id_titik_shuttle_tujuan' => $request->id_titik_shuttle_tujuan,
            'id_shuttle' => $request->id_shuttle,
            'harga_travel' => $request->harga_travel,
            'id' => $request->id_travel_shuttle
        ]) > 0) {
        $result = 'Data berhasil diubah';
        $status = 'success';
    }
    return redirect()->route('travel_shuttle.home')->with('status', $status)->with('message', $result);
})->name('travel_shuttle.edit');

Route::post('/travel_shuttle/delete', function (Request $request) {
    $result = 'Data gagal dihapus';
    $status = 'danger';
    if(DB::delete("DELETE FROM travel_shuttle WHERE id_travel_shuttle=:id", ['id' => $request->input('id_travel_shuttle')])) {
        $result = 'Data berhasil dihapus';
        $status = 'success';
    }
    return redirect()->route('travel_shuttle.home')->with('status', $status)->with('message', $result);
})->name('travel_shuttle.delete');

Route::post('/travel_shuttle/create', function (Request $request) {
    $result = 'Data gagal ditambahkan';
    $status = 'danger';
    if(DB::insert("INSERT INTO travel_shuttle (id_titik_shuttle_berangkat, id_titik_shuttle_tujuan, id_shuttle, harga_travel)
    VALUES (:id_titik_shuttle_berangkat, :id_titik_shuttle_tujuan, :id_shuttle, :harga_travel);", 
        [
            'id_titik_shuttle_berangkat' => $request->input('id_titik_shuttle_berangkat'), 
            'id_titik_shuttle_tujuan' => $request->input('id_titik_shuttle_tujuan'),
            'id_shuttle' => $request->input('id_shuttle'),
            'harga_travel' => $request->input('harga_travel')
        ])) {
        $result = 'Data berhasil ditambahkan';
        $status = 'success';
    }
    return redirect()->route('travel_shuttle.home')->with('status', $status)->with('message', $result);
})->name('travel_shuttle.insert');