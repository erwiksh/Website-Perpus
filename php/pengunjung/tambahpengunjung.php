<?php
include '../koneksi.php';

// Periksa apakah form telah disubmit
if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $judul = $_POST['judul'];

    // Periksa apakah semua data yang diperlukan sudah ada
    if (!empty($nama) && !empty($kelas) && !empty($judul)) {
        // Buat koneksi ke database (pastikan variabel $conn sudah ada dari file koneksi.php)
        // ...

        // Mendapatkan waktu saat ini dalam format MySQL TIMESTAMP
        $waktuSekarang = date('Y-m-d H:i:s');

        // Perintah SQL untuk menambahkan data pengunjung
        $ADD = "INSERT INTO pengunjung (nama_siswa, id_kelas, id_buku, waktu) VALUES ('$nama','$kelas','$judul','$waktuSekarang')";
        
        // Eksekusi perintah SQL
        $query = mysqli_query($conn, $ADD);

        if ($query) {
            // Jika data berhasil ditambahkan, arahkan pengguna ke halaman pengunjung.php
            header("Location: pengunjung.php");
            exit(); // Pastikan untuk menggunakan exit() untuk menghentikan eksekusi selanjutnya
        } else {
            // Jika terjadi kesalahan dalam eksekusi SQL, tampilkan pesan kesalahan
            echo "Gagal menambahkan pengunjung: " . mysqli_error($conn);
        }
    } else {
        // Jika data yang dibutuhkan belum diisi, berikan pesan kepada pengguna
        echo "Silakan isi semua data terlebih dahulu.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah pengunjung</title>
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
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
            </form>
          </div>
        </div>
      </nav>

      
      <div class="card m-5 me-5">
        <div class="card-header bg-primary text-white"">
            <h4>Tambah Pengunjung</h4>
        </div>
            <div class="card-body">
                <form action="" method="POST">
                    <ul>
                        <li class="list-group-item">
                            <div class="form-group mb-3">
                                Nama<input type="text" class="form-control" name="nama" aria-label="Example text with button addon" aria-describedby="button-addon1">
                            </div>  
                        </li>
                        <li class="list-group-item">
                            Kelas
                            <select class="form-select mb-3" aria-label="Default select example" name="kelas">
                                <option selected value="">Pilih Kelas</option>
                                <?php
                                $query_kelas = "SELECT * FROM kelas";
                                $result= mysqli_query($conn,$query_kelas);
                                while ($data = mysqli_fetch_assoc($result)) {
                                ?>
                                  <option value="<?=$data['id_kelas'];?>"><?=$data['nama_kelas'];?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </li>
                        <li class="list-group-item">
                            Judul
                            <select class="form-select mb-3" aria-label="Default select example" name="judul">
                                <option selected>Pilih Judul</option>
                                <?php
                                $query_buku = "SELECT * FROM buku";
                                $result_buku = mysqli_query($conn, $query_buku);
                                while ($row_buku = mysqli_fetch_assoc($result_buku)) {
                                    echo '<option value="' . $row_buku['id_buku'] . '">' . $row_buku['judul'] . '</option>';
                                }
                                ?>
                            </select>
                        </li>
                        <li class="list-group-item">
                            <div class="form-group mb-3">
                                <a href="" class="m-3"><button type="submit" class="btn btn-success" name="simpan">Simpan</button></a>
                                <a href="pengunjung.php" class="m-3"><button type="submit" class="btn btn-primary" name="kembali">Kembali</button></a>
                            </div>  
                        </li>
                      </ul>
                </form>
              <?php
              if(isset($_POST['simpan'])){
                $nama = $_POST['nama'];
                $kelas = $_POST['kelas'];
                $judul = $_POST['judul'];
                $waktuSekarang = date('Y-m-d H:i:s'); // Mendapatkan timestamp saat ini
                $ADD = "INSERT INTO pengunjung (nama_siswa, id_kelas, id_buku, waktu) VALUES ('$nama','$kelas','$judul','$waktuSekarang')";                
                $query = mysqli_query($conn,$ADD);
                if ($query) {
                  header("Location: pengunjung.php");
                  exit(); // Pastikan untuk menggunakan exit() atau die() setelah header
              } else {
                  echo "Gagal: " . mysqli_error($conn);
              }              
              }
              ?>
            </div>
    </div>
</body>
</html>