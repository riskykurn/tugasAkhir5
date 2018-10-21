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

//// TAMBAH DETAIL PEMASOK
case "tambahDetailPemasok":
	$idBB = $_POST['uIDBB'];
	$idSupplier = $_POST['uIDSupplier'];
	$leadtime = $_POST['uLeadtime'];
	$harga = $_POST['uHarga'];

	//NGECEK INPUTAN KOSONG, KALAU ELSE DI INSERT KE DB
	if(empty($idBB)){
	    $_SESSION['pesan'] = "Isi Bahan Baku dari Pemasok ini!";
	    header("Location: detailPemasok.php?id=".$idSupplier);
	    die();
    }   
    else if(empty($leadtime) || empty($harga)){
	    $_SESSION['pesan'] = "Data belum lengkap!";
	    header("Location: detailPemasok.php?id=".$idSupplier);
	    die();
    } 
    else{
		$sql="INSERT into pemasok_has_bahanbaku (bahanbaku_idBB,pemasok_idSupplier,harga_beli,leadtime) ".
		    		"VALUES (" . $idBB . ", " . $idSupplier . ", " . $harga . ", " . $leadtime . ")";

	    $result= mysqli_query($link,$sql);
	    if($result){
	    	header('Location: detailPemasok.php?id='.$idSupplier);
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
	if(empty($namaBB) || empty($satuanBB)){
	    $_SESSION['pesan'] = "Data belum lengkap!";
	    header("Location: bahanbaku.php");
	    die();
    }  
    else{
		$sql="insert into bahanbaku (nama,stok,idSatuan)".
		    		"VALUES ('" . $namaBB . "', 0, " . $satuanBB . ")";

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

////TAMBAH SATUAN BB
case "tambahSatuanBB":
	$satuanBB = $_POST['uSatuan'];

	$sqlNama = "select * from satuan";
	$resultNama = mysqli_query($link, $sqlNama);

	//SPASI YANG DIINPUT
	if(strlen(str_replace(" ", "", $satuanBB)) < 1){
		$_SESSION['pesan']="Satuan tidak boleh kosong!";
		header("Location: bahanbaku.php");
		die();
	}

	//PENGECEKAN INPUT NAMA SAMA, CASE SENSITIVE, AND SPACE
	while($row=mysqli_fetch_array($resultNama)){
		if(strtolower(str_replace(" ", "", $row['nama'])) == strtolower(str_replace(" ", "", $satuanBB)) ){
			$_SESSION['pesan']="Satuan sudah ada, silahkan cek lagi!";
			header("Location: bahanbaku.php");
			die();
		}
	}

	//NGECEK INPUTAN KOSONG, KALAU ELSE DI INSERT KE DB
	if(empty($satuanBB)){
	    $_SESSION['pesan'] = "Isi satuan dahulu!";
	    header("Location: bahanbaku.php");
	    die();
    }  
    else{
		$sql="insert into satuan (nama)".
		    		"VALUES ('" . $satuanBB . "')";

	    $result= mysqli_query($link,$sql);
	    if($result){
	    	$_SESSION['pesan']="Berhasil menambahkan Satuan";
	    	header('Location: bahanbaku.php');
	    	die();
	    }
	    else if(!$result){
	    	die("SQL error_log(message)r : ".$sql);
	    }
	}
break;

//TAMBAH SATUAN BB (MASTER)
case "tambahSatuan":
	$satuanBB = $_POST['uSatuan'];

	$sqlNama = "select * from satuan";
	$resultNama = mysqli_query($link, $sqlNama);

	//SPASI YANG DIINPUT
	if(strlen(str_replace(" ", "", $satuanBB)) < 1){
		$_SESSION['pesan']="Satuan tidak boleh kosong!";
		header("Location: satuan.php");
		die();
	}

	//PENGECEKAN INPUT NAMA SAMA, CASE SENSITIVE, AND SPACE
	while($row=mysqli_fetch_array($resultNama)){
		if(strtolower(str_replace(" ", "", $row['nama'])) == strtolower(str_replace(" ", "", $satuanBB)) ){
			$_SESSION['pesan']="Satuan sudah ada, silahkan cek lagi";
			header("Location: satuan.php");
			die();
		}
	}

	//NGECEK INPUTAN KOSONG, KALAU ELSE DI INSERT KE DB
	if(empty($satuanBB)){
	    $_SESSION['pesan'] = "Isi satuan dahulu!";
	    header("Location: satuan.php");
	    die();
    }  
    else{
		$sql="insert into satuan (nama)".
		    		"VALUES ('" . $satuanBB . "')";

	    $result= mysqli_query($link,$sql);
	    if($result){
	    	$_SESSION['pesan']="Berhasil menambahkan Satuan";
	    	header('Location: satuan.php');
	    	die();
	    }
	    else if(!$result){
	    	die("SQL error_log(message)r : ".$sql);
	    }
	}
break;

//TAMBAH KONVERSI (MASTER)
case "tambahKonversi":
	$dariSatuan = $_POST['uDari'];
	$keSatuan = $_POST['uKe'];
	$nilai = $_POST['uNilai'];
	$tipe = $_POST['uTipe'];

	if($dariSatuan == $keSatuan)
	{
		$_SESSION['pesan'] = "Satuan tidak boleh sama!";
	    header("Location: konversi.php");
	    die();
	}
	else{
		$sql = "SELECT *
    	FROM konversi
    	WHERE dari_satuan=".$dariSatuan." 
    		AND ke_satuan=".$keSatuan; 
	    $result = mysqli_query($link, $sql);  
	    $jml = mysqli_num_rows($result);  
	    if($jml > 0){
	    	$_SESSION['pesan']="Perhitungan Konversi sudah ada, mohon cek lagi!";
			header("Location: konversi.php");
			die();
		} 
		else {
			//NGECEK INPUTAN KOSONG, KALAU ELSE DI INSERT KE DB
			if(empty($nilai)){
			    $_SESSION['pesan'] = "Isi nilainya dahulu!";
			    header("Location: konversi.php");
			    die();
		    }  
		    else{
				$sql="insert into konversi (dari_satuan, ke_satuan, nilai, tipe)".
				    		"VALUES (" . $dariSatuan . ", " . $keSatuan . ", " . $nilai . ", " . $tipe . ")";

			    $result= mysqli_query($link,$sql);
			    if($result){
			    	$_SESSION['pesan']="Berhasil menambahkan perhitungan konversi";
			    	header('Location: konversi.php');
			    	die();
			    }
			    else if(!$result){
			    	die("SQL error_log(message)r : ".$sql);
			    }
			}
		}
	}

	
break;

//TAMBAH KERUPUK
case "tambahKerupuk":
	$namaKerupuk = $_POST['uNama'];
	$hargaKerupuk = $_POST['uHarga'];
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
		    		"VALUES ('" . $namaKerupuk . "', 0, " . $hargaKerupuk . ", " . $jenisKerupuk . ")";

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

//TAMBAH JENIS KERUPUK (MASTER)
case "tambahJenis":
	$jenisKerupuk = $_POST['uJenis'];

	$sqlNama = "select * from jenis";
	$resultNama = mysqli_query($link, $sqlNama);

	//SPASI YANG DIINPUT
	if(strlen(str_replace(" ", "", $jenisKerupuk)) < 1){
		$_SESSION['pesan']="Jenis Kerupuk tidak boleh kosong!";
		header("Location: jenis.php");
		die();
	}

	//PENGECEKAN INPUT NAMA SAMA, CASE SENSITIVE, AND SPACE
	while($row=mysqli_fetch_array($resultNama)){
		if(strtolower(str_replace(" ", "", $row['jenis'])) == strtolower(str_replace(" ", "", $jenisKerupuk)) ){
			$_SESSION['pesan']="Jenis kerupuk sudah ada!";
			header("Location: jenis.php");
			die();
		}
	}

	//NGECEK INPUTAN KOSONG, KALAU ELSE DI INSERT KE DB
	if(empty($jenisKerupuk)){
	    $_SESSION['pesan'] = "Isi jenis kerupuk dahulu!";
	    header("Location: jenis.php");
	    die();
    }  
    else{
		$sql="insert into jenis (jenis)".
		    		"VALUES ('" . $jenisKerupuk . "')";

	    $result= mysqli_query($link,$sql);
	    if($result){
	    	$_SESSION['pesan']="Berhasil menambahkan Jenis Kerupuk";
	    	header('Location: jenis.php');
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
    else if($statusBayar == 1 AND $idPemasok > 0 AND empty($tanggalBayar)){
	    $_SESSION['pesan'] = "Pembayaran lunas isi tanggal bayarnya!";
	    header("Location: pembelian.php");
	    die();
    }
    else{
		$sql="INSERT into nota_beli (tgl_beli,tgl_bayar,status_bayar,supplier_idSupplier,deleted) ".
		    		"VALUES ('" . $tanggalBeli . "', '" . $tanggalBayar . "' ,'" . $statusBayar . "' , " . $idPemasok . ",0)";

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
	$idSupplier = $_POST['uIDSupplier']; 
	$jumlah = $_POST['uJumlah'];

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
		$hargaSupplier=0;
    	$sql = "SELECT *
    			from pemasok_has_bahanbaku where bahanbaku_idBB =".$idBB." AND
    			pemasok_idSupplier =".$idSupplier;
    	$result= mysqli_query($link,$sql);
		while($row = mysqli_fetch_array($result)){
			$hargaSupplier=$row['harga_beli'];
		}
		$jumlahTersedia=0;
    	$sql = "SELECT *
    			from nota_beli_has_bahanbaku where nota_beli_idBeli =".$idBeli." AND
    			bahanbaku_idBB =".$idBB;
    	$result= mysqli_query($link,$sql);
		while($row = mysqli_fetch_array($result)){
			$jumlahTersedia=$row['jumlah'];
		}
		if($jumlahTersedia <= 0){
			$sql="INSERT into nota_beli_has_bahanbaku (nota_beli_idBeli,bahanbaku_idBB,jumlah,harga_sekarang) ".
		    		"VALUES (" . $idBeli . ", " . $idBB . " ," . $jumlah . "," . $hargaSupplier . ")";
		}
		else if($jumlahTersedia >= 1){
			$sql="UPDATE nota_beli_has_bahanbaku set harga_sekarang=".$hargaSupplier.", jumlah=".($jumlah + $jumlahTersedia)."
			where nota_beli_idBeli =".$idBeli." AND bahanbaku_idBB =".$idBB;
		}
	    $result= mysqli_query($link,$sql);
	    if($result){
	    	$jmlTotalHarga=0;
	    	$sql = "SELECT sum(mn2.jumlah*mn4.harga_beli) as total_harga
	              from nota_beli nb2 inner join nota_beli_has_bahanbaku mn2
	              on nb2.idBeli = mn2.nota_beli_idBeli
	              inner join bahanbaku bb2
	              on mn2.bahanbaku_idBB = bb2.idBB
                  inner join pemasok_has_bahanbaku mn4
                  on mn4.bahanbaku_idBB = bb2.idBB AND mn4.pemasok_idSupplier=nb2.supplier_idSupplier
	              where nb2.idBeli=".$idBeli;

	    	$result = mysqli_query($link,$sql);
			while($row = mysqli_fetch_array($result)){
				$jmlTotalHarga=$row['total_harga']; // stok di nota diupdate jg
			}

	    	$sql="UPDATE nota_beli set total_harga=". ($jmlTotalHarga)."
				where idBeli =".$idBeli;
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

//// DETAIL REKOMENDASI BELI
case "tambahNotaDariRekomen":
	$idPemasok = $_POST['uIDSupplier'];
	$idJual = $_POST['uIDJual'];
	$idSpk = $_POST['uIDSPK'];
	$tanggalBeli = date("Y-m-d");

	$sql="INSERT into nota_beli (tgl_beli,tgl_bayar,status_bayar,supplier_idSupplier,deleted) ".
	    		"VALUES ('" . $tanggalBeli . "', '" . $tanggalBayar . "' , 0 , " . $idPemasok . ",0)";

    $result= mysqli_query($link,$sql);
    if($result){
		$sql2="SELECT nb.*, (
	              SELECT idBeli from nota_beli ORDER BY idBeli desc LIMIT 1
	            ) as nota_beli_baru
				FROM nota_beli nb
				where nb.deleted = 0";
	    $result2= mysqli_query($link,$sql2);
	    $idBeliBaru = 0;
	    while ($row2 = mysqli_fetch_array($result2)) {
	    	$idBeliBaru = $row2['nota_beli_baru'];
	    }
	    $sql="INSERT into nota_beli_has_spk (nota_beli_idBeli,spk_idSpk) ".
	    		"VALUES (" . $idBeliBaru . ", " . $idSpk . ")";
    	$result= mysqli_query($link,$sql);

    	$_SESSION['pesan']="Berhasil menambahkan Nota Pembelian";
    	header('Location: detailPembelian.php?id='.$idBeliBaru);
    	die();
    }
    else if(!$result){
    	die("SQL error_log(message)r : ".$sql);
	}
break;

//// DETAIL REKOMENDASI BELI DARI SPK
case "tambahNotaDariRekomenSPK":
	$idPemasok = $_POST['uIDSupplier'];
	$idJual = $_POST['uIDJual'];
	$idBB = $_POST['uIDBB'];
	$idSpk = $_POST['uIDSPK'];
	$jumlahKurang = $_POST['uStokKurang'];
	$hargaSupplier = $_POST['uHargaSupplier'];
	$tanggalBeli = date("Y-m-d");

	$sql="INSERT into nota_beli (tgl_beli,tgl_bayar,status_bayar,supplier_idSupplier,deleted) ".
	    		"VALUES ('" . $tanggalBeli . "', '" . $tanggalBayar . "' , 0 , " . $idPemasok . ",0)";

    $result= mysqli_query($link,$sql);
    if($result){
		$sql2="SELECT nb.*, (
	              SELECT idBeli from nota_beli ORDER BY idBeli desc LIMIT 1
	            ) as nota_beli_baru
				FROM nota_beli nb
				where nb.deleted = 0";
		$sql2="SELECT nb.* 
				FROM nota_beli nb
				where nb.deleted = 0 
				order by idBeli desc
				LIMIT 1";
	    $result2= mysqli_query($link,$sql2);
	    $idBeliBaru = 0;
	    while ($row2 = mysqli_fetch_array($result2)) {
	    	$idBeliBaru = $row2['idBeli'];
	    }
	    
	    $sql="INSERT into nota_beli_has_bahanbaku (nota_beli_idBeli,bahanbaku_idBB,jumlah,harga_sekarang) ".
		    		"VALUES (" . $idBeliBaru . ", " . $idBB . " ," . $jumlahKurang . "," . $hargaSupplier . ")";
		
	    $result= mysqli_query($link,$sql);
	    if($result){ 
	    	$jmlTotalHarga=0;
	    	$sql3 = "SELECT sum(mn2.jumlah*mn4.harga_beli) as total_harga
	              from nota_beli nb2 inner join nota_beli_has_bahanbaku mn2
	              on nb2.idBeli = mn2.nota_beli_idBeli
	              inner join bahanbaku bb2
	              on mn2.bahanbaku_idBB = bb2.idBB
                  inner join pemasok_has_bahanbaku mn4
                  on mn4.bahanbaku_idBB = bb2.idBB AND mn4.pemasok_idSupplier=nb2.supplier_idSupplier
	              where nb2.idBeli=".$idBeliBaru;

	    	$result3= mysqli_query($link,$sql3);
			while($row3 = mysqli_fetch_array($result3)){
				$jmlTotalHarga=$row3['total_harga']; 
			}
			
			$sql="INSERT into nota_beli_has_spk (nota_beli_idBeli,spk_idSpk) ".
		    		"VALUES (" . $idBeliBaru . ", " . $idSpk . ")"; 
	    	$result= mysqli_query($link,$sql);

	    	$sql="UPDATE nota_beli set total_harga=". ($jmlTotalHarga)."
				where idBeli =".$idBeliBaru;
		    $result= mysqli_query($link,$sql);
		    if($result){ 
    			$_SESSION['pesan']="Berhasil menambahkan Nota Pembelian";
	    		header('Location: detailPembelian.php?id='.$idBeliBaru);
	    		die();
		    }	
		}
		else if(!$result){
    		die("SQL error_log(message)r : ".$sql);
		}
    }
    else if(!$result){
    	die("SQL error_log(message)r : ".$sql);
	}
break;

//TAMBAH PROSES HIDDEN
/*
case "tambahProses":
	$idKerupuk = $_POST['uIDKerupuk'];
	$namaProses = $_POST['uNamaProses'];
	$lamaProses = $_POST['uLamaProses'];
	$idMesin = $_POST['uIDMesin'];

	$sqlNama = "select * from prosesproduksi where barang_idBarang =".$idKerupuk;
	$resultNama = mysqli_query($link, $sqlNama);

	//SPASI YANG DIINPUT
	if(strlen(str_replace(" ", "", $namaProses)) < 1){
		$_SESSION['pesan']="Nama Proses tidak boleh kosong!";
		header("Location: prosesproduksi.php");
		die();
	}

	//PENGECEKAN INPUT NAMA SAMA, CASE SENSITIVE, AND SPACE
	while($row=mysqli_fetch_array($resultNama)){
		if(strtolower(str_replace(" ", "", $row['nama'])) == strtolower(str_replace(" ", "", $namaProses)) ){
			$_SESSION['pesan']="Nama Proses sudah ada!";
			header("Location: prosesproduksi.php");
			die();
		}
	}

	//NGECEK INPUTAN KOSONG, KALAU ELSE DI INSERT KE DB
	if(empty($namaProses) || empty($lamaProses)){
	    $_SESSION['pesan'] = "Data belum lengkap!";
	    header("Location: prosesproduksi.php");
	    die();
    } 
    else{
    	$sql2= "SELECT max(p.urutan) as urutan
				FROM barang b inner join prosesproduksi p
					on b.idBarang = p.barang_idBarang
				where b.idBarang =$idKerupuk";
		$result2= mysqli_query($link,$sql2);
	    $urutan = 0;
	    while ($row2 = mysqli_fetch_array($result2)) {
	    	$urutan = $row2['urutan'];
	    }
	    $urutan+=1;
	    if($result2){
	    	$sql="insert into prosesproduksi (nama,lama_proses,urutan,mesin_idMesin,barang_idBarang)".
		    		"VALUES ('" . $namaProses . "', " . $lamaProses . ", " . $urutan . "," . $idMesin . ", " . $idKerupuk . ")";
		    $result= mysqli_query($link,$sql);
		    if($result){
		    	$_SESSION['pesan']="Berhasil menambahkan Proses Produksi";
		    	header('Location: prosesproduksi.php');
		    	die();
		    }
	    }
	    else if(!$result){
	    	die("SQL error_log(message)r : ".$sql);
	    }
	}
break;
*/

//TAMBAH PROSES
case "tambahProses":
	$idKerupuk = $_POST['uIDKerupuk'];
	$namaProses = $_POST['uNamaProses'];
	$idMesin = $_POST['uIDMesin'];

	$sqlNama = "select * from prosesproduksi where barang_idBarang =".$idKerupuk;
	$resultNama = mysqli_query($link, $sqlNama);

	//SPASI YANG DIINPUT
	if(strlen(str_replace(" ", "", $namaProses)) < 1){
		$_SESSION['pesan']="Nama Proses tidak boleh kosong!";
		header("Location: prosesproduksi.php");
		die();
	}

	//PENGECEKAN INPUT NAMA SAMA, CASE SENSITIVE, AND SPACE
	while($row=mysqli_fetch_array($resultNama)){
		if(strtolower(str_replace(" ", "", $row['nama'])) == strtolower(str_replace(" ", "", $namaProses)) ){
			$_SESSION['pesan']="Nama Proses sudah ada!";
			header("Location: prosesproduksi.php");
			die();
		}
	}

	//NGECEK INPUTAN KOSONG, KALAU ELSE DI INSERT KE DB
	if(empty($namaProses)){
	    $_SESSION['pesan'] = "Data belum lengkap!";
	    header("Location: prosesproduksi.php");
	    die();
    } 
    else{
    	$sql2= "SELECT max(p.urutan) as urutan
				FROM barang b inner join prosesproduksi p
					on b.idBarang = p.barang_idBarang
				where b.idBarang =$idKerupuk";
		$result2= mysqli_query($link,$sql2);
	    $urutan = 0;
	    while ($row2 = mysqli_fetch_array($result2)) {
	    	$urutan = $row2['urutan'];
	    }
	    $urutan+=1;
	    if($result2){
	    	$sql="insert into prosesproduksi (nama,urutan,mesin_idMesin,barang_idBarang)".
		    		"VALUES ('" . $namaProses . "', " . $urutan . "," . $idMesin . ", " . $idKerupuk . ")";
		    $result= mysqli_query($link,$sql);
		    if($result){
		    	$_SESSION['pesan']="Berhasil menambahkan Proses Produksi";
		    	header('Location: prosesproduksi.php');
		    	die();
		    }
	    }
	    else if(!$result){
	    	die("SQL error_log(message)r : ".$sql);
	    }
	}
break;

//TAMBAH SPK
case "tambahSPK":
	$idNota = $_POST['uNotaJual'];
	$idKerupuk = $_POST['uKerupuk'];
	$tglSpk = date("Y-m-d");
	$tglRencanaSelesai = $_POST['uRencanaSelesai'];
	$rencanaProduksi = $_POST['uRencanaProduksi'];

	//NGECEK INPUTAN KOSONG, KALAU ELSE DI INSERT KE DB
	if(empty($tglRencanaSelesai) || empty($idNota) || empty($idKerupuk) || empty($rencanaProduksi)){
	    $_SESSION['pesan'] = "Data belum lengkap!";
	    header("Location: spk.php");
	    die();
    } 
    else{
		$sql="insert into spk (tgl_spk,tgl_perencanaan,rencana_produksi,status,barang_idBarang, nota_jual_idJual,deleted)".
		    "VALUES ('" . $tglSpk . "', '" . $tglRencanaSelesai . "', " . $rencanaProduksi . ", 0, " . $idKerupuk . ", " . $idNota . ", 0)";

	    $result= mysqli_query($link,$sql);
	    if($result){
	    	$_SESSION['pesan']="Berhasil menambahkan SPK!";
	    	header('Location: spk.php');
	    	die();
	    }
	    else if(!$result){
	    	die("SQL error_log(message)r : ".$sql);
	    }
	}
break;

//TAMBAH REALISASI BB
case "realisasiBB":
	$idBarang = $_POST['uIDBarang'];
    $idSPK = $_POST['uIDSPK']; 
  
 	$sqlTest = "SELECT b.idBarang as idBarang, bb.idBB as idBB ,b.nama as nama_barang, bb.nama as nama_bb, s.nama as satuan, mn.jumlah as jumlah
      FROM bahanbaku bb inner join bahanbaku_has_barang mn
        on bb.idBB = mn.bahanbaku_idBB
      inner join barang b
        on mn.barang_idBarang = b.idBarang
      inner join satuan s
        on bb.idSatuan = s.idSatuan
      where b.idBarang=".$idBarang;
    $resultTest = mysqli_query($link, $sqlTest); 
    while ($rowTest = mysqli_fetch_array($resultTest)) {
    	$idBB = $_POST['uIDBB'.$rowTest['idBB']]; 
    	$jumlahAsli = $_POST['uJumlahAsli'.$rowTest['idBB']];
    	$jumlah = $_POST['uJumlah'.$rowTest['idBB']]; 
    	$namaBB = $rowTest['nama_bb'];


    	//NGECEK INPUTAN KOSONG, KALAU ELSE DI INSERT KE DB
		if(empty($jumlah)){
		    $_SESSION['pesan'] = "Data belum lengkap!";
		    header('Location: detailRealisasiBahan.php?id='.$idSPK);
		    die();
	    } 	

    	$stok=0;
    	$sql_cekBB = "SELECT *
    			from bahanbaku 
    			where idBB =".$idBB ;
    	$res_cekBB= mysqli_query($link,$sql_cekBB);
		while($r_BB = mysqli_fetch_array($res_cekBB)){
			$stok=$r_BB['stok']; 
		}
		if($stok < $jumlah){
		    $_SESSION['pesan'] = "Stok ".$namaBB." Tidak Cukup";
		    header('Location: detailRealisasiBahan.php?id='.$idSPK);
		    die();
		}

    	$sql_cekBB = "SELECT *
    			from bahanbaku_has_spk
    			where bahanbaku_idBB=$idBB 
    				AND spk_idSpk=$idSPK";
    	$res_cekBB= mysqli_query($link,$sql_cekBB);
		$jmlAda=mysqli_num_rows($res_cekBB);
		if($jmlAda > 0){
		    $_SESSION['pesan'] = "Data Sudah Ada";
		    header('Location: detailRealisasiBahan.php?id='.$idSPK);
		    die();
		}
    }

 	$sqlTest = "SELECT b.idBarang as idBarang, bb.idBB as idBB ,b.nama as nama_barang, bb.nama as nama_bb, s.nama as satuan, mn.jumlah as jumlah
      FROM bahanbaku bb inner join bahanbaku_has_barang mn
        on bb.idBB = mn.bahanbaku_idBB
      inner join barang b
        on mn.barang_idBarang = b.idBarang
      inner join satuan s
        on bb.idSatuan = s.idSatuan
      where b.idBarang=".$idBarang;
    $resultTest = mysqli_query($link, $sqlTest); 
    while ($rowTest = mysqli_fetch_array($resultTest)) {
    	$idBB = $_POST['uIDBB'.$rowTest['idBB']]; 
    	$jumlahAsli = $_POST['uJumlahAsli'.$rowTest['idBB']];
    	$jumlah = $_POST['uJumlah'.$rowTest['idBB']]; 
    	$namaBB = $rowTest['nama_bb'];


    	//NGECEK INPUTAN KOSONG, KALAU ELSE DI INSERT KE DB
		if(empty($jumlah)){
		    $_SESSION['pesan'] = "Data belum lengkap!";
		    header('Location: detailRealisasiBahan.php?id='.$idSPK);
		    die();
	    } 	 

    	$sisa = $jumlah - $jumlahAsli;

		$sql = "INSERT INTO `bahanbaku_has_spk`(`bahanbaku_idBB`, `spk_idSpk`, `sisa`, `jumlah_digunakan`) 
			VALUES ($idBB, $idSPK, $sisa, $jumlah); 
			";
    	$result= mysqli_query($link,$sql);

		$sql = "
			UPDATE bahanbaku 
				SET stok=(stok-$jumlah) 
			WHERE idBB=$idBB
			";
    	$result= mysqli_query($link,$sql);

    }

	$_SESSION['pesan']="Berhasil menambahkan!";
	header('Location: detailRealisasiBahan.php?id='.$idSPK);
	die();

break;

//TAMBAH PENJADWALAN PRODUKSI
case "tambahJadwalProduksi":
	$idBarang = $_POST['uIDBarang'];
    $idSPK = $_POST['uIDSPK']; 
  
 	$sqlTest = "SELECT b.nama as nama_barang, p.nama as nama_proses, m.nama as nama_mesin, p.idProsesproduksi as id_proses, p.urutan as urutan, m.idMesin as idMesin
                FROM barang b INNER JOIN prosesproduksi p
                on b.idBarang = p.barang_idBarang
                INNER JOIN mesin m
                on p.mesin_idMesin = m.idMesin
                WHERE b.idBarang =$idBarang
                order by urutan asc";
    $resultTest = mysqli_query($link, $sqlTest); 
    while ($rowTest = mysqli_fetch_array($resultTest)) {
    	$idProses = $_POST['uIDProses'.$rowTest['id_proses']]; 
    	$perkiraanMulai = $_POST['uPerkiraanMulai'.$rowTest['id_proses']];
    	$perkiraanSelesai = $_POST['uPerkiraanSelesai'.$rowTest['id_proses']]; 
    	$keterangan = $_POST['uKeterangan'.$rowTest['id_proses']];
    	$biayaLain = $_POST['uBiayaLain'.$rowTest['id_proses']]; 
    	$idMesin = $_POST['uIDMesin'.$rowTest['id_proses']]; 
    	$namaProses = $rowTest['nama_proses'];

 
		$lamahari        = strtotime($perkiraanSelesai) - strtotime($perkiraanMulai);
		$selisihHari = floor($lamahari / (60 * 60 * 24))+1;
		echo $selisihHari;

    	$jamMesin = 0;

		if($rowTest['idMesin']!=0){
	    	$jamMesin = $_POST['uJamMesin'.$rowTest['id_proses']];
			if($idMesin != 0 && ($jamMesin == null || $jamMesin == '' || $jamMesin < 1)){  
				$_SESSION['pesan']="Jam Harus Diisi minimal 1 Jam";
				header('Location: detailPenjadwalan.php?id='.$idSPK);
				die();
			} else if($idMesin != 0 && ($jamMesin > ($selisihHari * 24))){  
				$_SESSION['pesan']="Jam Tidak Boleh melebihi waktu";
				header('Location: detailPenjadwalan.php?id='.$idSPK);
				die();
			}
	    } 

    	//NGECEK INPUTAN KOSONG, KALAU ELSE DI INSERT KE DB
		if(empty($perkiraanMulai) || empty($perkiraanSelesai)){
		    $_SESSION['pesan'] = "Data belum lengkap!";
		    header('Location: detailPenjadwalan.php?id='.$idSPK);
		    die();
	    } 	

    	$sql_cekBB = "SELECT *
    			from jadwalproduksi
    			where spk_idSpk=$idSPK 
    				AND prosesproduksi_idProsesproduksi=$idProses";
    	$res_cekBB= mysqli_query($link,$sql_cekBB);
		$jmlAda=mysqli_num_rows($res_cekBB);
		if($jmlAda > 0){
		    $_SESSION['pesan'] = "Anda sudah melakukan penjadwalan";
		    header('Location: detailPenjadwalan.php?id='.$idSPK);
		    die();
		}
    }

 	$sqlTest = "SELECT b.nama as nama_barang, p.nama as nama_proses, m.nama as nama_mesin, p.idProsesproduksi as id_proses, p.urutan as urutan, m.idMesin as idMesin
                FROM barang b INNER JOIN prosesproduksi p
                on b.idBarang = p.barang_idBarang
                INNER JOIN mesin m
                on p.mesin_idMesin = m.idMesin
                WHERE b.idBarang =$idBarang
                order by urutan asc";
    $resultTest = mysqli_query($link, $sqlTest); 
    while ($rowTest = mysqli_fetch_array($resultTest)) {
    	$idProses = $_POST['uIDProses'.$rowTest['id_proses']]; 
    	$perkiraanMulai = $_POST['uPerkiraanMulai'.$rowTest['id_proses']];
    	$perkiraanSelesai = $_POST['uPerkiraanSelesai'.$rowTest['id_proses']]; 
    	$keterangan = $_POST['uKeterangan'.$rowTest['id_proses']];
    	$biayaLain = $_POST['uBiayaLain'.$rowTest['id_proses']]; 
    	$idMesin = $_POST['uIDMesin'.$rowTest['id_proses']]; 
    	$namaProses = $rowTest['nama_proses'];
    	if($biayaLain == NULL){
			$biayaLain = 0; 
		}



    	//NGECEK INPUTAN KOSONG, KALAU ELSE DI INSERT KE DB
		if(empty($perkiraanMulai) || empty($perkiraanSelesai)){
		    $_SESSION['pesan'] = "Data belum lengkap!";
		    header('Location: detailPenjadwalan.php?id='.$idSPK);
		    die();
	    }
    	$sql="INSERT INTO jadwalproduksi(tgl_mulai, tgl_selesai, keterangan, biaya_lain, status_mesin, listrik_idListrik, spk_idSPK, prosesproduksi_idProsesproduksi)".
    		"VALUES ('". $perkiraanMulai . "', '" . $perkiraanSelesai . "', '" . $keterangan . "', " . $biayaLain . ", " . $idMesin . " , 1, " . $idSPK . ", " . $idProses . ")";
    	$result= mysqli_query($link,$sql);
    }

	$_SESSION['pesan']="Berhasil menambahkan Jadwal Produksi!";
	header('Location: detailPenjadwalan.php?id='.$idSPK);
	die();

break;

//// TAMBAH DETAIL KARYAWAN
case "tambahDetailKaryawan":
	$idKaryawan = $_POST['uIDKaryawan'];
	$idJadwal = $_POST['uIDJadwal'];
	$catatan = $_POST['uCatatan'];
	
	//NGECEK INPUTAN KOSONG, KALAU ELSE DI INSERT KE DB
	if(empty($idKaryawan)){
	    $_SESSION['pesan'] = "Pilih nama karyawan dahulu!";
	    header("Location: detailKaryawan.php?id=".$idJadwal);
	    die();
    }
    else{
		$sql="INSERT into tenagakerja_has_jadwalproduksi (tenagakerja_idTenagakerja,jadwalproduksi_idJadwalproduksi,catatan) ".
		    		"VALUES (" . $idKaryawan . ", " . $idJadwal . ", '" . $catatan . "')";

	    $result= mysqli_query($link,$sql);
	    if($result){
	    	header("Location: detailKaryawan.php?id=".$idJadwal);
	    	die();
	    }
	    else if(!$result){
	    	die("SQL error_log(message)r : ".$sql);
	    }
	}
break;
}
?>