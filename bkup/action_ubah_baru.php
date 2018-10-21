<?php
session_start();

require './db.php';

$cmd='';
if(isset($_GET['cmd'])){
	$cmd = $_GET['cmd'];
}
switch ($cmd) {

//UBAH PEMASOK
case "ubahPemasok":
	$idPemasok = $_POST['uID'];
	$namaPemasok = $_POST['uNama'];
	$alamatPemasok = $_POST['uAlamat'];
	$kotaPemasok = $_POST['uKota'];
	$teleponPemasok = $_POST['uTelepon'];

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

	//NGECEK INPUTAN KOSONG, KALAU ELSE BERHASIL UBAH
	if(empty($namaPemasok) || empty($alamatPemasok) || empty($kotaPemasok) || empty($teleponPemasok)){
	    $_SESSION['pesan'] = "Ubah data secara lengkap!";
	    header("Location: pemasok.php");
	    die();
    } 
    else{
		$sql = "UPDATE pemasok SET nama='".$namaPemasok."', alamat='". $alamatPemasok ."', telp='".$teleponPemasok."', kota='".$kotaPemasok."' where idSupplier = ".$idPemasok;
		$result = mysqli_query($link, $sql);
		if($result){
			$_SESSION['pesan']="Berhasil mengubah data pemasok!";
			header("Location: pemasok.php");
			die();
		}
		else if(!$result){
	       die("SQL error_log(message)r : ".$sql);
	  	}
 	}
break;

//// UBAH DETAIL PEMASOK
case "ubahDetailPemasok":
	$idBB = $_POST['uIDBB'];
	$idSupplier = $_POST['uIDSupplier'];
	$leadtime = $_POST['uLeadtime'];
	$harga = $_POST['uHarga'];

	//NGECEK INPUTAN KOSONG, KALAU ELSE DI INSERT KE DB  
    if(empty($leadtime) || empty($harga)){
	    $_SESSION['pesan'] = "Isi Data Secara Lengkap!";
	    header("Location: detailPemasok.php?id=".$idSupplier);
	    die();
    } 
    else{
    	$sql = "UPDATE pemasok_has_bahanbaku SET harga_beli=". $harga .", leadtime=".$leadtime." where bahanbaku_idBB =".$idBB." AND pemasok_idSupplier =".$idSupplier;

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

//UBAH KARYAWAN
case "ubahKaryawan":
	$idKaryawan = $_POST['uID'];
	$namaKaryawan = $_POST['uNama'];
	$alamatKaryawan = $_POST['uAlamat'];
	$kotaKaryawan = $_POST['uKota'];
	$teleponKaryawan = $_POST['uTelepon'];
	$statusKaryawan = $_POST['uStatus'];
	$gajiKaryawan = $_POST['uGaji'];

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

	//NGECEK INPUTAN KOSONG, KALAU ELSE BERHASIL UBAH
	if(empty($namaKaryawan) || empty($alamatKaryawan) || empty($kotaKaryawan) || empty($teleponKaryawan) || empty($gajiKaryawan)){
	    $_SESSION['pesan'] = "Ubah data secara lengkap!";
	    header("Location: karyawan.php");
	    die();
    } 
    else{
		$sql = "UPDATE tenagakerja SET nama='".$namaKaryawan."', alamat='". $alamatKaryawan ."', telp='".$teleponKaryawan."', kota='".$kotaKaryawan."', status='".$statusKaryawan."', gaji=".$gajiKaryawan." where idTenagakerja = ".$idKaryawan;
		$result = mysqli_query($link, $sql);
		if($result){
			$_SESSION['pesan']="Berhasil mengubah data karyawan!";
			header("Location: karyawan.php");
			die();
		}
		else if(!$result){
	       die("SQL error_log(message)r : ".$sql);
	  	}
 	}
break;

//UBAH BAHANBAKU
case "ubahBB":
	$idBB = $_POST['uID'];
	$namaBB = $_POST['uNama'];
	$stokBB = $_POST['uStok'];
	$satuanBB = $_POST['uSatuan'];

	//SPASI YANG DIINPUT
	if(strlen(str_replace(" ", "", $namaBB)) < 1){
		$_SESSION['pesan']="Nama tidak boleh kosong!";
		header("Location: bahanbaku.php");
		die();
	}

	//NGECEK INPUTAN KOSONG, KALAU ELSE BERHASIL UBAH
	if(empty($namaBB) || empty($satuanBB)){
	    $_SESSION['pesan'] = "Ubah data secara lengkap!";
	    header("Location: bahanbaku.php");
	    die();
    } 
    else{
		$sql = "UPDATE bahanbaku SET nama='".$namaBB."', idSatuan='".$satuanBB."' where idBB = ".$idBB;
		$result = mysqli_query($link, $sql);
		if($result){
			$_SESSION['pesan']="Berhasil mengubah data Bahan Baku!";
			header("Location: bahanbaku.php");
			die();
		}
		else if(!$result){
	       die("SQL error_log(message)r : ".$sql);
	  	}
 	}
break;

//UBAH SATUAN BB
case "ubahSatuan":
	$idSatuan = $_POST['uID'];
	$satuanBB = $_POST['uSatuan'];

	//SPASI YANG DIINPUT
	if(strlen(str_replace(" ", "", $satuanBB)) < 1){
		$_SESSION['pesan']="Satuan tidak boleh kosong!";
		header("Location: satuan.php");
		die();
	}

	//NGECEK INPUTAN KOSONG, KALAU ELSE BERHASIL UBAH
	if(empty($satuanBB)){
	    $_SESSION['pesan'] = "Ubah data secara lengkap!";
	    header("Location: satuan.php");
	    die();
    } 
    else{
		$sql = "UPDATE satuan SET nama='".$satuanBB."' where idSatuan = ".$idSatuan;
		$result = mysqli_query($link, $sql);
		if($result){
			$_SESSION['pesan']="Berhasil mengubah data Satuan!";
			header("Location: satuan.php");
			die();
		}
		else if(!$result){
	       die("SQL error_log(message)r : ".$sql);
	  	}
 	}
break;

//UBAH KERUPUK
case "ubahKerupuk":
	$idKerupuk = $_POST['uID'];
	$namaKerupuk = $_POST['uNama'];
	$hargaKerupuk = $_POST['uHarga'];
	$jenisKerupuk = $_POST['uJenisTambah'];

	//SPASI YANG DIINPUT
	if(strlen(str_replace(" ", "", $namaKerupuk)) < 1){
		$_SESSION['pesan']="Nama tidak boleh kosong!";
		header("Location: kerupuk.php");
		die();
	}

	//NGECEK INPUTAN KOSONG, KALAU ELSE BERHASIL UBAH
	if(empty($namaKerupuk) || empty($hargaKerupuk) || empty($jenisKerupuk)){
	    $_SESSION['pesan'] = "Ubah data secara lengkap!";
	    header("Location: kerupuk.php");
	    die();
    } 
    else{
		$sql = "UPDATE barang SET nama='".$namaKerupuk."', harga_jual=". $hargaKerupuk .", idJenis='".$jenisKerupuk."' where idBarang = ".$idKerupuk;
		$result = mysqli_query($link, $sql);
		if($result){
			$_SESSION['pesan']="Berhasil mengubah data Kerupuk!";
			header("Location: kerupuk.php");
			die();
		}
		else if(!$result){
	       die("SQL error_log(message)r : ".$sql);
	  	}
 	}
break;

//UBAH JENIS
case "ubahJenis":
	$idJenisKerupuk = $_POST['uID'];
	$jenisKerupuk = $_POST['uJenis'];

	//SPASI YANG DIINPUT
	if(strlen(str_replace(" ", "", $jenisKerupuk)) < 1){
		$_SESSION['pesan']="Nama tidak boleh kosong!";
		header("Location: jenis.php");
		die();
	}

	//NGECEK INPUTAN KOSONG, KALAU ELSE BERHASIL UBAH
	if(empty($jenisKerupuk)){
	    $_SESSION['pesan'] = "Ubah data secara lengkap!";
	    header("Location: jenis.php");
	    die();
    } 
    else{
		$sql = "UPDATE jenis SET jenis='".$jenisKerupuk."' where idJenis = ".$idJenisKerupuk;
		$result = mysqli_query($link, $sql);
		if($result){
			$_SESSION['pesan']="Berhasil mengubah data Jenis Kerupuk!";
			header("Location: jenis.php");
			die();
		}
		else if(!$result){
	       die("SQL error_log(message)r : ".$sql);
	  	}
 	}
break;

//UBAH MESIN
case "ubahMesin":
	$idMesin = $_POST['uID'];
	$namaMesin = $_POST['uNama'];
	$wattMesin = $_POST['uWatt'];

	//SPASI YANG DIINPUT
	if(strlen(str_replace(" ", "", $namaMesin)) < 1){
		$_SESSION['pesan']="Nama tidak boleh kosong!";
		header("Location: mesin.php");
		die();
	}

	//NGECEK INPUTAN KOSONG, KALAU ELSE BERHASIL UBAH
	if(empty($namaMesin) || empty($wattMesin)){
	    $_SESSION['pesan'] = "Ubah data secara lengkap!";
	    header("Location: mesin.php");
	    die();
    } 
    else{
		$sql = "UPDATE mesin SET nama='".$namaMesin."', watt='".$wattMesin."' where idMesin = ".$idMesin;
		$result = mysqli_query($link, $sql);
		if($result){
			$_SESSION['pesan']="Berhasil mengubah data Mesin!";
			header("Location: mesin.php");
			die();
		}
		else if(!$result){
	       die("SQL error_log(message)r : ".$sql);
	  	}
 	}
break;

//UBAH LAHAN
case "ubahLahan":
	$idLahan = $_POST['uID'];
	$namaLahan = $_POST['uNama'];
	$biayaLahan = $_POST['uBiaya'];

	//SPASI YANG DIINPUT
	if(strlen(str_replace(" ", "", $namaLahan)) < 1){
		$_SESSION['pesan']="Lahan tidak boleh kosong!";
		header("Location: lahan.php");
		die();
	}

	//NGECEK INPUTAN KOSONG, KALAU ELSE BERHASIL UBAH
	if(empty($namaLahan) || empty($biayaLahan)){
	    $_SESSION['pesan'] = "Ubah data secara lengkap!";
	    header("Location: lahan.php");
	    die();
    } 
    else{
		$sql = "UPDATE lahan SET nama='".$namaLahan."', biaya_sewa='".$biayaLahan."' where idLahan = ".$idLahan;
		$result = mysqli_query($link, $sql);
		if($result){
			$_SESSION['pesan']="Berhasil mengubah data Lahan!";
			header("Location: lahan.php");
			die();
		}
		else if(!$result){
	       die("SQL error_log(message)r : ".$sql);
	  	}
 	}
break;

//UBAH BOM
case "ubahBOM":
	$idKerupuk = $_POST['uIDKerupuk'];
	$idBB = $_POST['uIDBB'];
	$jumlah = $_POST['uJumlah'];

	//NGECEK INPUTAN KOSONG, KALAU ELSE BERHASIL UBAH
	if(empty($jumlah)){
	    $_SESSION['pesan'] = "Ubah data secara lengkap!";
	    header("Location: bom.php");
	    die();
    } 
    else{
		$sql = "UPDATE bahanbaku_has_barang set jumlah=".$jumlah."
			where bahanbaku_idBB =".$idBB." AND barang_idBarang =".$idKerupuk;
		$result = mysqli_query($link, $sql);
		if($result){
			$_SESSION['pesan']="Berhasil mengubah jumlah!";
			header("Location: bom.php");
			die();
		}
		else if(!$result){
	       die("SQL error_log(message)r : ".$sql);
	  	}
 	}
break;

//// UBAH TANGGAL PELUNASAN (NOTA BELI)
case "ubahPelunasan":
	$tglLunas = $_POST['uLunas'];
	$idBeli = $_POST['uID'];
	$status = $_POST['uStatus'];

	//NGECEK INPUTAN KOSONG, KALAU ELSE BERHASIL UBAH
	if(empty($tglLunas)){
	    $_SESSION['pesan'] = "Isi tanggal dengan jelas!";
	    header("Location: pembelian.php");
	    die();
    } 
    else{
		$sql = "UPDATE nota_beli set tgl_bayar='".$tglLunas."', status_bayar='".$status."'
			where idBeli =".$idBeli;
		$result = mysqli_query($link, $sql);
		if($result){
			header("Location: pembelian.php");
			die();
		}
		else if(!$result){
	       die("SQL error_log(message)r : ".$sql);
	  	}
 	}
break;

// UBAH BB PADA DETAIL NOTA
case "ubahBBNota":
	$idBeli = $_POST['uIDBeli'];
	$idBB = $_POST['uIDBB'];
	$jumlah = $_POST['uJumlah'];

	//NGECEK INPUTAN KOSONG, KALAU ELSE BERHASIL UBAH
	if(empty($jumlah)){
	    $_SESSION['pesan'] = "Ubah data secara lengkap!";
	    header("Location: detailPembelian.php?id=$idBeli");	
	    die();
    } 
    else{
    	$jmlSekarang=0;
		$sql = "SELECT * from nota_beli_has_bahanbaku where nota_beli_idBeli =".$idBeli." AND bahanbaku_idBB =".$idBB;
    	$result= mysqli_query($link,$sql);
		while($row = mysqli_fetch_array($result)){
			$jmlSekarang=$row['jumlah']; // stok di detail nota
		}

		$sql = "UPDATE nota_beli_has_bahanbaku set jumlah=".$jumlah."
			where nota_beli_idBeli =".$idBeli." AND bahanbaku_idBB =".$idBB;
		$result = mysqli_query($link, $sql);
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

	    	$result= mysqli_query($link,$sql);
			while($row = mysqli_fetch_array($result)){
				$jmlTotalHarga=$row['total_harga']; 
			}

	    	$sql="UPDATE nota_beli set total_harga=". ($jmlTotalHarga)."
				where idBeli =".$idBeli;
		    $result= mysqli_query($link,$sql);
		    if($result){ 
    			$_SESSION['pesan'] = $sql;
    			// echo $sql;
		    	header("Location: detailPembelian.php?id=$idBeli");
		    	die();
		    }
		header("Location: detailPembelian.php?id=$idBeli");
		die();
		}
		else if(!$result){
	       die("SQL error_log(message)r : ".$sql);
	  	}
 	}
break;

//// UBAH VALIDASI PADA DETAIL NOTA
case "ubahValidasiNota":
	$idNota = $_POST['uIDNotaBeli'];
	$sqlidNota = "SELECT nb.idBeli as idBeli, bb.idBB as idBB, bb.nama as nama, bb.harga_beli as harga, mn.jumlah as jumlah, nb.total_harga as total, mn.validasi as validasi
            from nota_beli nb inner join nota_beli_has_bahanbaku mn
            on nb.idBeli = mn.nota_beli_idBeli
            inner join bahanbaku bb
            on mn.bahanbaku_idBB = bb.idBB
            where nb.idBeli=".$idNota;
    $result= mysqli_query($link,$sqlidNota);
	while($row = mysqli_fetch_array($result)){
		$idBeli = $_POST['uIDBeli'.$row['idBB']];
		$idBB = $_POST['uIDBB'.$row['idBB']];
		$jumlahBB = $_POST['uJumlah'.$row['idBB']];

		/*DIMATIKAN KARENA MAIN NYA LEADTIME DATENG = STOK NAMBAH
		$sqlUpdateBB="UPDATE bahanbaku set stok= (stok + $jumlahBB)
			where idBB =".$idBB;
	    $reUpdateBB= mysqli_query($link,$sqlUpdateBB);*/
	}
	$sql = "UPDATE nota_beli_has_bahanbaku set validasi= 1 where nota_beli_idBeli =".$idBeli;
	$result = mysqli_query($link, $sql);

    if($result){ 
    	header("Location: detailPembelian.php?id=$idNota");
    	die();
    }
	else if(!$result){
        $_SESSION['pesan']="Detail pembelian ini kosong!";
		header("Location: detailPembelian.php?id=$idNota");
		die();
  	}
break;

//UBAH PROSES
case "ubahProses":
	$idProses = $_POST['uIDProses'];
	$namaProses = $_POST['uNamaProses'];
	$lamaProses = $_POST['uLamaProses'];
	$idMesin = $_POST['uIDMesin'];

	if(strlen(str_replace(" ", "", $namaProses)) < 1){
		$_SESSION['pesan']="Nama Proses tidak boleh kosong!";
		header("Location: prosesproduksi.php");
		die();
	}

	//NGECEK INPUTAN KOSONG, KALAU ELSE DI INSERT KE DB
	if(empty($namaProses) || empty($lamaProses)){
	    $_SESSION['pesan'] = "Data belum lengkap!";
	    header("Location: prosesproduksi.php");
	    die();
    } 
    else{
		$sql = "UPDATE prosesproduksi SET nama='".$namaProses."', lama_proses=".$lamaProses.", mesin_idMesin=".$idMesin." where idProsesproduksi = ".$idProses;
		$result = mysqli_query($link, $sql);
		if($result){
			$_SESSION['pesan']="Berhasil mengubah data proses produksi!";
			header("Location: prosesproduksi.php");
			die();
		}
		else if(!$result){
	       die("SQL error_log(message)r : ".$sql);
	  	}
 	}
break;

case "updateTabelProses":
$urutan = 1;
foreach ($_POST['urutanId'] as $id) {
	//query update urutan, idnya $id
	$sql = "UPDATE prosesproduksi SET urutan=".$urutan." where idProsesproduksi= ".$id;
	$result = mysqli_query($link, $sql);
	if($result){
		$_SESSION['pesan']="Berhasil mengubah urutan Proses!";
		header("Location: prosesproduksi.php");
	}
	$urutan++;
}
break;

//UBAH SPK
case "ubahSPK":
	$idSpk = $_POST['uID'];
	$tglRencanaSelesai = $_POST['uRencanaSelesai'];

	//NGECEK INPUTAN KOSONG, KALAU ELSE DI INSERT KE DB
	if(empty($tglRencanaSelesai)){
	    $_SESSION['pesan'] = "Lengkapi tanggal terlebih dahulu!";
	    header("Location: spk.php");
	    die();
    } 
    else{
		$sql = "UPDATE spk SET tgl_perencanaan='".$tglRencanaSelesai."' where idSpk = ".$idSpk;
		$result = mysqli_query($link, $sql);
		if($result){
			$_SESSION['pesan']="Berhasil mengubah data SPK!";
			header("Location: spk.php");
			die();
		}
		else if(!$result){
	       die("SQL error_log(message)r : ".$sql);
	  	}
 	}
break;

// UBAH REALISASISPK (DETAIL SPK)
case "ubahRealisasiSPK":
	$mulaiReal = $_POST['uMulaiReal'];
	$selesaiReal = $_POST['uSelesaiReal']; 
	$idSPK = $_POST['uID']; 
	$hasilProduksi = $_POST['uHasilReal']; 
	if($hasilProduksi == NULL){
		$hasilProduksi = 0; 
	}

	//NGECEK INPUTAN KOSONG, KALAU ELSE DI INSERT KE DB
	if(empty($mulaiReal)){
	    $_SESSION['pesan'] = "Tanggal mulai harus diisi!";
	    header('Location: spk.php');
	    die();
    }
    else if(empty($selesaiReal)){
    	$sql = "UPDATE spk SET tgl_mulai_real='". $mulaiReal ."', hasil_produksi='". $hasilProduksi ."' where idSpk =".$idSPK;
    }
    else{
    	$sql = "UPDATE spk SET tgl_mulai_real='". $mulaiReal ."', tgl_selesai_real='". $selesaiReal ."', hasil_produksi='". $hasilProduksi ."' where idSpk =".$idSPK;
    }   
	
    $result= mysqli_query($link,$sql);
    if($result){
    	$_SESSION['pesan']='Anda berhasil memulai realisasi mulai SPK!';
    	header('spk.php');
    	die();	
    }
    else if(!$result){
    	die("SQL error_log(message)r : ".$sql);
    }
break;

//UBAH BB PADA REALISASI
case "ubahRealisasiBB":
	$idSPK = $_POST['uIDSPK'];
	$idBB = $_POST['uIDBB'];
	$jumlah = $_POST['uJumlah'];
	$jumlahLama = $_POST['uJumlahLama'];
	$jumlahAsli = $_POST['uJumlahAsli'];
	$sisa = $jumlah - $jumlahAsli;
	$sisaLama = $_POST['uSisaLama'];
	$jmlSekarang=0;
	$stokSekarang=0;

	$idBarang = $_POST['uIDBarang'];

	// $sisa = 0; 

	if(empty($jumlah)){
	    $_SESSION['pesan'] = "Ubah data secara lengkap!";
	    header('Location: detailRealisasiBahan.php?id='.$idSPK);	
	    die();
    } 
    else{
    	$sqlCek = "SELECT stok
    	FROM bahanbaku where idBB=".$idBB;
    	//echo 'sql : '.$sqlCek.'</br>';
		$resultCek= mysqli_query($link,$sqlCek); 
		while($rowCek = mysqli_fetch_array($resultCek)){
			$jmlSekarang=$rowCek['stok']; // stok di detail nota
		}

		// echo 'jumlah gudang : '.$jmlSekarang.'</br>';
		// echo 'jumlah inputan : '.$jumlah.'</br>';
		// echo 'jumlah terpakai : '.$jumlahLama.'</br>';
		// echo 'sisa baru : '.$sisa.'</br>';

		$stokSekarang = $jmlSekarang+$jumlahLama+$sisaLama;
		// echo 'stok sekarang : '.$stokSekarang.'</br>';

		// echo "sisa lama : ".$sisaLama.' sisa baru : '.$sisa;
		// echo "stok gudang : ".($jmlSekarang+$sisaLama-$sisa);

		if($stokSekarang >= $jumlah){
			$sql = "UPDATE bahanbaku   
					SET stok=($jmlSekarang+$sisaLama-$sisa) 
					WHERE idBB=$idBB";
	    	$result= mysqli_query($link,$sql); 
	    	// echo $sql; 
	    	if($result){
				$sql = "
				UPDATE bahanbaku_has_spk 
					SET jumlah_digunakan=$jumlahAsli ,
					 	sisa = $sisa
				WHERE bahanbaku_idBB=$idBB AND spk_idSpk=$idSPK 
				";
	    		$result= mysqli_query($link,$sql);
		    	if($result){
			    	$_SESSION['pesan']="Data berhasil diubah";
				    header('Location: detailRealisasiBahan.php?id='.$idSPK);
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
		else{
			$_SESSION['pesan']="Bahan baku tidak cukup!";
		    header('Location: detailRealisasiBahan.php?id='.$idSPK);
	    	die();
		}
 	}
break;

// UBAH JADWAL PRODUKSI
case "ubahJadwalProduksi":
	$perkiraanMulai = $_POST['uPerkiraanMulai'];
	$perkiraanSelesai = $_POST['uPerkiraanSelesai']; 
	$idMesin = $_POST['uIDMesin'];
	$keterangan = $_POST['uKeterangan'];
	$biayaLain = $_POST['uBiayaLain']; 
	$idSPK = $_POST['uIDSPK']; 
	$idJadwal = $_POST['uIDJadwal']; 
	if($biayaLain == NULL){
		$biayaLain = 0; 
	}

	//NGECEK INPUTAN KOSONG, KALAU ELSE DI INSERT KE DB
	if(empty($perkiraanMulai) || empty($perkiraanSelesai)){
	    $_SESSION['pesan'] = "Data belum lengkap!";
	    header('Location: detailPenjadwalan.php?id='.$idSPK);
	    die();
    } 	

	$sql = "UPDATE jadwalproduksi SET tgl_mulai='". $perkiraanMulai ."', tgl_selesai='". $perkiraanSelesai ."', keterangan='". $keterangan ."', biaya_lain=". $biayaLain .", status_mesin=". $idMesin ." where idJadwalproduksi =".$idJadwal;
    $result= mysqli_query($link,$sql);
    if($result){
    	$_SESSION['pesan']="Data berhasil diubah";
    	// echo 'Location: detailPenjadwalan.php?id='.$idSPK;
    	header('Location: detailPenjadwalan.php?id='.$idSPK);
    	die();	
    }
    else if(!$result){
    	die("SQL error_log(message)r : ".$sql);
    }
break;

// UBAH REALISASI JADWAL
case "ubahRealisasiJadwal":
	$mulaiReal = $_POST['uMulaiReal'];
	$selesaiReal = $_POST['uSelesaiReal']; 
	$idSPK = $_POST['uIDSPK']; 
	$idJadwal = $_POST['uIDJadwal']; 
	$namaProses = $_POST['uNamaProses']; 

	//NGECEK INPUTAN KOSONG, KALAU ELSE DI INSERT KE DB
	if(empty($mulaiReal)){
	    $_SESSION['pesan'] = "Tanggal mulai harus diisi!";
	    header('Location: detailPenjadwalan.php?id='.$idSPK);
	    die();
    }
    else if(empty($selesaiReal)){
    	$sql = "UPDATE jadwalproduksi SET tgl_mulai_real='". $mulaiReal ."' where idJadwalproduksi =".$idJadwal;
    }
    else{
    	$sql = "UPDATE jadwalproduksi SET tgl_mulai_real='". $mulaiReal ."', tgl_selesai_real='". $selesaiReal ."' where idJadwalproduksi =".$idJadwal;
    }   
	
    $result= mysqli_query($link,$sql);
    if($result){
    	$_SESSION['pesan']='Anda berhasil memulai penjadwalan proses '.$namaProses;
    	header('Location: detailPenjadwalan.php?id='.$idSPK);
    	die();	
    }
    else if(!$result){
    	die("SQL error_log(message)r : ".$sql);
    }
break;

//// UBAH DETAIL KARYAWAN
case "ubahDetailKaryawan":
	$idKaryawan = $_POST['uIDKaryawan'];
	$idJadwal = $_POST['uIDJadwal'];
	$catatan = $_POST['uCatatan'];

	$sql = "UPDATE tenagakerja_has_jadwalproduksi SET catatan='". $catatan ."' where tenagakerja_idTenagakerja =".$idKaryawan." AND jadwalproduksi_idJadwalproduksi =".$idJadwal;
    $result= mysqli_query($link,$sql);
    if($result){
    	header("Location: detailKaryawan.php?id=".$idJadwal);
    	die();	
    }
    else if(!$result){
    	die("SQL error_log(message)r : ".$sql);
    }
break;
}
?>