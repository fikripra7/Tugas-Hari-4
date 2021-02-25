<?php
	
	// sertakan file koneksi.php
	// dengan fungsi include
	include "koneksi.php";

	$nm = $_POST["namaku"];
	$em = $_POST["mailku"];
	$jkl = $_POST["jk"];
	$tg = $_POST["tgl"];
	$pd = $_POST["pddk"];
	$al = $_POST["almt"];

	// gunakan fungsi implode php untuk menyatukan string
	$hbi = implode(",", $_POST["hb"]);

	// echo "Nama saya adalah $nm";

	// PROSES UPLOAD FILE
	$nm_file = $_FILES["fileku"]["name"]; // nama file yang diupload
	$temp_file = $_FILES["fileku"]["tmp_name"]; // nama file sementara
	$uk_file = $_FILES["fileku"]["size"]; //ukuran file
	$jn_file = $_FILES["fileku"]["type"]; // tipe file yang akan diupload

	// tentukan lokasi tempat menyimpan file hasil upload
	$dir = "hasil-upload/$nm_file";

	// Parameter Upload
	// status 1
	if(strlen($nm_file) < 1){
		header("location: index.php?tdata&status=1");
		exit();
	}

	// status 2
	$kumpulan_file = array("image/png","image/gif","image/jpg","image/jpeg");
	if(!in_array($jn_file, $kumpulan_file)){
		header("location: index.php?tdata&status=2");
		exit();
	}

	// status 3
	$ukuran_maks = 100000; // 100kb
	if($uk_file > $ukuran_maks){
		header("location: index.php?tdata&status=3");
		exit();	
	}











	// pindahkan file dari folder sementara (xampp/tmp) ke lokasi tujuan
	move_uploaded_file($temp_file, $dir);

	// echo "Nama file: $nm_file <br>";
	// echo "Lokasi file sementara: $temp_file <br>";
	// echo "Ukuran file: $uk_file <br>";
	// echo "Tipe file: $jn_file <br>";

	// query sql untuk insert data ke database
	$sql = "INSERT INTO tabel_fikri(nama,email,jenis_kelamin,tanggal,pendidikan,alamat,hobi,dokumen) VALUES('$nm','$em','$jkl','$tg','$pd','$al','$hbi','$nm_file')";

	// jalankan perintah query diatas dengan mysqli_query
	$query = mysqli_query($konek,$sql) or die (mysqli_error($konek));

	// redirect page versi PHP
	// if($query){
	// 	header("location: tampil-data.php");
	// }


	// redirect page versi HTML
	if($query){
		echo "<script type='text/javascript'>alert('Data berhasil diinsert!')</script><meta http-equiv='refresh' content='1; url=index.php?ldata'>";
	}

?>