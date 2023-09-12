<html>
    <head>
        <meta charset="UTF-8">
        <title>Peminjaman</title>
        <link rel="stylesheet" type="text/css" href="../css/peminjaman.css"/>
        <script src="https://kit.fontawesome.com/4592f70558.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav>
            <ul class="menu">
                <li><a href="home.php">Home</a></li>
                <li><a href="daftarbuku.php">Daftar Buku</a></li>
                <li><a href="peminjaman.php">Peminjaman Buku</a></li>
            </ul> 
            <!-- search -->
            <div class="search-box">
                <input type="text" placeholder="search"/>
                <a href="#"><i class="fa-solid fa-magnifying-glass  "></i></a>
            </div>
        </nav>
        <div class="div-backgroundindex">
            <div class="peminjaman ">
                <a href="tambahpeminjaman.php" class="tambahpeminjaman">Tambah</a>
			</div>
            <div class="div-index">
                <!-- fungsi div untuk mengelompokkan elemen-elemen di dalamnya menjadi satu grub -->
                <div class="parallax">
                    <!-- parallax adalah pergeseran yang tampak dari suatu objek (titik 1) terhadap latar belakang (titik 2) yang disebabkan oleh perubahan posisi pengamat. -->
                    <div class="home">
                        <div class="table-index"> 
                            <table>
                                <thead>
                                    <tr>
                                        <th >No</th>
                                        <th>Nama Siswa</th>
                                        <th>Judul Buku</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include('koneksi.php');
                                    $no=1;
                                    $datas = mysqli_query($koneksi, "SELECT * FROM peminjaman, buku WHERE peminjaman.id_buku = buku.id_buku") or die;
                                    while($row = mysqli_fetch_array($datas)) {
                                    ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $row['siswa']; ?></td>
                                        <td><?= $row['judul']; //untuk menampilkan judul ?></td>
                                        <td><?= $row['tpinjam']; ?></td>
                                        <td><?= $row['tkembali']; ?></td>	
                                        <td>
                                            <a href="edit.php?id=<?= $row['id_peminjaman'];?>" class="btn btn_sm btn_warning">Edit</a>
                                            <a href="hapus.php?id=<?= $row['id_peminjaman'];?>"class="btn btn-sm btn-danger" onclik="return confirm('anda yakin ingin hapus?');">Hapus</a>
                                        </td>
						
					                </tr>
					                   <?php $no++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </body>
</html> 