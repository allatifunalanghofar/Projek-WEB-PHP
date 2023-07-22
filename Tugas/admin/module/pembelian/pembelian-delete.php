
<?php
    $conn = mysqli_connect ('localhost', 'root', '','db_artshop');
    //mengambil data dari url
    
    //menghapus data
    $conn->query("DELETE FROM pembelian WHERE id_pembelian='$_GET[id]'"); 

	
	echo "<meta http-equiv='refresh' content='1;url=index.php?module=pembelian/pembelian-list'>";
?>
