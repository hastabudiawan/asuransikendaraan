<?php 
include '../koneksi.php';
$kodepremi = $_POST['kodepremi'];
$kodenasabah = $_POST['kodenasabah'];
$nomorkendaraan = $_POST['nomorkendaraan'];
$tipepolis = $_POST['tipepolis'];
$tanggal = $_POST['tanggal'];
$total = $_POST['total'];
mysqli_query($koneksi,"update premi set kodenasabah='$kodenasabah', nomorkendaraan='$nomorkendaraan', tipepolis='$tipepolis', tanggal='$tanggal', total='$total' where kodepremi='$kodepremi'");
header("location:vpremi.php");
?>