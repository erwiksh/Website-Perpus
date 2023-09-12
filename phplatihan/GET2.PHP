<!-- 
    function isset 
-->
<?php
//cek apakah tidak ada data di $_GET
    if(!isset($_GET["nama"])){
        //redirect
        header("Location: GET.php");
    };
    exit;
//cara bacanya : apakah $_GET dengan nama "nama" sudah pernah di buat apa belum
//jadi isset digunakan untuk mengecek apakah nilai nama itu sudah dibuat apa tidak

//apabila GET.PHP langsung di ketik tanpa link dari GET&POST.php dia akan error
// apabila tidak mengunakan link dari "?nama= key_value" atau langsung ke halaman (pada kasus ini saya akan mengarahkan link ke halaman GET.php)
// jika langsung masuk ke halaman ini tanpa mengklik link maka outputannya akan seperti ini
// Nama =
// Warning: Undefined array key "nama" in C:\xampp8080\htdocs\Website 12\phplatihan\GET.PHP on line 10
// Umur =
// Warning: Undefined array key "umur" in C:\xampp8080\htdocs\Website 12\phplatihan\GET.PHP on line 12
// jurusan =
// Warning: Undefined array key "jurusan" in C:\xampp8080\htdocs\Website 12\phplatihan\GET.PHP on line 13
// agar ini tidak terjadi maka akan di tambah function (isset)
//tanda ! sebelum iset menyatakan belum di bikin, jadi bacanya: !isset($_GET["nama"]) apakah $_GET["nama"] belum dibikin.
//jika belum dibikin apa yang akan di lakukan {....}

//dan fungsi exit digunakan untuk mengakhiri perintah agar tidak mengexsekusi kode setelahnya(kode di bawah ini)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET & POST LATIHAN NYATA</title>
</head>
<body>
    <ul>
        <li>Nama = <?= $_GET["nama"];?></li>
        <!-- variabel global $_GET -->
        <li>Umur = <?= $_GET["umur"];?></li>
        <li>jurusan = <?= $_GET["jurusan"]; ?></li>
    </ul>
</body>
</html>