<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = '';
    $conn = mysqli_connect($host,$user,$pass,$db);

    if($conn){
       // echo "hai";
    }

    mysqli_select_db($conn,$db);
?>