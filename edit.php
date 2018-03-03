<html>
<head>
	<title> </title>
	<link rel="stylesheet" type="text/css" href="style/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="style/js/jquery-ui/jquery-ui.css">
 
</head>
<body>
<?php 
include 'koneksi.php';
include 'head.php';
$no_agenda=$_GET['no_agenda'];
$query=mysql_query("SELECT * from surat_masuk where no_agenda='$no_agenda'");
?>
   <div class="container"><br><br><br>	

	<button type="submit" value="Go Back" onclick="history.back(-1)" class="btn btn-default">Go Back</button>
	<form action="save.php" class="form-horizontal" method="post">
	<?php
while($row=mysql_fetch_array($query)){
?>
		<div class="form-group">
		<h3 style="padding-left: 440px;" >Form Edit Surat Masuk </h3><br>
			<label for="no_agenda" class="col-sm-4 control-label">No agenda:</label>	
			<div class="col-sm-4">
			<input type="text" class="form-control" name="no_agenda" value="<?php echo $no_agenda;?>" readonly />
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
			<div class="col-sm-4" >	
			<input type="text" name="jenis_surat" class="form-control" value="<?php echo $row['jenis_surat'];?>" >
			</div>
		</div>		
		<div class="form-group">
			<label for="tanggal_kirim" class="col-sm-4 control-label">Tanggal Kirim:</label>
			<div class="col-sm-4">	
			<input type="date" name="tanggal_kirim"  class="form-control" value="<?php echo $row['tanggal_kirim'];?>">
			</div>
		</div>
		<div class="form-group">
			<label for="tanggal_terima" class="col-sm-4 control-label">Tanggal Terima:</label>
			<div class="col-sm-4">	
			<input type="date" name="tanggal_terima" class="form-control" value="<?php echo $row['tanggal_terima'];?>" >
			</div>
		</div>
		<div class="form-group">
			<label for="no_surat" class="col-sm-4 control-label">No Surat:</label>
			<div class="col-sm-4">	
			<input type="text" name="no_surat"  class="form-control" value="<?php echo $row['no_surat'];?>">
			</div>
		</div>
		<div class="form-group">
			<label for="pengirim" class="col-sm-4 control-label">Pengirim:</label>
			<div class="col-sm-4">	
			<input type="text" name="pengirim"  class="form-control" value="<?php echo $row['pengirim'];?>">
			</div>
		</div>
		<div class="form-group">
			<label for="penerima" class="col-sm-4 control-label">Penerima:</label>
			<div class="col-sm-4">	
			<input type="text" name="penerima" class="form-control"  value="<?php echo $row['penerima'];?>">
			</div>
		</div>
		<div class="form-group">
			<label for="perihal" class="col-sm-4 control-label">Perihal:</label>
			<div class="col-sm-4">	
			<input type="text" name="perihal" class="form-control"  value="<?php echo $row['perihal'];?>">
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