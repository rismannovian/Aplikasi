 <?php
include "koneksi.php";
$no_agenda=$_POST['no_agenda'];
$id=$_POST['id'];
$jenis_surat=$_POST['jenis_surat'];
$tanggal_kirim=$_POST['tanggal_kirim'];
$no_surat=$_POST['no_surat'];
$pengirim=$_POST['pengirim'];
$perihal=$_POST['perihal'];
$tanggapan=$_POST['tanggapan'];


$query=mysql_query("UPDATE surat_keluar SET id='$id', jenis_surat='$jenis_surat', tanggal_kirim='$tanggal_kirim', no_surat='$no_surat', pengirim='$pengirim', perihal='$perihal', tanggapan='$tanggapan' where no_agenda='$no_agenda'");
if($query){
header ('location:data_keluar.php');

}else{
echo "Gagal update data";
echo mysql_error();
}
?>