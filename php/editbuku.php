<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Peminjaman</title>
     <link rel="stylesheet" type="text/css" href="../css/tambahbuku.css">
</head>
<body>
    <div class="div-index">
        <?php
		    include('koneksi.php');

            $id_buku = $_GET['id_buku']; 

				
			$datas = mysqli_query($koneksi, "select * from buku where id_buku = '$id_buku '");
			$row = mysqli_fetch_assoc($datas);

		?>
        <form action="" method="post" role="form">
            <div class="parallax">
                <div class="home">
                    <div class="container">
                        <div class="form-singup">
                                <h1>Edit Buku</h1>
                                <div class="inputBox">
                                    <input type="hidden" name="id_buku" value="<?= $row['id_buku']; ?>">
                                    <input type="text" required="required" name="judul" value="<?= $row['judul']; ?>">
                                    <span>Judul Buku</span>
                                </div>
                                <div class="inputBox">
                                    <input type="text" required="required" name="penulis" value="<?= $row['penulis']; ?>">
                                    <span>Penulis</span>
                                </div>
                                <div class="inputBox">
                                    <input type="text" required="required" name="penerbit" value="<?= $row['penerbit']; ?>">
                                    <span>Penerbit</span>
                                </div>
                                <div class="inputBox">
                                    <input type="number" required="required" name="tahun" value="<?= $row['tahun']; ?>">
                                    <span>Tahun Terbit</span>
                                </div>
                                <div class="inputBox">
                                    <input type="number" required="required" name="stok" value="<?= $row['stok']; ?>">
                                    <span>Stok</span>
                                </div>
                                <div class="inputBox">
                                    <input type="submit"  name="submit" value="update">
                                </div>
                                <p>
                                    <a href="daftarbuku.php" class="login">Kembali</a>
                                </p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
		<?php           
        if (isset($_POST['submit'])) {
            $id_buku = $_POST['id_buku'];
            $judul = $_POST['judul'];
            $penulis = $_POST['penulis'];
            $penerbit = $_POST['penerbit'];
            $tahun = $_POST['tahun'];
            $stok = $_POST['stok'];

            
            mysqli_query($koneksi, "update buku set id_buku='$id_buku', judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun='$tahun', stok='$stok' where id_buku ='$id_buku'") or die(mysqli_error($koneksi));

            
            echo "<script>alert('data berhasil diupdate.');window.location='daftarbuku.php';</script>";
        }
        ?>
    </div>  
</body>
</html>