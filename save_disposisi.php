 <?php
include "koneksi.php";
$no_disposisi=$_POST['no_disposisi'];
$no_agenda=$_POST['no_agenda'];
$no_surat=$_POST['no_surat'];
$kepada=$_POST['kepada'];
$keterangan=$_POST['keterangan'];
$jenis_surat=$_POST['jenis_surat'];
$tanggapan=$_POST['tanggapan'];

$query=mysql_query("UPDATE disposisi SET no_agenda='$no_agenda', no_surat='$no_surat', kepada='$kepada', keterangan='$keterangan', jenis_surat='$jenis_surat',  tanggapan='$tanggapan' where no_disposisi='$no_disposisi'");
if($query){
header ('location:data_disposisi.php');

}else{
echo "Gagal update data";
echo mysql_error();
}
?>