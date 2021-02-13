<?php 
include '../koneksi.php';
$kodeuser = $_POST['kodeuser'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$status = $_POST['status'];
mysqli_query($koneksi,"update user set nama='$nama', username='$username', password='$password', status='$status' where kodeuser='$kodeuser'");
header("location:vuser.php");
?>