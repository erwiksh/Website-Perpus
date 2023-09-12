<?php
require 'koneksi.php';
$id = $_GET["id"];
if(hapus($id) > 0){
    echo "data success to delete";
    header ("Location: index.php");
} else {
    echo "data failed to delete" .mysqli_error($conn);
}
?>