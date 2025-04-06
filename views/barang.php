<?php
include_once 'layouts/admin.php';
include_once '../controllers/barang.php';
?>

<main>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card mt-3 border border-dark">
                <div class="card-header">
                    <h3>Tambah Barang</h3>
                </div>
               <div class="card-body">
                <form action="../controllers/barang.php?aksi=tambah" method="post" enctype="multipart/form-data">
                    <label for="">Nama Barang</label>
                    <input class="form-control" type="text" name="NamaBarang" placeholder="Masukan Nama Barang">
                    <label for="">Harga</label>
                    <input type="text" class="form-control" name="Harga" placeholder="Rp.000">
                    <label for="">Foto Barang</label>
                    <input type="file" name="FotoBarang" class="form-control">
                    <label for="">Beri Diskon</label>
                    <input type="text" class="form-control" name="TotalDiskon" placeholder="Masukan Diskon Antara 1-100%">
                   <button type="submit" name="tambah" class="btn btn-primary mt-2">Kirim</button>
                </form>
               </div> 
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mt-3 border border-dark">
                <div class="card-header">
                    <h3>Data Barang</h3>
                </div>
                <div class="card-body">
                <table class="table table-hover">
    <thead>
        <tr>
            <th>Nama Barang</th>
            <th>Harga Barang</th>
            <th>Diskon Barang</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php if (!empty($barangs)) : ?>
        <?php foreach ($barangs as $x) : ?>
            <?php
            $harga = $x->Harga;
            $diskon = isset($x->TotalDiskon) ? $x->TotalDiskon : 0;
            $jumlahDiskon = ($diskon > 0) ? ($harga * $diskon) / 100 : 0;
            $hargaSetelahDiskon = $harga - $jumlahDiskon;
            ?>
            <tr>
                <td><?= htmlspecialchars($x->NamaBarang) ?></td>
                <td>
                    <?php if ($diskon > 0) : ?>
                        <span style="text-decoration: line-through; color: red;">
                            Rp.<?= number_format($harga, 0, ',', '.') ?>
                        </span>
                    <?php else : ?>
                        Rp.<?= number_format($harga, 0, ',', '.') ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if ($diskon > 0) : ?>
                        <span>Rp.<?= number_format($hargaSetelahDiskon, 0, ',', '.') ?></span>
                    <?php else : ?>
                        <span style="color: gray;">Tidak ada diskon</span>
                    <?php endif; ?>
                </td>
                <td>
                    <button class="btn btn-info" 
                            data-bs-toggle="modal" 
                            data-bs-target="#EditModal" 
                            data-id="<?= $x->IdBarang ?>" 
                            data-nama="<?= htmlspecialchars($x->NamaBarang) ?>" 
                            data-harga="<?= $x->Harga ?>"
                            data-diskon="<?= $x->TotalDiskon ?>">
                        Edit
                    </button>
                    <a onclick="return confirm('Anda yakin ingin menghapus barang ini?')" 
                       href="../controllers/barang.php?IdBarang=<?= $x->IdBarang ?>&aksi=hapus" 
                       class="btn btn-danger">
                        Hapus
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</tbody>



</table>

                </div>
            </div>
              <!-- MODAL EDIT -->
        <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Form Edit Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm" method="POST" action="../controllers/barang.php?aksi=edit">
                            <input type="hidden" id="IdBarang" name="IdBarang">
                            <div class="mb-3">
                                <label for="NamaBarang" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" id="NamaBarang" name="NamaBarang" placeholder="Masukkan Nama Barang">
                            </div>
                            <div class="mb-3">
                                <label for="Harga" class="form-label">Harga</label>
                                <input type="text" class="form-control" id="Harga" name="Harga" placeholder="Rp. 000">
                            </div>
                            <div class="mb-3">
                            <label for="">Beri Diskon</label>
                             <input type="number" class="form-control" id="Diskon" name="TotalDiskon" placeholder="Kosongkan untuk hapus diskon" min="0" max="100">
                            </div>
                            <button type="submit" name="edit" class="btn btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
       
        </div>
    </div>
</div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const EditModal = document.getElementById('EditModal');
        
        EditModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const NamaBarang = button.getAttribute('data-nama');
            const Harga = button.getAttribute('data-harga');
            const Diskon = button.getAttribute('data-diskon');
            const IdBarang = button.getAttribute('data-id');

            EditModal.querySelector('#NamaBarang').value = NamaBarang;
            EditModal.querySelector('#Harga').value = Harga;
            EditModal.querySelector('#Diskon').value = Diskon;
            EditModal.querySelector('#IdBarang').value = IdBarang;
        });
    });

</script>
