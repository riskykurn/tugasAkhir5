<?php
session_start();

require './db.php';

$cmd='';
if(isset($_GET['cmd'])){
	$cmd = $_GET['cmd'];
}
switch ($cmd) {

//HAPUS PEMASOK
case 'hapusPemasok':
	$idPemasok = $_POST['uID'];
	$sql = "UPDATE pemasok SET deleted = 1 where idSupplier =" . $idPemasok;
    $result = mysqli_query($link, $sql);
    if($result){
		$_SESSION['pesan']="Berhasil menghapus data pemasok!";
		header("Location: pemasok.php");
		die();
	}
	else if(!$result){
       die("SQL error_log(message)r : ".$sql);
  	}
break;

////HAPUS DETAIL PEMASOK
case 'hapusDetailPemasok':
	$idPemasok = $_POST['uIDSupplier'];
	$idBB = $_POST['uIDBB'];
	
	$sql = "delete from pemasok_has_bahanbaku where pemasok_idSupplier =" . $idPemasok . " AND bahanbaku_idBB  =".$idBB;
    $result = mysqli_query($link, $sql);
    if($result){
		header('Location: detailPemasok.php?id='.$idPemasok);
		die();
	}
	else if(!$result){
       die("SQL error_log(message)r : ".$sql);
  	}
break;

//HAPUS KARYAWAN
case 'hapusKaryawan':
	$idKaryawan = $_POST['uID'];
	$sql = "delete from tenagakerja where idTenagakerja =" . $idKaryawan;
    $result = mysqli_query($link, $sql);
    if($result){
		$_SESSION['pesan']="Berhasil menghapus data Karyawan!";
		header("Location: karyawan.php");
		die();
	}
	else if(!$result){
       die("SQL error_log(message)r : ".$sql);
  	}
break;

//HAPUS BAHANBAKU
case 'hapusBB':
	$idBB = $_POST['uID'];
	$sql = "delete from bahanbaku where idBB =" . $idBB;
    $result = mysqli_query($link, $sql);
    if($result){
		$_SESSION['pesan']="Berhasil menghapus data Bahan Baku!";
		header("Location: bahanbaku.php");
		die();
	}
	else if(!$result){
       die("SQL error_log(message)r : ".$sql);
  	}
break;

//HAPUS SATUAN BAHANBAKU
case 'hapusSatuan':
	$idSatuan = $_POST['uID'];
	$sql = "delete from satuan where idSatuan =" . $idSatuan;
    $result = mysqli_query($link, $sql);
    if($result){
		$_SESSION['pesan']="Berhasil menghapus data Satuan!";
		header("Location: satuan.php");
		die();
	}
	else if(!$result){
       die("SQL error_log(message)r : ".$sql);
  	}
break;

//HAPUS KERUPUK
case 'hapusKerupuk':
	$idBarang = $_POST['uID'];
	$sql = "delete from barang where idBarang =" . $idBarang;
    $result = mysqli_query($link, $sql);
    if($result){
		$_SESSION['pesan']="Berhasil menghapus data Kerupuk!";
		header("Location: kerupuk.php");
		die();
	}
	else if(!$result){
       die("SQL error_log(message)r : ".$sql);
  	}
break;

//HAPUS JENIS KERUPUK
case 'hapusJenis':
	$idJenisKerupuk = $_POST['uID'];
	$sql = "delete from jenis where idJenis =" . $idJenisKerupuk;
    $result = mysqli_query($link, $sql);
    if($result){
		$_SESSION['pesan']="Berhasil menghapus data Jenis Kerupuk!";
		header("Location: jenis.php");
		die();
	}
	else if(!$result){
       die("SQL error_log(message)r : ".$sql);
  	}
break;

//HAPUS MESIN
case 'hapusMesin':
	$idMesin = $_POST['uID'];
	$sql = "delete from mesin where idMesin =" . $idMesin;
    $result = mysqli_query($link, $sql);
    if($result){
		$_SESSION['pesan']="Berhasil menghapus data Mesin!";
		header("Location: mesin.php");
		die();
	}
	else if(!$result){
       die("SQL error_log(message)r : ".$sql);
  	}
break;

//HAPUS LAHAN
case 'hapusLahan':
	$idLahan = $_POST['uID'];
	$sql = "delete from lahan where idLahan =" . $idLahan;
    $result = mysqli_query($link, $sql);
    if($result){
		$_SESSION['pesan']="Berhasil menghapus data Lahan!";
		header("Location: lahan.php");
		die();
	}
	else if(!$result){
       die("SQL error_log(message)r : ".$sql);
  	}
break;

//HAPUS BOM
case 'hapusBOM':
	$idKerupuk = $_POST['uIDKerupuk'];
	$idBB = $_POST['uIDBB'];
	$sql = "DELETE from bahanbaku_has_barang
	where bahanbaku_idBB =".$idBB." AND barang_idBarang =".$idKerupuk;
    $result = mysqli_query($link, $sql);
    if($result){
		$_SESSION['pesan']="Berhasil menghapus resep!";
		header("Location: bom.php");
		die();
	}
	else if(!$result){
       die("SQL error_log(message)r : ".$sql);
  	}
break;

//HAPUS NOTA BELI
case 'hapusNotaBeli':
	$id = $_POST['uID']; 
	$sql = "UPDATE nota_beli SET deleted = 1 where idBeli =".$id;
	$result = mysqli_query($link, $sql);
    if($result){
		$_SESSION['pesan']="Berhasil Menghapus Nota Beli!";
		header("Location: pembelian.php");
		die();
	}
	else if(!$result){
       die("SQL error_log(message)r : ".$sql);
  	}
break;

//// HAPUS BB PADA NOTA
case 'hapusBBNota':
	$idBeli = $_POST['uIDBeli'];
	$idBB = $_POST['uIDBB'];
	$jmlSekarang=0;
	$sql = "SELECT * from nota_beli_has_bahanbaku where nota_beli_idBeli =".$idBeli." AND bahanbaku_idBB =".$idBB;
	$result= mysqli_query($link,$sql);
	while($row = mysqli_fetch_array($result)){
		$jmlSekarang=$row['jumlah']; // stok di detail nota
	}

	$sql = "DELETE from nota_beli_has_bahanbaku
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
			if($row['total_harga'] > 0){
				$jmlTotalHarga=$row['total_harga']; // stok di gudang
			}
		}
    	$sql="UPDATE nota_beli set total_harga=". $jmlTotalHarga."
			where idBeli =".$idBeli;
	    $result= mysqli_query($link,$sql);
	    if($result){ 
	    	header("Location: detailPembelian.php?id=$idBeli");
	    	die();
	    } 
	}
	else if(!$result){
       die("SQL error_log(message)r : ".$sql);
  	}
