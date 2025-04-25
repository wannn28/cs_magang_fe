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
        <!-- Alamat -->
        <div class="text-sm font-medium flex flex-col pl-2 pr-2 pb-2 border-b border-gray-400">
            <span>Alamat</span>
            <span class="font-light text-xs" id="alamat"></span>
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
        <!-- Pekerjaan Ayah -->
        <div class="text-sm font-medium flex flex-col pl-2 pr-2 pb-2 border-b border-gray-400">
            <span>Pekerjaan Ayah</span>
            <span class="font-light text-xs" id="pekerjaan-ayah"></span>
        </div>

        <!-- Pekerjaan Ibu -->
        <div class="text-sm font-medium flex flex-col pl-2 pr-2 pb-2 border-b border-gray-400">
            <span>Pekerjaan Ibu</span>
            <span class="font-light text-xs" id="pekerjaan-ibu"></span>
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
        document.addEventListener('DOMContentLoaded', async () => {
            const pesertaRes = await AwaitFetchApi('user/peserta', 'GET', null);
            const data = pesertaRes.data;

            const assignText = (id, value) => document.getElementById(id).textContent = value ?? '';

            assignText('nisn', data.nisn);
            assignText('nama', data.nama);
            assignText('tempat-tanggal-lahir', `${data.tempat_lahir ?? ''}, ${data.tanggal_lahir ?? ''}`);
            assignText('no-telp', data.no_telp);
            assignText('jenis_kelamin', data.jenis_kelamin);
            assignText('jenjang', data.jenjang_sekolah);
            assignText('alamat', data.alamat);

            assignText('nama-ayah', data.biodata_ortu?.nama_ayah);
            assignText('nama-ibu', data.biodata_ortu?.nama_ibu);
            assignText('penghasilan-ayah', data.biodata_ortu?.penghasilan_ortu?.penghasilan);
            assignText('pekerjaan-ayah', data.biodata_ortu?.pekerjaan_ayah?.pekerjaan);
            assignText('pekerjaan-ibu', data.biodata_ortu?.pekerjaan_ibu?.pekerjaan);

            const container = document.getElementById('info-display');
            const header = document.createElement('div');
            header.classList.add('font-medium');
            header.innerText = 'Berkas Siswa';
            container.appendChild(header);

            (data.berkas ?? []).forEach(berkas => {
                const wrapper = document.createElement('div');
                wrapper.className =
                    'text-sm font-medium space-y-1 flex flex-col pl-2 pr-2 pb-3 border-b border-gray-400';
                const label = berkas.nama_file.replace(/_/g, ' ');
                wrapper.innerHTML = `
                    <span>${label}</span>
                    <span class="font-light text-xs"><a href="${berkas.url_file}" target="_blank">${label}.png</a></span>
                    <div class="actions flex gap-2 mt-1">
                        <button class="edit-btn bg-yellow-500 text-white text-xs px-2 py-1 rounded" data-id="${berkas.id}" data-ketentuan-id="${berkas.ketentuan_berkas_id ?? ''}">Edit</button>
                    </div>
                `;
                container.appendChild(wrapper);
            });

            document.querySelectorAll('.edit-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const parent = this.closest('.actions');
                    if (parent.querySelector('input[type="file"]')) return;
                    const ketentuanId = this.dataset.ketentuanId;

                    const input = document.createElement('input');
                    input.type = 'file';
                    input.accept = 'image/*,application/pdf';
                    input.className = 'text-xs';
                    input.style.maxWidth = '180px';
                    input.dataset.ketentuanId = ketentuanId;

                    const saveBtn = document.createElement('button');
                    saveBtn.textContent = 'Simpan';
                    saveBtn.className = 'bg-blue-600 text-white text-xs px-2 py-1 rounded';
                    saveBtn.addEventListener('click', async () => {
                        const file = input.files[0];
                        if (!file) return showNotification(
                            'Pilih file terlebih dahulu.', 'error');
                        const formData = new FormData();
                        formData.append('file', file);
                        formData.append('ketentuan_berkas_id', input.dataset
                            .ketentuanId);
                        const res = await AwaitFetchApi(`user/berkas/${id}`, 'POST',
                            formData);
                        res.meta?.code === 200 ? location.reload() :
                            showNotification('Gagal memperbarui berkas.', 'error');
                    });

                    parent.appendChild(input);
                    parent.appendChild(saveBtn);
                });
            });
        });

        document.getElementById('edit-btn').addEventListener('click', () => {
            document.getElementById('info-display').classList.add('hidden');
            document.getElementById('edit-form').classList.remove('hidden');
            const getText = id => document.getElementById(id).textContent;
            document.getElementById('edit-nisn').value = getText('nisn');
            document.getElementById('edit-nama').value = getText('nama');
            const [tempat, tanggal] = getText('tempat-tanggal-lahir').split(', ');
            document.getElementById('edit-tempat-lahir').value = tempat || '';
            document.getElementById('edit-tanggal-lahir').value = tanggal || '';
            document.getElementById('edit-no-telp').value = getText('no-telp');
            document.getElementById('edit-jenis_kelamin').value = getText('jenis_kelamin');
            document.getElementById('edit-jenjang').value = getText('jenjang');
            document.getElementById('edit-alamat').value = getText('alamat');
            document.getElementById('edit-nama-ayah').value = getText('nama-ayah');
            document.getElementById('edit-nama-ibu').value = getText('nama-ibu');
            document.getElementById('edit-penghasilan-ayah').value = getText('penghasilan-ayah');
        });

        document.getElementById('simpan-btn').addEventListener('click', async () => {
            const siswaData = {
                nisn: document.getElementById('edit-nisn').value,
                nama: document.getElementById('edit-nama').value,
                tempat_lahir: document.getElementById('edit-tempat-lahir').value,
                tanggal_lahir: document.getElementById('edit-tanggal-lahir').value,
                no_telp: document.getElementById('edit-no-telp').value,
                jenis_kelamin: document.getElementById('edit-jenis_kelamin').value,
                jenjang_sekolah: document.getElementById('edit-jenjang').value,
                alamat: document.getElementById('edit-alamat').value,
            };

            const ortuData = {
                nama_ayah: document.getElementById('edit-nama-ayah').value,
                nama_ibu: document.getElementById('edit-nama-ibu').value,
                penghasilan_ortu_id: document.getElementById('edit-penghasilan-ayah').value,
            };

            await AwaitFetchApi('user/peserta', 'PUT', siswaData);
            await AwaitFetchApi('user/biodata-ortu', 'PUT', ortuData);
            location.reload();
        });
    </script>
@endsection
