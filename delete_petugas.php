<?php
include "koneksi.php";
$id=$_GET['id'];
$query=mysql_query("DELETE from petugas where id='$id'");
if($query){
?><script language="javascript">document.location.href="data_petugas.php";</script><?php
}else{
echo "gagal hapus data";
}
?>