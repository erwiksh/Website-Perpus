<!-- INI ADALAH URL
    http://localhost/website%2012/phplatihan/GET2.php?nama=Erwiyana&umur=16%20&jurusan=sistem%20informasi 
-->

<!-- URL seperti kode diatas HANYA BISA DIGUNAKAN OLEH METODE GET -->
<!-- sedangkan FORM bisa digunakan untuk post || get -->
<!-- saat post digunakan : kita mengirimkan data, data nya ga kelihatan(ga ada di url) -->

<!-- SAYA INGIN MENGIRIMKAN DATA NAMA KE SEBUAH HALAMAN JADI SAYA MENGGUNAKAN TAG FORM -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>post</title>
</head>
<body>
    <form action=POST2"" method="post">
        Menggunakan action="POST2" dan method="post" 
        <br>
        Enter your name
        <br>
        <input name="input" type="text">
        <button type="submit" name="button">send</button>
    </form>
    <!-- apabila action tidak di isi mereka akan mengirimkan datanya ke halaman POST.php sendiri sedangkan apabila method tidak di isi secara default -->
    <!-- jika menggunkan -->
    <br>
    <?php
        if(isset($_GET["button"])){
        ?>
        hai welcome <?= $_GET["input"];?><br> 
    <?php } ?>
      <form action="" method="get">
        Menggunakan action="" method="" <br>
        Enter your name <br>
        <input name="input" type="text">
        <button type="submit" name="button">send</button>
    <!-- maka outputannya hai welcome anka(nama yang diinputkan) 
    Enter your name (kolom) -->

    <?php
    //cek apakaha tombol button sudah di klik
    if(isset($_POST["submit"])){
        // cek password & username 
        if($_POST["username"] == "admin" && ["password"] == "123"){
        //jika benar,direct POST2.PHP
          header("Location: POST2.php");
    }else{
        //jika salah, tampilkan pesan warning
        echo "username // password incorrect";
    }
    }
    ?>
    <h1>login</h1>
    <ul>
        <form action= "POST2" method="post">
            <li>username =
                <input name="username" type="text">
            </li>
            <li>password =
                <input name="password" type="password">
            </li><br>
            <button type="button" name="button">kirim</button>
        </form>
    </ul>
</body>
</html>