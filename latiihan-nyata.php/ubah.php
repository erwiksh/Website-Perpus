<?php 
require "koneksi.php";

//ambil data di URL
$id = $_GET["id"];

//query data berdasarkan id
//cara 1
$query = "SELECT * FROM login WHERE id= $id";
$result = mysqli_query($conn, $query);
$siswa = mysqli_fetch_assoc($result);
//cara 2
//$awsis = query ("SELECT * FROM login WHERE id=$id")[0];


//cek apakah tombol submit sudah di klik apa belum
if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) { 
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
    <title>ubah</title>
</head>
<body>
    <h1>ubah DATA</h1>
    <form action="" method="post">
        <ul>
                <input type="hidden" value = "<?=$siswa["id"]?>" name = "id">
            <li>
                <label for="nama">NAMA : </label>
                <input type="text" name="nama" id="nama" value="<?=$siswa["nama"]; ?>">
            </li>
            <li>
                <label for="umur">umur : </label>
                <input type="text" name="umur" id="umur" value="<?=$siswa["umur"]; ?>">
            </li>
            <li>
                <label for="jurusan">jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" value="<?=$siswa["jurusan"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">KIRIM</button>
            </li>
        </ul>
    </form> 
</body>
</html>