<?php
require '../koneksi.php';

$sql = "SELECT pengunjung.*, buku.judul, kelas.nama_kelas AS kelas FROM pengunjung JOIN buku ON pengunjung.id_buku = buku.id_buku JOIN kelas ON pengunjung.id_kelas = kelas.id_kelas"; 
$query = mysqli_query($conn,$sql);
if(!$query){
  mysqli_error($conn);
  die;
}
$cek = mysqli_num_rows($query);

//konfigurasi pagination
$jumlahDataPerhalaman = 3;
$jumlahData = $cek;
$jumlahHalaman = ceil($jumlahData/$jumlahDataPerhalaman);

//menentukan halaman aktif
$halamanAktif = (isset($_GET['halaman']) ? $_GET['halaman'] : 1);
// awal data=0-2
//awal datnya = 3-5
$awalData = ($halamanAktif * $jumlahDataPerhalaman) - $jumlahDataPerhalaman;



// Query data dengan LIMIT sesuai halaman aktif
if (isset($_GET['cari'])) {
  $search = $_GET['cari'];
  $sql = "SELECT pengunjung.*,buku.judul AS judul, kelas.nama_kelas AS kelas FROM pengunjung JOIN buku ON pengunjung.id_buku = buku.id_buku JOIN kelas ON pengunjung.id_kelas = kelas.id_kelas WHERE judul LIKE '%$search%' OR nama_kelas LIKE '%$search%' OR waktu LIKE '%$search%' LIMIT $awalData, $jumlahDataPerHalaman";
} else {
  $sql = "SELECT pengunjung.*,buku.judul AS judul, kelas.nama_kelas AS kelas FROM pengunjung JOIN buku ON pengunjung.id_buku = buku.id_buku JOIN kelas ON pengunjung.id_kelas = kelas.id_kelas";
}

$perintah = mysqli_query($conn, $sql);
if (!$perintah) {
  die("Error executing query: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengunjung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

    <!-- BAGIAN NAV BAR  -->
      <nav class="navbar navbar-expand-lg bg-body-tertiary p-3">
        <div class="container-fluid">
          <a class="navbar-brand" href="https://smkn1tanjungpandan.sch.id/">
          <img src="https://smkn1tanjungpandan.sch.id/wp-content/uploads/2022/10/logo-smk-1.png" alt="logo smkn1tp" class="rounded float-start" style = "width: 50px; height: 50px"></img>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../buku/daftarbuku.php">Daftar Buku</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../peminjaman/peminjaman.php">Peminjaman</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../pengunjung/pengunjung.php">Pengunjung</a>
              </li>
            </ul>

           <!-- SEARCH -->
            <form class="d-flex" role="search" method="POST" action="">
              <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="cari">
              <button class="btn btn-outline-success" type="submit" name="cari"><i class="bi bi-search"></i></button>
            </form>

          </div>
        </div>
      </nav>

      <div class="card m-5">
        <div class="card-header bg-primary text-white"">
            <h4>Daftar Pengunjung</h4>
        </div>
            <div class="card-body">
                <a href="tambahpengunjung.php" type="button" class="btn btn-success mb-3"><i class="bi bi-plus-square"> Add</i></a>
                <table class="table table-bordered table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Judul</th>
                            <th>Waktu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      if ($cek > 0) {
                        $no = $awalData + 1;
                        while ($data = mysqli_fetch_assoc($query)) {
                          ?>
                          <tr>
                                <td><?= $no;?></td>
                                <td><?=$data['nama_siswa'];?></td>
                                <td><?=$data['kelas'];?></td>
                                <td><?=$data['judul'];?></td>
                                <td><?=$data['waktu'];?></td>
                                <td>
                                  <a href="editpengunjung.php?id=<?=$data['id_pengunjung'];?>"><button type="button" class="btn btn-warning">Ubah</button></a>
                                  <a href="hapuspengunjung.php?id=<?=$data['id_pengunjung'];?>" onclick="return confirm('Are you sure to delete this?')"><button type="button" class="btn btn-danger">Hapus</button></a>
                                </td>
                            </tr>
                      <?php
                      $no++;
                        }
                      }
                      ?>
                    </tbody>
                </table>
                <!-- Pagination -->
                <nav aria-label="Page navigation example">
                  <ul class="pagination">
                    <?php
                    if ($halamanAktif > 1) {
                    ?>
                      <li class="page-item">
                      <a class="page-link" href="?halaman=<?= $halamanAktif - 1;?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                      </a>
                    </li>
                    <?php
                    }else {
                    ?>
                     <li class="page-item">
                      <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                      </a>
                    </li>
                    <?php
                    }
                    ?>
                      <?php for ($i = 1; $i <= $jumlahHalaman; $i++) { 
                         if ($i == $halamanAktif) { ?>
                            <li class="page-item active"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php
                             } 
                            }
                         ?>

                    <?php
                    if ($halamanAktif > 1) {
                    ?>
                      <li class="page-item">
                      <a class="page-link" href="?halaman=<?= $halamanAktif - 1;?>" aria-label="Previous">
                        <span aria-hidden="true">&raquo;</span>
                      </a>
                    </li>
                    <?php
                    }else {
                    ?>
                     <li class="page-item">
                      <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&raquo;</span>
                      </a>
                    </li>
                    <?php
                    }
                    ?>
                  </ul>
                </nav>

            </div>
      </div>
</body>
</html>                      