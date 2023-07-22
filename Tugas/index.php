<?php
session_start();
//koneksi database
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
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

<body style = "background-color: #d4eaff;" >

<?php include 'menu.php'; ?>

	<!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center" >
			<div class="container">
				<div class="banner_content text-center" >
				<font color=" #00000 ">
					<h1>Selamat Datang Di GoFish</h1>
					<br>
					<br><font size="5">Toko GoFish menyediakan ikan hias yang memperindah aquarium anda</font></font>
				</div>
			</div>
		</div>
	</section>

	<!--================Feature Product Area =================-->
	<section class="feature_product_area section_gap">
		<div class="main_box">
			<div class="container-fluid">
				<div class="row">
					<?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
					<?php while($produk=$ambil->fetch_assoc()){ ?>
					<div class="col col1">
						<div class="f_p_item">
							<div class="f_p_img">
								<img class="img-fluid" src="foto/<?php echo $produk['foto_produk']; ?>" width="200" alt="">
								<div class="p_icon">
									<a href="beli.php?id=<?php echo $produk['id_produk']; ?>">
										<i class="lnr lnr-cart"></i>
									</a>
								</div>
							</div>
							<a href="product.php?id=<?php echo $produk['id_produk']; ?>">
								<h4><?php echo $produk['nama_produk']; ?></h4>
							</a>
							<h5>Rp. <?php echo number_format ($produk['harga_produk']); ?></h5>
						</div>
					</div>
					<?php } ?>
			</div>
		</div>
	</section>

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
	<script src="vendors/counter-up/jquery.waypoints.min.js"></script>
	<script src="vendors/flipclock/timer.js"></script>
	<script src="vendors/counter-up/jquery.counterup.js"></script>
	<script src="js/mail-script.js"></script>
	<script src="js/theme.js"></script>
</body>

</html>