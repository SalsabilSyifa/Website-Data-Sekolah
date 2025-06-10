<?php
class database
{
    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "sekolah";
    var $koneksi;

    function __construct()
    {
        $this->koneksi = mysqli_connect(
            $this->host,
            $this->username,
            $this->password
        );



        $cekdb = mysqli_select_db($this->koneksi, $this->database);
    }

    public function tampil_data_show_siswa()
{
    $query = "SELECT 
            s.*, 
            s.agama AS idAgama, 
            a.namaAgama, 
            j.namajurusan 
          FROM siswa s
          JOIN agama a ON s.agama = a.idAgama
          JOIN jurusan j ON s.kodejurusan = j.kodejurusan";

    $result = mysqli_query($this->koneksi, $query);

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}

    function tampil_data_show_jurusan()
    {
        $hasil = [];
        $query = "SELECT * FROM jurusan";
        $data = mysqli_query($this->koneksi, $query);

        while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
            $hasil[] = $row;
        }

        return $hasil;
    }

    function tampil_data_show_agama()
    {
        $hasil = [];
        $query = "SELECT * FROM agama";
        $data = mysqli_query($this->koneksi, $query);

        while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
            $hasil[] = $row;
        }

        return $hasil;
    }

    public function tampil_user()
    {
        $query = "SELECT * FROM login";
        $result = mysqli_query($this->koneksi, $query);
        $data = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }


    function tambah_siswa($nisn, $nama, $jeniskelamin, $kodejurusan, $kelas, $alamat, $agama, $nohp)
    {
        
        $allowed_kelas = ['X', 'XI', 'XII'];
        if (!in_array($kelas, $allowed_kelas)) {
            die("Kelas tidak valid!");
        }
        $query = "INSERT INTO siswa (nisn, nama, jeniskelamin, kodejurusan, kelas, alamat, agama, nohp) 
        VALUES ('$nisn', '$nama', '$jeniskelamin', '$kodejurusan', '$kelas', '$alamat', '$agama', '$nohp')";
        mysqli_query($this->koneksi, $query) or die(mysqli_error($this->koneksi));
    }

    function tambah_jurusan($kodejurusan, $namajurusan)
    {
        $query = "INSERT INTO jurusan(kodejurusan, namajurusan) 
                VALUES ('$kodejurusan', '$namajurusan')";
        mysqli_query($this->koneksi, $query) or die(mysqli_error($this->koneksi,));
    }


    function tambah_agama($idAgama, $namaAgama)
    {
        $query = "INSERT INTO agama(idAgama, namaAgama) 
                VALUES ('$idAgama', '$namaAgama')";
        mysqli_query($this->koneksi, $query) or die(mysqli_error($this->koneksi,));
    }

    function tampil_agama()
    {
        $query = "SELECT * FROM agama";
        $result = mysqli_query($this->koneksi, $query);

        if (!$result) {
            die("Error dalam query: " . mysqli_error($this->koneksi));
        }

        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    function tampil_jurusan()
    {
        $query = "SELECT * FROM jurusan";
        $result = mysqli_query($this->koneksi, $query);

        if (!$result) {
            die("Error dalam query: " . mysqli_error($this->koneksi));
        }

        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function get_siswa_by_id($id)
    {
        $query = "SELECT * FROM siswa WHERE idsiswa = $id";
        $result = mysqli_query($this->koneksi, $query);
        return mysqli_fetch_assoc($result);
    }

    public function update_siswa($data, $id)
    {
        $query = "UPDATE siswa SET
            nisn = '{$data['nisn']}',
            nama = '{$data['nama']}',
            jeniskelamin = '{$data['jeniskelamin']}',
            kodejurusan = '{$data['kodejurusan']}',
            kelas = '{$data['kelas']}',
            alamat = '{$data['alamat']}',
            agama = '{$data['agama']}',
            nohp = '{$data['nohp']}'
            WHERE idsiswa = $id";

        mysqli_query($this->koneksi, $query);
    }

    public function hapus_siswa($idsiswa)
    {
        $query = "DELETE FROM siswa WHERE idsiswa = $idsiswa";
        return mysqli_query($this->koneksi, $query);
    }

   public function update_jurusan($kode_lama, $kode_baru, $nama) {
    $query = "UPDATE jurusan SET kodejurusan = '$kode_baru', namajurusan = '$nama' WHERE kodejurusan = '$kode_lama'";
    mysqli_query($this->koneksi, $query);
}


 public function hapus_jurusan($kodejurusan) {
    $query = mysqli_query($this->koneksi, "DELETE FROM jurusan WHERE kodejurusan = '$kodejurusan'");
    return $query;
}


    public function get_agama_by_id($idAgama)
    {
        $query = mysqli_query($this->koneksi, "SELECT * FROM agama WHERE idAgama = '$idAgama'");
        return mysqli_fetch_assoc($query);
    }

public function update_agama($id_lama, $id_baru, $nama) {
    $query = "UPDATE agama SET idAgama = '$id_baru', namaAgama = '$nama' WHERE idAgama = '$id_lama'";
    mysqli_query($this->koneksi, $query);
}


    public function hapus_agama($idAgama)
    {
        return mysqli_query($this->koneksi, "DELETE FROM agama WHERE idAgama = '$idAgama'");
    }

    public function hapus_user($id)
    {
        $query = "DELETE FROM login WHERE id = '$id'";
        return mysqli_query($this->koneksi, $query);
    }

public function update_user($id, $username, $password, $role) {
    $stmt = $this->koneksi->prepare("UPDATE login SET username = ?, password = ?, role = ? WHERE id = ?");
    if (!$stmt) {
        die("Prepare failed: " . $this->koneksi->error);
    }

    $stmt->bind_param("sssi", $username, $password, $role, $id);
    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }
    $stmt->close();
}



public function cek_login($username, $password) {
    $stmt = $this->koneksi->prepare("SELECT * FROM login WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc(); // Return user jika cocok
}



}
