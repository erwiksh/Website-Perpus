<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah peminjaman</title>
    <link rel="stylesheet" type="text/css" href="../css/tambahbuku.css">
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <div class="form-singup">
                <h1>Tambah Peminjaman</h1>
                <!-- <div class="inputBox">
                    <input type="number" required="required" name="id_peminjaman">
                    <span>ID Peminjaman</span>
                </div> -->
                <div class="inputBox">
                    <input type="text" required="required" name="siswa">
                    <span>Nama Peminjam</span>
                </div>

                <div class="inputBox">

                    <label> Judul</label>

                    <select required="required" name="id_buku">
                        <?php   
                            include "koneksi.php";
                            $datas= mysqli_query($koneksi, "SELECT * FROM buku") or die (mysqli_error($koneksi));
                            while($data=mysqli_fetch_array($datas))
                            {
                                echo "<option value= $data[id_buku]> $data[judul] </option>";
                            }
                        ?>
                    </select>

                </div>

                <div class="inputBox">
                    <label>Tanggal Pinjam</label>
                    <input type="date" required="required" name="tpinjam">
                </div>
                <div class="inputBox">
                    <label>Tanggal Kembali</label>
                    <input type="date" required="required" name="tkembali">
                </div>
                <!-- <div class="inputBox">
                    <input type="number" required="required" name="id_buku">
                    <span>ID buku</span>
                </div> -->
                <div class="inputBox">
                    <input type="submit" name="submit" value="simpan">
                </div>
    
                <p>
                    <a href="peminjaman.php" class="login">Kembali</a>
                </p>
            </div>
        </form>     
        <?php
        include('koneksi.php');

        if (isset($_POST['submit'])) {
            // $id_peminjaman = $_POST['id_peminjaman'];
            $siswa = $_POST['siswa'];
            $judul = $_POST['id_buku'];
            $tpinjam = $_POST['tpinjam'];
            $tkembali = $_POST['tkembali'];
            $id_buku = $_POST['id_buku'];

            $datas = mysqli_query($koneksi, "insert into peminjaman (siswa, judul, tpinjam, tkembali, id_buku) values ('$siswa', '$judul', '$tpinjam', '$tkembali', '$id_buku')") or die(mysqli_error($koneksi));
                        echo "<script>alert('data berhasil disimpan.');window.location='peminjaman.php';</script>";
                    }
        ?>
    </div>
</body>
</html>