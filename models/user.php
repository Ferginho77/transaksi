<?php

include_once '../controllers/conn.php';

class user {
    public function login($Username=null, $Password=null){
        $conn = new database();
        if (empty($Username) || empty($Password)) {
            echo "<script>alert('Username dan Password harus diisi.');window.location='login.php'</script>";
            exit();
        }
        if (isset($_POST['login'])) {
            $sql = "SELECT * FROM user WHERE Username  = '$Username'";
            $result = mysqli_query($conn->koneksi, $sql);
            $data = mysqli_fetch_assoc($result);
            if ($result) {
               if(mysqli_num_rows($result) > 0){
                if(password_verify($Password, $data['Password'])){
                    $_SESSION["data"] = $data;
                    header("Location: ../index.php");
                }else{
                    echo "<script>alert('Password/Username Salah');window.location='login.php'</script>";
                }
            }
            }
        }
    }
}