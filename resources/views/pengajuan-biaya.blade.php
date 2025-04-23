@extends('layouts.app')

@section('content')
    <div>
        <div class="text-xl flex w-full justify-center font-bold ">Pengajuan Biaya</div>
        <div class="w-full justify-center font-medium flex text-[12px] text-[#757575]">Pilih opsi pendaftaran dan lengkapi
            biaya</div>
    </div>
    <div class="w-full flex justify-between gap-4">
        <button id="regulerBtn" onclick="toggleSelection('reguler')" class="w-full h-10 bg-[#51C2FF] rounded-lg text-white cursor-pointer shadow-xl">Reguler</button>
        <button id="unggulanBtn" onclick="toggleSelection('unggulan')" class="w-full h-10 bg-[#D9D9D9] rounded-lg text-black cursor-pointer shadow-xl">Unggulan</button>
    </div>
    
    <!-- Section Reguler -->
    <div id="regulerSection">
        <div class="w-full justify-center font-thin flex text-[12px] text-[#757575]">Berikut adalah biaya tambahan untuk kategori reguler</div>
        <div class="border-2 border-black p-4 rounded-lg">
            <div class="flex w-full justify-between border-b border-gray-400 font-normal text-xs pb-2 py-2">
                <span>Uang Pendaftaran : </span>
                <span>Rp500.000</span>
            </div>
            <div class="flex w-full justify-between border-b border-gray-400 font-normal text-xs pb-2 py-2">
                <span>Uang Seragam : </span>
                <span>Rp750.000</span>
            </div>
            <div class="flex w-full justify-between border-b border-gray-400 font-normal text-xs pb-2 py-2">
                <span>Uang Buku atau Modul : </span>
                <span>Rp1.000.000</span>
            </div>
            <div class="flex w-full justify-between border-b border-gray-400 font-normal text-xs pb-2 py-2">
                <span>SPP Bulanan : </span>
                <span>Rp300.000</span>
            </div>
            <div class="flex w-full justify-between border-b border-gray-400 font-normal text-xs pb-2 py-2">
                <span>Biaya Kegiatan : </span>
                <span>Rp250.000</span>
            </div>
            <div class="flex w-full justify-between font-bold text-xs pb-2 py-2">
                <span>Total : </span>
                <span>Rp4.300.000</span>
            </div>
        </div>
        <button class="mt-4 w-full h-10 bg-[#51C2FF] rounded-lg text-white cursor-pointer text-sm font-normal shadow-xl">
            Proses Pembayaran
        </button>
        <div class="text-[#757575] text-xs font-normal flex flex-col items-center justify-center text-center  p-2">
            <div>
                <img src="{{ asset('assets/svg/notif-message.svg') }}" alt="" class="mx-auto">
            </div>
            <div class="mt-1">
                Biaya registrasi yang sudah dibayarkan tidak bisa kembali
            </div>
        </div>
    </div>

    <!-- Section Unggulan -->
    <div id="unggulanSection" class="hidden">
        <div class="w-full flex justify-between gap-4 bg-[#51C2FF40] h-16 rounded-lg items-center p-2">
            <span>Booking Vee Rp1.000.000</span>
            <button class="w-24 flex justify-center text-xs bg-[#51C2FF] text-white p-2 rounded-lg shadow-lg">Booking</button>
        </div>
        <div class="mt-4 flex flex-col">
            Wakaf Perorangan
            <input type="number" 
                class="w-full h-12 pl-3 pr-4 border rounded-lg font-normal focus:outline-none placeholder:text-sm placeholder:font-normal" 
                placeholder="Masukkan Nominal">
            <div class="font-thin text-justify text-[#757575] flex flex-col gap-2 text-xs py-2 pb-2">
                <div>Wakaf perorang merupakan wakaf periodik, jika nominal yang dimasukkan kurang dari nominal yang dianjurkan
                    maka
                    akan dinyatakan wakaf permanent melalui uang.</div>
    
                <div><span class="font-bold">Wakaf Periodik</span> adalah wakaf yang akan dikembalikan 100% setelah kelulusan/3
                    tahun.</div>
                <div><span class="font-bold">Wakaf Permanent</span> adalah wakaf yang tidak bisa dikembalikan</div>
            </div>
            Bulanan (SPP/Infaq)
            <input type="number" 
                class="w-full h-12 pl-3 pr-4 border rounded-lg font-normal focus:outline-none placeholder:text-sm placeholder:font-normal" 
                placeholder="Masukkan Nominal">
        </div>
        <button class="w-full h-10 mt-4 bg-[#51C2FF] rounded-lg text-white cursor-pointer text-sm font-normal shadow-xl">
            Proses Pembayaran
        </button>
        <div class="text-[#757575] text-xs font-normal flex flex-col items-center justify-center text-center  p-2">
            <div>
                <img src="{{ asset('assets/svg/notif-message.svg') }}" alt="" class="mx-auto">
            </div>
            <div class="mt-1">
                Biaya registrasi yang sudah dibayarkan tidak bisa kembali
            </div>
        </div>
    </div>

    <script>
        function toggleSelection(type) {
            const regulerSection = document.getElementById('regulerSection');
            const unggulanSection = document.getElementById('unggulanSection');
            const regulerBtn = document.getElementById('regulerBtn');
            const unggulanBtn = document.getElementById('unggulanBtn');

            if(type === 'reguler') {
                regulerSection.classList.remove('hidden');
                unggulanSection.classList.add('hidden');
                regulerBtn.classList.add('bg-[#51C2FF]', 'text-white');
                regulerBtn.classList.remove('bg-[#D9D9D9]', 'text-black');
                unggulanBtn.classList.add('bg-[#D9D9D9]', 'text-black');
                unggulanBtn.classList.remove('bg-[#51C2FF]', 'text-white');
            } else {
                regulerSection.classList.add('hidden');
                unggulanSection.classList.remove('hidden');
                unggulanBtn.classList.add('bg-[#51C2FF]', 'text-white');
                unggulanBtn.classList.remove('bg-[#D9D9D9]', 'text-black');
                regulerBtn.classList.add('bg-[#D9D9D9]', 'text-black');
                regulerBtn.classList.remove('bg-[#51C2FF]', 'text-white');
            }
        }
        
        // Init pertama kali
        document.addEventListener('DOMContentLoaded', function() {
            toggleSelection('reguler');
        });
    </script>
@endsection