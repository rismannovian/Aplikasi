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
$no_disposisi=$_GET['no_disposisi'];
$query=mysql_query("SELECT * from disposisi where no_disposisi='$no_disposisi'");
?>
   <div class="container"><br><br><br>		

	<button type="submit" value="Go Back" onclick="history.back(-1)" class="btn btn-default">Go Back</button>
	<form action="save_disposisi.php" class="form-horizontal" method="post">
	
	<?php
while($row=mysql_fetch_array($query)){
?>
	<div class="form-group">
	<h3 style="padding-left: 440px;" >Form Edit Surat Keluar </h3><br>	
	<label for="no_disposisi" class="col-sm-4 control-label">No disposisi:</label>
	<div class="col-sm-4">
		<input type="text" class="form-control"  name="no_disposisi" value="<?php echo $no_disposisi;?>" readonly/>
	</div>
	</div>	
		<div class="form-group">
			<label for="no_agenda" class="col-sm-4 control-label">No agenda:</label>
			<div class="col-sm-4">	
				<select class="form-control" name="no_agenda" >
                <option selected>Pilih </option>
               <?php 
            

    $query2=mysql_query("SELECT * from surat_masuk",$conn) or die ('error'); 
                        while ($data2 =mysql_fetch_array($query2)) {


                           ?>
                           <option value=<?php echo $data2['no_agenda']; ?>> <?php echo $data2['no_agenda']; ?>     </option>
                           <?php  } ?>
                </select>
        	</div>   
		</div>		
		<div class="form-group">
			<label for="no_surat" class="col-sm-4 control-label">No Surat:</label>
			<div class="col-sm-4">
			<select class="form-control" name="no_surat" >
                <option selected>Pilih </option>
               <?php 
            

    $query1=mysql_query("SELECT * from surat_masuk",$conn) or die ('error'); 
                        while ($data1 =mysql_fetch_array($query1)) {


                           ?>
                           <option value=<?php echo $data1['no_surat']; ?>> <?php echo $data1['no_surat']; ?>     </option>
                           <?php  } ?>
                </select>
			</div>
		</div>		
		<div class="form-group">
			<label for="kepada" class="col-sm-4 control-label">Kepada:</label>
		<div class="col-sm-4">
			<input type="text" name="kepada"  class="form-control" value="<?php echo $row['kepada'];?>">
		</div>
		</div>
		<div class="form-group">
			<label for="keterangan" class="col-sm-4 control-label">Keterangan:</label>
		<div class="col-sm-4">
			<input type="text" name="keterangan" class="form-control" value="<?php echo $row['keterangan'];?>" >
		</div>
		</div>
		<div class="form-group">
			<label for="jenis_surat" class="col-sm-4 control-label">Jenis Surat:</label>
		<div class="col-sm-4">
			<input type="text" name="jenis_surat"  class="form-control" value="<?php echo $row['jenis_surat'];?>">
		</div>
		</div>
		<div class="form-group">
			<label for="tanggapan" class="col-sm-4 control-label">tanggapan:</label>
		<div class="col-sm-4">
			<input type="text" name="tanggapan"  class="form-control" value="<?php echo $row['tanggapan'];?>">
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