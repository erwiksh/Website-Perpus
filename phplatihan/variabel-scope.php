<?php
//variabel scope/cakupan,lingkungan variabel
$x = 10; //variabel lokal untuk seluruh halaman
echo "INI OUTPUT VARIABEL BIASA<br>" . $x;

//variabel di dalam function
function tampil(){
    $x = 20; //variabel lokal hanya untuk di bagian function ini saja, jadi tak bisa digunakan di luar "}"
    echo "<p>INI OUTPUT FANCTION<br>" . $x;
    //variabel $y harus berada di dalam function apabila tidak menggunakan variabel global
};

tampil();

//variabel global
function tampilglobal(){
    global $x;
    echo "<p>INI MENGGUNAKAN VARIABEL GLOBAL <br>" . $x . "<br>";
    //menggunakan variabel "global $nama-variabel" untuk memeriksa apakah di luar function ada variabel $x
    //maka yang ditampilkan adalah "10" berdasarkan "$x = 10;"
}

tampilglobal();

//variabel superglobals
//variabel superglobals adalah variabel yang sudah ada di dalam php misalnya "$_GET,$_POST" dan bisa diakses dimana pun dan kapan pun
//semua variabel superglobals menggunakan array assosiative

echo "<p>ARRAY SUPERGLOBALS<br>";
var_dump($_SERVER);
echo "<p>menggunakan detail data<br>". $_SERVER["SERVER_ADMIN"];

?>