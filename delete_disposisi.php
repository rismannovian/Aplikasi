<?php
include "koneksi.php";
$no_disposisi=$_GET['no_disposisi'];
$query=mysql_query("DELETE from disposisi where no_disposisi='$no_disposisi'");
if($query){
?><script language="javascript">document.location.href="data_disposisi.php";</script><?php
}else{
echo "gagal hapus data";
}
?>