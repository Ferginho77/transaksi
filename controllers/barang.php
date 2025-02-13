<?php

include_once '../models/barang.php';

$barang = new Barang();

try{

    if(!empty($_GET['aksi'])){
        $NamaBarang = $_POST['NamaBarang'];
        $JenisBarang = $_POST['JenisBarang'];

        if($_GET['aksi'] == 'tambah' && isset($_POST['tambah'])){
            $barang->TambahBarang($NamaBarang, $JenisBarang);
        }
    }else{
        $barangs = $barang->TampilData();
    }
}catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}