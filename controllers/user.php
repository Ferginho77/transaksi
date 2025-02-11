<?php

include_once '../models/user.php';

$user = new User();

try {
            if ($_GET['aksi'] == 'login') {
            $Username = $_POST['Username'];
            $Password = $_POST['Password'];
            $user->login($Username, $Password);
            
        }
        
} catch (Exception $e) {
    echo $e->getMessage();
}