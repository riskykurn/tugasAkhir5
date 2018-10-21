<?php
session_start();

require './db.php';

$cmd='';
if(isset($_GET['cmd'])){
	$cmd = $_GET['cmd'];
}
if(isset($_POST['cmd'])){
	$cmd = $_POST['cmd'];
}
switch ($cmd) { 
//UBAH PEMASOK
case "konversi":
	$nilai = $_POST['nilai']; 
	$dariSatuan = $_POST['dariSatuan'];  
	$keSatuan = $_POST['keSatuan'];  

    $sql = "
    	SELECT *
    	FROM konversi
    	WHERE dari_satuan=".$dariSatuan." 
    		AND ke_satuan=".$keSatuan." 
    "; 
    $result = mysqli_query($link, $sql);  
    $jml = mysqli_num_rows($result);  
    if($jml > 0){
    	$r = mysqli_fetch_assoc($result);
    	$hasil=0;
    	if($r['tipe'] == 1){ //dikali
    		$hasil = $nilai * $r['nilai']; 
    	} else { // dibagi
    		$hasil = $nilai / $r['nilai']; 
    	}
    	echo $hasil;
	} else {
		echo "*Tidak ada di 'master konversi'"; 
	}
break;  
}
?>