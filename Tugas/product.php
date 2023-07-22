<?php
session_start();
include 'koneksi.php';
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
					<h1>" Halaman Keterangan Produk"</h1>
				</font>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

<?php
$koneksi = new mysqli("localhost","root","","db_artshop");
$id_produk=$_GET["id"];
$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'"); 
$pecah = $ambil->fetch_assoc();

?>
	<!--================Single Product Area =================-->

	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="s_product_img">
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<!-- menampilkan produk -->
						
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="foto/<?php echo $pecah['foto_produk']; ?>" width="500px">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3><?php echo $pecah["nama_produk"]; ?></h3>
						<h2>Rp. <?php echo number_format($pecah["harga_produk"]); ?></h2>
						<p><?php echo $pecah["deskripsi_produk"]; ?></p>
						<h4>Stok : <?php echo $pecah['stok_produk'] ?></h4>
						<form method="post">
							<div class="product_count">
								<label for="qty">Quantity:</label>
								<input type="number" min="1" name="jumlah" max= "<?php echo $pecah["stok_produk"] ?>">
							</div>
							<div class="card_area">
								<button class="main_btn" name="beli">
									<a name="beli" >Masukan Ke Keranjang</a>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php 
		if (isset($_POST["beli"])){
			//mendapatkan jumlah yang diimputkan
			$jumlah = $_POST["jumlah"];
			//masuk ke keranjang
			$_SESSION["keranjang"][$id_produk]=$jumlah;
			
			echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
			echo "<script>location='cart.php';</script>";
		}
	?>
	<!--================End Single Product Area =================-->

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