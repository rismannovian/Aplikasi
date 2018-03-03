	<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" type="text/css" href="style/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="style/js/jquery-ui/jquery-ui.css">
</head>
<body>
<?php include'head.php' ?>
<?php include'koneksi.php' ?>
<div class="content">
<br>
<br>
	<h1>Data Surat Masuk</h1>
				<a href="form_masuk.php"><img style="margin-bottom: 10px;margin-left: 10px;" src="images/btn_add_data.png"></a>
	
<div class="table-responsive">
				<table class="table table-striped table-hover">
					<tr>
						<th>No</th>
						<th>No Agenda</th>
						<th>Id</th>
						<th>Jenis Surat</th>
						<th>Tanggal Kirim</th>
						<th>Tanggal Terima</th>
						<th>No Surat</th>
						<th>Pengirim</th>
						<th>Penerima</th>
						<th>Perihal</th>
						<th colspan="3"></th>
			
					</tr>
	 
<?php
$batas = 5;
$pg = isset( $_GET['pg'] ) ? $_GET['pg'] : "";
 
if ( empty( $pg ) ) {
$posisi = 0;
$pg = 1;
} else {
$posisi = ( $pg - 1 ) * $batas;
}

$sql = mysql_query("SELECT * FROM surat_masuk ORDER BY no_agenda limit $posisi, $batas");
$no = 1+$posisi;
while ( $r = mysql_fetch_array( $sql ) ) {
?>
<tr >
<td><p><?= $no; ?></p></td>
<td><p><?= $r['no_agenda']; ?></p></td>
<td><p><?= $r['id']; ?></p></td>
<td><p><?= $r['jenis_surat']; ?></p></td>
<td><p><?= $r['tanggal_kirim']; ?></p></td>
<td><p><?= $r['tanggal_terima']; ?></p></td>
<td><p><?= $r['no_surat']; ?></p></td>
<td><p><?= $r['pengirim']; ?></p></td>
<td><p><?= $r['penerima']; ?></p></td>
<td><p><?= $r['perihal']; ?></p></td>
<td>
		<a href="delete.php?no_agenda=<?php echo $r['no_agenda']; ?>" target="_self" alt="Delete Data"  onclick="return 
		confirm('Apakah anda yakin?')">
		<img src="images/btn_delete.png"></a>
</td>
<td><a href="edit.php?no_agenda=<?php echo $r['no_agenda'];?>"><img src="images/btn_edit.png"></a></td>
<td><a href="pdf/cetak_id_masuk.php?no_agenda=<?php echo $r['no_agenda']; ?>"><button class="btn btn-info btn-sm"><span class="glyphicon glyphicon-print"></span> Print </button></a></td>
</tr>
<?php
$no++;
}
?>
<tr>
<td align="center" colspan="13"><a href="pdf/lap_masuk.php" target="POST"><img src="images/btn_print.png"></a></td><tr>
<td align="center" colspan="13">
<?php
//hitung jumlah data
$jml_data = mysql_num_rows(mysql_query("SELECT * FROM surat_masuk ORDER BY no_agenda "));
//Jumlah halaman
$JmlHalaman = ceil($jml_data/$batas); //ceil digunakan untuk pembulatan keatas
 
//Navigasi ke sebelumnya
if ( $pg > 1 ) {
$link = $pg-1;
$prev = "<a href='?pg=$link'>Sebelumnya </a>";
} else {
$prev = "Sebelumnya ";
}
 
//Navigasi nomor
$nmr = '';
for ( $i = 1; $i<= $JmlHalaman; $i++ ){
 
if ( $i == $pg ) {
$nmr .= $i . " ";
} else {
$nmr .= "<a href='?pg=$i'>$i</a> ";
}
}
 
//Navigasi ke selanjutnya
if ( $pg < $JmlHalaman ) {
$link = $pg + 1;
$next = " <a href='?pg=$link'>Selanjutnya</a>";
} else {
$next = " Selanjutnya";
}
 
//Tampilkan navigasi
echo $prev . $nmr . $next;
?>
</td>
</tr>
</table>

</table>
</div>
</div>
<?php include'foot.php' ?>
</body>
</html>