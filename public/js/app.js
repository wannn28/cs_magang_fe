// general.js
function showLoading() {
    const loading = document.getElementById('global-loading');
    if (loading) loading.classList.remove('hidden');
}

function hideLoading() {
    const loading = document.getElementById('global-loading');
    if (loading) loading.classList.add('hidden');
}

async function AwaitFetchApi(url, method, data, skipAuth = false) {
    const token = localStorage.getItem('token');

    if (!skipAuth && !token) {
        console.warn("Token tidak ditemukan di localStorage.");
        return Promise.resolve({ message: 'Token tidak ditemukan' });
    }

    const isFormData = data instanceof FormData;

    const headers = {
        'Accept': 'application/json',
        ...(isFormData ? {} : { 'Content-Type': 'application/json' })
    };

    if (!skipAuth) {
        headers['Authorization'] = `Bearer ${token}`;
    }

    const options = {
        method: method,
        headers: headers
    };

    if (method !== 'GET' && method !== 'HEAD') {
        options.body = isFormData ? data : JSON.stringify(data);
    }

    showLoading();

    let timeoutReached = false;
    const timeout = setTimeout(() => {
        timeoutReached = true;
        hideLoading();
        showNotification("Permintaan melebihi waktu tunggu. Silakan coba lagi.", "error");
    }, 10000);

    try {
        const response = await fetch('http://127.0.0.1:8000/api/' + url, options);
        clearTimeout(timeout);
        if (timeoutReached) return { message: 'Timeout' };
        hideLoading();

        const result = await response.json();

        if (!response.ok) {
            if (response.status === 401 && !skipAuth) {
                console.error('Unauthenticated. Redirecting to login...');
                window.location.href = '/login';
            }
        }

        return result;
    } catch (error) {
        clearTimeout(timeout);
        hideLoading();
        if (!timeoutReached) {
            showNotification("Terjadi kesalahan jaringan", "error");
        }
        console.error("Fetch error:", error);
        return { message: 'Fetch failed', error };
    }
}

function showNotification(message, type = 'success') {
    const notif = document.createElement('div');
    notif.className = `fixed top-5 left-1/2 transform -translate-x-1/2 z-50 
        px-6 py-3 rounded-xl text-white text-sm shadow-lg transition-opacity duration-300 
        ${type === 'success' ? 'bg-green-500' : 'bg-red-500'}`;

    notif.style.opacity = '0';
    notif.innerText = message;

    document.body.appendChild(notif);

    setTimeout(() => {
        notif.style.opacity = '1';
    }, 10);

    setTimeout(() => {
        notif.style.opacity = '0';
        setTimeout(() => notif.remove(), 300);
    }, 3000);
}

// Optional: debug
function print(...args) {
    console.log(...args);
}

function printError(...args) {
    console.error(...args);
}

// Ekspos ke window biar bisa dipakai global
window.print = print;
window.printError = printError;
window.AwaitFetchApi = AwaitFetchApi;
window.showNotification = showNotification;
window.showLoading = showLoading;
window.hideLoading = hideLoading;
