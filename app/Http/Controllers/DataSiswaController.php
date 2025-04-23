<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataSiswaController extends Controller
{
   public function index()
    {
        $data_siswa = [
            'id' => '8',
            'users_id' => '1',
            'nama' => 'Muhammad Ridwan',
            'nisn' => '32602200104',
            'nis' => 'NULL',
            'tempat_lahir' => 'Batam',
            'tanggal_lahir' => '28 April 2003',
            'no_telp' => '0895709226800',
            'jenjang_sekolah' => 'SMA',
            'jurusan1' => 'IPA',
            'jurusan2' => 'IPS',
            'nama_ayah' => 'Budi',
            'pekerjaan_ayah' => 'PNS',
            'penghasilan_ayah' => '5000000',
            'nama_ibu' => 'Sinar',
            'pekerjaan_ibu' => 'PNS',
            'penghasilan_ibu' => '5000000',
            'jenis_kelamin' => 'Laki-laki',
            'agama' => 'Islam',
            'email' => 'iiwandila01@gmail.com',
            'alamat' => 'Kavling Bukit Indah Blok F5, No 17, RT 001, RW 0015, Kelurahan Kabil, Kecamatan Nongsa, Kota Batam'
        ];
        $data_berkas = [
            [
                'nama_file' => 'Akte kelahiran',
                'url_file' => 'tex.png'
            ],
            [
                'nama_file' => 'Kartu Keluarga',
                'url_file' => 'tex.png'
            ],
            [
                'nama_file' => 'Pas Foto',
                'url_file' => 'tex.png'
            ],
        ];
        return view('data-siswa', compact('data_siswa', 'data_berkas'));
    }
}
