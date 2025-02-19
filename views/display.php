<?php
include_once 'layouts/admin.php';
include_once '../controllers/barang.php';
?>
<main>
<?php if (empty($barangs)) { 
    echo "<h2>Tidak Ada Barang</h2>";
} else { ?>
    <?php foreach ($barangs as $x):  ?>
        <?php
            $harga = $x->Harga;
            $diskon = isset($x->TotalDiskon) ? $x->TotalDiskon : 0;
            $jumlahDiskon = ($diskon > 0) ? ($harga * $diskon) / 100 : 0;
            $hargaSetelahDiskon = $harga - $jumlahDiskon;
        ?>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($x->NamaBarang) ?></h5>
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
    <?php endforeach; ?>
  <?php } ?>
</main>