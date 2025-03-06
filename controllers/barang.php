<?php

include_once __DIR__ . '/../models/barang.php';


$barang = new Barang();

try {
    if (!empty($_GET['aksi'])) {
        if ($_GET['aksi'] == 'tambah' && isset($_POST['tambah'])) {
            $NamaBarang = $_POST['NamaBarang'];
            $Harga = $_POST['Harga'];
            $FotoBarang = $_FILES['FotoBarang']['name'];
            $TotalDiskon = $_POST['TotalDiskon'];

                
            $can = array('jpg', 'png', 'jpeg');
            $x = explode('.', $FotoBarang);
            $ekstensi = strtolower(end($x));
            $tmp = $_FILES['FotoBarang']['tmp_name'];

            if (in_array($ekstensi, $can) == true) {
                move_uploaded_file($tmp, '../assets/img/' . $FotoBarang);
                $barang->TambahBarang($NamaBarang, $Harga, $FotoBarang, $TotalDiskon);
            }else{
                echo "<script>alert('Data Gagal DI UP');window.location='../views/barang'</script>";
            }
            
        } elseif ($_GET['aksi'] == 'hapus') {
            $id = $_GET['IdBarang'];
            $hapus = $barang->Hapus($id);
            if ($hapus) {
                header("Location: ../views/barang");
            } else {
                echo "<script>alert('Data Gagal Dihapus');window.location='../views/barang'</script>";
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
