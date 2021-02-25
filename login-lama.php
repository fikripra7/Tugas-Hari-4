<?php

	session_start(); // memulai sebuah sesi

	include "koneksi.php";

	// periksa apakah tombol login telah diset atau diklik
	if(isset($_POST["masuk"])){
		//kirimkan hasil inputan username dan password
		$us = $_POST["userku"]; // nama form user
		$ps = $_POST["passku"]; // nama form password

		// lalu cocokkan dengan username dan password yang ada
		// didatabase
		$sql = "SELECT * FROM tbl_operator WHERE username='$us' AND password='$ps' ";
		$query = mysqli_query($konek,$sql) or die (mysqli_error($konek));
		$data = mysqli_fetch_array($query);

		// periksa terlebih dahulu apakah didatabase ada data?
		// jika ada data dan cocok, maka berikan sesi
		if(mysqli_num_rows($query) > 0){
			// berikan sesi
			$_SESSION["tiket_user"] = $data["username"]; // nama kolom didatabase
			$_SESSION["tiket_pass"] = $data["password"];
			$_SESSION["tiket_level"] = $data["user_level"]; 

			// arahkan kehalaman index.php
			header("location: index.php");
		} else{
			// jika username dan password tidak cocok
			echo "gagal";
		}

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
</head>
<body>

	<h3>Login dulu ya,....</h3>

	<form action="" method="post">
		<label>Username</label>
		<input type="text" name="userku" placeholder="Masukkan Username">
		<label>Password</label>
		<input type="password" name="passku" placeholder="Masukkan Password">
		<input type="submit" name="masuk" value="Login">
		<input type="reset" name="reset" value="Cancel">
	</form>

</body>
</html>