@extends('layouts.started')
@section('started')

<div class="p-4 space-y-4 bg-[#F8F8F8] min-h-screen font-semibold pt-16">
    <div class="text-2xl flex w-full justify-center text-[#048FBD] font-bold">Daftar Akun</div>

    <div class="text-xs">
        Nama Siswa
        <input type="text" class="w-full h-8 pl-3 pr-4 border rounded-lg focus:outline-none" id="nama">
    </div>

    <div class="text-xs">
        Nomor HP
        <input type="number" class="w-full h-8 pl-3 pr-4 border rounded-lg focus:outline-none" id="no_telp">
    </div>

    <div class="text-xs">
        Jenis Kelamin
        <select id="jenis_kelamin" class="w-full h-8 pl-2 pr-4 border rounded-lg focus:outline-none">
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>

    <div class="text-xs">
        Pilihan Sekolah
        <select id="jenjang_sekolah" class="w-full h-8 pl-2 pr-4 border rounded-lg focus:outline-none">
            <option value="SMA">SMA</option>
            <option value="SMK">SMK</option>
        </select>
    </div>

    <button id="btn-daftar" class="w-full h-10 bg-[#51C2FF] rounded-lg text-white cursor-pointer">Daftar</button>

    <div class="flex text-xs justify-center">
        Sudah Punya Akun ?
        <a href="login" class="text-[#048FBD] pl-1 cursor-pointer"> Login</a>
    </div>
</div>

<script>

    document.addEventListener('DOMContentLoaded', () => {
        const daftarBtn = document.getElementById('btn-daftar');

        daftarBtn.addEventListener('click', async () => {
            const nama = document.getElementById('nama').value.trim();
            const no_telp = document.getElementById('no_telp').value.trim();
            const jenis_kelamin = document.getElementById('jenis_kelamin').value;
            const jenjang_sekolah = document.getElementById('jenjang_sekolah').value;

            if (!nama || !no_telp) {
                showNotification("Nama dan nomor HP wajib diisi!", "error");
                return;
            }

            const data = {
                nama,
                no_telp,
                jenis_kelamin,
                jenjang_sekolah
            };

            const response = await AwaitFetchApi('auth/register', 'POST', data, true);

            if (response.meta?.code === 201) {
                showNotification("Registrasi berhasil!", "success", true); // tampil di halaman login
                setTimeout(() => {
                    window.location.href = '/login';
                }, 1500);
            } else {
                showNotification(response.message || "Registrasi gagal", "error");
            }
        });
    });
</script>
@endsection
