 <?php
      include "koneksi.php"; 
      $no_disposisi = $_POST['no_disposisi'];
      $no_agenda = $_POST['no_agenda'];
      $no_surat = $_POST['no_surat'];
      $kepada = $_POST['kepada'];
      $keterangan = $_POST['keterangan'];
      $jenis_surat = $_POST['jenis_surat'];
      $tanggapan = $_POST['tanggapan'];
      $simpan = mysql_query("INSERT Into disposisi values('$no_disposisi','$no_agenda','$no_surat','$kepada','$keterangan','$jenis_surat','$tanggapan')");
      header('location:data_disposisi.php');
?>