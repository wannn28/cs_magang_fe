import './bootstrap';
import { AwaitFetchApi, showNotification, hideLoading, showLoading } from './general';
import { print, printError } from './debug';

window.print = print;
window.printError = printError;
window.AwaitFetchApi = AwaitFetchApi;
window.showNotification = showNotification;
window.showLoading = showLoading;
window.hideLoading = hideLoading;