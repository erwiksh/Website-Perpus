<?php
	require '../koneksi.php';
	$id = $_GET['id'];
	$query = "DELETE FROM buku WHERE id_buku = $id";
	$result = mysqli_query($conn, $query);
	if ($result) {
		$row = mysqli_affected_rows($conn);
		if ($row > 0) {
			echo "Delete success";
			header("Location: daftarbuku.php");
		} else {
			echo "Delete failed";
		}
	} else {
		echo "Query error: " . mysqli_error($conn);
	}

	?>