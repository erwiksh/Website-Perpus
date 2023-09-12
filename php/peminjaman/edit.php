<?php
include '../koneksi.php';
$id = $_GET['id'];
$query = "SELECT peminjaman.*,pengunjung.nama_siswa AS siswa, buku.judul, kelas.nama_kelas FROM peminjaman JOIN pengunjung ON peminjaman.id_pengunjung = pengunjung.id_pengunjung JOIN buku ON peminjaman.id_buku = buku.id_buku JOIN kelas ON peminjaman.id_kelas = kelas.id_kelas WHERE peminjaman.id_peminjaman = '$id'";
$result = mysqli_query($conn, $query);
$cek = mysqli_num_rows($result);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($result);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <div class="card m-5 me-5">
        <div class="card-header bg-primary text-white">
            <h4>Edit Peminjaman</h4>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <ul>
                    <li class="list-group-item">
                        <div class="form-group mb-3">
                            Nama Siswa
                            <select class="form-select" name="siswa">
                                <option value="<?= $data['id_pengunjung']; ?>" selected><?= $data['siswa']; ?></option>
                                <?php
                                $query_pengunjung = "SELECT * FROM pengunjung";
                                $result_pengunjung = mysqli_query($conn, $query_pengunjung);
                                while ($row_pengunjung = mysqli_fetch_assoc($result_pengunjung)) {
                                    echo '<option value="' . $row_pengunjung['id_pengunjung'] . '">' . $row_pengunjung['nama_siswa'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="form-group mb-3">
                            Judul Buku
                            <select class="form-select" name="judul">
                                <option value="<?= $data['id_buku']; ?>" selected><?= $data['judul']; ?></option>
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
                            Tanggal Pinjam<input type="text" class="form-control" placeholder="Tanggal Pinjam" aria-label="Example text with button addon" aria-describedby="button-addon1" name="tpinjam" value="<?= $data['tpinjam']; ?>">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="form-group mb-3">
                            Tanggal Kembali<input type="text" class="form-control" placeholder="Tanggal Kembali" aria-label="Example text with button addon" aria-describedby="button-addon1" name="tkembali" value="<?= $data['tkembali']; ?>">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="form-group mb-3">
                            Kelas
                            <select class="form-select" name="kelas">
                                <option value="<?= $data['id_kelas']; ?>" selected><?= $data['nama_kelas']; ?></option>
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
                            <button type="submit" class="btn btn-success" name="update">Update</button>
                            <a href="peminjaman.php" class="btn btn-primary">Kembali</a>
                        </div>
                    </li>
                </ul>
            </form>
            <?php
            if (isset($_POST['update'])) {
                $siswa = $_POST['siswa'];
                $judul = $_POST['judul'];
                $tpinjam = $_POST['tpinjam'];
                $tkembali = $_POST['tkembali'];
                $kelas = $_POST['kelas'];
                $update = "UPDATE peminjaman SET id_pengunjung = '$siswa', tpinjam = '$tpinjam', tkembali = '$tkembali', id_kelas = '$kelas', id_buku = '$judul' WHERE id_peminjaman = '$id'";
                $q = mysqli_query($conn, $update);
                if ($q) {
                    header("Location: peminjaman.php");
                    exit();
                } else {
                    echo "error" . mysqli_error($conn);
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
