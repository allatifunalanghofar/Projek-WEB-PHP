<?php

//koneksi database
$koneksi = new mysqli("localhost","root","","db_artshop");

?>
<section class="content-header">
	<h1>Data PELANGGAN</h1>
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
		<div class="box-body">
			<table class="table table-bordered table-striped" id="table1">
				<thead class="thead-dark">
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Email</th>
						<th>No. Telpon</th>
						<th>Alamat</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1; ?>
					<?php $ambil=$koneksi->query("SELECT * FROM pelanggan"); ?>	
					<?php while($user = $ambil->fetch_assoc()){?>
					<tr>
						<td><?php echo $nomor?></td>
						<td><?php echo $user['nama_pelanggan']; ?></td>
						<td><?php echo $user['email_pelanggan']; ?></td>
						<td><?php echo $user['notlp_pelanggan']; ?></td>
						<td><?php echo $user['alamat_pelanggan']; ?></td>
						<td>
							<a href="#" data-toggle="modal" data-target="#myModal<?php echo $user['id_pelanggan']; ?>" class="btn btn-success btn-sm rounded-0" type="button" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
							<a href="index.php?module=pelanggan/pelanggan-delete&id=<?php echo $user['id_pelanggan']; ?>"class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
						</td>
					</tr>


					<!-- modal edit -->
					<div class="modal fade" id="myModal<?php echo $user['id_pelanggan']; ?>" role="dialog">
						<div class="modal-dialog">
						<!-- modal content -->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Edit Data Pelanggan</h4>
								</div>

								<?php
									$id = $user['id_pelanggan']; 
									$ambil2=$koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id'");
								
									while ($pecah = mysqli_fetch_array($ambil2)){
								?>

								<form method="post" ectype="multipart/form-data">
									<div class="modal-body">
										<div class="form-group">
											<label class="control-label">Nama</label>
											<input type="hidden" name="id_pelanggan" value="<?php echo $pecah['id_pelanggan']; ?>">
											<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_pelanggan']; ?>" required>
										</div>
										<div class="form-group">
											<label class="control-label">Email</label>
											<input type="text" name="email" class="form-control" value="<?php echo $pecah['email_pelanggan']; ?>" required>
										</div>
										<div class="form-group">
											<label class="control-label">Password</label>
											<input type="text" name="pass" class="form-control" value="<?php echo $pecah['password_pelanggan']; ?>" required>
										</div>
										<div class="form-group">
											<label class="control-label">No Telpon</label>
											<input type="text" name="notlp" class="form-control" value="<?php echo $pecah['notlp_pelanggan']; ?>" required>
										</div>
										<div class="form-group">
											<label class="control-label">Alamat</label>
											<textarea class="form-control" name="alamat" rows="5"><?php echo $pecah['alamat_pelanggan']; ?></textarea>
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
									$koneksi->query("UPDATE pelanggan SET
										email_pelanggan='$_POST[email]', password_pelanggan='$_POST[pass]',  nama_pelanggan='$_POST[nama]', notlp_pelanggan='$_POST[notlp]', alamat_pelanggan='$_POST[alamat]' 
										WHERE id_pelanggan= '$_POST[id_pelanggan]'");
										

									
									echo "<div class='alert alert-info'>Data Tersimpan</div>";
									//echo "<meta http-equiv='refresh' content='1;url=index.php?module=wonogiri/wonogiri-list'>";
									echo "<script>location='index.php?module=pelanggan/pelanggan-list';</script>";
								}
					?>
				</tbody>
			</table>
			
		</div>
	</div>
</section>