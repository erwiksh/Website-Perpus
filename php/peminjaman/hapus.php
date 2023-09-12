<?php
    include '../koneksi.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM peminjaman WHERE id_peminjaman = '$id' ";
    $result = mysqli_query($conn,$sql);
    if($result){
        $row = mysqli_affected_rows($conn);
        if ($row > 0) {
           echo "delete success";
           header ("Location: peminjaman.php");
        } else {
            echo "failed to delete";
        }
    }else {
        mysqli_error($conn);
    }
?>