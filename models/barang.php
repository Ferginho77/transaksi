<?php

include_once __DIR__ . '/../controllers/conn.php';



class Barang {
    public function TambahBarang($NamaBarang, $Harga){
        $conn = new database();
        $sql = "INSERT INTO barang VALUES (NULL, '$NamaBarang', '$Harga')";

        $result = mysqli_query($conn->koneksi, $sql);

        if($result){
            header("Location: ../views/barang.php");
        }else{
            echo "<script>alert('Data Gagal Di Edit');window.location='../views/barang.php'</script>";
        }
    }

    public function TampilData(){
        $conn = new database();
		$data = mysqli_query($conn->koneksi, "SELECT * FROM barang ORDER BY IdBarang desc ");
        $hasil = [];
		while ($d = mysqli_fetch_object($data)) {
			$hasil[] = $d;
		}
		return $hasil;
    }

    public function Hapus($id){
        $conn = new database();
        $sql = "DELETE FROM barang WHERE IdBarang = '$id'";
        $result = mysqli_query($conn->koneksi, $sql);
		return $result;
    }

    public function Edit($id, $NamaBarang, $Harga){
        $conn = new database();
        $sql = "UPDATE barang SET NamaBarang='$NamaBarang', Harga='$Harga' WHERE IdBarang = '$id'";
        $result = mysqli_query($conn->koneksi, $sql);
    
        if ($result) {
            header("Location: ../views/barang.php");
        } else {
            echo "<script>alert('Data Gagal Di Edit');window.location='../views/barang.php'</script>";
        }
    }

    public function HitungBarang(){
        $conn = new database();
        $sql = "SELECT COUNT(*) AS total FROM barang";
        $result = mysqli_query($conn->koneksi, $sql);
        $data = mysqli_fetch_assoc($result);

    return $data['total'];
    }
    public function HitungTransaksi(){
        $conn = new database();
        $sql = "SELECT COUNT(*) AS total FROM transaksi";
        $result = mysqli_query($conn->koneksi, $sql);
        $data = mysqli_fetch_assoc($result);

    return $data['total'];
    }
}