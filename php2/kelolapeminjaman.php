<!DOCTYPE html>
    <?php

    include 'koneksi.php';

                    
            $idpinjam = '';
            $nama = '';
            $judul = '';
            $tpinjam = '';
            $tkembali = '';
            $id_buku = '';
            $id_kelas = '';

            if(isset($_GET['ubah'])){
            $id = $_GET['ubah'];
            
            $query = "SELECT * FROM peminjaman where id_peminjaman = '$id';";
            $sql = mysqli_query($conn, $query);
            $result = mysqli_fetch_assoc($sql);

            $idpinjam = $result['id_peminjaman'];
            $nama = $result['siswa'];
            $judul = $result ['judul'];
            $tpinjam = $result ['tpinjam'];
            $tkembali = $result ['tkembali'];
            $id_buku = $result['id_buku'];
            $id_kelas = $result ['id_kelas']; 
            }
    ?>
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
        <form action="proses.php" method="POST">
            <div class="form-singup">
                <h1>Tambah Peminjaman</h1>
                <input type = hidden name = "id_peminjaman" value="<?php echo $idpinjam ?>">
                    <div class="inputBox">
                        <input type="text" required="required" name="siswa" value="<?php echo $nama ?>">
                        <span>Nama Peminjam</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" required="required" name="judul" value="<?php echo $judul?>">
                        <span>Judul</span>
                    </div>
                    <div class="inputBox">
                        <label>Tanggal Pinjam</label>
                        <input type="date" required="required" name="tpinjam" value= "<?php echo $tpinjam?>">
                    </div>
                    <div class="inputBox">
                        <label>Tanggal Kembali</label>
                        <input type="date" required="required" name="tkembali" value= "<?php echo $tkembali?>">
                    </div>
                    <div class="inputBox">
                        <label>kelas</label>
                        <select type="text" required="required" name="id_kelas">
                            <option <?php if($id_kelas == 'X PPLG'){echo "selected";} ?> value="X PPLG" >X PPLG</option>
                            <option <?php if($id_kelas == 'XI PPLG'){echo "selected";} ?> value = "XI PPLG">XI PPLG</option>
                            <option <?php if($id_kelas == 'XII PPLG'){echo "selected";} ?> value = "XII PPLG">XII PPLG</option>
                            <option <?php if($id_kelas == 'X TJKT'){echo "selected";} ?> value = "X TJKT">X TJKT</option>
                            <option <?php if($id_kelas == 'XI TJKT'){echo "selected";} ?> value = "XI TJKT">XI TJKT</option>
                            <option <?php if($id_kelas == 'XII TJKT'){echo "selected";} ?> value = "XII TJKT">XII TJKT</option>
                        </select>
                    </div>
                    <div class="inputBox">
                        <?php if (isset($_GET['ubah'])) {?>
                            <input type="submit" name="aksi" value="Simpan Perubahan">
                        <?php
                            } else {
                        ?>
                            <input type="submit" name="aksi" value="Tambahkan">
                        <?php
                            }
                        ?>
                    </div>
        </form>

                
               
    
                <p>
                    <a href="peminjaman.php" class="login">Kembali</a>
                </p>
            </div>
        </form>     
    </div>
</body>
</html>