<?php

use Illuminate\Database\Seeder;
use App\Mahasiswa;
use App\Wali;
use App\Dosen;
//use App\Hobi;
//use App\Mahasiswa_Hobi
use App\Jurusan;
use App\MataKuliah;

class SeederRelasi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswas')->delete();
        DB::table('walis')->delete();
        DB::table('dosens')->delete();
        DB::table('jurusans')->delete();
        DB::table('mata_kuliahs')->delete();        

        $dosen = Dosen::create(array('nama' => 'Daniel ','nipd' => '1234567890' ,'alamat'=>'Kp.Curug Dog Dog' , 'mata_kuliah'=>'Ipa'));
		$this->command->info('Data dosen telah diisi!');
        
        /*Jurusan::create(array('nama_jurusan'=>'Ilmiah','id_mahasiswa'=>$rafy->id));
        Jurusan::create(array('nama_jurusan'=>'Ekonomi','id_mahasiswa'=>$scar->id));
        $this->command->info('Data mahasiswa dan jurusan telah diisi!');*/

        $jurusan = Jurusan::create(array('nama_jurusan' => 'Ipa'));
        $this->command->info('Data kelas telah diisi!');
      
        $rafy = Mahasiswa::create(array('nama'=>'Rafy Fakhrizal Handiawan','nis'=>'161710139','id_dosen'=>$dosen->id,'id_jurusan'=>$jurusan->id));
        $scar = Mahasiswa::create(array('nama' => 'Scarlett Johanson', 'nis'=>'161710209','id_dosen'=>$dosen->id,'id_jurusan'=>$jurusan->id));
        $this->command->info('Mahasiswa telah diisi!');
       
        Wali::create(array('nama'=>'Suhandi','alamat'=>'Kp.Duren','id_mahasiswa'=>$rafy->id));
        Wali::create(array('nama'=>'Dani','alamat'=>'Kp.Durian','id_mahasiswa'=>$scar->id));
        $this->command->info('Data mahasiswa dan wali telah diisi!');

        $ipa = MataKuliah::create(array('nama_matkul' => 'ipa','kkm'=>'75'));
        $ips = MataKuliah::create(array('nama_matkul' => 'ips','kkm'=>'80'));
        $rafy->matakuliah()->attach($ipa->id);
        $scar->matakuliah()->attach($ipa->id);
        $scar->matakuliah()->attach($ips);
        $this->command->info('Mahasiswa Mata Kuliah Telah terisi');
    }
}
