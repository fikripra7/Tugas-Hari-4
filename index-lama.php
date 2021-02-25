<?php

	session_start();

	// jika sesi login tidak dikenali atau kosong
	if (empty($_SESSION["tiket_user"])) {
		// arahkan kembali login.php
		header("location: login.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Home | CMS</title>
</head>
<body>

	<h3>Selamat Datang di Halaman Adminstrator</h3>

	<p>Username  : <span style="color: green;"><?php echo ucfirst($_SESSION["tiket_user"]); ?></span></p>
	<p>Userlevel : <span style="color: blue;"><?php echo $_SESSION["tiket_level"]; ?></span></p>

	<h4>Pilih Menu : </h4>
	<ol>
		<li><a href="input-data.php">Tambah Data</a></li>
		<li><a href="tampil-data.php">Lihat Data</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ol>

</body>
</html>