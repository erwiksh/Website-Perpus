<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah buku</title>
    <link rel="stylesheet" type="text/css" href="../css/tambahbuku.css">
</head>
<body>
    <div class="container">
        <form action="" method="post" role="form">
            <div class="form-singup">
                <h1>Tambah Buku</h1>
                <div class="inputBox">
                    <input type="number" required="required" name="id_buku">
                    <span>Kode Buku</span>
                </div>
                <div class="inputBox">
                    <input type="text" required="required" name="judul">
                    <span>Judul Buku</span>
                </div>
                <div class="inputBox">
                    <input type="text" required="required" name="penulis">
                    <span>Penulis</span>
                </div>
                <div class="inputBox">
                    <input type="text" required="required" name="penerbit">
                    <span>Penerbit</span>
                </div>
                <div class="inputBox">
                    <input type="number" required="required" name="tahun">
                    <span>Tahun Terbit</span>
                </div>
                <div class="inputBox">
                    <input type="number" required="required" name="stok">
                    <span>Stok</span>
                </div>
                <div class="inputBox">
                    <input type="submit"  name="submit" value="simpan">
                </div>
                <p>
                    <a href="daftarbuku.html" class="login">Kembali</a>
                </p>
            </div>
        </form>
        <?php
				include('koneksi.php');
				
				if (isset($_POST['submit'])) {
					$id_buku = $_POST['id_buku'];
					$judul = $_POST['judul'];
					$penulis = $_POST['penulis'];
					$penerbit = $_POST['penerbit'];
					$tahun = $_POST['tahun'];
					$stok = $_POST['stok'];

					$datas = mysqli_query($koneksi, "insert into buku (id_buku, judul, penulis, penerbit, tahun, stok) values('$id_buku','$judul', '$penulis', '$penerbit', '$tahun', '$stok')") or die(mysqli_error($koneksi));
					echo "<script>alert('data berhasil disimpan.');window.location='daftarbuku.php';</script>";
				}
        ?>
    </div>
</body>
</html>