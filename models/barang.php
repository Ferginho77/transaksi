<?php

include_once __DIR__ . '/../controllers/conn.php';



class Barang {
    public function TambahBarang($NamaBarang, $Harga, $FotoBarang, $TotalDiskon){
        $conn = new database();
        if ($TotalDiskon === "" || $TotalDiskon === null) {
            $TotalDiskon = "NULL";
        } else {
            if ($TotalDiskon < 1 || $TotalDiskon > 100) {
                echo "<script>alert('Tolong masukkan diskon antara 1 - 100%');window.location='../views/barang'</script>";
                exit();
            }
            $TotalDiskon = "'$TotalDiskon'"; // Bungkus dengan tanda kutip agar tetap valid dalam SQL
        }
    
        $sql = "INSERT INTO barang VALUES (NULL, '$NamaBarang', '$Harga', '$FotoBarang', $TotalDiskon)";
        $result = mysqli_query($conn->koneksi, $sql);
    
        if ($result) {
            header("Location: ../views/barang");
        } else {
            echo "<script>alert('Data Gagal Ditambahkan');window.location='../views/barang'</script>";
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

    public function Edit($id, $NamaBarang, $Harga, $TotalDiskon){
        if ($TotalDiskon < 0 || $TotalDiskon > 100) {
            echo "<script>alert('tolong masukan diskon antara 1 - 100% ');window.location='../views/barang'</script>";
            exit();
        }
        $conn = new database();
        $sql = "UPDATE barang SET NamaBarang='$NamaBarang', Harga='$Harga', TotalDiskon='$TotalDiskon' WHERE IdBarang = '$id'";
        $result = mysqli_query($conn->koneksi, $sql);
    
        if ($result) {
            header("Location: ../views/barang");
        } else {
            echo "<script>alert('Data Gagal Di Edit');window.location='../views/barang'</script>";
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