break;

//HAPUS SPK
case 'hapusSPK':
	$idSPK = $_POST['uID'];
	$sql = "UPDATE spk set deleted= 1 where idSpk =" . $idSPK;
    $result = mysqli_query($link, $sql);
    if($result){
		$_SESSION['pesan']="Berhasil menghapus data SPK!";
		header("Location: spk.php");
		die();
	}
	else if(!$result){
       die("SQL error_log(message)r : ".$sql);
  	}
break;

//HAPUS PROSES PRODUKSI
case 'hapusProsesProduksi':
	$idProses = $_POST['uIDProses'];
	$sql = "delete from prosesproduksi where idProsesproduksi =" . $idProses;
    $result = mysqli_query($link, $sql);
    if($result){
		$_SESSION['pesan']="Berhasil menghapus data proses produksi!";
		header("Location: prosesproduksi.php");
		die();
	}
	else if(!$result){
       die("SQL error_log(message)r : ".$sql);
  	}
break;

////HAPUS DETAIL PEMASOK
case 'hapusDetailKaryawan':
	$idKaryawan = $_POST['uIDKaryawan'];
	$idJadwal = $_POST['uIDJadwal'];
	
	$sql = "delete from tenagakerja_has_jadwalproduksi where tenagakerja_idTenagakerja =" . $idKaryawan . " AND jadwalproduksi_idJadwalproduksi  =".$idJadwal;
    $result = mysqli_query($link, $sql);
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