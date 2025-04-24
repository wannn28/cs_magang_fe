function generateQRCode(elementId, data, options = {}) {
    // Default options
    const defaultOptions = {
        size: 200,
        level: 'H', // Error correction level (L, M, Q, H)
        background: '#ffffff',
        foreground: '#000000'
    };

    // Merge default options with custom options
    const finalOptions = { ...defaultOptions, ...options };

    // Create new QR code instance
    const qr = new QRious({
        value: data,
        size: finalOptions.size,
        level: finalOptions.level,
        background: finalOptions.background,
        foreground: finalOptions.foreground
    });

    // Get canvas element
    const canvas = document.getElementById(elementId);
    if (!canvas) {
        console.error('Element with ID ' + elementId + ' not found');
        return;
    }

    // Set canvas dimensions
    canvas.width = finalOptions.size;
    canvas.height = finalOptions.size;

    // Draw QR code to canvas
    const ctx = canvas.getContext('2d');
    ctx.drawImage(qr.canvas, 0, 0);
}

// Fungsi untuk menampilkan modal QRIS
function showQRModal(data) {
    // Buat elemen modal
    const modal = document.createElement('div');
    modal.id = 'qrisModal';
    modal.style.cssText = `
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    `;

    // Konten modal
    modal.innerHTML = `
    <div class="bg-white p-8 rounded-xl shadow-2xl max-w-md w-full mx-4">
        <div class="text-center space-y-6">
            <h2 class="text-2xl font-bold text-gray-800">Pembayaran QRIS</h2>
            <div class="p-4 bg-gray-50 rounded-lg">
                <canvas id="qrCanvas" class="mx-auto"></canvas>
            </div>
            <p class="text-gray-600 text-sm">
                Scan QR Code di atas untuk melakukan pembayaran
            </p>
            <div class="flex flex-col space-y-3">
                <button onclick="checkPaymentStatus()" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-200">
                    Cek Status Pembayaran
                </button>
                <button onclick="closeModal()" 
                    class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-3 px-6 rounded-lg transition duration-200">
                    Tutup
                </button>
            </div>
        </div>
    </div>
`;

    // Tambahkan modal ke body
    document.body.appendChild(modal);

    // Generate QR code
    generateQRCode('qrCanvas', data);
}

// Fungsi untuk menutup modal
function closeModal() {
    const modal = document.getElementById('qrisModal');
    if (modal) {
        modal.remove();
    }
}

// Fungsi untuk cek status pembayaran
async function checkPaymentStatus() {
    try {
        const response = await fetch('/api/payment/status');
        const result = await response.json();

        if (result.status === 'paid') {
            alert('Pembayaran berhasil!');
            closeModal();
        } else {
            alert('Pembayaran belum diterima');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Gagal memeriksa status pembayaran');
    }
}