 <?php
include "koneksi.php";
$id=$_POST['id'];
$nama_depan=$_POST['nama_depan'];
$nama_belakang=$_POST['nama_belakang'];
$password=$_POST['password'];


$query=mysql_query("UPDATE petugas SET nama_depan='$nama_depan', nama_belakang='$nama_belakang', password='$password' where id='$id'");
if($query){
header ('location:data_petugas.php');

}else{
echo "Gagal update data";
echo mysql_error();
}
?>