const CACHE_NAME = "rumos-cache-v1";
const STATIC_ASSETS = [
    "/",
    "/offline.html",
    "/css/app.css",
    "/img/favicon.ico",
    "/img/bible.jpg",
    "/img/boat.jpg",
    "/img/candles.jpg",
    "/img/cross.jpg",
    "/img/done.svg",
    "/img/emaus-colorido.png",
    "/img/letter.jpg",
    "/img/person.jpg",
    "/img/priest.jpg",
    "/img/teens.jpg",
    "/img/offline1.svg",
    "/img/offline2.svg",
    "/img/icons/icon-32-32.png",
    "/img/icons/icon-48-48.png",
    "/img/icons/icon-64-64.png",
    "/img/icons/icon-96-96.png",
    "/img/icons/icon-100-100.png",
    "/img/icons/icon-128-128.png",
    "/img/icons/icon-144-144.png",
    "/img/icons/icon-192-192.png",
    "/img/icons/icon-256-256.png",
    "/img/icons/icon-384-384.png",
    "/img/icons/icon-512-512.png",
    "/img/mail/bee.png",
    "/img/mail/emaus.png",
    "/img/mail/facebook2x.png",
    "/img/mail/instagram2x.png",
];

self.addEventListener("install", (event) => {
    console.log("Service Worker installed");
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => cache.addAll(STATIC_ASSETS))
    );
});

self.addEventListener("activate", (event) => {
    console.log("Service worker activated");
});

self.addEventListener("fetch", (event) => {
    console.log(`Request of ${event.request.url}`);
    event.respondWith(fetch(event.request));
});
