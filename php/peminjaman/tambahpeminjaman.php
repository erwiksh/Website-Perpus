<?php
include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <div class="card m-5 me-5">
        <div class="card-header bg-primary text-white">
            <h4>Tambah Peminjaman</h4>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <ul>
                    <li class="list-group-item">
                        <div class="form-group mb-3">
                            Nama Siswa
                            <select class="form-select" name="siswa">
                                <option value="" selecteed require>Pilih Nama</option>
                                <?php
                                $query_nama="SELECT * FROM pengunjung";
                                $result_nama=mysqli_query($conn,$query_nama);
                                while($row_nama =mysqli_fetch_assoc($result_nama)){
                                    echo '<option value="'.$row_nama['id_pengunjung'].'">' .$row_nama['nama_siswa'].'<option>';
                                }
                                ?>

                            </select>
                        </div>
                    </li>
                    <li class="list-group-item">
                      <div class="form-group mb-3">
                        Judul Buku
                        <select class="form-select" name="judul">
                            <option value="" selected require>Pilih Buku</option>
                            <?php
                            $query_buku = "SELECT * FROM buku";
                            $result_buku = mysqli_query($conn, $query_buku);
                            while ($row_buku = mysqli_fetch_assoc($result_buku)) {
                                echo '<option value="' . $row_buku['id_buku'] . '">' . $row_buku['judul'] . '</option>';
                            }
                            ?>
                        </select>
                          </div>
                    </li>
                    <li class="list-group-item">
                        <div class="form-group mb-3">
                            Tanggal Pinjam<input type="date" class="form-control" placeholder="Tanggal Pinjam" aria-label="Example text with button addon" aria-describedby="button-addon1" name="tpinjam" require>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="form-group mb-3">
                            Tanggal Kembali<input type="date" class="form-control" placeholder="Tanggal Kembali" aria-label="Example text with button addon" aria-describedby="button-addon1" name="tkembali">
                        </div>
                    </li>
                    <li class="list-group-item">
                    <div class="form-group mb-3">
                        Kelas
                        <select class="form-select" name="kelas">
                            <option value="" selected>Pilih Kelas</option>
                            <?php
                            $query_kelas = "SELECT * FROM kelas";
                            $result_kelas = mysqli_query($conn, $query_kelas);
                            while ($row_kelas = mysqli_fetch_assoc($result_kelas)) {
                                echo '<option value="' . $row_kelas['id_kelas'] . '">' . $row_kelas['nama_kelas'] . '</option>';
                            }
                            ?>
                        </select>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                            <a href="peminjaman.php" class="m-3"><button type="button" class="btn btn-primary" name="kembali">Kembali</button></a>
                        </div>
                    </li>
                </ul>
            </form>
            <?php
            if (isset($_POST['simpan'])) {
                $siswa = $_POST['siswa'];
                $judul = $_POST['judul'];
                $tpinjam = $_POST['tpinjam'];
                $tkembali = $_POST['tkembali'];
                $kelas = $_POST['kelas'];

                // Insert data ke tabel peminjaman
                $add = "INSERT INTO peminjaman (id_pengunjung, tpinjam, tkembali, id_kelas, id_buku) VALUES ('$siswa', '$tpinjam', '$tkembali', '$kelas', '$judul')";
                $query = mysqli_query($conn, $add);
                if ($query) {
                    echo "Data berhasil ditambahkan";
                    header("Location: peminjaman.php");
                    exit();
                } else {
                    echo "Gagal menambahkan data" . mysqli_error($conn);
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
