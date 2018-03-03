 <?php
include "koneksi.php";
$no_agenda=$_POST['no_agenda'];
$id=$_POST['id'];
$jenis_surat=$_POST['jenis_surat'];
$tanggal_kirim=$_POST['tanggal_kirim'];
$tanggal_terima=$_POST['tanggal_terima'];
$no_surat=$_POST['no_surat'];
$pengirim=$_POST['pengirim'];
$penerima=$_POST['penerima'];
$perihal=$_POST['perihal'];

$query=mysql_query("UPDATE surat_masuk SET id='$id', jenis_surat='$jenis_surat', tanggal_kirim='$tanggal_kirim', tanggal_terima='$tanggal_terima', no_surat='$no_surat', pengirim='$pengirim', penerima='$penerima', perihal='$perihal' where no_agenda='$no_agenda'");
if($query){
header ('location:data.php');

}else{
echo "Gagal update data";
echo mysql_error();
}
?>