<?php
	
	// sertakan file koneksi.php
	// dengan fungsi include
	include "koneksi.php";

	$jd = mysqli_real_escape_string($konek, $_POST["judulku"]);
	$sk = $_POST["singkat"];
	$dt = $_POST["detail"];
	$kt = $_POST["kat"];
	$tg = $_POST["tgl"];

	// PROSES UPLOAD FILE
	$nm_file = $_FILES["fileku"]["name"]; // nama file yang diupload
	$temp_file = $_FILES["fileku"]["tmp_name"]; // nama file sementara
	$uk_file = $_FILES["fileku"]["size"]; //ukuran file
	$jn_file = $_FILES["fileku"]["type"]; // tipe file yang akan diupload

	// tentukan lokasi tempat menyimpan file hasil upload
	$dir = "hasil-upload/$nm_file";

	// pindahkan file dari folder sementara (xampp/tmp) ke lokasi tujuan
	move_uploaded_file($temp_file, $dir);

	$sql = "INSERT INTO tbl_berita(judul,desk_singkat,detail,kategori,waktu,foto) VALUES('$jd','$sk','$dt','$kt','$tg','$nm_file')";
	$query = mysqli_query($konek,$sql) or die (mysqli_error($konek));

	// redirect page versi HTML
	if($query){
		echo "<script type='text/javascript'>alert('Data berhasil diinsert!')</script><meta http-equiv='refresh' content='1; url=index.php?lartikel'>";
	}