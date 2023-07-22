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

<body style = "background-color: #edfff8;">
	<!--================Header Menu Area =================-->
	<?php include 'menu.php'; ?>
	<!--================Header Menu Area =================-->

	<!--================Home Banner Area =================-->
	<!-- <section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h1>Detail Pembelanjaan</h1>
				</div>
			</div>
		</div>
	</section> -->
	<!--================End Home Banner Area =================-->

	<!--================Nota Area =================-->
	<section class="cart_area">
		<div class="container">
			<div class="cart_inner">
            <h2>Detail Pembelian</h2>
            <hr>
            <?php 
            $ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan
            ON pembelian.id_pelanggan=pelanggan.id_pelanggan
            WHERE pembelian.id_pembelian='$_GET[id]'");
            $detail = $ambil->fetch_assoc();
            ?>
    
        
            <div class="row">
                <div class="col-md-4">
                    <h4>Pembelian<h4>
                    <strong>No. Pembelian : <?php echo $detail['id_pembelian'] ?></strong><br>
                    <p>
                        Tanggal : <?php echo $detail['tanggal_pembelian']; ?><br>
                        Total : Rp. <?php echo number_format($detail['total_pembelian']) ?>
                    </p>
                </div>
                <div class="col-md-4">
                    <h4>Pelanggan</h4>
                    <strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
                    
                        No.Telepon :<?php echo $detail['notlp_pelanggan'] ?><br>
                        Email :<?php echo $detail['email_pelanggan'] ?>
                    
                </div>
                <div class="col-md-4">
                    <h4>Pengiriman<h4>
                    <strong><?php echo $detail['nama_kota']; ?></strong><br>
                    <p>
                        Ongkos Kirim :Rp.  <?php echo number_format($detail['tarif']); ?><br>
                        Alamat : <?php echo $detail['alamat_pengiriman'] ?>
                    </p>
                </div>
            </div>
                

				<div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nomor=1; ?>
                            <?php 
                                $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk
                                ON pembelian_produk.id_produk=produk.id_produk
                                WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
                            <?php while($pecah = $ambil->fetch_assoc()){?>
                            
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo $pecah['nama_produk']; ?></td>
                                <td><?php echo $pecah['harga_produk']; ?></td>
                                <td><?php echo $pecah['jumlah']; ?></td>
                                <td>
                                    <?php echo $pecah['harga_produk']* $pecah['jumlah'];?>
                                </td>

                            </tr>
                            <?php $nomor++; ?>
                            <?php }?>
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-md-7">
                            <div class="alert alert-info">
                                <p>
                                    Silahkan melakukan pembayaran sejumlah Rp. <?php echo number_format ($detail['total_pembelian']); ?> ke <br>
                                    <strong>BANK BRI 123456789 - Admin</strong>
                                    <br> setelah membayar silakan kirim bukti pembayaran ke no wa 081234567890 
                                </p>
                            </div>
                        </div>
                    </div>

				</div>
			</div>
		</div>
	</section>

	<!--================End Checkout Area =================-->


	
	<!--================ start footer Area  =================-->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row footer-bottom d-flex justify-content-between align-items-center">
				<p class="col-lg-12 footer-text text-center">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This is <i class="fa fa-star-o" aria-hidden="true"></i><a href="" target="_blank">GoFish</a>

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