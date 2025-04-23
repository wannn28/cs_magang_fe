@extends('layouts.app')

@section('header')
    @include('components.header')
@endsection

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
    <div class="rounded-xl overflow-hidden text-white font-sans"
        style="background-image: url('{{ asset('assets/svg/background_card_name.svg') }}'); background-size: cover; background-position: center;">
        <div class="flex p-4">
            <div class="w-1/3">
                <img id="profile-img" class="w-full rounded-md" src="{{ asset('assets/img/profile_default.png') }}"
                    alt="Profile">
            </div>
            <div class="flex flex-col justify-center w-3/3 pl-2">
                <!-- Elemen untuk diupdate dengan data peserta -->
                <p id="nama" class="font-semibold text-sm">Husain</p>
                <p id="nisn" class="text-xs">326032516540</p>
                <p id="role" class="font-bold text-xs">Siswa</p>
            </div>
        </div>
        <div class="text-xs px-4 pb-2 font-normal">
            <div class="flex justify-between">
                <span id="jenis_kelamin">Jenis Kelamin : Laki - laki</span>
                {{-- <span id="jurusan1">Program : IPA</span> --}}
            </div>
        </div>
        <div id="jenjang_sekolah" class="bg-transparent text-white text-sm font-bold px-4 pb-4 pt-2">
            <!-- Akan diupdate: misalnya "SMA WALISONGO SEMARANG" -->
        </div>
    </div>

    <!-- Konten lainnya tetap sama -->
    <div class="flex w-full max-w-sm justify-center">
        <div class="grid grid-cols-4 py-4 gap-8">
            <a href="{{ route('data-siswa') }}"
                class="text-center @if (request()->routeIs('data-siswa')) text-ppdb-green @else text-gray-500 @endif">
                <div class="flex flex-col items-center">
                    <img src="{{ asset('assets/svg/Icon Data Siswa.svg') }}" alt="data siswa">
                </div>
            </a>
            <a href="{{ route('peringkat') }}" class="text-center text-gray-500">
                <div class="flex flex-col items-center">
                    <img src="{{ asset('assets/svg/Icon Peringkat.svg') }}" alt="Jadwal">
                </div>
            </a>
            <a href="{{ route('riwayat') }}" class="text-center text-gray-500">
                <div class="flex flex-col items-center">
                    <img src="{{ asset('assets/svg/Icon Riwayat.svg') }}" alt="Berita">
                </div>
            </a>
            <a href="{{ route('pesan') }}" class="text-center">
                <div class="flex flex-col items-center">
                    <img src="{{ asset('assets/svg/Icon Pesan.svg') }}" alt="Account">
                </div>
            </a>
        </div>
    </div>

    <!-- Tampilan progress -->
    <div class="flex w-full max-w-sm items-center justify-center">
        <!-- Langkah 1: Isi Form -->
        <div class="flex flex-col items-center gap-1 text-center" id="step-isi-form">
            <img id="img-isi-form" src="{{ asset('assets/svg/done-progress-icon.svg') }}" alt="Done">
            <span class="text-[10px] font-semibold">Isi Form</span>
        </div>

        <img src="{{ asset('assets/svg/Line-done.svg') }}" alt="Line" class="self-center" id="line1">

        <!-- Langkah 2: Unggah Berkas -->
        <div class="flex flex-col items-center gap-1 text-center" id="step-unggah-berkas">
            <img id="img-unggah-berkas" src="{{ asset('assets/svg/Now Progress 2.svg') }}" alt="Current">
            <span class="text-[10px] font-semibold">Unggah Berkas</span>
        </div>

        <img src="{{ asset('assets/svg/Line-undone.svg') }}" alt="Line" class="self-center" id="line2">

        <!-- Langkah 3: Pengajuan Biaya -->
        <div class="flex flex-col items-center gap-1 text-center" id="step-pengajuan-biaya">
            <img id="img-pengajuan-biaya" src="{{ asset('assets/svg/before-progress-icon-3.svg') }}" alt="Undone">
            <span class="text-[10px]">Pengajuan Biaya</span>
        </div>
    </div>

    <!-- Link yang diubah dinamis sesuai progress -->
    <a href="{{ route('unggah-berkas') }}" id="link-unggah">
        <div class="text-xs font-semibold">
            <div class="pb-4" id="text-link-utama">Unggah Berkas</div>
            <div class="w-full bg-[#0267B2] p-2 rounded-lg min-h-12 flex">
                <img id="img-link" src="{{ asset('assets/svg/Upload To FTP.svg') }}" alt="">
                <div class="flex flex-col justify-center pl-2 text-white">
                    <span id="text-link-1">Unggah Berkas</span>
                    <span id="text-link-2" class="text-[10px] font-light">Upload Dokumen Pendukung</span>
                </div>
            </div>
        </div>
    </a>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Variabel URL asset untuk digunakan di JS
            var nowProgress1 = "{{ asset('assets/svg/Now Progress 1.svg') }}";
            var nowProgress2 = "{{ asset('assets/svg/Now Progress 2.svg') }}";
            var nowProgress3 = "{{ asset('assets/svg/Now Progress 3.svg') }}";
            var linedone = "{{ asset('assets/svg/Line-done.svg') }}";
            var linebefore = "{{ asset('assets/svg/Line-undone.svg') }}";
            var doneProgressIcon1 = "{{ asset('assets/svg/done-progress-icon.svg') }}";
            var doneProgressIcon2 = "{{ asset('assets/svg/done-progress-icon-2.svg') }}";
            var doneProgressIcon3 = "{{ asset('assets/svg/done-progress-icon 3.svg') }}";
            var beforeProgressIcon2 = "{{ asset('assets/svg/before-progress-icon-2.svg') }}";
            var beforeProgressIcon3 = "{{ asset('assets/svg/before-progress-icon-3.svg') }}";

            // Panggil API untuk mendapatkan data peserta dan progress
            AwaitFetchApi('user/home', 'GET', null)
                .then((res) => {
                    console.log(res);
                    if (res && res.data) {
                        // Update data peserta
                        const peserta = res.data.peserta;
                        document.getElementById('nama').innerText = peserta.nama;
                        document.getElementById('nisn').innerText = peserta.nisn ?? 'NISN BELUM DIISI';
                        document.getElementById('role').innerText = "Siswa";
                        document.getElementById('jenis_kelamin').innerText =
                            `Jenis Kelamin : ${peserta.jenis_kelamin}`;
                        document.getElementById('jenjang_sekolah').innerText =
                            `${peserta.jenjang_sekolah} WALISONGO SEMARANG`;

                        // Update progress bar/icon
                        if (res.data.progressUser) {
                            const progress = res.data.progressUser.progress;

                            // Logika penentuan tampilan progress bar
                            if (progress === "1") {
                                document.getElementById('img-isi-form').src = doneProgressIcon1;
                                document.getElementById('img-unggah-berkas').src = nowProgress2;
                                document.getElementById('img-pengajuan-biaya').src = beforeProgressIcon3;
                                document.getElementById('line1').src = linedone;
                                document.getElementById('line2').src = linebefore;

                                // Link: Unggah Berkas
                                document.getElementById('link-unggah').setAttribute('href', '{{ route("unggah-berkas") }}');
                                document.getElementById('text-link-utama').innerText = 'Unggah Berkas';
                                document.getElementById('img-link').src = '{{ asset("assets/svg/Upload To FTP.svg") }}';
                                document.getElementById('text-link-1').innerText = 'Unggah Berkas';
                                document.getElementById('text-link-2').innerText = 'Upload Dokumen Pendukung';

                            } else if (progress === "2") {
                                document.getElementById('img-isi-form').src = doneProgressIcon1;
                                document.getElementById('img-unggah-berkas').src = doneProgressIcon2;
                                document.getElementById('img-pengajuan-biaya').src = nowProgress3;
                                document.getElementById('line1').src = linedone;
                                document.getElementById('line2').src = linedone;

                                // Link: Pengajuan Biaya
                                document.getElementById('link-unggah').setAttribute('href', '{{ route("pengajuan-biaya") }}');
                                document.getElementById('text-link-utama').innerText = 'Pengajuan Biaya';
                                document.getElementById('img-link').src = '{{ asset("assets/svg/Upload To FTP.svg") }}';
                                document.getElementById('text-link-1').innerText = 'Pengajuan Biaya';
                                document.getElementById('text-link-2').innerText = 'Ajukan Pembiayaan Anda';

                            }
                        } else {
                            // Jika progress == null
                            document.getElementById('img-isi-form').src = nowProgress1;
                            document.getElementById('img-unggah-berkas').src = beforeProgressIcon2;
                            document.getElementById('img-pengajuan-biaya').src = beforeProgressIcon3;
                            document.getElementById('line1').src = linebefore;
                            document.getElementById('line2').src = linebefore;

                            // Link: Isi Form Pendaftaran
                            document.getElementById('link-unggah').setAttribute('href', '{{ route("form-pendaftaran") }}');
                            document.getElementById('text-link-utama').innerText = 'Isi Form';
                            document.getElementById('img-link').src = '{{ asset("assets/svg/Terms and Conditions.svg") }}';
                            document.getElementById('text-link-1').innerText = 'Isi Form';
                            document.getElementById('text-link-2').innerText = 'Lengkapi Data Pendaftaran';
                        }
                    }
                })
                .catch((error) => {
                    console.error('Error fetching peserta:', error);
                });
        });
    </script>
@endpush
