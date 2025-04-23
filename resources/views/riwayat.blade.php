@extends('layouts.app')

@section('content')
    <div class="text-xl flex w-full justify-center font-bold">Riwayat</div>
    
    <div class="w-full font-thin text-xs">
        @foreach($transactions as $tanggal => $transaksiGroup)
            <span class="bg-[#E5E5E5] w-full flex p-2">
                {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}
            </span>
            
            @foreach($transaksiGroup as $transaksi)
                <div class="flex justify-between p-2 border-b border-gray-400">
                    <div class="flex flex-col leading-none">
                        <span>{{ $transaksi['no_transaksi'] }}</span>
                        <span>{{ $transaksi['deskripsi'] }}</span>
                    </div>
                    <div class="flex flex-col justify-center ">
                        -Rp{{ number_format($transaksi['jumlah'], 0, ',', '.') }}
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
@endsection