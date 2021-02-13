<?php 
include '../koneksi.php';
$nomorkendaraan = $_GET['nomorkendaraan'];
mysqli_query($koneksi,"delete from kendaraan where nomorkendaraan='$nomorkendaraan'");
header("location:vkendaraan.php"); 
?>