<?php
include_once 'layouts/header.php';
include_once '../controllers/transaksi.php';
$UserId = $_SESSION['data']['IdUser']; 
$result = $transaksi->TampilTransaksi($UserId);
?>

<main>
    <?php if (empty($result)) { ?>
        <h2>Tidak Ada Transaksi</h2>
    <?php } else { ?>
        <?php foreach ($result as $x): ?>
            <div class="card mb-3">
                <div class="card-body m-3">
                    <h2>DETAIL PESANAN ANDA :</h2>
                    <h5 class="mt-3 card-title">Atas Nama: <?= $x->Username ?></h5>
                    <h5 class="mt-3 card-title">Nama Barang: <?= $x->NamaBarang ?></h5>
                    <h5 class="mt-3 card-text">Harga Satuan: Rp.<?= number_format($x->Harga, 0, ',', '.') ?></h5>
                    <h5 class="mt-3">Jumlah: <?= $x->Jumlah ?></h5>
                    <h5 class="mt-3">Total Harga Pembelian: Rp.<?= number_format($x->TotalHarga, 0, ',', '.') ?></h5>
                </div>
            </div>
        <?php endforeach; ?>
    <?php } ?>
</main>