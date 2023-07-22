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
					<h1>" Halaman Daftar "</h1>
				</font>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Daftar Box Area =================-->
	<section class="login_box_area">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="img/login.jpg" alt="">
						<div class="hover">
							<h4> QUOTES </h4>
							<p>"Kami melihat pelanggan sebagai tamu undangan, dan kami adalah tuan rumah. Tugas kami untuk membuat pengalaman pelanggan menjadi lebih baik."</p>
							<br> <p>Sudah Punya Akun ?</p> 
							<a class="main_btn" href="login.php">LOGIN</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner reg_form">
						<h3>Daftar Pelanggan</h3>
						<form class="row login_form" method="post" >
							<div class="col-md-12 form-group">
								<input type="text" class="form-control"  name="nama" placeholder="Nama" Required>
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control"  name="email" placeholder="Email Address" Required>
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control"  name="notlp" placeholder="No.Telp/HP" Required>
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control"  name="password" placeholder="Password" Required>
							</div>
							<div class="col-md-12 form-group">
								<textarea class="form-control"  name="alamat" placeholder="Alamat Lengkap" Required></textarea>
							</div>
							<div class="col-md-12 form-group">
								<button class="btn submit_btn" name="daftar">Daftar</button>
							</div>
						</form>
						<?php
						//jika tombol daftar ditekan
						if (isset($_POST["daftar"]))
						{
							//mengambil isian 
							$nama = $_POST["nama"];
							$email = $_POST["email"];
							$password = $_POST["password"];
							$notlp = $_POST["notlp"];
							$alamat = $_POST["alamat"];

							//cek apakah email sudah digunakan
							$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
							$yangcocok=$ambil->num_rows;
							if($yangcocok==1)
							{
								echo "<script>alert('Email sudah digunakan');</script>";
								echo "<script>location='daftar.php';</script>";
							}
							else{
								//query insert ke table pelanggan
								$koneksi->query("INSERT INTO pelanggan (email_pelanggan,password_pelanggan,nama_pelanggan,notlp_pelanggan,alamat_pelanggan)
								VALUES('$email','$password','$nama','$notlp','$alamat')");
								
								echo "<script>alert('Pendaftaran SUKSES, silahkan login');</script>";
								echo "<script>location='login.php';</script>";

							}

						}


						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

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