<?php
include_once 'layouts/header.php';
include_once '../controllers/transaksi.php';
$UserId = $_SESSION['data']['IdUser']; 
$result = $transaksi->TampilTransaksi($UserId);
?>

<main>
    <?php if (empty($result)): ?>
        <h2>Tidak Ada Transaksi</h2>
    <?php else: ?>
        <?php foreach ($result as $x): 
            $harga = $x->Harga;
            $diskon = $x->TotalDiskon ?? 0;
            $hargaSetelahDiskon = ($diskon > 0) ? $harga - ($harga * $diskon / 100) : $harga;
        ?>
            <div class="card m-3 mt-3 border border-dark">
                <div class="card-body m-3">
                    <div class="row">
                        <div class="col-md-4">
                            <h2>DETAIL PESANAN ANDA:</h2>
                            <img src="../assets/img/<?= $x->FotoBarang ?>" style="width: 250px; height:100;" alt="">
                        </div>
                        <div class="col-md-8 mt-5">
                                <h5 class="mt-3">Atas Nama: <?= htmlspecialchars($x->Username) ?></h5>
                                <h5 class="mt-3">Nama Barang: <?= htmlspecialchars($x->NamaBarang) ?></h5>
                                <h5 class="mt-3">Harga Satuan: 
                                <?php if ($diskon > 0): ?>
                                    <span style="text-decoration: line-through; color: red;">
                                        Rp.<?= number_format($harga, 0, ',', '.') ?>
                                    </span>
                                    <br>
                                <?php endif; ?>
                                <span>Rp.<?= number_format($hargaSetelahDiskon, 0, ',', '.') ?></span>
                            </h5>
                            <h5 class="mt-3">Jumlah: <?= $x->Jumlah ?></h5>
                            <h5 class="mt-3">Total Harga Pembelian: Rp.<?= number_format($x->TotalHarga, 0, ',', '.') ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</main>
