<?php
include "koneksi.php";
$no_agenda=$_GET['no_agenda'];
$query=mysql_query("DELETE from surat_keluar where no_agenda='$no_agenda'");
if($query){
?><script language="javascript">document.location.href="data_keluar.php";</script><?php
}else{
echo "gagal hapus data";
}
?>