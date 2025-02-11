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
      <form action="controllers/diskon.php?aksi=count" method="POST">
        <label for="harga">Masukan Jumlah Harga</label>
        <input type="text" name="harga" id="harga" class="form-control m-3" placeholder="Masukan Harga">
        
        <label for="diskon">Terapkan Diskon %</label>
        <input type="text" name="diskon" id="diskon" class="form-control m-3" placeholder="Masukan Jumlah Diskon (1-100)">
        
        <button type="submit" class="btn btn-primary">Hitung Diskon</button>
      </form>

      
    </div>
  </div>
</div>

</body>
</html>
