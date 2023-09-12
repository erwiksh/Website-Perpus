<?php
    require 'koneksi.php' ;
    $login = query("SELECT * FROM login ORDER BY nama ASC");

    if(isset($_POST["cari"])){
        $login = cari($_POST["search"]);
    }
// $query = "SELECT COUNT(*) as total FROM login";
// $result = mysqli_query($conn, $query);
// $row = mysqli_fetch_assoc($result);
// $jumlahData = $row['total'];

// echo "Jumlah data: " . $jumlahData;

    $jumlahDataPerHalaman=2;
    $jumlahData=count(query("SELECT * FROM login"));
    $jumlahHalaman= $jumlahData/$jumlahDataPerHalaman;
    //gunakan cell untuk pembulatan ke atas, gunakan floor untuk pembulatan ke bawah, gunakan round untuk pembulatan sesuai angka belakang koma
    if (isset($_GET['halaman'])) {
        $halamanAktif = $_GET['halaman'];
    }else {
        $halamanAktif=1;
    }
    var_dump($halamanAktif);
    //operator ternari
    $halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
?>  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
    <h1>DAFTAR SISWA</h1>
    <a href="tambah.php">Tambah Data</a>
    
    <form action="" method="POST">
        <input type="text" name="search" placeholder="Cari" size="30">
        <button type="submit" name="cari"> kirim </button>
    </form>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        foreach($login as  $log){
        ?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $log["nama"];?></td>
            <td><?= $log["umur"];?></td>
            <td><?= $log["jurusan"];?></td>
            <td>
                <a href="ubah.php?id=<?php echo $log["id"]?>">ubah</a>
                <a href="hapus.php?id=<?= $log["id"];?>" onclick="return confirm('are you sure to delete this?')">delete</a>
            </td>
        </tr> 
        <?php
        $no++;
        }
        ?>
    </table>
</body>
</html>