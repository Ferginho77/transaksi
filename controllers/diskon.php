<?php

include_once '../models/diskon.php';

$count = new Diskon();

if ($_GET['aksi'] == 'count') {
    $harga = isset($_POST['harga']) ? (float)$_POST['harga'] : 0;
    $diskon = isset($_POST['diskon']) ? (float)$_POST['diskon'] : 0;
    
    $count->Counting($harga, $diskon);

}