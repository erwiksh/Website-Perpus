<?php
include '../koneksi.php';
$id = $_GET['id'];
$query = "SELECT pengunjung.*, buku.judul, kelas.nama_kelas AS kelas FROM pengunjung JOIN buku ON pengunjung.id_buku = buku.id_buku JOIN kelas ON pengunjung.id_kelas = kelas.id_kelas";
$result = mysqli_query($conn,$query);
$cek = mysqli_num_rows($result);

if ($cek) {
    $data = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengunjung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

    <div class="card m-5 me-5">
        <div class="card-header bg-primary text-white"">
            <h4>Edit Pengunjung</h4>
        </div>
            <div class="card-body">
                <form action="" method="POST">
                    <ul>
                        <li class="list-group-item">
                            <div class="form-group mb-3">
                                Nama<input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" name="nama" value="<?=$data['nama_siswa'];?>">
                            </div>                        
                        </li>
                        <li class="list-group-item">
                        <div class="form-group mb-3">
                             Kelas
                            <select class="form-select mb-3" aria-label="Default select example" name="kelas">
                                <option value="<?= $data['id_kelas']; ?>" selected><?= $data['kelas']; ?></option>
                                <?php
                                $query = "SELECT * FROM kelas";
                                $result = mysqli_query($conn,$query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <option value="<?=$row['id_kelas']?>"><?=$row['nama_kelas']?></option>
                                <?php
                                }
                                ?>
                            </select>                  
                        </div> 
                        </li>
                        <li class="list-group-item ">
                            Judul
                            <select class="form-select mb-3" aria-label="Default select example" name="judul">
                                <option value= "<?=$data['id_buku'];?>" selected><?=$data['judul'];?></option>
                                <?php
                                 $query = "SELECT * FROM buku";
                                 $result = mysqli_query($conn,$query);
                                 while ($row = mysqli_fetch_assoc($result)) {
                                 ?>
                                 <option value="<?=$row['id_buku']?>"><?=$row['judul']?></option>
                                 <?php
                                 }
                                 ?>
                            </select>
                        </li>
                        <li class="list-group-item">
                            <div class="form-group mb-3">
                                <a href="#" class="m-3"><button type="submit" class="btn btn-success" name="button">Update</button></a>
                                <a href="pengunjung.php" class="m-3"><button type="button" class="btn btn-primary" name="kembali">Kembali</button></a>
                            </div>  
                        </li>
                      </ul>
                </form>
              <?php
              if (isset($_POST['button'])) {
                $nama = $_POST['nama'];
                $kelas = $_POST['kelas'];
                $judul = $_POST['judul'];
                $update = "UPDATE pengunjung SET nama_siswa = '$nama', id_kelas = '$kelas', id_buku = '$judul' WHERE id_pengunjung = '$id'";
                $query = mysqli_query($conn,$update);
                if ($query) {
                    echo "success";
                ?>
                    <a href="pengunjung.php" class="m-3"><button type="button" class="btn btn-primary" name="kembali">Kembali</button></a>
                <?php   
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