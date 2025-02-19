<?php

include_once __DIR__ . '/../models/barang.php';


$barang = new Barang();

try {
    if (!empty($_GET['aksi'])) {
        if ($_GET['aksi'] == 'tambah' && isset($_POST['tambah'])) {
            $NamaBarang = $_POST['NamaBarang'];
            $Harga = $_POST['Harga'];
            $TotalDiskon = $_POST['TotalDiskon'];
            $barang->TambahBarang($NamaBarang, $Harga, $TotalDiskon);
        } elseif ($_GET['aksi'] == 'hapus') {
            $id = $_GET['IdBarang'];
            $hapus = $barang->Hapus($id);
            if ($hapus) {
                header("Location: ../views/barang.php");
            } else {
                echo "<script>alert('Data Gagal Dihapus');window.location='../views/barang.php'</script>";
            }
        } elseif ($_GET['aksi'] == 'edit' && isset($_POST['edit'])) {
            $id = $_POST['IdBarang']; 
            $NamaBarang = $_POST['NamaBarang'];
            $Harga = $_POST['Harga'];
            $TotalDiskon = $_POST['TotalDiskon'];
             $barang->Edit($id, $NamaBarang, $Harga, $TotalDiskon);
        }
    } else {
        $totals = $barang->HitungBarang();
        $transaksi = $barang->HitungTransaksi();
        $barangs = $barang->TampilData();
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
