<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB Walisongo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/logger.js') }}" defer></script>
    <script src="{{ asset('js/generateqris.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/qrious@4.0.2/dist/qrious.min.js"></script>
    <script>
        window.APP_DEBUG_VIEW = "{{ env('APP_DEBUG_VIEW', false) ? 'true' : 'false' }}";
        window.API_BASE_URL = '{{ config('app.api_url') }}';
    </script>
</head>
@section('header')
    @include('components.header')
@endsection

<body class="max-w-sm mx-auto relative min-h-screen">

    @yield('header')
    <div class="p-4 space-y-4 bg-[#f8f8f8] font-semibold pb-24 min-h-screen pt-24">
        @yield('content')
    </div>
    @section('navbar')
        @include('components.navbar')
    @endsection
    @yield('navbar')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <!-- Global Loading Spinner -->
    <div id="global-loading" class="fixed inset-0 z-[9999] bg-white flex items-center justify-center hidden">
        <div class="w-12 h-12 border-6 border-t-transparent border-[#51C2FF] rounded-full animate-spin"></div>
    </div>
    @stack('scripts')
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const token = localStorage.getItem('token');

        if (!token) {
            window.location.href = '/login';
            console.warn("Token tidak ditemukan di localStorage.");
            return Promise.resolve({
                message: 'Token tidak ditemukan'
            });
        }
    })
</script>

</html>
