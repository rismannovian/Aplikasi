<?php 
session_start();
$_SESSION['id']='';
unset($_SESSION['id']);
session_unset();
session_destroy();
header("location:index.php")

 ?>