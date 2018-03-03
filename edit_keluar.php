<html>
<head>
	<title> </title>
	<link rel="stylesheet" type="text/css" href="style/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="style/js/jquery-ui/jquery-ui.css">
  <script type="text/javascript" src="style/js/jquery.js"></script>
  <script type="text/javascript" src="style/js/jquery.js"></script>
  <script type="text/javascript" src="style/js/bootstrap.js"></script>
  <script type="text/javascript" src="style/js/jquery-ui/jquery-ui.js"></script>  
</head>
<body>
<?php 
include'head.php';
include 'koneksi.php';
$no_agenda=$_GET['no_agenda'];
$query=mysql_query("SELECT * from surat_keluar where no_agenda='$no_agenda'");
?>
   <div class="container"><br><br>	<br>	

   	<button type="submit" value="Go Back" onclick="history.back(-1)" class="btn btn-default">Go Back</button>
	<form action="save_keluar.php" class="form-horizontal" method="POST">
	<?php
while($row=mysql_fetch_array($query)){
?>
		<div class="form-group">		
		<h3 style="padding-left: 440px;" >Form Edit Surat Keluar </h3><br>		
		<label for="no_agenda" class="col-sm-4 control-label">No agenda:</label>
		<div class="col-sm-4">
		<input type="text" class="form-control" name="no_agenda" value="<?php echo $no_agenda;?>" readonly/>
		</div>
		</div>
		<div class="form-group">
			<label for="id" class="col-sm-4 control-label">Id:</label>
		<div class="col-sm-4">
			<input type="text" name="id" value="<?php
                 echo $_SESSION['id'];
                  ?>" class="form-control" readonly>
		</div>
		</div>		
		<div class="form-group">
			<label for="jenis_surat" class="col-sm-4 control-label">Jenis Surat:</label>
		<div class="col-sm-4">	
			<input type="text" name="jenis_surat" value="<?php echo $row['jenis_surat'];?>" class="form-control">
		</div>
		</div>		
		<div class="form-group">
			<label for="tanggal_kirim" class="col-sm-4 control-label">Tanggal Kirim:</label>
		<div class="col-sm-4">	
			<input type="date" name="tanggal_kirim" value="<?php echo $row['tanggal_kirim'];?>" class="form-control">
		</div>
		</div>
		<div class="form-group">
			<label for="no_surat" class="col-sm-4 control-label">No Surat:</label>
		<div class="col-sm-4">	
			<input type="text" name="no_surat" value="<?php echo $row['no_surat'];?>" class="form-control">
		</div>
		</div>
		<div class="form-group" >
			<label for="pengirim" class="col-sm-4 control-label">Pengirim:</label>
		<div class="col-sm-4">
			<input type="text" name="pengirim" value="<?php echo $row['pengirim'];?>" class="form-control">
		</div>
		</div>
		<div class="form-group">
			<label for="perihal" class="col-sm-4 control-label">Perihal:</label>
		<div class="col-sm-4">
			<input type="text" name="perihal" value="<?php echo $row['perihal'];?>" class="form-control">
		</div>
		</div>
		<div class="form-group">
			<label for="tanggapan" class="col-sm-4 control-label">Tanggapan:</label>
		<div class="col-sm-4">
			<input type="text" name="tanggapan" value="<?php echo $row['tanggapan'];?>" class="form-control">
		</div>
		</div>
		<div class="col-sm-offset-4 col-sm-10">
		<button type="submit" class="btn btn-default">Submit</button>
		</div>
	<?php
	}
	?> 		
	</form>
   </div>

</body>
</html>