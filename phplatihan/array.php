<?php
//array = tipe data yang bisa menampung banyak data.
//seperti variabel namun variabel hanya bisa menampung satu data sedangkan, array banyak data.
//array dimulai dari angka o untuk setiap indexnya

//variabel
echo "Variabel<br>";
$nama = "erwiyana";
echo $nama;

//array--
//cara lama
$data = array("sistem informasi","erwiyana",2025,"perempuan",true);

//cara baru
$data = ["sistem informasi","erwiyana",2025,"perempuan",true];

//menampilkan array

//menggunakan var_dump
echo "<p> mengguanakan var_dump <br>";
var_dump($data);
echo "<br>";

//menggunakan print_r
echo "<p>menggunakan print_r<br>";
print_r($data);

//menampilkan satu elemen
echo "<p> Menampilkan satu elemen <br>";
echo $data[1];
//[1] ini adalh indek ke 1 'penguhitungan dari angka 0 jadi 1 adalah data ke 2' dalam variabel $data

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>array</title>
    <style>
        .kotak{
        padding:12px;
        background-color: salmon;
        width: 20px;
        height: 20px;
        float:left;
        }
        .clear{
        padding:12px;
        background-color: blue;
        width: 20px;
        height: 20px;
        float:left;
        }
    </style>
</head>
<body>
        
    <!-- penggulangan pada array -->
    <?php 
    $angka = [0,1,2,3,4,5,6];
    ?>

    <br> FOR <br>
    <?php
    for($i = 0;$i < 5;$i++)
    {;
    // $i<5 angka 5 ini manual agar tidak manual gunakan function count($namavariabel)
    ?>
         <div class="kotak"><?= $angka[$i];?></div>
    <?php
    } 
    ?>
    <br>

    <br>
    <p> FOREACH </p>
    <?php
    foreach($angka as $a)
    {;
    ?>
        <div class="clear"><?= $a ?></div>
    <?php } ?>
    <br>

    <!-- nilai string -->
    <br>
    <?php
    // ARRAY NUMERIK
    $siswa =
    [
        ["erwiyana",16,"sistem informasi"],
        ["yulianti",16,"business management"],
        ["siska safira",16,"PGSD"],
        ["susanti",16,"hukum"]
     ];
    ?>

    <p>MENGGUNAKAN FOREACH
    <?php
    foreach($siswa as $s){ ?>
        <ul>
            <?php
            foreach($s as $r){
            ?>
            <li><?= $r;?></li>
            <?php } ?>
        </ul>
    <?php
    }
    ?>
    </p>
    <br>

    <!-- array didalam array -->
    TANPA MENGGUNAKAN FOREACH
    <ul>
        <li><?= $siswa[0][0]?></li>
        <li><?= $siswa[1][0]?></li>
    </ul>
    DENGAN FOREACH
    <?PHP foreach($siswa as $s){?>
    <ul>
        <li>Nama :<?=$s[0];?></li>
        <li>Umur :<?=$s[1];?></li>
        <li>Jurusan :<?=$s[2];?></li>
    </ul>
    <?php }
    ?>
    <BR>

    <!-- ARRAY ASSOSIATIVE -->
    TANPA MENGGUNAKAN FOREACH
    <?php
    $SISWA = [
        [
        "nama"=>"erwiyana",
        "umur"=>16,
        "jurusan"=>"sistem informasi",
        "nilai"=>[90,95,100]
        ],
        ["nama"=>"yulianti",
        "umur"=>16,
        "jurusan"=>"business management"
        ],
    ];
    echo "<br>" . $SISWA[0]["nilai"][2] . "<br>";
    //[0] ini adalah nilai index luar karena pada dasarnya array itu numerik dari 0 maka penghitunggannya dimulai dari 0 pada kasus ini saya ingin menampilkan array pertama jadi saya memasukkan nilai [0]
    //di array asosiative "nama" adalah nama untuk nilai "erwiyana dan yulianti"
    //[2] ini adalah nilai array di dalam nilai array dengan nama "nilai" pada bagian pertama,saya ingin mengambil nilai 100 jadi saya menuliskan [2];
    ?><BR>

    DENGAN MENGGUNKAN FOREACH
    <?php
    foreach($SISWA as $swa){
    ?>
        <ul>
            <li>nama= <?=$swa["nama"]?></li>
        </ul>
    <?php
    }
    ?>

    <?php 
    foreach($SISWA as $as){
    ?>
        <ul>
            <?php
            foreach($as as $wa){
            ?>
                <li><?= $wa ?></li>
            <?php } ?>
        </ul>
    <?php
    }?>

</body>
</html>
