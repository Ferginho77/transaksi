<?php
include_once 'layouts/admin.php';
include_once '../controllers/barang.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card mt-3">
                <div class="card-header">
                    <h3>Tambah Barang</h3>
                </div>
               <div class="card-body">
                <form action="../controllers/barang.php?aksi=tambah" method="post">
                    <label for="">Nama Barang</label>
                    <input class="form-control" type="text" name="NamaBarang" placeholder="Masukan Nama Barang">
                    <label for="">Jenis Barang</label>
                   <select class="form-control" name="JenisBarang" id="">
                        <option value="Jersey">Jersey</option>
                        <option value="Oblong">Oblong</option>
                   </select>
                   <button type="submit" name="tambah" class="btn btn-primary mt-2">Kirim</button>
                </form>
               </div> 
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header">
                    <h3>Data Barang</h3>
                </div>
                <div class="card-body">
                    <table class="table table-hover"> 
                        <tr>
                            <th>Nama Barang</th>
                            <th>Jenis Barang</th>
                            <th>Aksi</th>
                        </tr>
                        <?php if (!empty($barangs)) { ?>
                            <tbody>
                                <?php foreach ($barangs as $x) : ?>
                                    <tr>
                                        <td><?= $x->NamaBarang ?></td>
                                        <td><?= $x->JenisBarang ?></td>
                                        <td></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        <?php } ?>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>