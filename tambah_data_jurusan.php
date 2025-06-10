<?php
include "koneksi.php";
$db = new database();


if (isset($_POST['simpan'])){
    $db->tambah_jurusan(
        $_POST['kodejurusan'],
        $_POST['namajurusan']
    );
    header("location:data_jurusan.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Jurusan</title>
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
    flex-direction: column;
    display: flex;

}

.container {
    background-color: #fff;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 600px;
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
    width: 600px;

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
        <form action="" method="post">

            <label for="kodejurusan">Kode Jurusan:</label>
            <input type="text" id="kodejurusan" name="kodejurusan" required>

            <label for="namajurusan">Nama Jurusan:</label>
            <input type="text" id="namajurusan" name="namajurusan" required>

            <input type="submit" name="simpan" value="Tambah Jurusan">

        </form>
    </div>
</body>
</html>