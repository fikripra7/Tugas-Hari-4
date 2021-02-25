
	<h3>Daftar Artikel</h3>

	<div class="table-responsive">
		<table id="dataTable" class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>ID</th>
				<th>Judul</th>
				<th>Deskripsi Singkat</th>
				<th>Detail</th>
				<th>Kategori</th>
				<th>Waktu</th>
				<th>Foto</th>
				<th>Status</th>
				<th>Aksi</th>
				<th>Aksi</th>

				
			</tr>
		</thead>
		<tbody>
			<?php
				include "koneksi.php";

				$no = 1;

				$sql = "SELECT * FROM tbl_berita
						JOIN tbl_kategori
						ON tbl_berita.kategori = tbl_kategori.id_kat
						ORDER BY id_berita DESC";

				$query = mysqli_query($konek,$sql) or die (mysqli_error($konek));

				while($data = mysqli_fetch_array($query)){?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $data["id_berita"]; ?></td>
						<td><?php echo $data["judul"]; ?></td>
						<td><?php echo $data["desk_singkat"]; ?></td>
						<td><?php echo $data["detail"]; ?></td>
						<td><?php echo $data["kategori"]; ?></td>
						<td><?php echo $data["waktu"]; ?></td>
						<td><img src="hasil-upload/<?php echo $data["foto"]; ?>" height="100" width="100"></td>
						<td><a href="index.php?status_id=<?php echo $data["id_berita"];?>"><?php echo $data["status"];?></a></td>
						<td>Edit</td>
						<td>Hapus</td>
					</tr>

					<?php $no++; ?>
				<?php }
			?>
		</tbody>		
	</table>
	</div>
