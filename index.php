<?php
include_once 'views/layouts/header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aplikasi Penghitungan Diskon</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <div class="card">
    <div class="card-header text-center">
      Aplikasi Penghitungan Diskon
    </div>
    <div class="card-body">
      <form method="POST">
        <label for="harga">Masukan Jumlah Harga</label>
        <input type="text" name="harga" id="harga" class="form-control m-3" placeholder="Masukan Harga">
        
        <label for="diskon">Terapkan Diskon %</label>
        <input type="text" name="diskon" id="diskon" class="form-control m-3" placeholder="Masukan Jumlah Diskon (1-100)">
        
        <button type="submit" class="btn btn-primary">Hitung Diskon</button>
      </form>

      <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $harga = isset($_POST['harga']) ? (float)$_POST['harga'] : 0;
          $diskon = isset($_POST['diskon']) ? (float)$_POST['diskon'] : 0;

          if ($harga <= 0 || $diskon <= 1 || $diskon > 100) {
            echo '<div class="alert alert-danger mt-3">Harap masukkan harga yang valid dan diskon antara 1% hingga 100%.</div>';
          } else {
            $jumlahDiskon = ($harga * $diskon) / 100;
            $hargaSetelahDiskon = $harga - $jumlahDiskon;

            echo '<div class="alert alert-success mt-3">';
            echo '<p>Harga Awal: Rp' . number_format($harga, 0, ',', '.') . '</p>';
            echo '<p>Diskon: ' . $diskon . '%</p>';
            echo '<p>Jumlah Diskon: Rp' . number_format($jumlahDiskon, 0, ',', '.') . '</p>';
            echo '<p>Harga Setelah Diskon: Rp' . number_format($hargaSetelahDiskon, 0, ',', '.') . '</p>';
            echo '</div>';
          }
        }
      ?>
    </div>
  </div>
</div>

</body>
</html>
