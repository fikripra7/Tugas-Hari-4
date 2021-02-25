<?php

	include "koneksi.php";

	$idh = $_GET["hapus_id"];

	// sql untuk menghapus data
	$sql = "DELETE FROM tabel_fikri WHERE id_bio=$idh";
	$query = mysqli_query($konek,$sql) or die (mysqli_error($konek));

	if($query){
		echo "<script type='text/javascript'>alert('Data berhasil dihapus!')</script><meta http-equiv='refresh' content='1; url=index.php?ldata'>";
	}

?>