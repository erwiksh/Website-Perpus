<?php
include '../koneksi.php';
$id = $_GET['id'];
$sql = "DELETE FROM pengunjung Where id_pengunjung = '$id'";
$result = mysqli_query($conn,$sql);
if ($result) {
    $cek = mysqli_affected_rows($conn);
    if($cek > 0){
        header("Location: pengunjung.php");
    }
}
?>