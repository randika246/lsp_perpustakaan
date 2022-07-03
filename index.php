<?php
	
	//session_start, agar variable session bisa global dan bisa diambil dari file lain
	session_start();
	include 'koneksi.php';

	//jika menekan tombol login
	if(isset($_POST['login'])){

		// cek akun ada apa tidak pada table admin
		$cek = mysqli_query($conn, "SELECT * FROM admin
			WHERE username = '".htmlspecialchars($_POST['user'])."' AND password = '".MD5(htmlspecialchars($_POST['pass']))."' ");

		//jika akun ada pada search
		if(mysqli_num_rows($cek) > 0){
			$a = mysqli_fetch_object($cek);

			$_SESSION['stat_login'] = true;
			$_SESSION['id'] = $a->id;
			$_SESSION['nama'] = $a->nama; 

			//mengecek authority bahwa akun adalah admin atau petugas
			if ($a->authority == 1) {
				$_SESSION['authority'] = 1;
				echo '<script>window.location="admin_beranda.php"</script>';
			} elseif ($a->authority == 2) {
				$_SESSION['authority'] = 2;
				echo '<script>window.location="petugas_beranda.php"</script>';
			} 

		} else {
				echo '<script>alert("Gagal, username atau password salah")</script>';
			}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Perpustakaan Online</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

	<!-- headernya -->
	<header>
		<h1><a>Perpustakaan Online</a></h1>
		<ul>
			<li><a>Beranda</a></li>
			<li><a>Tambah Data</a></li>
			<li><a>Data Peminjaman</a></li>
			<li><a>Keluar</a></li>
		</ul>
	</header>


	<!-- bagian main login -->
	<section class="main-login">
		
		<div class="box-login">
			<h2>Login In</h2>

			<!-- bagian form login -->
			<form action="" method="post">
				
				<div class="box">
					<table>
						<tr>
							<td>Username</td>
							<td>:</td>
							<td>
								<input type="text" name="user" class="input-control">
							</td>
						</tr>
						<tr>
							<td>Password</td>
							<td>:</td>
							<td>
								<input type="password" name="pass" class="input-control">
							</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>
								<input type="submit" name="login" value="Login" class="btn-login">
							</td>
						</tr>
					</table>
				</div>

			</form>
		</div>

	</section>

</body>
</html>