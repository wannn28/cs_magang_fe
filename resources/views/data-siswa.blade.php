@extends('layouts.app')

@section('content')
    <div class="text-xl flex w-full justify-center font-bold mb-4">Informasi Peserta</div>

    <!-- Tampilan Informasi -->
    <div id="info-display" class="space-y-4">
        <div class="font-medium">Data Siswa</div>
        <!-- NISN -->
        <div class="text-sm font-medium flex flex-col pl-2 pr-2 pb-2 border-b border-gray-400">
            <span>NISN</span>
            <span class="font-light text-xs" id="nisn"></span>
        </div>
        <div class="text-sm font-medium flex flex-col pl-2 pr-2 pb-2 border-b border-gray-400">
            <span>Nama</span>
            <span class="font-light text-xs" id="nama"></span>
        </div>
        <!-- Tempat, Tanggal Lahir -->
        <div class="text-sm font-medium flex flex-col pl-2 pr-2 pb-2 border-b border-gray-400">
            <span>Tempat, Tanggal Lahir</span>
            <span class="font-light text-xs" id="tempat-tanggal-lahir"></span>
        </div>
        <!-- No Telepon -->
        <div class="text-sm font-medium flex flex-col pl-2 pr-2 pb-2 border-b border-gray-400">
            <span>No Telepon</span>
            <span class="font-light text-xs" id="no-telp"></span>
        </div>
        <!-- Jenis Kelamin -->
        <div class="text-sm font-medium flex flex-col pl-2 pr-2 pb-2 border-b border-gray-400">
            <span>Jenis Kelamin</span>
            <span class="font-light text-xs" id="jenis_kelamin"></span>
        </div>
        <!-- Jenjang -->
        <div class="text-sm font-medium flex flex-col pl-2 pr-2 pb-2 border-b border-gray-400">
            <span>Jenjang</span>
            <span class="font-light text-xs" id="jenjang"></span>
        </div>
        <div class="font-medium">Data Orang Tua</div>
        <!-- Nama Ayah -->
        <div class="text-sm font-medium flex flex-col pl-2 pr-2 pb-2 border-b border-gray-400">
            <span>Nama Ayah</span>
            <span class="font-light text-xs" id="nama-ayah"></span>
        </div>
        <!-- Nama Ibu -->
        <div class="text-sm font-medium flex flex-col pl-2 pr-2 pb-2 border-b border-gray-400">
            <span>Nama Ibu</span>
            <span class="font-light text-xs" id="nama-ibu"></span>
        </div>
        <!-- Penghasilan Orang Tua -->
        <div class="text-sm font-medium flex flex-col pl-2 pr-2 pb-2 border-b border-gray-400">
            <span>Penghasilan Orang Tua</span>
            <span class="font-light text-xs" id="penghasilan-ayah"></span>
        </div>
        <!-- Alamat -->
        <div class="text-sm font-medium flex flex-col pl-2 pr-2 pb-2 border-b border-gray-400">
            <span>Alamat</span>
            <span class="font-light text-xs" id="alamat"></span>
        </div>
        <!-- Berkas -->
        <div class="font-medium">Berkas Siswa</div>
        <div class="text-sm font-medium flex flex-col pl-2 pr-2 pb-2 border-b border-gray-400">
            <span>KTP</span>
            <span class="font-light text-xs" id="ktp">text.png</span>
        </div>
    </div>

    <!-- Form Edit -->
    <div id="edit-form" class="hidden space-y-4">
        <div class="font-medium">Edit Data Siswa</div>

        <div class="flex flex-col">
            <label for="edit-nisn">NISN</label>
            <input id="edit-nisn" type="text" class="border rounded p-1 text-xs">
        </div>
        <div class="flex flex-col">
            <label for="edit-nama">Nama</label>
            <input id="edit-nama" type="text" class="border rounded p-1 text-xs">
        </div>
        <div class="flex flex-col">
            <label for="edit-tempat-lahir">Tempat Lahir</label>
            <input id="edit-tempat-lahir" type="text" class="border rounded p-1 text-xs">
        </div>
        <div class="flex flex-col">
            <label for="edit-tanggal-lahir">Tanggal Lahir</label>
            <input id="edit-tanggal-lahir" type="date" class="border rounded p-1 text-xs">
        </div>
        <div class="flex flex-col">
            <label for="edit-no-telp">No Telepon</label>
            <input id="edit-no-telp" type="text" class="border rounded p-1 text-xs">
        </div>
        <div class="flex flex-col">
            <label for="edit-jenis_kelamin">Jenis Kelamin</label>
            <input id="edit-jenis_kelamin" type="text" class="border rounded p-1 text-xs">
        </div>
        <div class="flex flex-col">
            <label for="edit-jenjang">Jenjang</label>
            <input id="edit-jenjang" type="text" class="border rounded p-1 text-xs">
        </div>
        <div class="flex flex-col">
            <label for="edit-nama-ayah">Nama Ayah</label>
            <input id="edit-nama-ayah" type="text" class="border rounded p-1 text-xs">
        </div>
        <div class="flex flex-col">
            <label for="edit-nama-ibu">Nama Ibu</label>
            <input id="edit-nama-ibu" type="text" class="border rounded p-1 text-xs">
        </div>
        <div class="flex flex-col">
            <label for="edit-penghasilan-ayah">Penghasilan Ayah</label>
            <input id="edit-penghasilan-ayah" type="text" class="border rounded p-1 text-xs">
        </div>
        <div class="flex flex-col">
            <label for="edit-alamat">Alamat</label>
            <textarea id="edit-alamat" class="border rounded p-1 text-xs"></textarea>
        </div>

        <button id="simpan-btn" class="bg-green-500 text-white py-1 px-3 rounded">Simpan</button>
    </div>

    <!-- Tombol Edit -->
    <button id="edit-btn"
        class="fixed bottom-20 right-4 w-24 flex justify-center text-sm bg-[#51C2FF] text-white p-2 rounded-lg shadow-lg z-50">
        Edit
    </button>

    <script>
        document.addEventListener('DOMContentLoaded', async function() {
            // Ambil data peserta
            const pesertaRes = await AwaitFetchApi('user/peserta', 'GET', null);
            const pesertaData = pesertaRes.data;

            // Tampilkan data peserta ke elemen HTML
            document.getElementById('nisn').textContent = pesertaData.nisn ?? '';
            document.getElementById('nama').textContent = pesertaData.nama ?? '';
            document.getElementById('tempat-tanggal-lahir').textContent =
                `${pesertaData.tempat_lahir ?? ''}, ${pesertaData.tanggal_lahir ?? ''}`;
            document.getElementById('no-telp').textContent = pesertaData.no_telp ?? '';
            document.getElementById('jenis_kelamin').textContent = pesertaData.jenis_kelamin ?? '';
            document.getElementById('jenjang').textContent = pesertaData.jenjang_sekolah ?? '';
            document.getElementById('nama-ayah').textContent = pesertaData.biodata_ortu?.nama_ayah ?? '';
            document.getElementById('nama-ibu').textContent = pesertaData.biodata_ortu?.nama_ibu ?? '';
            document.getElementById('penghasilan-ayah').textContent = pesertaData.biodata_ortu
                ?.penghasilan_ayah ?? '';
            document.getElementById('alamat').textContent = pesertaData.alamat ?? '';

            // Ambil data berkas dari pesertaData
            const berkasPeserta = pesertaData.berkas ?? [];

            const container = document.getElementById('info-display');
            const header = document.createElement('div');
            header.classList.add('font-medium');
            header.innerText = 'Berkas Siswa';
            container.appendChild(header);

            berkasPeserta.forEach(berkas => {
                const wrapper = document.createElement('div');
                wrapper.className =
                    'text-sm font-medium flex flex-col pl-2 pr-2 pb-2 border-b border-gray-400';

                wrapper.innerHTML = `
        <span>${berkas.nama_file.replace(/_/g, ' ')}</span>
        <span class="font-light text-xs">
            <a href="${berkas.url_file}" target="_blank">${berkas.nama_file}.png</a>
        </span>
    `;

                container.appendChild(wrapper);
            });
        });
    </script>
@endsection
