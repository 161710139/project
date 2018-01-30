<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $fillable = array('nama_matkul','kkm');
	public function mahasiswa() {
		return $this->belongsToMany('App\Mahasiswa', 'matkul__mahasiswas', 'id_mahasiswa', 'id_matakuliah');
	}
}
