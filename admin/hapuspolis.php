<?php 
include '../koneksi.php';
$kodepolis = $_GET['kodepolis'];
mysqli_query($koneksi,"delete from polis where kodepolis='$kodepolis'");
header("location:vpolis.php"); 
?>