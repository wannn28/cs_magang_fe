const print = {
    log: (...args) => {
        if (window.APP_DEBUG_VIEW === 'true') {
            console.log(...args);
        }
    },
    error: (...args) => {
        if (window.APP_DEBUG_VIEW === 'true') {
            console.error(...args);
        }
    },
    warn: (...args) => {
        if (window.APP_DEBUG_VIEW === 'true') {
            console.warn(...args);
        }
    },
    table: (data, columns) => {
        if (window.APP_DEBUG_VIEW === 'true') {
            if (Array.isArray(data) || typeof data === 'object') {
                console.table(data, columns);
            } else {
                console.warn('print.table hanya bisa digunakan untuk array atau object.');
            }
        }
    }
};
