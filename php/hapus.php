<?php
    include 'koneksi.php';
    $id = $_GET['id'];

    $datas = mysqli_query($koneksi, "delete from peminjaman where id_peminjaman = '$id'") or die (mysqli_error($koneksi));

    echo "<script>alert('data berhasil dihapus.');window.location='peminjaman.php';</script>";
?>