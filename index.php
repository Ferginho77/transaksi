<?php
session_start();

// Mendapatkan URL dari request
$request = isset($_GET['url']) ? $_GET['url'] : '';

// Jika tidak ada request, arahkan ke halaman login
if (empty($request)) {
    header("Location: home");
    exit();
}

// Memisahkan URL berdasarkan "/"
$url = explode('/', $request);

// Tentukan file target berdasarkan URL (misalnya, views/devent.php)
$targetFile = "views/{$url[0]}.php";

// Cek apakah file yang dituju ada
if (file_exists($targetFile)) {
    // Sertakan file target
    require_once $targetFile;

    // Memproses parameter query string (misalnya, IdKategori)
    if (isset($_GET['IdKategori'])) {
        $IdKategori = $_GET['IdKategori'];
        // Gunakan $IdKategori sesuai kebutuhan
        echo "IdKategori: " . htmlspecialchars($IdKategori);
    }

} else {
    // Tampilkan error jika file tidak ditemukan
    echo "Halaman tidak ditemukan: " . htmlspecialchars($url[0]);
}
