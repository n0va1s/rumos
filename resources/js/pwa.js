// Check that service workers are supported
if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/sw.js');
}