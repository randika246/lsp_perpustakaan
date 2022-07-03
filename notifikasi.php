<?php
	include('conn.php');
	session_start();
	include 'koneksi.php';
	if($_SESSION['stat_login'] != true){
		echo '<script>window.location="index.php"</script>';
	}
?>
<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Perpustakaan Online</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<title>Notifikasi</title>
	</head>
	<style>
		label{
			color: blue;
		}
	</style>
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

	<div style="height:5px;"></div>
	<div class="row">	
		<div class="col-md-3">
		</div>
		<div class="col-md-6 well" style="background-color: white;">
			<div class="row">
                <div class="col-lg-12">
                    <center><h2 class="text-primary">Pesan Notifikasi</h2></center>
					<hr>
				<div>
					<form class="form-inline" method="POST" id="add_form">
						<div class="form-group">
							<label>Nama:</label>
							<input type="text" name="send_to" id="send_to" class="form-control">
						</div>
						<div class="form-group">
							<label>Pesan:</label>
							<textarea name="message" id="message" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" name="addnew" id="addnew" class="btn btn-primary" value="Add">
						</div>
					</form>
				</div>
                </div>
            </div><br>
			<div class="row">
			<div id="userTable"></div>
			</div>
		</div>
		<div class = "col-md-3">
		</div>
	</div>
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
		if($('#send_to').val() != '' && $('#message').val() != ''){
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