<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function pesan()
    {
        $datapesan = [
           [
            'tanggal' => '2024-03-01',
            'judul' => 'Pembayaran SPP',
            'deskripsi' => 'Pembayaran SPP Bulan Maret'
           ],
           [
            'tanggal' => '2023-03-01',
            'judul' => 'Pembayaran Uang Pendaftaran',
            'deskripsi' => 'Pembayaran Uang Pendaftaran Bulan Maret'
           ]
        ];
        return view('pesan', compact('datapesan'));
    }
}
