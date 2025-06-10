
<?php
include "koneksi.php";
$db = new database();



if (isset($_POST['simpan'])) {
    $db->tambah_siswa(
        $_POST['nisn'],
        $_POST['nama'],
        $_POST['jeniskelamin'],
        $_POST['kodejurusan'],
        $_POST['kelas'],
        $_POST['alamat'],
        $_POST['agama'],
        $_POST['nohp']
    );
    header("location:data_siswa.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
</head>

<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

.container {
    background-color: #fff;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    text-align: center;
    margin-top:20px;
    
}

h2 {
    color: #333;
    margin-bottom: 20px;
    font-size: 22px;
}

form {
    display: inline-block;
    text-align: center;
    width:500px;
}

select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: white;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
}

select:hover {
    border-color: #4c78af;
}

select:focus {
    border-color: #4c78af;
    outline: none;
    box-shadow: 0px 0px 5px rgba(76, 120, 175, 0.5);
}

select option {
    padding: 10px;
    background-color: #fff;
    color: #333;
}

label {
    font-weight: bold;
    margin-top: 12px;
    display: block;
    text-align: left;
}

label {
    font-weight: bold;
    margin-top: 12px;
    text-align: left;
    display: block;
}

input[type="text"] {
    padding: 10px;
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-top: 5px;
    font-size: 14px;
    transition: all 0.3s ease;
}

input[type="text"]:focus {
    border-color: #4c78af;
    outline: none;
    box-shadow: 0px 0px 5px rgba(76, 120, 175, 0.5);
}

.radio-group {
    display: flex;
    gap: 15px;
    align-items: center;
    margin-top: 5px;
    justify-content: flex-start;
}

input[type="radio"] {
    margin-right: 5px;
}

input[type="submit"] {
    background-color: rgb(212, 127, 236);
    color: white;
    border: none;
    padding: 12px;
    width: 100%;
    border-radius: 5px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    margin-top: 20px;
    transition: background-color 0.3s ease-in-out, transform 0.2s;
}

input[type="submit"]:hover {
    background-color: rgb(141, 228, 140);
}

input[type="submit"]:active {
    transform: scale(0.98);
}

</style>
<body>
    <div class="container">
        <h2>Form Tambah Data Siswa</h2>
        <form action="" method="post">
            <label for="nisn">NISN:</label>
            <input type="text" id="nisn" name="nisn" required>

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="jeniskelamin">Jenis Kelamin:</label>
            <div class="radio-group">
                <input type="radio" id="laki-laki" name="jeniskelamin" value="L" required>
                <label for="laki-laki">Laki-laki</label>
                <input type="radio" id="perempuan" name="jeniskelamin" value="P" required>
                <label for="perempuan">Perempuan</label>
            </div>

            <label for="kodejurusan">Jurusan:</label>
            <select name="kodejurusan" required>
            <option value="">Pilih Jurusan</option>
            <?php
                $data_jurusan = $db->tampil_jurusan();
                    if (!empty($data_jurusan)) {
                        foreach ($data_jurusan as $x) {
                            echo '<option value="'.$x['kodejurusan'].'">'.$x['namajurusan'].'</option>';
                         }
                    } else {
                        echo '<option value="">Data tidak ditemukan</option>';
                    }
                    ?>
            </select>

            <label for="kelas">Kelas:</label>
            <select name="kelas" required>
                    <option value="">Pilih Kelas</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
        </select>

            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required>

            <label for="idAgama">Agama:</label>
            <select name="idAgama" required>
            <option value="">Pilih Agama</option>
            <?php
                $data_agama = $db->tampil_agama();
                    if (!empty($data_agama)) {
                        foreach ($data_agama as $x) {
                            echo '<option value="'.$x['idAgama'].'">'.$x['namaAgama'].'</option>';
                         }
                    } else {
                        echo '<option value="">Data tidak ditemukan</option>';
                    }
                    ?>
            </select>

            
            <label for="nohp">No HP:</label>
            <input type="text" id="nohp" name="nohp" required>

            <input type="submit" name="simpan" value="Tambah Siswa">
        </form>
    </div>
</body>

</html>