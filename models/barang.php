<?php

include_once '../controllers/conn.php';


class Barang {
    public function TambahBarang($NamaBarang, $JenisBarang){
        $conn = new database();
        $sql = "INSERT INTO barang VALUES (NULL, '$NamaBarang', '$JenisBarang')";

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
}