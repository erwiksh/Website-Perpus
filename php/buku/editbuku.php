<?php
include '../koneksi.php';
    $id = $_GET['id'];
    $query = "SELECT * FROM buku WHERE id_buku = '$id'";
    $result = mysqli_query($conn,$query);
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
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

    <div class="card m-5 me-5">
        <div class="card-header bg-primary text-white"">
            <h4>Edit Buku</h4>
        </div>
            <div class="card-body">
                <form action="" method="POST">
                    <ul>
                        <li class="list-group-item">
                            <div class="form-group mb-3">
                                Judul<input type="text" class="form-control" placeholder="Judul" aria-label="Example text with button addon" aria-describedby="button-addon1" value="<?= $data['judul'];?>"name="judul">
                            </div>                        
                        </li>
                        <li class="list-group-item">
                            <div class="form-group mb-3">
                                Penulis<input type="text" class="form-control" placeholder="Penulis" aria-label="Example text with button addon" aria-describedby="button-addon1" value="<?= $data['penulis'];?>"name="penulis">
                            </div>  
                        </li>
                        <li class="list-group-item">
                            <div class="form-group mb-3">
                                Penerbit<input type="text" class="form-control" placeholder="Penerbit" aria-label="Example text with button addon" aria-describedby="button-addon1"name="penerbit" value="<?= $data['penerbit'];?>">
                            </div>  
                        </li>
                        <li class="list-group-item">
                            <div class="form-group mb-3">
                                Tahun<input type="number" class="form-control" placeholder="Tahun" aria-label="Example text with button addon" aria-describedby="button-addon1"name="tahun" value="<?= $data['tahun'];?>">
                            </div>  
                        </li>
                        <li class="list-group-item">
                            <div class="form-group mb-3">
                                 Stok<input type="number" class="form-control" placeholder="Stok" aria-label="Example text with button addon" aria-describedby="button-addon1"name="stok" value="<?= $data['stok'];?>">
                            </div>  
                        </li>
                        <li class="list-group-item">
                            <div class="form-group mb-3">
                                <a href="#" class="m-3"><button type="submit" class="btn btn-success" name="update">Update</button></a>
                                <a href="daftarbuku.php" class="m-3"><button type="button" class="btn btn-primary" name="kembali">Kembali</button></a>
                            </div>  
                        </li>
                      </ul>
                </form>
                <?php
                if(isset($_POST['update'])){
                    $judul = $_POST['judul'];
                    $penulis = $_POST['penulis'];
                    $penerbit = $_POST['penerbit'];
                    $tahun = $_POST['tahun'];
                    $stok = $_POST['stok'];
                    $update ="UPDATE buku SET judul = '$judul', penulis ='$penulis', penerbit = '$penerbit', tahun ='$tahun', stok='$stok' WHERE id_buku = '$id'";
                    $q=mysqli_query($conn,$update);
                    if ($q) {
                        echo "berhasil";
                        header ("Location: daftarbuku.php");
                    }else{
                        echo "error" .mysqli_error;
                    }
                }
                ?>
            </div>
    </div>
</body>
</html>