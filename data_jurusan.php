<?php
include "koneksi.php";
$db = new database();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jurusan</title>
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
            text-align: center;
        }
        th {
            background-color:rgb(166, 118, 184);
            color: white;
        }
        .nama_jurusan {
            text-align: left;
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
    <h2>Data Jurusan</h2>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Kode Jurusan</th>
            <th>Nama Jurusan</th>
            <th>Option</th>
        </tr>
        <?php
        $no = 1;
        $data_jurusan = $db->tampil_data_show_jurusan(); 

        if (!empty($data_jurusan)) {
            foreach ($data_jurusan as $x) {
        ?>   
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $x['kodejurusan']; ?></td>                
                <td class="nama_jurusan"><?php echo $x['namajurusan']; ?></td>  
                <td>
                        <a href="edit_jurusan.php?kodejurusan=<?php echo $x['kodejurusan']; ?>&aksi=edit" class="edit">Edit</a>
                        <a href="proses.php?kodejurusan=<?php echo $x['kodejurusan']; ?>&aksi=hapus" class="hapus">Hapus</a>
                    </td>
     
        <?php
            }
        } else {
            echo "<tr><td colspan='3'>Data jurusan tidak ditemukan.</td></tr>";
        }
        ?>
    </table>

    <div class="button">
        <a href="tambah_data_jurusan.php" class="btn-tambah">Tambah Data jurusan</a>
    </div>
</body>
</html>
