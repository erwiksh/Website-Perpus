<html>
    <head>
        <meta charset="UTF-8">
        <title>Daftar Buku</title>
        <link rel="stylesheet" type="text/css" href="../css/peminjaman.css"/>
        <link rel="stylesheet" type="text/css" href="../css/daftarbuku.css"/>
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

        <header>
           </header>

        <div class="div-backgroundindex">
            <div class="pinjam ">
                <a href="tambahbuku.php" class="tambah">Tambah</a>
			</div>
            <div class="div-index">
                <div class="parallax">
                    <div class="home">
                        <div class="table-index"> 
                            <table>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        
                                        <th>Kode Buku</th>
                                        <th>Judul Buku</th>
                                        <th>Penulis</th>
                                        <th>Penerbit</th>
                                        <th>Tahun Terbit</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    include('koneksi.php'); 
                                    $datas = mysqli_query($koneksi, "select * from buku") or die(mysqli_error($koneksi));
                                    

                                    $no = 1;

                                    
                                    while($row = mysqli_fetch_assoc($datas)) {
                                ?>	

                                    <tr>
                                        <td><?= $no; ?></td>
                                        
                                        <td><?= $row['id_buku']; ?></td>
                                        <td><?= $row['judul']; ?></td>
                                        <td><?= $row['penulis']; ?></td>
                                        <td><?= $row['penerbit']; ?></td>
                                        <td><?= $row['tahun']; ?></td>
                                        <td><?= $row['stok']; ?></td>
                                        <td>
                                                <a href="editbuku.php?id_buku=<?= $row['id_buku']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                                <a href="hapusbuku.php?id_buku=<?= $row['id_buku']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('anda yakin ingin hapus?');">Hapus</a>
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