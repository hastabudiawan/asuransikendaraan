<?php 
include '../koneksi.php';
include "excel_reader2.php";
?>

<?php
$target = basename($_FILES['file']['name']) ;
move_uploaded_file($_FILES['file']['tmp_name'], $target);

chmod($_FILES['file']['name'],0777);

$data = new Spreadsheet_Excel_Reader($_FILES['file']['name'],false);
$jumlah_baris = $data->rowcount($sheet_index=0);

$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){

	$kodenasabah     = $data->val($i, 1);
	$alamat   = $data->val($i, 2);
	$statuspekerjaan  = $data->val($i, 3);
	$jeniskelamin  = $data->val($i, 4);
	$kodelokasi  = $data->val($i, 5);
	
	if($kodenasabah != "" && $alamat != "" && $statuspekerjaan != "" && $jeniskelamin != "" && $kodelokasi != ""){
		mysqli_query($koneksi,"INSERT into nasabah values('$kodenasabah','$alamat','$statuspekerjaan','$jeniskelamin','$kodelokasi')");
		$berhasil++;
	}
}
unlink($_FILES['file']['name']);
header("location:vnasabah.php?berhasil=$berhasil");
?>