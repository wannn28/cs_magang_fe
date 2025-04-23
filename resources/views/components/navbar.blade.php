
<nav class="container-bottom-navigation fixed bottom-0 w-full max-w-sm bg-white">
    <div class="grid grid-cols-4 gap-4 py-4">
        <!-- Home -->
        <a href="{{ route('home') }}"
            class="text-center @if (request()->routeIs('home')) text-ppdb-green @else text-gray-500 @endif">
            <div class="nav-home flex flex-col items-center">
                @if (request()->routeIs('home'))
                    <img src="{{ asset('assets/svg/nav-home-actived.svg') }}" alt="Home">
                @else
                    <img src="{{ asset('assets/svg/nav-home.svg') }}" alt="Home">
                @endif
            </div>
        </a>

        <!-- Jadwal -->
        <a href="{{ route('jadwal') }}"
            class="text-center @if (request()->routeIs('jadwal')) text-ppdb-green @else text-gray-500 @endif">
            <div class="flex flex-col items-center">
                @if (request()->routeIs('jadwal'))
                    <img src="{{ asset('assets/svg/nav-jadwal-actived.svg') }}" alt="Jadwal">
                @else
                    <img src="{{ asset('assets/svg/nav-jadwal.svg') }}" alt="Jadwal">
                @endif
            </div>
        </a>

        <!-- Berita -->
        <a href="{{ route('berita') }}"
            class="text-center @if (request()->routeIs('berita')) text-ppdb-green @else text-gray-500 @endif">
            <div class="flex flex-col items-center">
                @if (request()->routeIs('berita'))
                    <img src="{{ asset('assets/svg/nav-berita-actived.svg') }}" alt="Berita">
                @else
                    <img src="{{ asset('assets/svg/nav-berita.svg') }}" alt="Berita">
                @endif
            </div>
        </a>


        <a href="{{ route('akun') }}"
            class="text-center @if (request()->routeIs('akun')) text-ppdb-green @else text-gray-500 @endif">
            <div class="flex flex-col items-center">
                @if (request()->routeIs('akun'))
                    <img src="{{ asset('assets/svg/nav-account-actived.svg') }}" alt="Account">
                @else
                    <img src="{{ asset('assets/svg/nav-account.svg') }}" alt="Account">
                @endif
            </div>
        </a>
    </div>
</nav>