<?php
include_once 'koneksi.php';
$db = new database();

session_start();

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : null;

// Hanya admin yang boleh melakukan aksi
function hanya_admin() {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        die("Akses ditolak. Hanya admin yang diperbolehkan.");
    }
}

// Contoh: Hapus siswa (admin only)
if ($aksi == 'hapus') {
    hanya_admin();
    $id = $_GET['idsiswa'];
    $db->hapus_siswa($id);
    header("Location: datasiswa.php?status=success&message=Data siswa berhasil dihapus");
    exit();
}

if (isset($_GET['aksi']) && $_GET['aksi'] == 'update_jurusan') {
    $kode_lama = $_POST['kode_lama'];       // kode sebelum diubah
    $kode_baru = $_POST['kodejurusan'];     // kode baru dari form
    $nama = $_POST['namajurusan'];

    $db->update_jurusan($kode_lama, $kode_baru, $nama);
    header("Location: datajurusan.php?status=success&message=Data jurusan berhasil diupdate");
    exit();
}


if ($aksi == 'hapus_jurusan' && isset($_GET['id'])) {
    hanya_admin(); // jika pakai validasi admin
    $kodejurusan = $_GET['id'];
    $db->hapus_jurusan($kodejurusan);
    header("Location: datajurusan.php?status=deleted");
    exit();
}

if (isset($_GET['aksi']) && $_GET['aksi'] == 'update_agama') {
    $id_lama = $_POST['id_lama'];
    $id_baru = $_POST['idAgama'];
    $nama = $_POST['namaAgama'];

    $db->update_agama($id_lama, $id_baru, $nama);
    header("Location: dataagama.php?status=success&message=Data agama berhasil diupdate");
    exit();
}

if ($aksi == 'hapusagama' && isset($_GET['idAgama'])) {
    hanya_admin();
    $db->hapus_agama($_GET['idAgama']);
    header("Location: dataagama.php?status=success&message=Data agama berhasil dihapus");
    exit();
}

if ($aksi == 'hapususer' && isset($_GET['id'])) {
    hanya_admin();
    $id = $_GET['id'];
    $db->hapus_user($id); 
    header("Location: usermanagement.php?status=success&message=User berhasil dihapus");
    exit();
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'], $_POST['username'], $_POST['password'], $_POST['role'])) {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        // Lakukan update data user
        $db->update_user($id, $username, $password, $role);

        header("Location: usermanagement.php?status=success&message=User berhasil diupdate");
        exit;
    }
}



if (isset($_POST['aksi']) && $_POST['aksi'] == 'editsiswa') {
    session_start();
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        die("Akses ditolak. Hanya admin yang diperbolehkan.");
    }

    include_once 'koneksi.php';
    $db = new database();

    $id = $_POST['idsiswa'];
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $jurusan = $_POST['jurusan'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $agama = $_POST['agama'];
    $nohp = $_POST['nohp'];

    $data = [
        'nisn' => $nisn,
        'nama' => $nama,
        'jeniskelamin' => $jeniskelamin,
        'kodejurusan' => $jurusan,
        'kelas' => $kelas,
        'alamat' => $alamat,
        'agama' => $agama,
        'nohp' => $nohp
    ];

    $db->update_siswa($data, $id);

    header("Location: datasiswa.php?status=success&message=Data siswa berhasil diupdate");
    exit();
}

?>
