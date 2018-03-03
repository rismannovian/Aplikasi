<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="style/js/jquery.js"></script>
	<script type="text/javascript" src="style/js/jquery.js"></script>
	<script type="text/javascript" src="style/js/bootstrap.js"></script>
	<script type="text/javascript" src="style/js/jquery-ui/jquery-ui.js"></script>	
</head>
<body>
<?php
                session_start();
                if (empty($_SESSION['id']))
                {
                                header("location:login.php");
                }             

?>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
	  <div class="container">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand hidden-xs hidden-sm" href="index.php" >Aplikasi Surat  </a>
		</div>

		<div class="collapse navbar-collapse" id="myNavbar">
		  <ul class="nav navbar-nav">
			<li class="dropdown"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
			<li class="dropdown"><a href="data.php"  title="Lihat Data Masuk "><span class="glyphicon glyphicon-list"></span> Surat Masuk</a></li>
			<li><a href="data_keluar.php"  title="Lihat Data Keluar "><span class="glyphicon glyphicon-list"></span> Surat Keluar</a></li>
			<li><a href="data_disposisi.php"  title="Lihat Data Disposisi  "><span class="glyphicon glyphicon-list"></span> Disposisi</a></li>
			<li><a href="data_petugas.php" data-toggle="tooltip" data-placement="bottom" title="Admin" ><span class="glyphicon glyphicon-user"> Admin</a></li>
			<li>
			<?php 

			if (isset($_SESSION ['id'])) {
       		 ?>
			<a href="logout.php" data-toggle="tooltip" data-placement="bottom" title="Admin" ><span class="glyphicon glyphicon-user"> Logout</a></li>
			<?php
			}
 			?>
 			<li> <br>
 				<p style="   font-family: Comic Sans MS; color: #fff;"> Selamat Anda Berhasil Login
                 <?php
                 echo $_SESSION['id'];
                  ?>
</p>
 			</li>
			 
			 </ul>

			
			
		</div>
	  </div>
	</nav>

