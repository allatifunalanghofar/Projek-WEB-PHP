<?php
session_start();
//koneksi database
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
					<h1>" Halaman Login"</h1>
				</font>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Login Box Area =================-->
	<section class="login_box_area ">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="img/login.jpg" alt="">
						<div class="hover">
							<h4>Udah daftar Belum ?</h4>
							<p>untuk melanjutkan transaksi anda harus membuat akun terlebih dahulu.</p>
							<a class="main_btn" href="registration.php">BUAT AKUN</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Log in</h3>
						<form class="row login_form"  method="post" id="contactForm" novalidate="novalidate">
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="name" name="email" placeholder="Email">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="name" name="pass" placeholder="Password">
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" name ="simpan" class="btn submit_btn">MASUK</button>
								
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php
		if (isset($_POST['simpan']))
		{
			$email =$_POST["email"];
			$password = $_POST["pass"];
			//lakukan query ngecek akun ditabel pelanggan di db
			$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$email' AND password_pelanggan='$password'");

			//login admin
			$ambil2=$koneksi->query("SELECT * FROM admin WHERE username_admin='$email' AND password_admin ='$password'");
			//menghitung akunn admin 
			$cocok2 = $ambil2->num_rows;
			$cocok = $ambil->num_rows;

			//jika 1 akun yang cocok, maka akan login
			if ($cocok2==1){
				$_SESSION['admin']=$ambil2->fetch_assoc();
				echo "<script>alert('Login Berhasil');</script>";
				echo "<script>location='admin/index.php';</script>";
			}
			
			
			
			if ($cocok==1)
			{
				//anda sukses login
				$akun = $ambil->fetch_assoc();
				//simpan di session pelanggan
				$_SESSION['pelanggan']=$akun;
				echo "<script>alert('Login Berhasil');</script>";
				echo "<script>location='index.php';</script>";
			}
			else
			{
				//anda harus login
				echo "<script>alert('Login GAGAL periksa akun anda');</script>";
				echo "<script>location='login.php';</script>";
			}
		}
		?>
	</section>
	<!--================End Login Box Area =================-->

	<!--================ Subscription Area ================-->
	<section class="subscription-area section_gap">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="section-title text-center">
						<h2>Terimakasih untuk waktunya</h2>
						<span>jangan lupa beli ya</span>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
			</div>
		</div>
	</section>
	<!--================ End Subscription Area ================-->

	
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