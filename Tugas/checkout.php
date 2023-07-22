<?php
session_start();
include 'koneksi.php';


//jika belum login makan akan dilarikan ke login.php
if(!isset($_SESSION["pelanggan"]))
{
	echo "<script>alert('Silahkan Login Terlebih dahulu');</script>";
	echo "<script>location='login.php';</script>";
}
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>GoFish</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
	<link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
	<link rel="stylesheet" href="vendors/animate-css/animate.css">
	<link rel="stylesheet" href="vendors/jquery-ui/jquery-ui.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- main css -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">
</head>

<body style = "background-color: #d4eaff;">
	<!--================Header Menu Area =================-->
	<?php include 'menu.php'; ?>
	<!--================Header Menu Area =================-->

	<!--================Home Banner Area =================-->

	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center" >
			<div class="container">
				<div class="banner_content text-center" >
				<font color=" #00000 ">
					<h1>" Halaman Checkout Produk "</h1>
				</font>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Checkout Area =================-->
	<section class="cart_area">
		<div class="container">
			<div class="cart_inner">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Produk</th>
								<th scope="col">Harga</th>
								<th scope="col">Jumlah</th>
								<th scope="col">Subharga</th>
							</tr>
						</thead>
						<tbody>
							<?php $totalbelanja=0; ?>
							<?php foreach($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
							<!-- menampilkan produk yang sedang diperulangkan berdasarkan id_produk -->
							<?php
							$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
							$pecah = $ambil->fetch_assoc();
							$subharga = $pecah["harga_produk"]*$jumlah;

							?>
							<tr>
								<td>
									<div class="media">
										<div class="d-flex">
											<img src="foto/<?php echo $pecah['foto_produk']; ?>" alt="" width="200">
										</div>
										<div class="media-body">
											<p><?php echo $pecah["nama_produk"]; ?></p>
										</div>
									</div>
								</td>
								<td>
									<h5>Rp. <?php echo number_format($pecah["harga_produk"]); ?></h5>
								</td>
								<td>
									<div class="product_count">
										<h5><?php echo $jumlah; ?></h5>
									</div>
								</td>
								<td>
									<h5>Rp. <?php echo number_format($subharga); ?></h5>
								</td>
								
							</tr>
							<?php $totalbelanja+=$subharga; ?>
							
							
							
							<?php endforeach ?>
						</tbody>
						<tfoot>
							<tr>
								<th colspan="3">Total Belanja</th>
								<th>Rp. <?php echo number_format($totalbelanja) ?></th>
							</tr>
						</tfoot>
					</table>
									
				</div>
					<form class="row contact_form" method="post" novalidate="novalidate">
							<div class="col-md-4 form-group">
								<input type="text" class="form-control" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan']?>">
							</div>
							<div class="col-md-4 form-group">
								<input type="text" class="form-control" readonly value="<?php echo $_SESSION["pelanggan"]['notlp_pelanggan']?>">
							</div>
							<div class="col-md-4 form-group">
								<select class="country_select" name="id_ongkir">
									<option value="">Pilih  Ongkos Kirim</option>
									<?php
									$ambil = $koneksi->query("SELECT * FROM ongkir");
									while($ongkir = $ambil->fetch_assoc()){
									?>
									<option value="<?php echo $ongkir["id_ongkir"] ?>">
										<?php echo $ongkir['nama_kota'] ?> - 
										Rp.<?php echo number_format($ongkir['tarif']) ?>
									</option>
									<?php } ?>
								</select>
							</div>
							<div class="col-md-9 form-group">
								<textarea class="form-control" name="alamat_pengiriman" placeholder="Masukan alamat lengkap pengiriman (termasuk kode pos) dan jangan lupa pilih ongkos kirim"></textarea>
							</div>
							<div class="col-md-4 form-group">
								<button class="main_btn" name="checkout">Checkout</button>
							</div>
						</form>

					<?php
						if (isset($_POST["checkout"]))
						{
							$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
							$id_ongkir = $_POST["id_ongkir"];
							$tanggal_pembelian = date("Y-m-d");
							$alamat_pengiriman = $_POST['alamat_pengiriman'];

							$ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir = '$id_ongkir'");
							$arrayongkir = $ambil->fetch_assoc();
							$nama_kota = $arrayongkir['nama_kota'];
							$tarif = $arrayongkir['tarif'];

							$total_pembelian = $totalbelanja + $tarif;

							//menyimpan data ke tabel pembelian
							$koneksi->query("INSERT INTO pembelian(
								id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat_pengiriman)
								VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat_pengiriman')");

							//mendapatkan id_pembelian
							$id_pembelian_baru=$koneksi->insert_id;

							foreach($_SESSION["keranjang"] as $id_produk=> $jumlah)
							{
								$koneksi->query("INSERT INTO pembelian_produk(
									id_pembelian,id_produk,jumlah)
									VALUES ('$id_pembelian_baru','$id_produk','$jumlah')");

								//skript update stok
								$koneksi->query("UPDATE produk SET stok_produk = stok_produk - $jumlah WHERE id_produk='$id_produk'");
		
							}

							//mengosongkan keranjang belanja
							unset($_SESSION["keranjang"]);

							//tampilan dialihkan ke halaman nota
							echo "<script>alert('Pembelian Sukses');</script>";
							echo "<script>location='nota.php?id=$id_pembelian_baru';</script>";
						}
					?>
			</div>
		</div>
	</section>

	<!--================End Checkout Area =================-->

	<!--================ start footer Area  =================-->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row footer-bottom d-flex justify-content-between align-items-center">
				<p class="col-lg-12 footer-text text-center">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This is <i class="fa fa-star-o" aria-hidden="true"></i> <a href="" target="_blank">GoFish</a>

				</p>
			</div>
		</div>
	</footer>
	<!--================ End footer Area  =================-->


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/stellar.js"></script>
	<script src="vendors/lightbox/simpleLightbox.min.js"></script>
	<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
	<script src="vendors/isotope/isotope-min.js"></script>
	<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/mail-script.js"></script>
	<script src="vendors/jquery-ui/jquery-ui.js"></script>
	<script src="vendors/counter-up/jquery.waypoints.min.js"></script>
	<script src="vendors/counter-up/jquery.counterup.js"></script>
	<script src="js/theme.js"></script>
</body>

</html>