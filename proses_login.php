<?php
include 'koneksi.php';
$db = new database();

session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = $db->cek_login($username, $password);

    if ($user) {
        $_SESSION['user'] = $user;
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        header("Location: index.php?welcome=1");
        exit();
    } else {
        header("Location: login.php?error=invalid");
        exit();
    }
}

$_SESSION['user'] = [
  'username' => $data['username'],
  'role' => $data['role']
];
header("Location: index.php");
exit;
?>
