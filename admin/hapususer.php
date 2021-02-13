<?php 
include '../koneksi.php';
$kodeuser = $_GET['kodeuser'];
mysqli_query($koneksi,"delete from user where kodeuser='$kodeuser'");
header("location:vuser.php"); 
?>