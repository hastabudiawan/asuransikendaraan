<?php 
include '../koneksi.php';
$kodenasabah = $_POST['kodenasabah'];
$alamat = $_POST['alamat'];
$statuspekerjaan = $_POST['statuspekerjaan'];
$jeniskelamin = $_POST['jeniskelamin'];
$kodelokasi = $_POST['kodelokasi'];
mysqli_query($koneksi,"update nasabah set alamat='$alamat', statuspekerjaan='$statuspekerjaan', jeniskelamin='$jeniskelamin', kodelokasi='$kodelokasi' where kodenasabah='$kodenasabah'");
header("location:vnasabah.php");
?>