<?php

//koneksi database
$koneksi = new mysqli("localhost","root","","db_artshop");

?>
<section class="content-header">
	<h1>Data ONGKIR</h1>
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
						<th>Nama Kota</th>
						<th>Tarif</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1; ?>
					<?php $ambil=$koneksi->query("SELECT * FROM ongkir"); ?>	
					<?php while($user = $ambil->fetch_assoc()){?>
					<tr>
						<td><?php echo $nomor?></td>
						<td><?php echo $user['nama_kota']; ?></td>
						<td>Rp.<?php echo number_format ($user['tarif']); ?></td>
						<td>
							<a href="#" data-toggle="modal" data-target="#myModal<?php echo $user['id_ongkir']; ?>" class="btn btn-success btn-sm rounded-0" type="button" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
							<a href="index.php?module=ongkir/ongkir-delete&id=<?php echo $user['id_ongkir']; ?>"class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
						</td>
					</tr>


					<!-- modal edit -->
					<div class="modal fade" id="myModal<?php echo $user['id_ongkir']; ?>" role="dialog">
						<div class="modal-dialog">
						<!-- modal content -->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Edit Data Ongkir</h4>
								</div>

								<?php
									$id = $user['id_ongkir']; 
									$ambil2=$koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id'");
								
									while ($pecah = mysqli_fetch_array($ambil2)){
								?>

								<form method="post" ectype="multipart/form-data">
									<div class="modal-body">
										<div class="form-group">
											<label class="control-label">Nama Kota</label>
											<input type="hidden" name="id_ongkir" value="<?php echo $pecah['id_ongkir']; ?>">
											<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_kota']; ?>" required>
										</div>
										<div class="form-group">
											<label class="control-label">Tarif</label>
											<input type="text" name="tarif" class="form-control" value="<?php echo $pecah['tarif']; ?>" required>
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
									$koneksi->query("UPDATE ongkir SET
										nama_kota='$_POST[nama]', tarif='$_POST[tarif]'
										WHERE id_ongkir= '$_POST[id_ongkir]'");
										

									
									echo "<div class='alert alert-info'>Data Tersimpan</div>";
									//echo "<meta http-equiv='refresh' content='1;url=index.php?module=wonogiri/wonogiri-list'>";
									echo "<script>location='index.php?module=ongkir/ongkir-list';</script>";
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
                            <h4 class="modal-title">Tambah Ongkir</h4>
                        </div>
                        <form method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label">Nama Kota</label>
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tarif (Rp.)</label>
                                    <input type="number" class="form-control" name="tarif" required>
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
                            $koneksi->query("INSERT INTO ongkir
                                (nama_kota,tarif)
                                VALUES('$_POST[nama]','$_POST[tarif]')");
                            
                            echo "<div class='alert alert-info'>Data Tersimpan</div>";
                            echo "<meta http-equiv='refresh' content='1;url=index.php?module=ongkir/ongkir-list'>";
                            //header("location: ?module=produk/produk-list");
                        }
                        ?>

                    </div>
                </div>
            </div>
			
		</div>
	</div>
</section>