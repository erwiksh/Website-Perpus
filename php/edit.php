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
        <div class="parallax">
				<?php
				include('koneksi.php');

				$id = $_GET['id']; 

				
				$datas = mysqli_query($koneksi, "select * from peminjaman where id_peminjaman = '$id'");
				$row = mysqli_fetch_assoc($datas);

				?>
                <form action="" method="post" role="form">
                    <div class="home">
                        <div class="container">
                            <div class="form-singup">
                                    <h1>Edit Peminjaman</h1>
                                    <div class="inputBox">
                                        <input type="hidden" name="id_peminjaman" value="<?= $row['id_peminjaman']; ?>">
	                					<input type="text" name="siswa" required="" value="<?= $row['siswa']; ?>">
                                        <span>Nama Peminjam</span>
					                </div>
                                    <div class="inputBox">
                                        <label>judul</label>
                                        <input type="text" name="judul" required="" value="<?= $row['judul']; ?>">
                                    </div>

                                    <div class="inputBox">
                                        <label>tpinjam</label>
                                        <input type="date" name="tpinjam" required="" value="<?= $row['tpinjam']; ?>">
                                    </div>
                                    <div class="inputBox">
                                        <label>Tkembali</label>
                                        <input type="date" name="tkembali" required="" value="<?= $row['tkembali']; ?>">
                                    </div>
                                    <div class="inputBox">
                                        <input type="submit"  name="submit" value="update">
                                    </div>                               
                                    <p>
                                        <a href="peminjaman.php" class="login">Kembali</a>
                                    </p>
                                </form>

                                <?php

                                
                                if (isset($_POST['submit'])) {
                                    $id_peminjaman = $_POST['id_peminjaman'];
                                    $siswa = $_POST['siswa'];
                                    $tpinjam = $_POST['tpinjam'];
                                    $tkembali = $_POST['tkembali'];
                                    
                                    mysqli_query($koneksi, "update peminjaman  	set id_peminjaman='$id_peminjaman', siswa='$siswa', tpinjam='$tpinjam', tkembali='$tkembali' where id_peminjaman ='$id_peminjaman'") or die(mysqli_error($koneksi));

                                    
                                    echo "<script>alert('data berhasil diupdate.');window.location='peminjaman.php';</script>";
                                }

                                ?>
                                
                            </div>
                        </div>
                    </div>
    </body>
</html>