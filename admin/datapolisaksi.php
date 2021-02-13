<?php 
include '../koneksi.php';
$kodepolis = $_POST['kodepolis'];
$tipepolis = $_POST['tipepolis'];
$kodenasabah = $_POST['kodenasabah'];
$tanggal = $_POST['tanggal'];
mysqli_query($koneksi,"update polis set tipepolis='$tipepolis', kodenasabah='$kodenasabah', tanggal='$tanggal' where kodepolis='$kodepolis'");
header("location:vpolis.php");
?>