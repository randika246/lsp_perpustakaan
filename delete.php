<?php 
	session_start();
	include 'koneksi.php';

	//mencari field sesuai id pada barisan tabel dan menghapusnya
	if(isset($_GET['id'])){
		$update = mysqli_query($conn, "DELETE FROM pinjam WHERE id_pinjam = '".$_GET['id']."' ");
	}
	
	//kembali ke data peminjam sesuai akun yang digunakan sebelumnya
	if ($_SESSION['authority'] == 1){
			echo '<script>window.location="admin_dp.php"</script>';
		} else {
			echo '<script>window.location="petugas_dp.php"</script>';
		}
?>