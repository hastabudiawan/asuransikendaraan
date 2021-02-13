<?php 
include '../koneksi.php';
$kodenasabah = $_GET['kodenasabah'];
mysqli_query($koneksi,"delete from nasabah where kodenasabah='$kodenasabah'");
header("location:vnasabah.php"); 
?>