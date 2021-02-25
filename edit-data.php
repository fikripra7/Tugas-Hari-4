<!DOCTYPE html>
<html>
<head>
	<title>Edit Data</title>
</head>
<body>

	<h3>Form Edit Data</h3>

	<!-- Notifikasi Gagal Upload -->
	<?php
		if(isset($_GET["status"])){

			$st = $_GET["status"];

			switch ($st) {
				case 1:
					echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
						  	<strong>Gagal Upload!</strong> Silahkan pilih file terlebih dahulu.
						  	<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						    <span aria-hidden='true'>&times;</span>
						  	</button>
						</div>";
					break;
				case 2:
					echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
						  	<strong>Gagal Upload!</strong> File yang diperbolehkan hanya berekstensi .jpg .png .gif.
						  	<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						    <span aria-hidden='true'>&times;</span>
						  	</button>
						</div>";
					break;
				case 3:
					echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
						  	<strong>Gagal Upload!</strong> File melebihi batas maksimal.
						  	<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						    <span aria-hidden='true'>&times;</span>
						  	</button>
						</div>";
					break;
				default:
					echo "status tidak ada";
					break;
			}
		}
	?>

	<?php

		include "koneksi.php";

		// tangkap URL dengan menggunakan $_GET
		$ide = $_GET["edit_id"];

		// tampilkan data yang akan diedit
		$sql = "SELECT * FROM tabel_fikri WHERE id_bio=$ide";
		$query = mysqli_query($konek,$sql) or die (mysqli_error($konek));

		// tarik data dari database
		$data = mysqli_fetch_array($query);

		// gunakan fungsi explode php untuk memecah string
		$hb = explode(",", $data["hobi"]);
		$dk = $data["dokumen"];
		$noimg = $data["dokumen"] == "" ? "assets/no-image.png" : "hasil-upload/$dk";
	?>

	<form action="update-data.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="idku" value="<?php echo $data['id_bio'];?>">

		<div class="form-group">
			<label>Nama Lengkap</label>
			<input class="form-control" type="text" name="namaku" value="<?php echo $data['nama']; ?>">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input class="form-control" type="email" name="mailku" value="<?php echo $data['email']; ?>">
		</div>
		<div class="form-group">
			<label>Jenis Kelamin</label>
			<div class="radio">
				<input type="radio" name="jk" value="L"<?php if($data["jenis_kelamin"] == "L") echo "checked"; ?>> Laki-laki
			</div>
			<div class="radio">
				<input type="radio" name="jk" value="P"<?php if($data["jenis_kelamin"] == "P") echo "checked"; ?>> Perempuan
			</div>
		</div>
		<div class="form-group">
			<label>Tanggal</label>
			<input class="form-control" type="date" name="tgl" value="<?php echo $data['tanggal']; ?>">
		</div>
		<div class="form-group">
			<label>Pendidikan</label>
			<select class="form-control" name="pddk">
				<option value="">PILIH</option>
				<option value="1"<?php if($data["pendidikan"] == "1") echo "selected"; ?>>SD</option>
				<option value="2"<?php if($data["pendidikan"] == "2") echo "selected"; ?>>SMP</option>
				<option value="3"<?php if($data["pendidikan"] == "3") echo "selected"; ?>>SMA</option>
			</select>
		</div>
		<div class="form-group">
			<label>Alamat</label>
			<textarea class="form-control" cols="30" rows="5" name="almt"><?php echo $data["alamat"]; ?></textarea>
		</div>
		<div class="form-group">
			<label>Hobi</label>
			<div class="checkbox">
				<input type="checkbox" name="hb[]" value="Berenang"<?php if(in_array("Berenang", $hb)) echo "checked" ?>> Berenang
			</div>
			<div class="checkbox">
				<input type="checkbox" name="hb[]" value="Badminton"<?php if(in_array("Badminton", $hb)) echo "checked" ?>> Badminton
			</div>
			<div class="checkbox">
				<input type="checkbox" name="hb[]" value="Tennis"<?php if(in_array("Tenni", $hb)) echo "checked" ?>> Tennis
			</div>
		</div>
		<img src="<?php echo $noimg; ?>" height="50" width="50">
		<div class="form-group">
			<label>Unggah Dokumen</label>
			<input type="file" name="fileku" class="form-control-file">
		</div>

		<div class="form-group">
			<input class="btn btn-primary" type="submit" value="Simpan" name="save">
			
		</div>
	</form>


</body>
</html>