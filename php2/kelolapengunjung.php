<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah pengunjung</title>
    <link rel="stylesheet" type="text/css" href="../css/tambahbuku.css">
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <div class="form-singup">
                <h1>Tambah Peminjaman</h1>
                <div class="inputBox">
                    <input type="text" required="required" name="nama_siswa">
                    <span>Nama</span>
                </div>
                <div class="inputBox">
                    <input type="text" required="required" name="kelas">
                    <span>kelas</span>
                </div>
                <div class="inputBox">
                    <input type="text" required="required" name="judul">
                    <span>judul</span>
                </div>
                <div class="inputBox">
                    <input type="submit" name="submit" value="simpan">
                </div>
    
                <p>
                    <a href="pengunjung.php" class="login">Kembali</a>
                </p>
            </div>
        </form>     
    </div>
</body>
</html>