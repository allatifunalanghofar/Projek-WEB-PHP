
<?php
    $koneksi = mysqli_connect ('localhost', 'root', '','db_artshop');
    //mengambil data dari url
    $ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'"); 
    $pecah = $ambil->fetch_assoc();
    $fotoproduk = $pecah['foto_produk'];
    if (file_exists("foto/$fotoproduk")){
        unlink("foto/$fotoproduk");
    }
    
    //menghapus data
    $koneksi->query("DELETE FROM produk WHERE id_produk='$_GET[id]'"); 

	
	echo "<meta http-equiv='refresh' content='1;url=index.php?module=produk/produk-list'>";
?>
