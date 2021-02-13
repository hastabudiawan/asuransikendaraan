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

	$kodepremi     = $data->val($i, 1);
	$kodenasabah   = $data->val($i, 2);
	$nomorkendaraan  = $data->val($i, 3);
	$tipepolis  = $data->val($i, 4);
	$tanggal  = $data->val($i, 5);
	$total  = $data->val($i, 6);
	
	if($kodepremi != "" && $kodenasabah != "" && $nomorkendaraan != "" && $tipepolis != "" && $tanggal != "" && $total != ""){
		mysqli_query($koneksi,"INSERT into premi values('$kodepremi','$kodenasabah','$nomorkendaraan','$tipepolis','$tanggal','$total')");
		$berhasil++;
	}
}
unlink($_FILES['file']['name']);
header("location:vpremi.php?berhasil=$berhasil");
?>