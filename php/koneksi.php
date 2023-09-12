<?php

$server="localhost";
$username="root";
$password="";
$db="perpus";
$conn=mysqli_connect($server,$username,$password,$db);

// Perintah di bawah ini untuk mengecek kembali apabila koneksi gagal ke database
if (mysqli_connect_error()){
    echo "Koneksi gagal: " . mysqli_connect_error();
}
