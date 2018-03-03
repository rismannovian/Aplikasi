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
<div class="container">
<?php
include "koneksi.php";
$no_agenda=$_GET['no_agenda'];
$query=mysql_query("select * from surat_keluar where no_agenda='$no_agenda'");
?>
<form action="save_keluar.php" method="post">
<h1>Data ANGGOTA</h1>
<table border="1" align="center">
<?php
while($row=mysql_fetch_array($query)){
?>
<input type="hidden" name="no_agenda" value="<?php echo $no_agenda;?>"/>
<th height="40" colspan="2" ><p>EDIT</p></th>
<tr>
<td width="180" height="40"><p>id</p></td>
<td>
	<input type="text" name="id" value="<?php echo $row['id'];?>" />
</td>
<tr>
<td width="180" height="40"><P>jenis surat</P></td><td>
<input type="text" name="jenis_surat" value="<?php echo $row['jenis_surat'];?>" /></td>
<tr>
<td width="180" height="40"><P>TANGGAL kirim</P></td><td>
<input type="date" name="tanggal_kirim" value="<?php echo $row['tanggal_kirim'];?>" /></td>
<tr>
<td width="180" height="40"><P>nosurat</P></td><td>
<input type="text" name="no_surat" value="<?php echo $row['no_surat'];?>" /></td>
<tr>
<td width="180" height="40"><P>pengirim</P></td><td>
<input type="text" name="pengirim" value="<?php echo $row['pengirim'];?>" /></td>
<tr>
<td width="180" height="40"><P>perihal</P></td><td>
<input type="text" name="perihal" value="<?php echo $row['perihal'];?>" /></td>
<tr>
<td colspan="2" align="center"><input type="submit" value="Simpan" name="simpan" /></td>
</tr>
<?php
}
?>
</table>
</form>
</div>
</body>