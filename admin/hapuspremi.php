<?php 
include '../koneksi.php';
$kodepremi = $_GET['kodepremi'];
mysqli_query($koneksi,"delete from premi where kodepremi='$kodepremi'");
header("location:vpremi.php"); 
?>