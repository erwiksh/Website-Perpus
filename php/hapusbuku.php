<?php				
			include 'koneksi.php'; 
			$k = $_GET['id_buku']; 

			
			$datas = mysqli_query($koneksi, "delete from buku where id_buku ='$k'") or die(mysqli_error($koneksi));

			
			echo "<script>alert('data berhasil dihapus.');window.location='daftarbuku.php';</script>";
	?>