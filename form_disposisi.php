<html>
<head>
	<title> </title>
	<link rel="stylesheet" type="text/css" href="style/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="style/js/jquery-ui/jquery-ui.css">
<body>
<?php 
include 'head.php';
include'koneksi.php';


 ?>

 <?php 
$query = "SELECT max(no_disposisi) as maxKode FROM disposisi";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$kodeBarang = $data['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kodeBarang, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "DSP";
$newID = $char . sprintf("%03s", $noUrut);

  ?>
   <div class="container"><br><br>		

		<form action="input_disposisi.php" class="form-horizontal" method="post">
   
		<div class="form-group">
			   <h3 style="padding-left: 455px;" >Form Input Disposisi</h3><br>
			<label for="no_disposisi" class="col-sm-4 control-label" >No Disposisi :</label>
			<div class="col-sm-4"><input type="text" name="no_disposisi"  class="form-control" value="<?php echo $newID; ?>" readonly ></div>
		</div>
		
<?php
	$query=mysql_query("select * from surat_masuk order by no_agenda asc");	
    $result = mysql_query("select * from surat_masuk");  
    $jsArray = "var prdName = new Array();\n";
     ?>


		<div class="form-group">
			<label for="no_agenda" class="col-sm-4 control-label">No Agenda :</label>
			<div class="col-sm-4">
			<select class="form-control" name="no_agenda" onchange='changeValue(this.value)' >
			 <option >Pilih </option>
			 	<?php  
				while ($row = mysql_fetch_array($result)) {  
				?>
				
				<option name="no_agenda"  value="<?php echo  $row['no_agenda'] ;?>">
				<?php echo   $row['no_agenda'] ; ?></option> 
				
				<?php	

				$jsArray .= "prdName['" . $row['no_agenda'] . "'] = {no_surat:'" . addslashes($row['no_surat']). "',penerima:'".addslashes($row['penerima']). "',jenis_surat:'".addslashes($row['jenis_surat'])."',perihal:'".addslashes($row['perihal'])."'};\n";  
				}  
	

				?>

			</select>
			</div>
		</div>


		<div class="form-group">
			<label for="no_surat" class="col-sm-4 control-label">No Surat :</label>
			<div class="col-sm-2">
			<input type="text" id="no_surat" name="no_surat"  class="form-control" >
			</div>
		</div>


		<div class="form-group">
			<label for="kepada" class="col-sm-4 control-label">Kepada :</label>
			<div class="col-sm-4">
			<input type="text" name="kepada" id="penerima"  class="form-control" >
			</div>
		</div>
		<div class="form-group">
			<label for="jenis_surat" class="col-sm-4 control-label">Jenis Surat :</label>
			<div class="col-sm-4">
			<input type="text" name="jenis_surat" id="jenis_surat"  class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="keterangan" class="col-sm-4 control-label">Keterangan :</label>
			<div class="col-sm-4">
			<input type="text" name="keterangan" id="perihal" class="form-control"  >
			</div>
		</div>
		
		
		<div class="form-group">
			<label for="tanggapan" class="col-sm-4 control-label">Tanggapan :</label>
			<div class="col-sm-4">
			<input type="text" name="tanggapan" class="form-control" >
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
document.getElementById('no_surat').value = prdName[id].no_surat;
document.getElementById('penerima').value = prdName[id].penerima;
document.getElementById('jenis_surat').value = prdName[id].jenis_surat;
document.getElementById('perihal').value = prdName[id].perihal;

};
</script>
</body>
</html>