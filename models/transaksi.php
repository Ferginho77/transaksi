<?php

include_once '../controllers/conn.php';

class Transaksi{
    public function Beli($Jumlah, $TotalHarga, $IdBarang, $IdUser){
        $conn = new database();

        $sql = "INSERT INTO Transaksi VALUES (NULL, '$Jumlah', '$TotalHarga', '$IdBarang', '$IdUser')";
        $result = mysqli_query($conn->koneksi, $sql);

        if($result){
            echo "<script>alert('Transaksi Berhasil Silahkan Cek Cart Anda');window.location='../home'</script>";
        }else{
            echo "<script>alert('Data Gagal Di Edit');window.location='../home'</script>";
        }
    }

    public function TampilTransaksi($UserId){
        $conn = new database();
        
        $query = "SELECT transaksi.*, user.Username, barang.NamaBarang, barang.Harga, barang.TotalDiskon, barang.FotoBarang
                  FROM transaksi 
                  INNER JOIN user ON transaksi.IdUser = user.IdUser 
                  INNER JOIN barang ON transaksi.IdBarang = barang.IdBarang 
                  WHERE transaksi.IdUser = $UserId 
                  ORDER BY transaksi.IdTransaksi DESC";
    
        $data = mysqli_query($conn->koneksi, $query);
        $hasil = [];
        
        while ($d = mysqli_fetch_object($data)) {
            $hasil[] = $d;
        }
        
        return $hasil;
    }
    
    
}