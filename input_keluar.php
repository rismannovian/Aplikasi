 <?php
      include "koneksi.php"; 
      $no_agenda = $_POST['no_agenda'];
      $id = $_POST['id'];
      $jenis_surat = $_POST['jenis_surat'];
      $tanggal_kirim = $_POST['tanggal_kirim'];
      $no_surat = $_POST['no_surat'];
      $pengirim = $_POST['pengirim'];
      $perihal = $_POST['perihal'];
      $tanggapan = $_POST['tanggapan'];
      $simpan = mysql_query("INSERT Into surat_keluar values('$no_agenda','$id','$jenis_surat','$tanggal_kirim','$no_surat','$pengirim','$perihal','$tanggapan')");
      header('location:data_keluar.php');
?>