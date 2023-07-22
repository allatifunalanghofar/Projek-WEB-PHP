<?php

//koneksi database
$koneksi = new mysqli("localhost","root","","db_artshop");

?>
<section class="content-header">
	<h1>Dashboard <span class="small">  Selamat datang</span></h1>
</section>

<section class="content">
	
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
              <?php
                $result = $koneksi->query("SELECT * FROM pembelian");
                $num_rows = mysqli_num_rows($result);
              ?>
              <h3><?php echo $num_rows ?></h3>

                <p>Pembeliaan</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="?module=pembelian/pembelian-list" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                
                <!-- total membeli -->
                <?php
                  $ambil = $koneksi->query("SELECT SUM(total_pembelian) AS total FROM pembelian");
                  while($data = $ambil->fetch_assoc()){
                ?>
                  <h3><span class="small bg-yellow">Rp.<?php echo number_format ($data['total']);?></span></h3>
                  <?php }?>
                <p>Total Pemasukan</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="?module=pembelian/pembelian-list" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-blue">
              <div class="inner">
                <?php
                  $result = $koneksi->query("SELECT * FROM produk");
                  $num_rows = mysqli_num_rows($result);
                ?>
                <h3><?php echo $num_rows ?></h3>

                <p>Produk</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="?module=produk/produk-list" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <?php
                  $result = $koneksi->query("SELECT * FROM pelanggan");
                  $num_rows = mysqli_num_rows($result);
                ?>
                <h3><?php echo $num_rows ?></h3>
                <p>Pelanggan</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="?module=pelanggan/pelanggan-list" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
        </div>


	<!-- <div class="col-md-10">
		<h3>Chart Penjualan</h3>
	</div>
	
	<div class="container-fluid">
		<div class="row">
          	<div class="col-md-12"> -->
				<!-- CHART Beras Pre -->
				<!-- <div class="card card-primary">
					<div class="card-header">
						<h4 class="card-title">Line Chart Penjualan</h4>
					</div>
					<div class="card-body">
						<div class="chart">
							<canvas id="linechart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
						</div>
					</div> -->
					<!-- /.card-body -->
				<!-- </div> -->
				<!-- /.card -->
			</div>
		</div>
	</div>
</section>

