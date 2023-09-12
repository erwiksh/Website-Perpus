<!-- <a href="nama_halaman.php?nama_key=nama_value"</a> -->

<!-- cara bacanya:
? => saya akan memasukkan data ke variabel $_GET
nama_key => untuk memberi nama pada suatu nilai agar data nya bisa di proses di sisi server
nama_value => data data yang dimasukkan -->

<!-- 
                     PERHATIAN!!
METODE GET DAN VARIABEL SUPERGLOBALS $_GET IS DIFFERENT
        METODE GET DU GUNAKAN UNTUK MENGIRIM DATA
sedangkan
    VARIABEL $_GET DIGUNAKAN UNTUK MENGAMBIIL DATA
 -->

<?php
$siswa = [
    ["nama" =>"Erwiyana","umur"=>16, "jurusan"=> "sistem informasi"],
    ["nama"=>"Yulianti","umur"=>16, "jurusan"=> "business management"],
    ["nama" => "Siska", "umur"=> 17, "jurusan"=> "PGSD"]
]
// menggunakan 2 tipe yaitu tipe array numerik dan array assosiative dalam satu array
// array 1&2 ini numerik
// array 3 assosiative jadi untuk foreachnya yang numerik akan kosong apabila hanya menggunakan "?=$s["jurusan"]"
// begitupun sebaliknya jadi penggunakan tanda "??" ini akan membantu untuk menampilkan kedua nilai dari dua tipe array yang digunakan
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET & POST</title>
</head>
<body>
<ul>
   <?php foreach($siswa as $s){ ?>
    
        <li><a href="GET2.php?nama=<?= $s["nama"] ;?>&umur=<?= $s["umur"] ;?> &jurusan=<?= $s["jurusan"] ;?>"><?= $s["nama"]?></a></li>
    
    <!--
        dikarenakan menggunakan 2 tipe array dalam satu array untuk menampilkan outpunya adalah 
        "?=$s["umur"] ?? $s[1]; ?"
        "=" tanda ini untuk menggantikan php echo
        dengan $s sebagain as untuk penggulangannya dan ["umur"] sebagai nama dari valuenya 
        "??" ini adlah tanda untuk menggantikan value, apabila value dengan nama kosong akan di gantikan dengan value [0]
-->

    <?php }  ?>
</ul>    
</body>
</html>