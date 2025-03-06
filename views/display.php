<?php
include_once 'layouts/admin.php';
include_once '../controllers/barang.php';
?>
<main>
<div class="row mt-5">
    <?php if (empty($barangs)) { ?>
        <h2 class="text-center">Tidak Ada Barang</h2>
    <?php } else { ?>
        <?php foreach ($barangs as $x):  
            $harga = $x->Harga;
            $diskon = isset($x->TotalDiskon) ? $x->TotalDiskon : 0;
            $jumlahDiskon = ($diskon > 0) ? ($harga * $diskon) / 100 : 0;
            $hargaSetelahDiskon = $harga - $jumlahDiskon;
        ?>
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
          <div class="card p-3 mb-3 border border-dark" style="width: max-width; height: max-height;">
            <div class="card-body">
            <?php if ($diskon > 0) : ?>
              <h5 class="btn btn-success p-2 text-white rounded-4">-<?= $diskon ?>%</h5>
            <?php endif; ?>  
              <img src="../assets/img/<?= $x->FotoBarang ?>" style="width: 100%; height:max-content;" alt="">
                <h5 class="card-title mt-3"><?= htmlspecialchars($x->NamaBarang) ?></h5>
                <p>
                    <?php if ($diskon > 0) : ?>
                        <span style="text-decoration: line-through; color: red;">
                            Rp.<?= number_format($harga, 0, ',', '.') ?>
                        </span>
                        <br>
                        <span>Rp.<?= number_format($hargaSetelahDiskon, 0, ',', '.') ?></span>
                    <?php else : ?>
                        Rp.<?= number_format($harga, 0, ',', '.') ?>
                    <?php endif; ?>
                </p>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
    <?php } ?>
</div>
</main>