<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        $transactions = [
            '2024-03-01' => [
                [
                    'no_transaksi' => 'TRX001',
                    'deskripsi' => 'Bayar SPP Maret',
                    'jumlah' => 2500000,
                ],
                [
                    'no_transaksi' => 'TRX002',
                    'deskripsi' => 'Buku Paket',
                    'jumlah' => 175000,
                ]
            ],
            '2024-03-15' => [
                [
                    'no_transaksi' => 'TRX003',
                    'deskripsi' => 'Seragam Sekolah',
                    'jumlah' => 450000,
                ]
            ],
            '2024-04-01' => [
                [
                    'no_transaksi' => 'TRX004',
                    'deskripsi' => 'Bayar SPP April',
                    'jumlah' => 2500000,
                ]
            ]
        ];
        return view('riwayat', compact('transactions'));
    }
}
