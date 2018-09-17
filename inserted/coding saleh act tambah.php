<?php
session_start();

require './db.php';

$cmd='';
if(isset($_GET['cmd'])){
	$cmd = $_GET['cmd'];
}
switch ($cmd) {

//TAMBAH PEMASOK
case "tambahPemasok":
	$namaPemasok = $_POST['uNama'];
	$alamatPemasok = $_POST['uAlamat'];
	$kotaPemasok = $_POST['uKota'];
	$teleponPemasok = $_POST['uTelepon'];

	$sqlNama = "select * from pemasok";
	$resultNama = mysqli_query($link, $sqlNama);

	//SPASI YANG DIINPUT
	if(strlen(str_replace(" ", "", $namaPemasok)) < 1){
		$_SESSION['pesan']="Nama tidak boleh kosong!";
		header("Location: pemasok.php");
		die();
	}
	if(strlen(str_replace(" ", "", $alamatPemasok)) < 1){
		$_SESSION['pesan']="Alamat tidak boleh kosong!";
		header("Location: pemasok.php");
		die();
	}
	if(strlen(str_replace(" ", "", $kotaPemasok)) < 1){
		$_SESSION['pesan']="Kota tidak boleh kosong!";
		header("Location: pemasok.php");
		die();
	}

	//PENGECEKAN INPUT NAMA SAMA, CASE SENSITIVE, AND SPACE
	while($row=mysqli_fetch_array($resultNama)){
		if(strtolower(str_replace(" ", "", $row['nama'])) == strtolower(str_replace(" ", "", $namaPemasok)) ){
			$_SESSION['pesan']="Nama pemasok sudah ada!";
			header("Location: pemasok.php");
			die();
		}
	}

	//NGECEK INPUTAN KOSONG, KALAU ELSE DI INSERT KE DB
	if(empty($namaPemasok) || empty($alamatPemasok) || empty($kotaPemasok) || empty($teleponPemasok)){
	    $_SESSION['pesan'] = "Data belum lengkap!";
	    header("Location: pemasok.php");
	    die();
    }   
    else{
		$sql="INSERT into pemasok (nama,alamat,telp,kota) ".
		    		"VALUES ('" . $namaPemasok . "', '" . $alamatPemasok . "' ,'" . $teleponPemasok . "' , '" . $kotaPemasok . "')";

	    $result= mysqli_query($link,$sql);
	    if($result){
	    	$_SESSION['pesan']="Berhasil menambahkan pemasok";
	    	header('Location: pemasok.php');
	    	die();
	    }
	    else if(!$result){
	    	die("SQL error_log(message)r : ".$sql);
	    }
	}
break;

//TAMBAH KARYAWAN
case "tambahKaryawan":
	$namaKaryawan = $_POST['uNama'];
	$alamatKaryawan = $_POST['uAlamat'];
	$kotaKaryawan = $_POST['uKota'];
	$teleponKaryawan = $_POST['uTelepon'];
	$statusKaryawan = $_POST['uStatus'];
	$gajiKaryawan = $_POST['uGaji'];

	$sqlNama = "select * from tenagakerja";
	$resultNama = mysqli_query($link, $sqlNama);

	//SPASI YANG DI INPUT
	if(strlen(str_replace(" ", "", $namaKaryawan)) < 1){
		$_SESSION['pesan']="Nama tidak boleh kosong!";
		header("Location: karyawan.php");
		die();
	}
	if(strlen(str_replace(" ", "", $alamatKaryawan)) < 1){
		$_SESSION['pesan']="Alamat tidak boleh kosong!";
		header("Location: karyawan.php");
		die();
	}
	if(strlen(str_replace(" ", "", $kotaKaryawan)) < 1){
		$_SESSION['pesan']="Kota tidak boleh kosong!";
		header("Location: karyawan.php");
		die();
	}

	//PENGECEKAN INPUT NAMA SAMA, CASE SENSITIVE, AND SPACE
	while($row=mysqli_fetch_array($resultNama)){
		if(strtolower(str_replace(" ", "", $row['nama'])) == strtolower(str_replace(" ", "", $namaKaryawan)) ){
			$_SESSION['pesan']="Nama karyawan sudah ada!";
			header("Location: karyawan.php");
			die();
		}
	}

	//NGECEK INPUTAN KOSONG, KALAU ELSE DI INSERT KE DB
	if(empty($namaKaryawan) || empty($alamatKaryawan) || empty($kotaKaryawan) || empty($teleponKaryawan) || empty($gajiKaryawan)){
	    $_SESSION['pesan'] = "Data belum lengkap!";
	    header("Location: karyawan.php");
	    die();
    }   
    else{
		$sql="insert into tenagakerja (nama,alamat,telp,kota,status,gaji) ".
		    		"VALUES ('" . $namaKaryawan . "', '" . $alamatKaryawan . "' ,'" . $teleponKaryawan . "' , '" . $kotaKaryawan . "', '" . $statusKaryawan . "', " . $gajiKaryawan . ")";

	    $result= mysqli_query($link,$sql);
	    if($result){
	    	$_SESSION['pesan']="Berhasil menambahkan karyawan";
	    	header('Location: karyawan.php');
	    	die();
	    }
	    else if(!$result){
	    	die("SQL error_log(message)r : ".$sql);
	    }
	}
break;

//TAMBAH BAHANBAKU
case "tambahBahanBaku":
	$namaBB = $_POST['uNama'];
	$hargaBB = $_POST['uHarga'];
	$stokBB = $_POST['uStok'];
	$satuanBB = $_POST['uSatuan'];

	$sqlNama = "select * from bahanbaku";
	$resultNama = mysqli_query($link, $sqlNama);
	
	//SPASI YANG DIINPUT
	if(strlen(str_replace(" ", "", $namaBB)) < 1){
		$_SESSION['pesan']="Nama tidak boleh kosong!";
		header("Location: bahanbaku.php");
		die();
	}

	//PENGECEKAN INPUT NAMA SAMA, CASE SENSITIVE, AND SPACE
	while($row=mysqli_fetch_array($resultNama)){
		if(strtolower(str_replace(" ", "", $row['nama'])) == strtolower(str_replace(" ", "", $namaBB)) ){
			$_SESSION['pesan']="Nama Bahan Baku sudah ada!";
			header("Location: bahanbaku.php");
			die();
		}
	}

	//NGECEK INPUTAN KOSONG, KALAU ELSE DI INSERT KE DB
	if(empty($namaBB) || empty($hargaBB) || empty($satuanBB)){
	    $_SESSION['pesan'] = "Data belum lengkap!";
	    header("Location: bahanbaku.php");
	    die();
    }  
    else{
		$sql="insert into bahanbaku (nama,harga_beli,stok,satuan)".
		    		"VALUES ('" . $namaBB . "', " . $hargaBB . " , " . $stokBB . ", '" . $satuanBB . "')";

	    $result= mysqli_query($link,$sql);
	    if($result){
	    	$_SESSION['pesan']="Berhasil menambahkan Bahan Baku";
	    	header('Location: bahanbaku.php');
	    	die();
	    }
	    else if(!$result){
	    	die("SQL error_log(message)r : ".$sql);
	    }
	}
break;

//TAMBAH KERUPUK
case "tambahKerupuk":
	$namaKerupuk = $_POST['uNama'];
	$hargaKerupuk = $_POST['uHarga'];
	$stokKerupuk = $_POST['uStok'];
	$jenisKerupuk = $_POST['uJenisTambah'];

	$sqlNama = "select * from barang";
	$resultNama = mysqli_query($link, $sqlNama);

	//SPASI YANG DIINPUT
	if(strlen(str_replace(" ", "", $namaKerupuk)) < 1){
		$_SESSION['pesan']="Nama tidak boleh kosong!";
		header("Location: kerupuk.php");
		die();
	}

	//PENGECEKAN INPUT NAMA SAMA, CASE SENSITIVE, AND SPACE
	while($row=mysqli_fetch_array($resultNama)){
		if(strtolower(str_replace(" ", "", $row['nama'])) == strtolower(str_replace(" ", "", $namaKerupuk)) ){
			$_SESSION['pesan']="Nama Kerupuk sudah ada!";
			header("Location: kerupuk.php");
			die();
		}
	}

	//NGECEK INPUTAN KOSONG, KALAU ELSE DI INSERT KE DB
	if(empty($namaKerupuk) || empty($hargaKerupuk)){
	    $_SESSION['pesan'] = "Data belum lengkap!";
	    header("Location: kerupuk.php");
	    die();
    }  
    else{
		$sql="insert into barang (nama,stok,harga_jual, idJenis)".
		    		"VALUES ('" . $namaKerupuk . "', " . $stokKerupuk . ", " . $hargaKerupuk . ", " . $jenisKerupuk . ")";

	    $result= mysqli_query($link,$sql);
	    if($result){
	    	$_SESSION['pesan']="Berhasil menambahkan Kerupuk";
	    	header('Location: kerupuk.php');
	    	die();
	    }
	    else if(!$result){
	    	die("SQL error_log(message)r : ".$sql);
	    }
	}
break;

////TAMBAH JENIS KERUPUK
case "tambahJenisKerupuk":
	$jenisKerupuk = $_POST['uJenis'];

	$sqlNama = "select * from jenis";
	$resultNama = mysqli_query($link, $sqlNama);

	//SPASI YANG DIINPUT
	if(strlen(str_replace(" ", "", $jenisKerupuk)) < 1){
		$_SESSION['pesan']="Jenis Kerupuk tidak boleh kosong!";
		header("Location: kerupuk.php");
		die();
	}

	//PENGECEKAN INPUT NAMA SAMA, CASE SENSITIVE, AND SPACE
	while($row=mysqli_fetch_array($resultNama)){
		if(strtolower(str_replace(" ", "", $row['jenis'])) == strtolower(str_replace(" ", "", $jenisKerupuk)) ){
			$_SESSION['pesan']="Jenis kerupuk sudah ada!";
			header("Location: kerupuk.php");
			die();
		}
	}

	//NGECEK INPUTAN KOSONG, KALAU ELSE DI INSERT KE DB
	if(empty($jenisKerupuk)){
	    $_SESSION['pesan'] = "Isi jenis kerupuk dahulu!";
	    header("Location: kerupuk.php");
	    die();
    }  
    else{
		$sql="insert into jenis (jenis)".
		    		"VALUES ('" . $jenisKerupuk . "')";

	    $result= mysqli_query($link,$sql);
	    if($result){
	    	$_SESSION['pesan']="Berhasil menambahkan Jenis Kerupuk";
	    	header('Location: kerupuk.php');
	    	die();
	    }
	    else if(!$result){
	    	die("SQL error_log(message)r : ".$sql);
	    }
	}
break;

//TAMBAH MESIN
case "tambahMesin":
	$namaMesin = $_POST['uNama'];
	$wattMesin = $_POST['uWatt'];

	$sqlNama = "select * from mesin";
	$resultNama = mysqli_query($link, $sqlNama);

	//SPASI YANG DIINPUT
	if(strlen(str_replace(" ", "", $namaMesin)) < 1){
		$_SESSION['pesan']="Nama tidak boleh kosong!";
		header("Location: mesin.php");
		die();
	}

	//PENGECEKAN INPUT NAMA SAMA, CASE SENSITIVE, AND SPACE
	while($row=mysqli_fetch_array($resultNama)){
		if(strtolower(str_replace(" ", "", $row['nama'])) == strtolower(str_replace(" ", "", $namaMesin)) ){
			$_SESSION['pesan']="Mesin sudah ada!";
			header("Location: mesin.php");
			die();
		}
	}

	//NGECEK INPUTAN KOSONG, KALAU ELSE DI INSERT KE DB
	if(empty($namaMesin) || empty($wattMesin)){
	    $_SESSION['pesan'] = "Data belum lengkap!";
	    header("Location: mesin.php");
	    die();
    }  
    else{
		$sql="insert into mesin (nama,watt)".
		    		"VALUES ('" . $namaMesin . "', " . $wattMesin . ")";

	    $result= mysqli_query($link,$sql);
	    if($result){
	    	$_SESSION['pesan']="Berhasil menambahkan Mesin";
	    	header('Location: mesin.php');
	    	die();
	    }
	    else if(!$result){
	    	die("SQL error_log(message)r : ".$sql);
	    }
	}
break;

//TAMBAH LAHAN
case "tambahLahan":
	$namaLahan = $_POST['uNama'];
	$biayaLahan = $_POST['uBiaya'];

	$sqlNama = "select * from lahan";
	$resultNama = mysqli_query($link, $sqlNama);

	//SPASI YANG DIINPUT
	if(strlen(str_replace(" ", "", $namaLahan)) < 1){
		$_SESSION['pesan']="Lahan tidak boleh kosong!";
		header("Location: lahan.php");
		die();
	}

	//PENGECEKAN INPUT NAMA SAMA, CASE SENSITIVE, AND SPACE
	while($row=mysqli_fetch_array($resultNama)){
		if(strtolower(str_replace(" ", "", $row['nama'])) == strtolower(str_replace(" ", "", $namaLahan)) ){
			$_SESSION['pesan']="Nama Lahan sudah ada!";
			header("Location: lahan.php");
			die();
		}
	}

	//NGECEK INPUTAN KOSONG, KALAU ELSE DI INSERT KE DB
	if(empty($namaLahan) || empty($biayaLahan)){
	    $_SESSION['pesan'] = "Data belum lengkap!";
	    header("Location: lahan.php");
	    die();
    } 
    else{
		$sql="insert into lahan (nama,biaya_sewa)".
		    		"VALUES ('" . $namaLahan . "', " . $biayaLahan . ")";

	    $result= mysqli_query($link,$sql);
	    if($result){
	    	$_SESSION['pesan']="Berhasil menambahkan Lahan";
	    	header('Location: lahan.php');
	    	die();
	    }
	    else if(!$result){
	    	die("SQL error_log(message)r : ".$sql);
	    }
	}
    
break;

//TAMBAH BOM / RESEP
case "tambahBOM":
	$idKerupuk = $_POST['uIDKerupuk'];
	$namaKerupuk = $_POST['uKerupuk'];
	$idBB = $_POST['uBB'];
	$jumlah = $_POST['uJumlah'];
	$jumlahTersedia = 0;

	//NGECEK INPUTAN KOSONG, KALAU ELSE DI INSERT KE DB
	if(empty($jumlah)){
	    $_SESSION['pesan'] = "Harap isi stok terlebih dahulu!";
	    header("Location: bom.php");
	    die();
    }  
    else{
    	$sql = "SELECT *
    			from bahanbaku_has_barang where bahanbaku_idBB =".$idBB." AND
    			barang_idBarang =".$idKerupuk;
		$result= mysqli_query($link,$sql);
		while($row = mysqli_fetch_array($result)){
			$jumlahTersedia=$row['jumlah'];
		}
		if($jumlahTersedia <= 0){
			$sql="INSERT into bahanbaku_has_barang (bahanbaku_idBB, barang_idBarang, jumlah)".
    		"VALUES (" . $idBB . ", " . $idKerupuk . ", " . $jumlah . ")";

		}
		else if($jumlahTersedia >= 1){
			$sql="UPDATE bahanbaku_has_barang set jumlah=".($jumlah + $jumlahTersedia)."
			where bahanbaku_idBB =".$idBB." AND barang_idBarang =".$idKerupuk;
		}
	    $result= mysqli_query($link,$sql);
	    if($result){
	    	$_SESSION['pesan']="Berhasil menambahkan Resep";
	    	header('Location: bom.php');
	    	die();
	    }
	    else if(!$result){
	    	die("SQL error_log(message)r : ".$sql);
	    }
	}
break;

//TAMBAH NOTA BELI
case "tambahNotaBeli":
	$idPemasok = $_POST['uPemasok'];
	$tanggalBeli = date("Y-m-d");
	$statusBayar = $_POST['uStatus'];
	$tanggalBayar = $_POST['uBayar'];

	if(empty($idPemasok)){
	    $_SESSION['pesan'] = "Harap pilih pemasok terlebih dahulu!";
	    header("Location: pembelian.php");
	    die();
    }
    else{
		$sql="INSERT into nota_beli (tgl_beli,tgl_bayar,status_bayar,supplier_idSupplier) ".
		    		"VALUES ('" . $tanggalBeli . "', '" . $tanggalBayar . "' ,'" . $statusBayar . "' , " . $idPemasok . ")";

	    $result= mysqli_query($link,$sql);
	    if($result){
	    	$_SESSION['pesan']="Berhasil menambahkan Nota Pembelian";
	    	header('Location: pembelian.php');
	    	die();
	    }
	    else if(!$result){
	    	die("SQL error_log(message)r : ".$sql);
    	}
	}
break;

//// TAMBAH BB PADA NOTA
case "tambahBBNota":
	$idBB = $_POST['uBB'];
	$idBeli = $_POST['uIDBeli'];  
	$jumlah = $_POST['uJumlah'];
	$subTotal = $_POST['uSubTotal'];
	$totalHarga= 0;
	$harga = 0;

	$sqlHarga = "SELECT *
    			from nota_beli where idBeli =".$idBeli;
	$resultHarga= mysqli_query($link,$sqlHarga);
	while($rowHarga = mysqli_fetch_array($resultHarga)){
		$totalHarga=$rowHarga['total_harga']; // stok di nota beli
	}

	if(empty($jumlah)){
	    $_SESSION['pesan'] = "Harap isi jumlah terlebih dahulu!";
	    header("Location: detailPembelian.php?id=$idBeli");
	    die();
    }
    else if(empty($idBB)){
		$_SESSION['pesan'] = "Harap pilih Bahan Baku terlebih dahulu!";
	    header("Location: detailPembelian.php?id=$idBeli");
	    die();
    }
    else{
    
		 
    	$sql = "SELECT *
    			from nota_beli_has_bahanbaku where nota_beli_idBeli =".$idBeli." AND
    			bahanbaku_idBB =".$idBB;
    	$result= mysqli_query($link,$sql);
		while($row = mysqli_fetch_array($result)){
			$jumlahTersedia=$row['jumlah'];
		}
		if($jumlahTersedia <= 0){
			$sql="INSERT into nota_beli_has_bahanbaku (nota_beli_idBeli,bahanbaku_idBB,jumlah) ".
		    		"VALUES (" . $idBeli . ", " . $idBB . " ," . $jumlah . ")";
		}
		else if($jumlahTersedia >= 1){
			$sql="UPDATE nota_beli_has_bahanbaku set jumlah=".($jumlah + $jumlahTersedia)."
			where nota_beli_idBeli =".$idBeli." AND bahanbaku_idBB =".$idBB;
		}
	    $result= mysqli_query($link,$sql);
	    if($result){


	    	$jml=0;
	    	$sql = "SELECT *
	    			from bahanbaku where idBB =".$idBB;
	    	$result= mysqli_query($link,$sql);
			while($row = mysqli_fetch_array($result)){
				$jml=$row['stok']; // stok di gudang
				$harga = $row['harga_beli'];
			}
			$sqlNotaBeli="UPDATE nota_beli set total_harga=".($_SESSION['subTotalFix'] +$harga)."
			 where idBeli =".$idBeli;
		    $reNotaBeli= mysqli_query($link,$sqlNotaBeli);
		    if(!$reNotaBeli){
		    	echo $sqlNotaBeli;
		    	exit();
		    }
		    else{
		    	echo $sqlNotaBeli;
		    }
	    	$sql="UPDATE bahanbaku set stok=". ($jml + $jumlah)."
			where idBB =".$idBB;
		    $result= mysqli_query($link,$sql);
		    if($result){
		    	header("Location: detailPembelian.php?id=$idBeli");
		    	die();
	    	}
	    	else if(!$result){
	    		die("SQL error_log(message)r : ".$sql);
	    	}
	    }
	    else if(!$result){
	    	die("SQL error_log(message)r : ".$sql);
	    }
	    
	}
break;
}
?>