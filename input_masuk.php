 <?php
      include "koneksi.php"; 
      $no_agenda = $_POST['no_agenda'];
      $id = $_POST['id'];
      $jenis_surat = $_POST['jenis_surat'];
      $tanggal_kirim = $_POST['tanggal_kirim'];
      $tanggal_terima = $_POST['tanggal_terima'];
      $no_surat = $_POST['no_surat'];
      $pengirim = $_POST['pengirim'];
      $penerima = $_POST['penerima'];
      $perihal = $_POST['perihal'];

      $simpan = mysql_query("INSERT Into surat_masuk values('$no_agenda','$id','$jenis_surat','$tanggal_kirim','$tanggal_terima','$no_surat','$pengirim','$penerima','$perihal')");
      header('location:data.php');
?>