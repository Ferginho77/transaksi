<?php

include_once '../controllers/conn.php';

class user {
    public function login($Username = null, $Password = null) {
        $conn = new database();
    
        // Cek apakah Username dan Password kosong
        if (empty($Username) || empty($Password)) {
            echo "<script>alert('Username dan Password harus diisi.');window.location='../login'</script>";
            exit();
        }
    
        // Ambil data user berdasarkan Username
        $sql = "SELECT * FROM user WHERE Username = '$Username'";
        $result = mysqli_query($conn->koneksi, $sql);
        $data = mysqli_fetch_assoc($result);
    
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                // Verifikasi password
                if (password_verify($Password, $data['Password'])) {
                    $_SESSION["data"] = $data;
    
                    // Cek role user
                    if ($data['Role'] == 'Admin') {
                        header("Location: ../views/dashboard");
                    } else {
                        header("Location: ../home");
                    }
                    exit();
                } else {
                    echo "<script>alert('Password salah');window.location='../login'</script>";
                }
            } else {
                echo "<script>alert('Username tidak ditemukan');window.location='../login'</script>";
            }
        } else {
            echo "<script>alert('Terjadi kesalahan sistem');window.location='../login'</script>";
        }
    }
    

   public function register($Username, $Password, $NamaLengkap, $Role) {
    $conn = new database();
    $cek = mysqli_query($conn->koneksi, "SELECT * FROM user WHERE Username = '$Username'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>
                alert('Username sudah terdaftar');
                window.location.href = '../login';
              </script>";
    } 
    
    $sql = mysqli_query($conn->koneksi, "INSERT INTO user VALUES (NULL, '$Username', '$Password', '$NamaLengkap', '$Role')");

    return $sql;
}
public function logout(){
    session_destroy();
  

    header("Location: ../login");
    exit;
}

}