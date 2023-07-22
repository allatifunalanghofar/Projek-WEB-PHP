<?php

//koneksi database
$koneksi = new mysqli("localhost","root","","db_artshop");

?>
<section class="content-header">
	<h1>Data PRODUK </h1>
</section>

<section class="content">
	<div class="box">
		<div class="box-header">
			<div class="row">

				<!--pencarian menggunakan tanggal 
				
				<div class="col-md-2">
					<input type="text" id="date" class="form-control" name="tanggal-cari" placeholder="masukan tanggal" />
				</div>
				<div class="col-md-1">
					<a class="btn btn-info" href="#">Cari</a>
				</div>
				-->
			</div>		
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead class="thead-dark">
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Harga</th>
						<th>Berat</th>
						<th>Stok</th>
						<th>Foto</th>
						<th>Deskripsi</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1; ?>
					<?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>	
					<?php while($data = $ambil->fetch_assoc()){?>
					<tr>
						<td><?php echo $nomor?></td>
						<td>
							<?php echo $data['nama_produk']; ?>
						</td>
						<td>
							Rp.<?php echo number_format ($data['harga_produk']); ?>
						</td>
						<td>
							<?php echo number_format ($data['berat_produk']); ?>gr
						</td>
						<td>
							<?php echo number_format ($data['stok_produk']); ?>
						</td>
						<td>
							<img src="../foto/<?php echo $data['foto_produk']; ?>" width="100">
						</td>
						<td>
							<?php echo ($data['deskripsi_produk']); ?>
						</td>
						
						<td>	
							<a href="#" data-toggle="modal" data-target="#myModal<?php echo $data['id_produk']; ?>" class="btn btn-success btn-sm rounded-0" type="button" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
							<a href="index.php?module=produk/produk-delete&id=<?php echo $data['id_produk']; ?>"class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
						</td>
					</tr>


					<!-- modal edit -->
					<div class="modal fade" id="myModal<?php echo $data['id_produk']; ?>" role="dialog">
						<div class="modal-dialog">
						<!-- modal content -->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Edit Produk</h4>
								</div>

								<?php
									$id = $data['id_produk']; 
									$ambil2=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id'");
								
									while ($pecah = mysqli_fetch_array($ambil2)){
								?>

								<form method="post" ectype="multipart/form-data">
									<div class="modal-body">
										<div class="form-group">
											<input type="hidden" name="id_produk" value="<?php echo $pecah['id_produk']; ?>">
											<label class="control-label">Nama Produk</label>
											<input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama_produk']; ?>" required>
										</div>
										<div class="form-group">
											<label class="control-label">Harga (Rp.)</label>
											<input type="number" class="form-control" name="harga" value="<?php echo $pecah['harga_produk']; ?>" required>
										</div>
										<div class="form-group">
											<label class="control-label">Berat (.gr)</label>
											<input type="number" class="form-control" name="berat" value="<?php echo $pecah['berat_produk']; ?>" required>
										</div>
										<div class="form-group">
											<label class="control-label">Stok Produk</label>
											<input type="number" class="form-control" name="stok" value="<?php echo $pecah['stok_produk']; ?>" required>
										</div>
										<div class="form-group">
											<label class="control-label">Deskripsi</label>
											<textarea class="form-control" name="deskripsi" rows="5"><?php echo $pecah['deskripsi_produk']; ?></textarea>
										</div>
										<div class="from-group">
											<img src="../foto/<?php echo $pecah['foto_produk'] ?>" width="200">
										</div>
										<div class="form-group">
											<label>Ganti Foto</label>
											<input type="file" class="form-control" name="foto">
										</div>
									</div>
									
									<!-- footer modal -->
									<div class="modal-footer">
										
										<button type="submit" class="btn btn-success" name="ubah" >Simpan</button>
									</div>
								</form>
								
									<?php } ?>
								
								

							</div>
						</div>
					</div>


					<?php $nomor++; ?>
					<?php } ?>
					<?php
								if (isset($_POST['ubah']))
								{
									$nama = $_FILES['foto']['name'];
									$lokasi = $_FILES['foto']['tmp_name'];
									
									//jika foto dirubah
									if (!empty($lokasi)){
										move_uploaded_file($lokasi, "../foto/".$nama);

										$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]', harga_produk='$_POST[harga]',
											berat_produk='$_POST[berat]',foto_produk='$nama',deskripsi_produk='$_POST[deskripsi]',stok_produk='$_POST[stok]' 
											WHERE id_produk='$_POST[id_produk]'");
									}
									else{
										$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]', harga_produk='$_POST[harga]',
											berat_produk='$_POST[berat]',deskripsi_produk='$_POST[deskripsi]',stok_produk='$_POST[stok]' 
											WHERE id_produk='$_POST[id_produk]'");
									}
										

									
									echo "<div class='alert alert-info'>Data Tersimpan</div>";
									//echo "<meta http-equiv='refresh' content='1;url=index.php?module=produk/produk-list'>";
									echo "<script>location='index.php?module=produk/produk-list';</script>";
								}
					?>
				</tbody>
			</table>



			<!-- modal tambah-->
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambah">Tambah Data</button>

			<div id="tambah" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Tambah Produk</h4>
						</div>
						<form method="post" enctype="multipart/form-data">
							<div class="modal-body">
								<div class="form-group">
									<label class="control-label">Nama Produk</label>
									<input type="text" class="form-control" name="nama" required>
								</div>
								<div class="form-group">
									<label class="control-label">Harga (Rp.)</label>
									<input type="number" class="form-control" name="harga" required>
								</div>
								<div class="form-group">
									<label class="control-label">Berat (.gr)</label>
									<input type="number" class="form-control" name="berat" required>
								</div>
								<div class="form-group">
									<label class="control-label">Stok Produk</label>
									<input type="number" class="form-control" name="stok" required>
								</div>
								<div class="form-group">
									<label class="control-label">Deskripsi</label>
									<textarea class="form-control" name="deskripsi" rows="5" required></textarea>
								</div>
								<div class="form-group">
									<label>Foto</label>
									<input type="file" class="form-control" name="foto" required>
								</div>
							</div>
							<!-- footer modal -->
							<div class="modal-footer">
								<button type="reset" class="btn btn-danger" >Reset</button>
								<button type="submit" class="btn btn-success" name="tambah" >Simpan</button>
							</div>
						</form>
						
						<?php
						if (isset($_POST['tambah']))
						{
							$nama = $_FILES['foto']['name'];
							$lokasi = $_FILES['foto']['tmp_name'];
							move_uploaded_file($lokasi, "../foto/".$nama);
							$koneksi->query("INSERT INTO produk
								(nama_produk,harga_produk,berat_produk,foto_produk,deskripsi_produk,stok_produk)
								VALUES('$_POST[nama]','$_POST[harga]','$_POST[berat]','$nama','$_POST[deskripsi]','$_POST[stok]')");
							
							echo "<div class='alert alert-info'>Data Tersimpan</div>";
							echo "<meta http-equiv='refresh' content='1;url=index.php?module=produk/produk-list'>";
							//header("location: ?module=produk/produk-list");
						}
						?>

					</div>
				</div>
			</div>

			
		</div>
	</div>
</section>