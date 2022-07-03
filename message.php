<?php 
	session_start();
	include 'koneksi.php';
	if($_SESSION['stat_login'] != true){
		echo '<script>window.location="index.php"</script>';
	}

	if(isset($_POST['submit'])){

		if ($_SESSION['authority'] == 1){
			echo '<script>window.location="notifikasi.php"</script>';
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

	<!-- bagian header -->
	<header>
		<h1><a>Admin</a></h1>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="admin_beranda.php">Beranda</a></li>
			<li><a href="create.php">Tambah Data</a></li>
			<li><a href="admin_dp.php">Data Peminjaman</a></li>
			<li><a href="message.php">Notifikasi</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-globe" style="font-size:18px; color: blue;"></span></a>
				<ul class="dropdown-menu"></ul>
			</li>
			<li><a href="keluar.php">Keluar</a></li>
		</ul>
	</header>

	<!-- bagian content -->
	<section class="content">
		<h2>Pesan</h2>
		<form action="" method="post">
			<input type="submit" name="submit" class="btn-daftar" value="Kirim Pesan">
		</form>
		<div class="box">
			<table class="table" border="1">
				<thead>
					<tr>
						<!-- field columnya -->
						<th>No</th>
						<th>ID Pesan</th>
						<th>Tujuan Pesan</th>
						<th>Pesan</th>
						<th>Status Baca</th>
					</tr>
				</thead>
				<tbody>

					<!-- looping recordnya -->
					<?php 
						include 'conn.php';
						$no = 1;
						$list_admin = mysqli_query($conn, "SELECT * FROM admin");
						while($row = mysqli_fetch_array($list_admin)){
					?>
					<tr>
						<!-- datanya-->
						<td><?php echo $no++ ?></td>
						<td><?php echo $row['id_admin'] ?></td>
						<td><?php echo $row['send_to'] ?></td>
						<td><?php echo $row['message'] ?></td>
						<td><?php echo $row['seen_status'] ?></td>
					</tr>
					<?php } ?>
					
				</tbody>
			</table>
		</div>
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