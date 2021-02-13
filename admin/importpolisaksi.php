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

	$kodepolis     = $data->val($i, 1);
	$tipepolis   = $data->val($i, 2);
	$kodenasabah  = $data->val($i, 3);
	$tanggal  = $data->val($i, 4);
	
	if($kodepolis != "" && $tipepolis != "" && $kodenasabah != "" && $tanggal != ""){
		mysqli_query($koneksi,"INSERT into polis values('$kodepolis','$tipepolis','$kodenasabah','$tanggal')");
		$berhasil++;
	}
}
unlink($_FILES['file']['name']);
header("location:vpolis.php?berhasil=$berhasil");
?>