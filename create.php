<?php 
	session_start();
	include 'koneksi.php';

	//Selesai mengisi data dan menekan tombol submit
	if(isset($_POST['submit'])){

		// proses insert
		$insert = mysqli_query($conn, "INSERT INTO pinjam VALUES (
				DEFAULT,
				'".date('Y-m-d')."',
				'',
				'".$_POST['buku']."',
				'".$_POST['nama']."',
				'".$_POST['no_ktp']."',
				'".$_POST['alamat']."',
				'".$_POST['jk']."',
				'".$_POST['no_tlp']."'
			)");

		//jika berhasil insert pindah ke beranda
		if($insert){
			if($_SESSION['authority'] == 1){
				echo '<script>window.location="admin_beranda.php"</script>';
			} elseif ($_SESSION['authority'] == 2){
				echo '<script>window.location="petugas_beranda.php"</script>';
			}

		}else{
			echo 'Error '.mysqli_error($conn);
		}
		
	}

	//$user untuk menentukan usernya admin atau petugas dan digunakan untuk header
	if($_SESSION['authority'] == 1){
			$user = 'Admin';
		} else {
			$user = 'Petugas';
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

	<header>
		<h1><a><span class="label-testing"><?php echo $user; ?></span></a></h1>
		<ul class="nav navbar-nav navbar-right">
			<li><a href=<?php echo $user; ?>_beranda.php>Beranda</a></li>
			<li><a href="create.php">Tambah Data</a></li>
			<li><a href=<?php echo $user; ?>_dp.php>Data Peminjaman</a></li>
			<li><a href="keluar.php">Keluar</a></li>
			<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-globe" style="font-size:18px; color: blue;"></span></a>
			<ul class="dropdown-menu"></ul>
			</li>
		</ul>
	</header>

	<!-- bagian box formulir -->
	<section class="box-formulir">
		
		<h2>Formulir Pendaftaran Institut Pendidikan Online</h2>

		<!-- bagian formulir isianya -->
		<form action="" method="post">

			<div class="box">
				<table border="0" class="table-form">
					<tr>
						<td>Judul Buku</td>
						<td>:</td>
						<td>
							<input type="text" name="buku" class="input-control">
						</td>
					</tr>


					<tr>
						<td>Nama Peminjam</td>
						<td>:</td>
						<td>
							<input type="text" name="nama" class="input-control">
						</td>
					</tr>

					<tr>
						<td>No. KTP</td>
						<td>:</td>
						<td>
							<input type="text" name="no_ktp" class="input-control">
						</td>
					</tr>

					<tr>
						<td>Alamat Lengkap</td>
						<td>:</td>
						<td>
							<textarea class="input-control" name="alamat"></textarea>
						</td>
					</tr>

					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td>
							<input type="radio" name="jk" class="input-control" value="Pria"> Pria &nbsp;&nbsp;&nbsp;
							<input type="radio" name="jk" class="input-control" value="Wanita"> Wanita
						</td>
					</tr>

					<tr>
						<td>No. Telepon</td>
						<td>:</td>
						<td>
							<input type="text" name="no_tlp" class="input-control">
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
<script type = "text/javascript">
$(document).ready(function(){
	
	function load_unseen_notification(view = '')
	{
		$.ajax({
			url:"fetch.php",
			method:"POST",
			data:{view:view},
			dataType:"json",
			success:function(data)
			{
			$('.dropdown-menu').html(data.notification);
			if(data.unseen_notification > 0){
			$('.count').html(data.unseen_notification);
			}
			}
		});
	}
 
	load_unseen_notification();
 
	$('#add_form').on('submit', function(event){
		event.preventDefault();
		if($('#firstname').val() != '' && $('#lastname').val() != ''){
		var form_data = $(this).serialize();
		$.ajax({
			url:"addnew.php",
			method:"POST",
			data:form_data,
			success:function(data)
			{
			$('#add_form')[0].reset();
			load_unseen_notification();
			}
		});
		}
		else{
			alert("Enter Data First");
		}
	});
 
	$(document).on('click', '.dropdown-toggle', function(){
	$('.count').html('');
	load_unseen_notification('yes');
	});
 
	setInterval(function(){ 
		load_unseen_notification();; 
	}, 5000);
 
});
</script>
</html>