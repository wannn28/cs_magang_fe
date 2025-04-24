@extends('layouts.app')

@section('content')
    <div class="text-2xl flex w-full justify-center font-bold mb-4">Unggah Berkas</div>
    <form id="uploadForm" class="space-y-6">
        <div id="uploadFields" class="space-y-6 text-xs">
            <!-- Field upload akan di-generate di sini -->
        </div>

        <!-- Tombol Kirim -->
        <button type="submit"
            class="w-full bg-[#51C2FF] text-white py-2 rounded-lg font-semibold cursor-pointer transition-colors">
            Kirim
        </button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', async function() {
            const container = document.getElementById('uploadFields');
            const res = await AwaitFetchApi('user/berkas', 'GET', null);

            if (res.meta?.code === 200 && Array.isArray(res.data)) {
                res.data.forEach(item => {
                    const fieldId = `file_${item.nama}`;

                    const fieldHTML = `
                <div class="space-y-2">
                    <label class="block capitalize">${item.nama.replace(/_/g, ' ')}</label>
                    <div class="flex">
                        <input type="file" id="${fieldId}" class="hidden" data-ketentuan-id="${item.id}" ${item.is_required ? 'required' : ''}>
                        <label for="${fieldId}" class="w-full h-8 px-3 border rounded-lg flex items-center cursor-pointer bg-white">
                            <span class="text-white font-medium bg-[#51C2FF] p-1 rounded-sm shadow-xs">Pilih file</span>
                            <span class="text-xs text-gray-400 block pl-2 file-name">Tidak ada file yang dipilih</span>
                        </label>
                    </div>
                </div>
                `;
                    container.insertAdjacentHTML('beforeend', fieldHTML);
                });

                // Binding ulang ke semua input setelah elemen dimuat
                document.querySelectorAll('input[type="file"]').forEach(input => {
                    input.addEventListener('change', function(e) {
                        const fileName = e.target.files[0]?.name ||
                            'Tidak ada file yang dipilih';
                        const fileNameSpan = this.closest('.flex').querySelector('.file-name');
                        fileNameSpan.textContent = fileName;
                    });
                });
            } else {
                container.innerHTML = `<p class="text-sm text-red-500">Gagal memuat ketentuan berkas.</p>`;
            }
        });
        document.getElementById('uploadForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const formData = new FormData();
            const fileInputs = document.querySelectorAll('input[type="file"]');
            let hasFile = false;

            fileInputs.forEach((input, index) => {
                if (input.files.length > 0) {
                    hasFile = true;
                    formData.append(`files[${index}]`, input.files[0]);
                    formData.append(`ketentuan_berkas_ids[${index}]`, input.dataset.ketentuanId);
                }
            });

            if (!hasFile) {
                showNotification("Silakan pilih minimal satu file untuk diunggah.", "error");
                return;
            }

            const response = await AwaitFetchApi('user/berkas/upload', 'POST', formData);

            if (response.meta?.code === 200) {
                showNotification("Berkas berhasil diunggah!", "success");
                location.reload();
            } else {
                showNotification(response.meta?.message || "Gagal mengunggah: Terjadi kesalahan.", "error");
            }
        });
    </script>
@endsection
