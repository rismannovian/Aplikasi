<?php
include "koneksi.php";
$no_agenda=$_GET['no_agenda'];
$query=mysql_query("DELETE from surat_masuk where no_agenda='$no_agenda'");
if($query){
?><script language="javascript">document.location.href="data.php";</script><?php
}else{
echo "gagal hapus data";
}
?>