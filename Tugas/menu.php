	<!--================Header Menu Area =================-->
	<header class="header_area">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container-fluid">
					<a class="navbar-brand" href="index.php"> GoFish </a>
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<div class="row w-100">
							<div class="col-lg-8">
								<ul class="nav navbar-nav center_nav pull-right">
									<li class="nav-item active">
										<a class="nav-link" href="index.php">Home</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="about.php">About Us</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="cart.php">Keranjang</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="checkout.php">Checkout</a>
									</li>
									<!-- jika sudah login(ada session pelanggan) -->
									<?php if(isset($_SESSION["pelanggan"])):?>
										<li class="nav-item">
											<a class="nav-link" href="logout.php">Logout</a>
										</li>

									<!-- selain itu(blum login, belum ada session pelanggan) -->
									<?php else: ?>
										<li class="nav-item">
											<a class="nav-link" href="login.php">Login</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="registration.php">Daftar</a>
										</li>

									<?php endif ?>
								</ul>
							</div>
						</div>

					</div>
				</div>
			</nav>
		</div>
	</header>
	<!--================Header Menu Area =================-->

