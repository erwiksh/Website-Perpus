<?php 

//sintaks dasar
// echo,print
//print_r
//var_dump
echo "penggunaan print dan echo untuk menampikan dispaly kelayar <br>";
print "saya";


//penulisan
// 1. php bisa ditulis didalam html
// 2. html  bisa ditulis di dalam php

// variabel dan tipe data
// variabel
// variabel tidak boleh di awali dengan angka tapi boleh ada angka

//operator arimatika 
// + - % * /
// tanda % untuk hasil sisa pembagiannya

//perbandingan
// <,>,<=,>=,==
// menggunkan var_dump
// untuk mengecek nilainya true or not

//identitas
//=== , !===
// perbedaan dengan yang diatas "==" ini hanya memeriksa nilai nya saja jadi misal var_dump(1 == "1"); outputnya true. mereka memiliki perbedaan tipe data jika menggunakan "===" ini akan meriksa apakah nilai dan tipe datanya sama vae_dump(1 === "1"); outputnya false

//logika
// &&, || ,!
// && dan . ini akan menghasilkan outputan true apabila kedua sisi bernilai true misal var_dump($x < 12 && $x % 2 == 0); nilai $x = 10, jadi bacany nilai x lebih kecil dari 12 true dan apakah nilai genap true maka true yang akan di tampilkan namun apabila salah satu dari kedua sisi yang berada di && false salah satu saja maka akan menampikan false.
// || atau . ini akan menghasilkan nilai true apabila salah satu sisinya bernilai true walaupun tidak kedua sisi menghasilkan nilai true
// ! ini digunakan untuk membalikkan nilai misalnya var_dump($x < 12 && $x % 2 == 0);  ini kan true . maka outrputannya akan false dengan memberikan sintaks var_dump(!($x < 12 && $x % 2 == 0));
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasar PHP</title>
</head>
<body>

    <!-- penulisan -->

    <!-- php didalam html -->
    <p> penulisan php didalam html <br> halo <?php echo "erwiyana <br>";?></p>
    <!-- html didalam php -->
    <?php echo "penulisan html didalam php <br> hallo <br>"; ?>

    <!-- variabel -->
    <?php
    $nama12 = "dercixz";
    echo "<p> penggunaan variabel <br> nama saya $nama12"; 
    ?>

    <!-- operator arimatika -->
    <?php 
    // pembagian
    $x = 80000;                       ;
    $y = 200;
    echo $x / $y ;
    
    // perkalian
    echo "<p> hasil perkalian <br>" . $x * $y ;

    //hasil sisa pembagian
    echo "<br> hasil pembagian <br>"  . $x % $y;

    //pengurangan
    echo "<br> hasil pengurangan <br>" . $x - $y;
    ?>

    <!-- pengabungan string -->
    <!-- menggunakan .  -->
    <?php
    $nama_x = "erwiyana" ;
    $nama_y =  "dercixz" ;
    
    echo "<p>pengabungan string menggunakan tanda . <br>". $nama_x ." ".  $nama_y . "<br>" ;


    // assignment
    // = , += , -=, /=, %=, .=
    $nama = "erwiyana";
    $nama .= " ";
    $nama .= "dercixz";
    // contoh lain
    $x = 6;
    $x %= 3;
    $y = 12;
    $y .= 2;
    
    echo "<p> assignment <br>". $nama . "<br>" . $x . $y;
    ?>                                  

    <!-- perbandingan -->
    <?php
    echo "<p>hasil var_dump perbandingan<br>";
    var_dump (1 < 12);
    ?>

    <!-- identitas -->
    <?php
    echo "<p>hasil var_dump identitas<br>";
    var_dump (12 !== 12); 
    var_dump ( 12 === "12");
    var_dump ( 12 === 12);
    ?>

    <!-- logika -->
    <?php
    $x = 12 ;
    var_dump($x < 16 && $x % 2 == 0);
    var_dump(!($x < 10 && $x % 2 == 0));
    ?>



</body>
</html>

