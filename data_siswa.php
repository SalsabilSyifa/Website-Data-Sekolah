<?php
include "koneksi.php";
$db = new database();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
        }
        th {
            background-color:rgb(166, 118, 184);
            color: white;
        }

        a {
    text-decoration: none;
    padding: 4px 10px;
    border-radius: 5px;
    font-size: 14px;
    font-weight: bold;
}

a.edit {
    background-color:rgb(76, 120, 175); 
    color: white;
    border: rgb(76, 120, 175);
    transition: 0.3s;
}


a.hapus {
    background-color: #f44336;
    color: white;
    border: 1px solid #f44336;
    transition: 0.3s;
}

.button {
    display: flex;
    justify-content: center; 
    margin-top: 30px;           
        }

        .btn-tambah {
            display: inline-block;
            background-color: rgb(175, 76, 175); 
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            transition: 0.3s;
            justify-content: center; 
            width: auto;
            text-align: center;

        }

    </style>
<body>
    <h2>Data Siswa</h2>
    <table border="1">
        <tr>
            <th>No</th>
            <th>NISN</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Jurusan</th>
            <th>Kelas</th>
            <th>Alamat</th>
            <th>Agama</th>
            <th>No HP</th>
            <th>Option</th>
        </tr>
        <?php
        $no = 1;
        $data_siswa = $db->tampil_data_show_siswa();

        if (!empty($data_siswa)) {
            foreach ($data_siswa as $x) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td  class="nisn"><?php echo $x['nisn']; ?></td>
                    <td><?php echo $x['nama']; ?></td>
                    <td>
                    <?php 
                        if ($x['jeniskelamin'] == 'L') {
                              echo 'Laki-Laki';
                        } elseif ($x['jeniskelamin'] == 'P') {
                              echo 'Perempuan';
                        } else {
                              echo 'Tidak Diketahui'; 
                        }
                        ?>
                    </td>

                    <td>
    <?php 
        $jurusan_data = $db->tampil_jurusan();
        $jurusan_map = [];
        
        if (!empty($jurusan_data)) {
            foreach ($jurusan_data as $j) {
                $jurusan_map[$j['kodejurusan']] = $j['namajurusan'];
            }
        }
        
        echo isset($jurusan_map[$x['kodejurusan']]) ? $jurusan_map[$x['kodejurusan']] : "Tidak Diketahui"; 
    ?>
</td>

                    <td ><?php echo $x['kelas']; ?></td>
                    <td><?php echo $x['alamat']; ?></td>
                    <td>
        <?php 
            $agama_data = $db->tampil_agama();
            $agama_map = [];

            if (!empty($agama_data)) {
                foreach ($agama_data as $a) {
                    $agama_map[$a['idAgama']] = $a['namaAgama'];
                }
            }

            echo isset($agama_map[$x['agama']]) ? $agama_map[$x['agama']] : "Tidak Diketahui";
        ?>
    </td>   
                    <td><?php echo $x['nohp']; ?></td>                   
                    <td>
                        <a href="edit_siswa.php?idsiswa=<?php echo $x['idsiswa']; ?>&aksi=edit" class="edit">Edit</a>
                        <a href="proses.php?idsiswa=<?php echo $x['idsiswa']; ?>&aksi=hapus" class="hapus">Hapus</a>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='10'>Data siswa tidak ditemukan.</td></tr>";
        }
        ?>
    </table>

    <div class="button">
        <a href="tambah_data_siswa.php" class="btn-tambah">Tambah Data Siswa</a>
    </div>

</body>
</html>
