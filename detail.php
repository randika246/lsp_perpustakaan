<?php 
	session_start();
	include 'koneksi.php';
	if($_SESSION['stat_login'] != true){
		echo '<script>window.location="index.php"</script>';
	}

	$peminjam = mysqli_query($conn, "SELECT * FROM pinjam WHERE id_pinjam = '".$_GET['id']."' ");
	$p = mysqli_fetch_object($peminjam);

	if(isset($_POST['submit'])){

		if ($_SESSION['authority'] == 1){
			echo '<script>window.location="admin_dp.php"</script>';
		} else {
			echo '<script>window.location="petugas_dp.php"</script>';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PIPOnline</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
</head>
<body>

	<!-- bagian header -->
	<header>
		<h1><a>Admin</a></h1>
		<ul>
			<li><a href="beranda.php">Beranda</a></li>
			<li><a href="create.php">Tambah Data</a></li>
			<li><a href="admin_dp.php">Data Peminjam</a></li>
			<li><a href="keluar.php">Keluar</a></li>
		</ul>
	</header>

	<!-- bagian content -->
	<section class="content">

		<!-- tombol kembali -->
		<form action="" method="post">
			<input type="submit" name="submit" class="btn-daftar" value="Kembali">
		</form>

		<!-- form data -->
		<h2>Detail Peserta</h2>
		<div class="box">
			
			<table class="table-data" border="0">
			<tr>
				<td>ID Peminjam</td>
				<td>:</td>
				<td><?php echo $p->id_pinjam ?></td>
			</tr>
			<tr>
				<td>Tanggal Pinjam</td>
				<td>:</td>
				<td><?php echo $p->tgl_pinjam ?></td>
			</tr>
			<tr>
				<td>Tanggal Kembali</td>
				<td>:</td>
				<td><?php echo $p->tgl_kembali ?></td>
			</tr>
			<tr>
				<td>Nama Buku</td>
				<td>:</td>
				<td><?php echo $p->buku ?></td>
			</tr>
			<tr>
				<td>Nama Peminjam</td>
				<td>:</td>
				<td><?php echo $p->nama ?></td>
			</tr>
			<tr>
				<td>No. KTP</td>
				<td>:</td>
				<td><?php echo $p->no_ktp ?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><?php echo $p->alamat ?></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td><?php echo $p->jk ?></td>
			</tr>
			<tr>
				<td>No. Telepon</td>
				<td>:</td>
				<td><?php echo $p->no_tlp ?></td>
			</tr>
			</table>

		</div>
	</section>

</body>
</html>