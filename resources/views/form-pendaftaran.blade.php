@extends('layouts.app')

@section('content')
    <div class="text-2xl flex w-full justify-center font-bold">Form Pendaftaran Siswa</div>
    <form id="form-pendaftaran" class="space-y-4">
        <div>Data Siswa</div>
        <div class="text-xs">
            NISN
            <input id="nisn" type="text"
                class="w-full h-8 pl-3 pr-4 border rounded-lg focus:outline-none font-extralight" placeholder="Masukkan NISN">
        </div>
        <div class="text-xs grid grid-cols-2 gap-4">
            <div>
                Tempat Lahir
                <input id="tempat_lahir" type="text"
                    class="w-full h-8 pl-3 pr-4 border rounded-lg focus:outline-none font-extralight"
                    placeholder="Tempat Lahir">
            </div>
            <div>
                Tanggal Lahir
                <input id="tanggal_lahir" type="date"
                    class="w-full h-8 pl-3 pr-4 border rounded-lg focus:outline-none font-extralight">
            </div>
        </div>
        <div class="text-xs grid grid-cols-2 gap-4">
            <div>
                Jurusan 1
                <select id="jurusan1" class="w-full h-8 pl-3 pr-4 border rounded-lg focus:outline-none font-extralight">
                    <option value="1">IPA</option>
                    <option value="2">IPS</option>
                </select>
            </div>
            <div>
                Jurusan 2
                <select id="jurusan2" class="w-full h-8 pl-3 pr-4 border rounded-lg focus:outline-none font-extralight">
                    <option value="2">IPS</option>
                    <option value="1">IPA</option>
                </select>
            </div>
        </div>
        <div class="text-xs">
            Alamat
            <textarea id="alamat" cols="30" rows="5"
                class="w-full py-2 pl-3 pr-4 border rounded-lg focus:outline-none font-extralight"
                placeholder="Masukkan Alamat Lengkap"></textarea>
        </div>

        <div>Data Orang Tua</div>
        <div class="text-xs">
            Nama Ayah
            <input id="nama_ayah" type="text"
                class="w-full h-8 pl-3 pr-4 border rounded-lg focus:outline-none font-extralight"
                placeholder="Masukkan Nama Ayah">
        </div>
        <div class="text-xs">
            Nama Ibu
            <input id="nama_ibu" type="text"
                class="w-full h-8 pl-3 pr-4 border rounded-lg focus:outline-none font-extralight"
                placeholder="Masukkan Nama Ibu">
        </div>
        <div class="text-xs">
            No Telp
            <input id="no_telp" type="text"
                class="w-full h-8 pl-3 pr-4 border rounded-lg focus:outline-none font-extralight"
                placeholder="Masukkan No Telp Orang Tua">
        </div>
        <div class="text-xs">
            Pekerjaan Ayah (ID)
            <input id="pekerjaan_ayah_id" type="number"
                class="w-full h-8 pl-3 pr-4 border rounded-lg focus:outline-none font-extralight"
                placeholder="ID Pekerjaan Ayah">
        </div>
        <div class="text-xs">
            Pekerjaan Ibu (ID)
            <input id="pekerjaan_ibu_id" type="number"
                class="w-full h-8 pl-3 pr-4 border rounded-lg focus:outline-none font-extralight"
                placeholder="ID Pekerjaan Ibu">
        </div>
        <div class="text-xs">
            Penghasilan Ortu (ID)
            <input id="penghasilan_ortu_id" type="number"
                class="w-full h-8 pl-3 pr-4 border rounded-lg focus:outline-none font-extralight"
                placeholder="ID Penghasilan Orang Tua">
        </div>


        <button type="submit" class="bg-[#51C2FF] text-white p-2 rounded-lg">Submit</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('form-pendaftaran');

            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                const token = localStorage.getItem('token');

                const payload = {
                    nisn: document.getElementById('nisn').value,
                    tempat_lahir: document.getElementById('tempat_lahir').value,
                    tanggal_lahir: document.getElementById('tanggal_lahir').value,
                    alamat: document.getElementById('alamat').value,
                    jurusan1_id: parseInt(document.getElementById('jurusan1').value),
                    jurusan2_id: parseInt(document.getElementById('jurusan2').value)
                };

                const payloadOrtu = {
                    nama_ayah: document.getElementById('nama_ayah').value,
                    nama_ibu: document.getElementById('nama_ibu').value,
                    no_telp: document.getElementById('no_telp').value,
                    pekerjaan_ayah_id: parseInt(document.getElementById('pekerjaan_ayah_id').value),
                    pekerjaan_ibu_id: parseInt(document.getElementById('pekerjaan_ibu_id').value),
                    penghasilan_ortu_id: parseInt(document.getElementById('penghasilan_ortu_id')
                        .value)
                };

                try {
                    const responseForm = await AwaitFetchApi('user/peserta/form-peserta', 'PUT',
                        payload);
                    if (responseForm.errors) {
                        showNotification("Gagal menyimpan data siswa", "error");
                        return;
                    }

                    const responseOrtu = await AwaitFetchApi('user/biodata-ortu', 'POST', payloadOrtu);
                    if (responseOrtu.errors) {
                        showNotification("Gagal menyimpan data orang tua", "error");
                        return;
                    }

                    showNotification("Formulir berhasil dikirim!", "success");
                    window.location.href = '/data-siswa';
                } catch (error) {
                    print.error('Error:', error);
                    showNotification(
                        "Terjadi kesalahan saat mengirim data. Periksa koneksi atau hubungi admin.",
                        "error");
                }
            });

        });
    </script>
@endsection
