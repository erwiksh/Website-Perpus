<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'siswa';
$conn = mysqli_connect($server,$user,$pass,$db);

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    //buat kotak besar untuk menampung kotak kotak dengan data data berbeda.
    $boxs = [];
    //action yang dilakukan
    while ($box = mysqli_fetch_assoc($result)) {
        $boxs[]=$box;
    }
    return $boxs;
}

function tambah($data){
    global $conn;
     //ambil semua data dari element di form
     $nama = htmlspecialchars($data["nama"]);
     $umur = htmlspecialchars($data["umur"]);
     $jurusan = htmlspecialchars($data["jurusan"]);
 
     //query/perintah tambah data
     $query = "INSERT INTO login VALUES ('','$nama','$umur','$jurusan')";
     mysqli_query($conn,$query);
     //cek apakah data udah berhasil ditambahkan atau belum
     return mysqli_affected_rows($conn) ;
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM login WHERE id = $id");

    return mysqli_affected_rows($conn)  ;
}


function ubah($data){
    global $conn;
     //ambil semua data dari element di form
     $id = $data["id"];
     $nama = htmlspecialchars($data["nama"]);
     $umur = htmlspecialchars($data["umur"]);
     $jurusan = htmlspecialchars($data["jurusan"]);
 
     //query/perintah tambah data
     $query = "UPDATE login SET
                    nama = '$nama',
                    umur = '$umur',
                    jurusan = '$jurusan'
                    WHERE id = '$id'
                    ";

     mysqli_query($conn,$query);
     //cek apakah data udah berhasil ditambahkan atau belum
     return mysqli_affected_rows($conn) ;
}

function cari($search){
    $query = "SELECT * FROM login WHERE nama LIKE '%$search%' OR 
                                        umur LIKE '%$search%'  OR 
                                        jurusan LIKE '%$search%'
    ";
    return query($query);
}

?>