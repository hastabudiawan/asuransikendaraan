<?php 
include '../koneksi.php';
$nomorkendaraan = $_POST['nomorkendaraan'];
$kodenasabah = $_POST['kodenasabah'];
$jeniskendaraan = $_POST['jeniskendaraan'];
mysqli_query($koneksi,"update kendaraan set kodenasabah='$kodenasabah', jeniskendaraan='$jeniskendaraan' where nomorkendaraan='$nomorkendaraan'");
header("location:vkendaraan.php");
?>