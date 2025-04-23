// resources/js/debug.js

/**
 * Fungsi print() hanya akan mencetak pesan ke console.log
 * jika variabel VITE_APP_DEBUG_VIEW bernilai "true".
 */
export function print(...args) {
    if (import.meta.env.VITE_APP_DEBUG_VIEW === 'true') {
        console.log(...args);
    }
}

/**
 * Fungsi printError() hanya akan mencetak pesan ke console.error
 * jika variabel VITE_APP_DEBUG_VIEW bernilai "true".
 */
export function printError(...args) {
    if (import.meta.env.VITE_APP_DEBUG_VIEW === 'true') {
        console.error(...args);
    }
}
