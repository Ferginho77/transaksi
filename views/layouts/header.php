<?php
include_once __DIR__ . "/../../controllers/conn.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
<div class="loading" id="loading">
    <div class="loading-text">Loading...</div>
</div>
  <nav class="navbar navbar-expand-lg fixed-top text-dark p-3">
    <div class="container-fluid">
    <a class="navbar-brand fw-bolder" href="home">Dunia Jersey</a>
        <div class="navbar-nav ms-auto">
        <?php if (!isset($_SESSION['data'])): ?>
    <!-- Jika user belum login, tampilkan tombol Login -->
    <a href="../../login" class="btn btn-primary">Login</a>
<?php else: ?>
          <div class="button-container">
            <a href="../../home" class="fs-3 m-3">
                <i class="fas fa-home"></i>
            </a>
            <a href="../views/cart" class="fs-3">
            <i class="fas fa-cart-plus"></i>
            </a>

            <a href="../../controllers/user.php?aksi=logout" onclick="return confirm('Yakin ingin keluar dari aplikasi?')" class="fs-3">
            <i class="fas fa-sign-out-alt"></i>
            </a>
          </div>
    <?php endif; ?>
        </div>
    </div>
</nav>
<script>
    window.addEventListener('load', function() {
        const loading = document.getElementById('loading');
        loading.classList.add('fade-out');
        setTimeout(() => {
            loading.style.display = 'none';
        }, 500);
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/scroll.js"></script>
</body>
</html>