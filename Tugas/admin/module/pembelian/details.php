<?php

//koneksi database
$koneksi = new mysqli("localhost","root","","db_artshop");
$ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan
ON pembelian.id_pelanggan=pelanggan.id_pelanggan
WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>


<section class="content-header">
	<h1>Data PEMBELIAN</h1>
</section>

<section class="content">
	<div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    
                    <p>
                        <strong>Pembelian</strong><br>
                        No. Pembelian : <?php echo $detail['id_pembelian'] ?><br>
                        Tanggal : <?php echo $detail['tanggal_pembelian']; ?><br>
                        Total : Rp. <?php echo number_format($detail['total_pembelian']) ?>
                    </p>
                </div>
                <div class="col-md-4">
                    
                    <p>
                        <strong>Pelanggan</strong><br>
                        Nama :<?php echo $detail['nama_pelanggan']; ?><br>
                        No.Telepon :<?php echo $detail['notlp_pelanggan'] ?><br>
                        Email :<?php echo $detail['email_pelanggan'] ?>
                    </p>
                                
                </div>
                <div class="col-md-4">
                    
                    <p>
                        <strong>Pengiriman</strong><br>
                        Nama Kota : <?php echo $detail['nama_kota']; ?><br>
                        Ongkos Kirim :Rp.  <?php echo number_format($detail['tarif']); ?><br>
                        Alamat : <?php echo $detail['alamat_pengiriman'] ?>
                    </p>
                </div>
            </div>

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
        </div>
    </div>
</section>
