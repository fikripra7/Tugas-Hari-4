<!DOCTYPE html>
<html>
<head>
	<title>Input Data</title>
</head>
<body>

	<h3>Form Input Data</h3>

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

	<form action="insert-data.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label>Nama Lengkap</label>
			<input class="form-control" type="text" name="namaku">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input class="form-control" type="email" name="mailku">
		</div>
		<div class="form-group">
			<label>Jenis Kelamin</label>
			<div class="radio">
				<input type="radio" name="jk" value="L"> Laki-laki
			</div>
			<div class="radio">
				<input type="radio" name="jk" value="P"> Perempuan
			</div>
		</div>
		<div class="form-group">
			<label>Tanggal</label>
			<input class="form-control" type="date" name="tgl">
		</div>
		<div class="form-group">
			<label>Pendidikan</label>
			<select class="form-control" name="pddk">
				<option value="">PILIH</option>
				<option value="1">SD</option>
				<option value="2">SMP</option>
				<option value="3">SMA</option>
			</select>
		</div>
		<div class="form-group">
			<label>Alamat</label>
			<textarea class="form-control" cols="30" rows="5" name="almt"></textarea>
		</div>
		<div class="form-group">
			<label>Hobi</label>
			<div class="checkbox">
				<input type="checkbox" name="hb[]" value="Berenang"> Berenang
			</div>
			<div class="checkbox">
				<input type="checkbox" name="hb[]" value="Badminton"> Badminton
			</div>
			<div class="checkbox">
				<input type="checkbox" name="hb[]" value="Tennis"> Tennis
			</div>
		</div>
		<div class="form-group">
			<label>Unggah Dokumen</label>
			<input type="file" name="fileku" class="form-control-file">
		</div>

		<div class="form-group">
			<input class="btn btn-primary" type="submit" value="Simpan" name="save">
			<input class="btn btn-danger" type="reset" value="Clear" name="reset">
		</div>
		
	</form>

</body>
</html>