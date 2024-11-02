import "./bootstrap";

import Alpine from "alpinejs";

import NProgress from "nprogress";

import "nprogress/nprogress.css";

// Alpine
window.Alpine = Alpine;

Alpine.start();

// NProgress
window.NProgress = NProgress;

// Konfigurasi awal NProgress
NProgress.configure({ showSpinner: false, trickleSpeed: 100 });

// Fungsi untuk memulai dan mengakhiri NProgress pada setiap navigasi halaman
document.addEventListener("DOMContentLoaded", () => {
    // Memulai progress saat halaman mulai dimuat
    NProgress.start();

    // Mengakhiri progress saat halaman selesai dimuat
    window.addEventListener("load", () => {
        NProgress.done();
    });

    // Menangani klik pada link untuk memulai progress bar
    document.querySelectorAll("a").forEach((link) => {
        link.addEventListener("click", (e) => {
            const href = link.getAttribute("href");

            // Mendapatkan URL saat ini tanpa bagian hash
            const currentURL = window.location.href.split("#")[0];

            // Mengecek apakah link mengarah ke halaman yang sama
            if (
                href !== "#" &&
                !href.startsWith("#") &&
                !href.startsWith(currentURL) &&
                link.getAttribute("target") !== "_blank"
            ) {
                NProgress.start();
            }
        });
    });
});

// Menyelesaikan NProgress setelah AJAX selesai jika menggunakan fetch/axios
document.addEventListener("ajaxStart", () => NProgress.start());
document.addEventListener("ajaxComplete", () => NProgress.done());
