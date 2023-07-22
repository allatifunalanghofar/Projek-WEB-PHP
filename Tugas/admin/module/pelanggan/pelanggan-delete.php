
<?php
    $conn = mysqli_connect ('localhost', 'root', '','db_artshop');
    //mengambil data dari url
    
    //menghapus data
    $koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan='$_GET[id]'"); 

	
	echo "<meta http-equiv='refresh' content='1;url=index.php?module=pelanggan/pelanggan-list'>";
?>
