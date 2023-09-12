fungsi yang banyak di pakai 

<ol>
    <li>date/time</li>
        <ul>
            <li>time()</li>
            <li>date()</li>
            <li>mktime()</li>
        </ul>
    <li>string</li>
        <ul>
            <li>strlen</li>
            <li>strcmp</li>
            <li>explode</li>
            <li>htmlspecialchars</li>
        </ul>
    <li>utility/fungsi bantuan</li>
        <ul>
            <li>var_dump = mencetak isi dari variabel, array</li>
            <li>isset = mengecek apakah sebuah variabel sudah bibikin atau belum jadi ini isinya seperti boolean:true or false</li>
            <li>empty = mengecek apakah variabel ada isinya atau tidak</li>
            <li>die =  untuk mematikkan program kita</li>
            <li>sleep = untuk program akan berhenti dalam beberapa detik yang sudah ditentukkan  </li>
        </ul>
</ol>


<?php
    echo "<P>DATE<BR>";
    echo date("l, d-M-Y");
    //fungsi date dengan 
    //paramenter "l" digunakan untuk menampilkan hari sekarang 
    //paramenter "M" digunakan untuk menampilkan bulan sekarang jika "m" kecil ini akan menampikan angka bulan tersebut misal februari itu bulan ke 2 maka yang akan tampil 02
    //paramenter "d" digunakan untuk menampilkan tanggal sekarang

    //untuk melihat ("l, d-M-Y"); ini buka php.net ini website buat liat dokumentasi an php //
?>

<?php
     echo "<P>TIME<BR>";
     echo time();
     // ini namanya unix time atau EPOCH time
     //TIME <br> 1686013453 ini maksudnya hitungan detik setelah tanggal 1 januari 1970 
     // tanggal 1 januari 1970  ini adalah waktu yang disepakati waktu awal yang digunakan dalam dunia komputer
?>

<?php
     echo "<P>DATE DAN TIME<BR>";
     echo date("l, d-M-Y",time()+60*60*24*362);
     echo "<br>" . date("l, d-M-Y",time()-60*60*24*362);
    //jadi kita bisa melihat tanggal hari tahun dan bulan setelah hari ini dengan ditambahkan parlementer time
    // "+60*60*24*362" ini artinya ditambah 60 detik * 60 menit *24 jam * 362 hari lagi setelah hari ini.
    //"-60*60*24*362" untuk menghitung 362 hari yang lalu
?>

<?php
     echo "<P>MKTIME<BR>";
     echo date("l, d-M-Y",mktime(0,0,0,12,1,2006));
     //mktime = membuat sendiri detik 
     // "(0,0,0,12,1,2006)" artinya ini jam,menit,detik,bulan,tanggal,tahun
?>

<?php
     echo "<P>STRTOTIME<BR>";
     echo date("l, d-M-Y",strtotime("12 desember 2006"));
    // strtotime ini sama dengan mktime cuman strtotime ini menggunakan string untuk menyatakan waktunya
?>

<!-- funtion dengan nama yang kita buat sendiri -->
<?php
    function salam($nama = "erwiyana",$waktu = "1126"){
        return "Selamat $nama , $waktu";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>
        <h7>FUNCTION "SALAM"</h7>
        <h7><br><?php echo salam("erwiyana","12");?></h7>
        <h7><br><?php echo salam("dercixz")?></h7>
        <h7><br><?php echo salam()?></h7>
        <!-- jadi di dalam function ini variabel nama dan waktu mereka memiliki nilai '$nama = "erwiyana",$waktu = "1126"' jadi apabila di dalam "echo salam()" tidak menambahkan argumen/perementernya maka akan dimasukkkan nilai yang ada di inputan awalnya "function salam($nama = "erwiyana",$waktu = "1126")"-->
    </p>
</body>
</html>

