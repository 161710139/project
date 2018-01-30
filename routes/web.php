<?php
use Illuminate\Database\Seeder;
use App\Mahasiswa;
use App\Wali;
use App\Dosen;
use App\Jurusan;
use App\MataKuliah;
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
Route::get('relasi', function() {
		$mahasiswa = Mahasiswa::where('nis', '=', '161710139')->first();
		return $mahasiswa->wali->nama;
});
Route::get('relasi-2', function() {
		$mahasiswa = Mahasiswa::where('nis', '=', '161710139')->first();
		return $mahasiswa->dosen->nama;

});
Route::get('relasi-3', function() {
		$dosen = Dosen::where('nama', '=', 'Daniel')->first();
		foreach ($dosen->mahasiswa as $temp)
			echo '<li> Nama : ' . $temp->nama . ' <strong>' . $temp->nim . '</strong></li>';
	});
Route::get('relasi-4', function() {
		$rafy = Mahasiswa::where('nama', '=', 'Rafy Fakhrizal Handiawan')->first();
		foreach ($rafy->mata_kuliah as $temp) 
			echo '<li>' . $temp->mata_kuliah . '</li>';
	});
Route::get('relasi-5', function() {
	$ips = MataKuliah::where('mata_kuliah', '=' ,'ips')->first();
	foreach ($ips->mahasiswa as $temp)
		echo '<li> Nama : '. $temp->nama .'<strong>'. $temp->nis .'</strong><li>';
	});
Route::get('relasi-6', function() {
		$mahasiswa = Mahasiswa::where('nis', '=', '161710139')->first();
		return $mahasiswa->jurusan->nama_jurusan;

});
Route::get('view', function() {
		$mahasiswa = Mahasiswa::with('wali', 'dosen', 'jurusan')->get();
		return View::make('eloquent', compact('mahasiswa'));
	});