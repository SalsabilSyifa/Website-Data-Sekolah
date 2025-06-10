<?php
include 'koneksi.php';
$db = new database();

$username = $_POST['username'];
$password = $_POST['password'];
$password = $_POST['password']; 

$role     = $_POST['role'];

if (empty($username) || empty($password) || empty($role)) {
    header("Location: usermanagement.php?status=error&message=Semua field wajib diisi");
    exit;
}

$result = mysqli_query($db->koneksi, "INSERT INTO login (username, password, role) VALUES ('$username', '$password', '$role')");


if ($result) {
    header("Location: usermanagement.php?status=success&message=User berhasil ditambahkan");
    exit;
} else {
    die("Gagal menyimpan data: " . mysqli_error($db->koneksi));
}
