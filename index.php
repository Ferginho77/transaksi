<?php
include_once 'views/layouts/header.php';
include_once 'controllers/barang.php';
?>
<!-- <div class="container mt-5">
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
</div> -->


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
                <a href="#" class="btn btn-primary"
                  data-bs-toggle="modal"
                  data-bs-target="#BeliModal"
                  data-id="<?= $x->IdBarang ?>"
                  data-nama="<?= $x->NamaBarang ?>"
                  data-harga="<?= ($diskon > 0) ? $hargaSetelahDiskon : $harga ?>"
                  data-user="<?= $_SESSION['data']['IdUser'] ?>">
                  Beli
                </a>


        </div>
      </div>
    <?php endforeach; ?>
  <?php } ?>

  <div class="modal fade" id="BeliModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Konfirmasi Pembelian</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                      <div class="modal-body">
                        <h5 id="NamaBarang"></h5>
                        <h5>Harga : <span id="Harga"></span></h5>
                        <form action="controllers/transaksi.php?aksi=beli" method="post">
                            <label for="">Jumlah</label>
                            <div class="counter-container">
                                <button type="button" class="counter-button btn btn-primary" id="minus">-</button>
                                <input type="text" id="jumlah" name="Jumlah" class="counter-input" value="1" readonly>
                                <button type="button" class="counter-button btn btn-primary" id="plus">+</button>
                            </div>
                            <h5 class="mt-3">Total Harga: <span id="TotalHargaText">0</span></h5>
                            <input type="hidden" id="TotalHarga" name="TotalHarga">
                            <input type="hidden" name="IdBarang" id="IdBarang">
                            <input type="hidden" name="IdUser" id="IdUser">
                              <button class="btn btn-success mt-4" type="submit" name="beli" onclick="return confirm('Apakah Semua Data Pembelian Sudah Sesuai?')">Beli Sekarang!</button>
                        </form>
                    </div>
                 </div>   
            </div>
  </div>      
</main>

<script src="assets/js/index.js">
    
</script>
</html>
