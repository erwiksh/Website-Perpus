<?php
include 'koneksi.php';

if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == "Tambahkan") {
        $siswa = $_POST['siswa'];
        $judul = $_POST['judul'];
        $tpinjam = $_POST['tpinjam'];
        $tkembali = $_POST['tkembali'];
        $id_kelas = $_POST['id_kelas'];

        $query = "INSERT INTO peminjaman (id_peminjaman,siswa,judul,tpinjam,tkembali,id_kelas )VALUES (NULL, '$siswa', '$judul', '$tpinjam', '$tkembali', '$id_kelas')";
        $sql = mysqli_query($conn, $query);
        if ($sql) {
            header('Location: peminjaman.php');
        } else {
            echo $query;
        }

    } else if ($_POST['aksi'] == "Simpan Perubahan") {
        $idpinjam = $_POST['id_peminjaman'];
        $siswa = $_POST['siswa'];
        $judul = $_POST['judul'];
        $tpinjam = $_POST['tpinjam'];
        $tkembali = $_POST['tkembali'];
        $id_kelas = $_POST['id_kelas'];
        
        $query = "UPDATE peminjaman SET siswa = '$siswa', judul = '$judul', tpinjam = '$tpinjam', tkembali = '$tkembali', id_kelas = '$id_kelas' WHERE id_peminjaman = '$idpinjam'";
        $sql = mysqli_query($conn, $query);
        if ($sql) {
            header('Location: peminjaman.php');
        } else {
            echo $query;
        }
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $query = "DELETE FROM peminjaman WHERE id_peminjaman = '$id'";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        header('Location: peminjaman.php');
    } else {
        echo $query;
    }
}

?>
