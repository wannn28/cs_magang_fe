@extends('layouts.started')

@section('started')
    <div id="beritaContainer" class="space-y-4">
        <!-- Gambar-gambar akan ditampilkan di sini -->
    </div>

    <div class="w-full flex justify-center">
        <button id="loginBtn" class="w-32 h-10 bg-[#51C2FF] rounded-lg text-white cursor-pointer fixed bottom-8">Login</button>
    </div>

    <script>

        document.addEventListener('DOMContentLoaded', async () => {
            const container = document.getElementById('beritaContainer');

            const res = await AwaitFetchApi('home', 'GET', null, true);

            let imageUrls = [];

            // Ambil gambar jika tersedia
            if (res.meta?.code === 200 && Array.isArray(res.data?.data) && res.data.data.length > 0) {
                imageUrls = res.data.data;
            } else {
                // Fallback
                imageUrls = ['assets/img/berita.png'];
            }

            imageUrls.forEach(url => {
                const img = document.createElement('img');
                img.src = url.startsWith('http') ? url : `{{ asset('') }}` + url;
                img.alt = "Berita";
                img.className = "w-full";
                container.appendChild(img);
            });
        });

        const loginBtn = document.getElementById('loginBtn');
        loginBtn.addEventListener('click', () => {
            window.location.href = '/login';
        });
    </script>
@endsection
