<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css" />
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
if (isset($_SESSION['user'])) {
  header("Location: index.php");
  exit;
}
if (isset($_GET['error']) && $_GET['error'] == 1) {
echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Login Gagal!',
            text: 'Username atau password salah.',
            icon: 'error',
            confirmButtonText: 'Coba Lagi',
            customClass: {
                popup: 'small-swal'
            }
        });
        window.history.replaceState(null, null, window.location.pathname);
    });
</script>";

}
?>

</head>
<style>
.small-swal {
    width: 300px !important;
    font-size: 14px !important;
}
</style>

<body>
    <section class="login-section">
  <div class="login-container">
    <h2>Login to Your Account</h2>
<form class="login-form" action="proses_login.php" method="POST">
  <div class="input-group">
    <label for="user">Username</label>
    <input type="text" id="user" name="username" placeholder="Enter your Username" required />
  </div>
  <div class="input-group">
    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="Enter your password" required />
  </div>
  <button type="submit" name="login" class="login-btn">Login</button>
</form>

  </div>
</section>

</body>
</html>