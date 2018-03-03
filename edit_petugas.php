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
include 'koneksi.php';
include 'head.php';
$id=$_GET['id'];
$query=mysql_query("SELECT * from petugas where id='$id'");
?>
   <div class="container"><br><br><br>	

	<button type="submit" value="Go Back" onclick="history.back(-1)" class="btn btn-default">Go Back</button>
	<form action="save_petugas.php" method="post">
	
   <h2>Form Edit Petugas</h2> 
	<table border="1" align="center">
	<?php
while($row=mysql_fetch_array($query)){
?>
	
	<label for="id">Username:</label>	
	<input type="text" class="form-control" name="id" value="<?php echo $id;?>" />
		<div class="form-group">
			<label for="nama_depan">Nama Depan:</label>
			<input type="text" name="nama_depan"  class="form-control" value="<?php echo $row['nama_depan'];?>" >
		</div>		
		<div class="form-group">
			<label for="nama_belakang">Nama Belakang:</label>
			<input type="text" name="nama_belakang" class="form-control" value="<?php echo $row['nama_belakang'];?>" >
		</div>		
		<div class="form-group">
			<label for="password">Password:</label>
			<input type="password" name="password"  class="form-control" value="<?php echo $row['password'];?>">
		</div>
	

		<button type="submit" class="btn btn-default">Submit</button>

	<?php
	}
	?> 		
	</table>
	</form>
   </div>

</body>
</html>