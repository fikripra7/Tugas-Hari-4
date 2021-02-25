<!DOCTYPE html>
<html>
<head>
	<title>Input Data</title>
</head>
<body>

	<h3>Form Input Berita</h3>

	<form action="insert-berita.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label>Judul</label>
			<input class="form-control" type="text" name="judulku">
		</div>
		<div class="form-group">
			<label>Deskripsi Singkat</label>
			<textarea id="skt" class="form-control" cols="30" rows="5" name="singkat"></textarea>
			<script type="text/javascript">
				CKEDITOR.replace("skt");
			</script>
		</div>
		<div class="form-group">
			<label>Detail</label>
			<textarea id="dtl" class="form-control" cols="30" rows="5" name="detail"></textarea>
			<script type="text/javascript">
				CKEDITOR.replace("dtl");
			</script>
		</div>
		<div class="form-group">
			<label>Kategori</label>
			<select class="form-control" name="kat">
				<option value="">PILIH</option>
				<option value="1">Politik</option>
				<option value="2">Ekonomi</option>
				<option value="3">Olahraga</option>
			</select>
		</div>
		<div class="form-group">
			<label>Tanggal</label>
			<input class="form-control" type="date" name="tgl">
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