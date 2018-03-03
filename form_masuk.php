<!DOCTYPE html>
<html>
<head>
	<title> </title>
	<link rel="stylesheet" type="text/css" href="style/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="style/js/jquery-ui/jquery-ui.css">
</head>
<body>
<?php 
include 'head.php';
include'koneksi.php';

$query = "SELECT max(no_agenda) as maxKode FROM surat_masuk";
$query1 = "SELECT max(no_agenda) as maxKode FROM surat_masuk";
$hasil = mysql_query($query);
$hasil1 = mysql_query($query1);
$data  = mysql_fetch_array($hasil);
$data1  = mysql_fetch_array($hasil1);
$kodeBarang = $data['maxKode'];
$kodeBarang1 = $data['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kodeBarang, 3, 3);
$noUrut1 = (int) substr($kodeBarang1, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;
$noUrut1++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "SM";
$newID = $char . sprintf("%03s", $noUrut);
$char1 = "SM";
$newID1 = $char1 . sprintf("%03s", $noUrut1);


 ?>
   <div class="container"><br><br>


	<form action="input_masuk.php" class="form-horizontal" method="post">
   
		<div class="form-group">
			   <h3 style="padding-left: 440px;" >Form Input Surat Masuk </h3><br>
			<label for="no_agenda" class="col-sm-4 control-label" >No Agenda :</label>
			<div class="col-sm-4"><input type="text" name="no_agenda"  class="form-control" value="<?php echo $newID; ?>" readonly   ></div>
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
			<select class="form-control" name="jenis_surat" >
			 <option >Pilih </option>
			 <option>Surat Pribadi</option>
			 <option>Surat Resmi</option>
			 </select>
			</div>
		</div>		
		<div class="form-group">
			<label for="tanggal_kirim" class="col-sm-4 control-label">Tanggal Kirim :</label>
			<div class="col-sm-4">
			<input type="date" name="tanggal_kirim"  class="form-control" >
			</div>
		</div>
		<div class="form-group">
			<label for="tanggal_terima" class="col-sm-4 control-label">Tanggal Terima :</label>
			<div class="col-sm-4">
			<input type="date" name="tanggal_terima" class="form-control"  >
			</div>
		</div>
		<div class="form-group">
			<label for="no_surat" class="col-sm-4 control-label">No Surat :</label>
			<div class="col-sm-2">
			<input type="text" name="no_surat"  class="form-control"   >
			</div>
		</div>
		<div class="form-group">
			<label for="pengirim" class="col-sm-4 control-label">Pengirim :</label>
			<div class="col-sm-4">
			<input type="text" name="pengirim"  class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="penerima" class="col-sm-4 control-label">Penerima :</label>
			<div class="col-sm-4">
			<input type="text" name="penerima" class="form-control" >
			</div>
		</div>
		<div class="form-group">
			<label for="perihal" class="col-sm-4 control-label">Perihal :</label>
			<div class="col-sm-4">
			<textarea type="text" name="perihal" class="form-control" ></textarea>
			</div>
		</div>
		<div class="form-group">
		<div class="col-sm-offset-4 col-sm-10">
		<button type="submit" class="btn btn-default">Submit</button>
		</div>
		</div>
		
	</form>
   </div>

</body>
</html>