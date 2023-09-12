<?php
    include 'koneksi.php';

    $query = "SELECT * FROM peminjaman";
    $sql = mysqli_query ($conn , $query);
    $no = 1;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>erwi</title>
        <link rel="stylesheet" type="text/css" href="../css/peminjaman.css"/>

        <script src="https://kit.fontawesome.com/4592f70558.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav>
            <ul class="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="daftarbuku.php">Daftar Buku</a></li>
                <li><a href="peminjaman.php">Peminjaman Buku</a></li>
                <li><a href="pengunjung.php">Pengunjung Buku</a></li>
            </ul>

            <!-- search -->
            <div class="search-box">
                <input type="text" placeholder="search"/>
                <a href="#"><i class="fa-solid fa-magnifying-glass  "></i></a>
            </div>
        </nav>

        <header> </header>

        <div class="div-backgroundindex">
            <div class="peminjaman ">
                <a href="kelolapeminjaman.php" class="tambahpeminjaman">Tambah</a>
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
                                        <th>Kelas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php while($result = mysqli_fetch_assoc($sql)) {
                                  ?>
                                <tr>
                                        <td><?php echo $no++?></td>
                                        <td><?php echo $result['siswa']?></td>
                                        <td><?php echo $result['judul']?></td>
                                        <td><?php echo $result['tpinjam']?></td>
                                        <td><?php echo $result['tkembali']?></td>
                                        <td><?php echo $result['id_kelas']?></td>
                                        <td>
                                            
                                            <a href="kelolapeminjaman.php?ubah=<?php echo $result['id_peminjaman']?>">
                                                <button type="button" class="edit">edit</button>
                                            </a>
                                            <a href="proses.php?hapus=<?php echo $result['id_peminjaman']?>"  onClick="return confirm('are you sure for delete this?')">
                                                <button type="button" class="hapus">Hapus</button>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
      
    </body>
</html>