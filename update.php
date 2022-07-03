<?php 
	session_start();
	include 'koneksi.php';

	if($_SESSION['stat_login'] != true){
		echo '<script>window.location="index.php"</script>';
	}

	if(isset($_GET['id'])){
		$update = mysqli_query($conn, "SELECT * FROM pinjam WHERE id_pinjam = '".$_GET['id']."' ");
		$u = mysqli_fetch_assoc($update);
	}

	//Selesai mengisi data dan menekan tombol submit
	if(isset($_POST['submit'])){

		//proses insert data baru
		$insertupdate = mysqli_query($conn, "UPDATE pinjam SET 
				buku = '".$_POST['buku']."',
				nama = '".$_POST['nama']."',
				no_ktp = '".$_POST['no_ktp']."',
				alamat = '".$_POST['alamat']."',
				jk = '".$_POST['jk']."',
				no_tlp = '".$_POST['no_tlp']."'
			 WHERE id_pinjam = '".$_GET['id']."' ");

		//jika berhasil insert pindah ke beranda
		if($insertupdate){
			if($_SESSION['authority'] == 1){
				echo '<script>window.location="admin_dp.php"</script>';
			} elseif ($_SESSION['authority'] == 2){
				echo '<script>window.location="petugas_dp.php"</script>';
			}
			

		}else{
			echo 'Error '.mysqli_error($conn);
		}
		
	}

	if (isset($_POST['submit'])) {
		echo '<script>window.location="admin_dp.php"</script>';
	}

	//$user untuk menentukan usernya admin atau petugas dan digunakan untuk header
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Perpustakaan Online</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
</head>
<body>

	<header>
		<h1><a><span class="label-testing">Admin</span></a></h1>
		<ul>
			<li><a href="admin_dp">Beranda</a></li>
			<li><a href="create.php">Tambah Data</a></li>
			<li><a href="admin_dp">Data Peminjaman</a></li>
			<li><a href="keluar.php">Keluar</a></li>
		</ul>
	</header>

	<!-- bagian box formulir -->
	<section class="box-formulir">
		<form action="" method="post">
			<input type="submit" name="submit" class="btn-daftar" value="Kembali">
		</form>
		
		<h2>Formulir Pendaftaran Institut Pendidikan Online</h2>

		<!-- bagian formulir isianya -->
		<form action="" method="post">

			<div class="box">
				<table border="0" class="table-form">
					<tr>
						<td>Judul Buku</td>
						<td>:</td>
						<td>
							<input type="text" name="buku" class="input-control" value="<?php echo $u['buku'] ?>">
						</td>
					</tr>


					<tr>
						<td>Nama Peminjam</td>
						<td>:</td>
						<td>
							<input type="text" name="nama" class="input-control" value="<?php echo $u['nama'] ?>">
						</td>
					</tr>

					<tr>
						<td>No. KTP</td>
						<td>:</td>
						<td>
							<input type="text" name="no_ktp" class="input-control" value="<?php echo $u['no_ktp'] ?>">
						</td>
					</tr>

					<tr>
						<td>Alamat Lengkap</td>
						<td>:</td>
						<td>
							<textarea class="input-control" name="alamat"><?php echo $u['alamat'] ?></textarea>
						</td>
					</tr>

					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td>
							<input type="radio" name="jk" class="input-control" <?php if($u['jk']=="Pria") echo "checked";?> value="Pria"> Pria &nbsp;&nbsp;&nbsp;
							<input type="radio" name="jk" class="input-control" <?php if($u['jk']=="Wanita") echo "checked";?> value="Wanita"> Wanita
						</td>
					</tr>

					<tr>
						<td>No. Telepon</td>
						<td>:</td>
						<td>
							<input type="text" name="no_tlp" class="input-control" value="<?php echo $u['no_tlp'] ?>">
						</td>
					</tr>

					<tr>
						<td></td>
						<td></td>
						<td>
							<input type="submit" name="submit" class="btn-daftar" value="Submit">
						</td>
					</tr>

				</table>
			</div>

			
		</form>

	</section>

</body>
</html>