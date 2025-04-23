@extends('layouts.app')

@section('content')
    <div class="rounded-xl overflow-hidden text-white font-sans"
        style="background-image: url('{{ asset('assets/svg/background_profile.svg') }}'); background-size: cover; background-position: center;">
        <div class="flex p-2">
            <div class="w-1/4">
                <img id="profile-img" class="w-full rounded-md" src="{{ asset('assets/img/profile_default.png') }}"
                    alt="Profile">
            </div>
            <div class="flex flex-col justify-center w-3/3 pl-2">
                <!-- Elemen untuk diupdate dengan data peserta -->
                <p id="nama" class="font-semibold text-sm">Husain</p>
                <p id="nisn" class="text-xs">326032516540</p>
            </div>
        </div>
    </div>
    <div class="text-xs font-semibold">
        <div class="pb-4 py-8">Akun</div>
        {{-- <div class="flex font-normal border-b-2 py-2 border-gray-400">
            <img src="{{ asset('assets/svg/User.svg') }}" alt="">
            <span class="pl-2">Informasi Akun</span>
        </div>
        <div class="flex font-normal border-b-2 py-2 border-gray-400">
            <img src="{{ asset('assets/svg/Lock.svg') }}" alt="">
            <span class="pl-2">Keamanan Akun</span> --}}
        {{-- </div> --}}
        <a href="/login">
            <div class="flex font-normal border-b-2 py-2 border-gray-400">
                <img src="{{ asset('assets/svg/Logout.svg') }}" alt="">
                <span class="pl-2">Logout</span>
            </div>
        </a>
    </div>
@endsection
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            AwaitFetchApi('user/home', 'GET', null)
                .then(response => {
                    const data = response.data.peserta;
                    console.log(response.data)
                    document.getElementById('nama').textContent = data.nama;
                    document.getElementById('nisn').textContent = data.nisn;
                    // document.getElementById('profile-img').src = data.foto;
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        });
    </script>
@endpush
