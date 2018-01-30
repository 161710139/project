<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable= array('nama','nim' , 'id_dosen','id_jurusan');
	public function wali() {
		return $this->hasOne('App\Wali', 'id_mahasiswa');
	}
	public function dosen() {
		return $this->belongsTo('App\Dosen', 'id_dosen');
	}
	public function matakuliah() {
		return $this->belongsToMany('App\MataKuliah', 'matkul__mahasiswas','id_mahasiswa', 'id_matakuliah');
	}
	public function jurusan() {
		return $this->belongsTo('App\Jurusan', 'id_jurusan');
	}
}