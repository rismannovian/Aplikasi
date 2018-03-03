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
include 'head.php';
include'koneksi.php';
 ?>
   <div class="container"><br><br>		

	<form action="input_keluar.php" class="form-horizontal" method="post">

	<?php
	$query=mysql_query("select * from disposisi order by no_agenda asc");	
    $result = mysql_query("select * from disposisi");  
    $jsArray = "var prdName = new Array();\n";
     ?>

   
		<div class="form-group">
			   <h3 style="padding-left: 440px;" >Form Input Surat keluar</h3><br>
			<label for="no_agenda" class="col-sm-4 control-label" >No Agenda :</label>
			<div class="col-sm-4">

			<select class="form-control" name="no_agenda" onchange='changeValue(this.value)' >
			 <option >Pilih </option>
			 	<?php  
				while ($row = mysql_fetch_array($result)) {  
				?>
				
				<option name="no_agenda"  value="<?php echo  $row['no_agenda'] ;?>">
				<?php echo   $row['no_agenda'] ; ?></option> 
				
				<?php	

				$jsArray .= "prdName['" . $row['no_agenda'] . "'] = {kepada:'".addslashes($row['kepada']). "',jenis_surat:'".addslashes($row['jenis_surat'])."',keterangan:'".addslashes($row['keterangan'])."',tanggapan:'".addslashes($row['tanggapan'])."'};\n";  
				}  
	

				?>

			</select>
			</div>
		</div>
		<div class="form-group">
			<label for="id" class="col-sm-4 control-label" >Id :</label>
			<div  class="col-sm-4">
			<input type="text" name="id" value="<?php
                 echo $_SESSION['id'];
                  ?>"  class="form-control" readonly >
            </div>
		</div>		
		<div class="form-group">
			<label for="jenis_surat" class="col-sm-4 control-label">Jenis Surat :</label>
			<div class="col-sm-4">
			<input type="text" name="jenis_surat" id="jenis_surat" class="form-control" >
			</div>
		</div>		
		<div class="form-group">
			<label for="tanggal_kirim" class="col-sm-4 control-label">Tanggal Kirim :</label>
			<div class="col-sm-4">
			<input type="date" name="tanggal_kirim"  class="form-control" >
			</div>
		</div>
	
		<div class="form-group">
			<label for="no_surat" class="col-sm-4 control-label">No Surat :</label>
			<div class="col-sm-2">
			<input type="text" name="no_surat" id="no_surat"  class="form-control" >
			</div>
		</div>
		<div class="form-group">
			<label for="pengirim" class="col-sm-4 control-label">Pengirim :</label>
			<div class="col-sm-4">
			<input type="text" name="pengirim" id="kepada"  class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="perihal" class="col-sm-4 control-label">perihal :</label>
			<div class="col-sm-4">
			<textarea type="text" name="perihal" id="keterangan" class="form-control" ></textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="perihal" class="col-sm-4 control-label">tanggapan :</label>
			<div class="col-sm-4">
			<input type="text" name="tanggapan" id="tanggapan" class="form-control" >
			</div>
		</div>
		<div class="form-group">
		<div class="col-sm-offset-4 col-sm-10">
		<button type="submit" class="btn btn-default">Submit</button>
		</div>
		</div>
		
	</form>
   </div>
   <script type="text/javascript"> 
<?php echo $jsArray; ?>
function changeValue(id){
document.getElementById('kepada').value = prdName[id].kepada;
document.getElementById('jenis_surat').value = prdName[id].jenis_surat;
document.getElementById('keterangan').value = prdName[id].keterangan;
document.getElementById('tanggapan').value = prdName[id].tanggapan;

};
</script>

</body>
</html>