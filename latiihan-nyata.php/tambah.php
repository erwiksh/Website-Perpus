<?php 
require "koneksi.php";
//cek apakah tombol submit sudah di klik apa belum
if (isset($_POST["submit"])) {
    if (Tambah($_POST) > 0) { 
        echo "succes";
        header("Location: index.php");
    } else {
        echo "something wrong with your kode" .mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah</title>
</head>
<body>
    <h1>TAMBAH DATA</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="nama">NAMA : </label>
                <input type="text" name="nama" id="nama">
            </li>
            <li>
                <label for="umur">umur : </label>
                <input type="text" name="umur" id="umur">
            </li>
            <li>
                <label for="jurusan">jurusan : </label>
                <input type="text" name="jurusan" id="jurusan">
            </li>
            <li>
                <button type="submit" name="submit">KIRIM</button>
            </li>
        </ul>
    </form> 
</body>
</html>