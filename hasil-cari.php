
	<h3>Daftar Nama</h3>

	<div class="table-responsive">
		<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>ID</th>
				<th>Nama Lengkap</th>
				<th>Email</th>
				<th>Jenis Kelamin</th>
				<th>Tanggal</th>
				<th>Pendidikan</th>
				<th>Alamat</th>
				<th>Hobi</th>
				<th>Dokumen</th>
				<th colspan="2">Aksi</th>
			</tr>
		</thead>
		<tbody>
			
			<?php
				include "koneksi.php";

				$key = $_POST["cari"];

				$no = 1; //nomor urut

				// query sql untuk menampilkan data
				$sql = "SELECT * FROM tabel_fikri 
						JOIN tbl_pendidikan
						ON tabel_fikri.pendidikan = tbl_pendidikan.id_pdk
						WHERE CONCAT (nama,email,hobi) LIKE '%$key%'
						ORDER BY id_bio DESC";
				$query = mysqli_query($konek,$sql) or die (mysqli_error($konek));

				// lakukan perulangan data
				// dan tarik data dari database dengan
				// mysqli_fecth
				while ($data = mysqli_fetch_array($query)){

					// deklarasikan 
					$nma = $data["nama"]; // diambil dari nama kolom
					$idb = $data["id_bio"];
					$em = $data["email"];
					$jkl = $data["jenis_kelamin"];
					$tg = $data["tanggal"];
					$pd = $data["keterangan"];
					$almt = $data["alamat"];
					$hb = $data["hobi"];
					$dk = $data["dokumen"];

					// periksa apakah ada gambar atau tidak
					$noimg = $data["dokumen"] == "" ? "assets/no-image.png" : "hasil-upload/$dk";

					echo "<tr>
							<td>$no</td>
							<td>$idb</td>
							<td>$nma</td>
							<td>$em</td>
							<td>$jkl</td>
							<td>$tg</td>
							<td>$pd</td>
							<td>$almt</td>
							<td>$hb</td>
							<td><img src='$noimg' width='100' height='100'></td>
							<td><a href='edit-data.php?edit_id=$idb'>Edit</a></td>
							<td><a href=javascript:hapus('hapus-data.php?hapus_id=$idb')>Hapus</a></td>
						</tr>";

						$no++;
				}
			?>

		</tbody>
		</table>
	</div>
