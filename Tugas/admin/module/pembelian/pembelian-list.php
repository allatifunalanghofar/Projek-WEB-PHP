<?php

//koneksi database
$koneksi = new mysqli("localhost","root","","db_artshop");

?>
<section class="content-header">
	<h1>Data PEMBELIAN</h1>
</section>

<section class="content">
	<div class="box">
		<div class="box-body">
			<table class="table table-bordered table-striped" id="table1">
				<thead class="thead-dark">
					<tr>
						<th>No</th>
						<th>Nama Pelanggan</th>
						<th>Tanggal</th>
						<th>Total</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1; ?>
					<?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan"); ?>	
					<?php while($data = $ambil->fetch_assoc()){?>
					<tr>
						<td><?php echo $nomor?></td>
						<td><?php echo $data['nama_pelanggan']; ?></td>
						<td><?php echo $data['tanggal_pembelian']; ?></td>
						<td>
							Rp.<?php echo number_format ($data['total_pembelian']); ?>
						</td>
						<td>
							<a href="index.php?module=pembelian/details&id=<?php echo $data['id_pembelian']; ?>"class="btn btn-info btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Details"><i class="fa fa-edit"></i></a>
							<a href="index.php?module=pembelian/pembelian-delete&id=<?php echo $data['id_pembelian']; ?>"class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
						</td>
					</tr>

					<?php $nomor++; ?>
					<?php } ?>
				</tbody>
			</table>	
		</div>
	</div>
</section>