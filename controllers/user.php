<?php

include_once '../models/user.php';

$user = new User();

try {
            if ($_GET['aksi'] == 'login') {
            $Username = $_POST['Username'];
            $Password = $_POST['Password'];
            // echo _dump($Username, $Password);
            $user->login($Username, $Password);

            // if ($login) {
            //     header("Location: ../views/home.php");
            //     exit;
            // }
            // echo 'gagal';
            
        }
        
} catch (Exception $e) {
    echo $e->getMessage();
}