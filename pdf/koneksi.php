<?php

$host = "localhost";

$user = "root";

$pass = "";

$conn = mysql_connect($host, $user, $pass) or die("koneksi gatot");

$db = "db_surat_masuk_keluar"; // Nama DB yang anda buat

$conn_db = mysql_select_db($db);

?>