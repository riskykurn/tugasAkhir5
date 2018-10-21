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
	case "updatestok" : 
        $sql = "SELECT nb.idBeli as idBeli, bb.idBB as idBB, mn2.jumlah as jumlahtambah , DATE_SUB(nb.tgl_beli, INTERVAL - mn.leadtime DAY) as tglSampai, CURDATE() as tglSekarang
			FROM pemasok_has_bahanbaku mn inner join bahanbaku bb
				on mn.bahanbaku_idBB = bb.idBB
			inner join nota_beli_has_bahanbaku mn2
				on bb.idBB = mn2.bahanbaku_idBB
			inner join nota_beli nb
				on mn2.nota_beli_idBeli = nb.idBeli
			inner join pemasok p
				on p.idSupplier = nb.supplier_idSupplier
			where nb.deleted = 0
				AND DATE_SUB(nb.tgl_beli, INTERVAL - mn.leadtime DAY)=CURDATE()
			    AND mn2.validasi=1
			    AND mn2.sudah_tertambah=0 
			    " ;
        $result = mysqli_query($link, $sql);

        while($row = mysqli_fetch_array($result)){
        	$idBeli = $row['idBeli'];
        	$idBB = $row['idBB'];
        	$jmlTambah = $row['jumlahtambah'];
			$sql = "
				UPDATE bahanbaku bb 
				SET stok=(stok+$jmlTambah) 
				WHERE idBB=$idBB   
			"; 
			$res = mysqli_query($link, $sql);
			if($res){ 
				$sql = "
					UPDATE nota_beli_has_bahanbaku 
					SET sudah_tertambah=1
					WHERE bahanbaku_idBB=$idBB 
						AND nota_beli_idBeli=$idBeli 
				"; 
				$res = mysqli_query($link, $sql);	
			}
        } 
	break;
	case "cekPassLama" :
		$passLama = $_POST["passLama"];
		$passBaru = $_POST["passBaru"];

		$sql = "SELECT * FROM master_user WHERE username = '" . $_SESSION['id'] . "'";
		$res = mysqli_query($link, $sql);
		$row = $res->fetch_assoc();

		if(md5($passLama.$row["salt"]) == $row["password"]){
			$sql = "UPDATE master_user SET password = '".md5($passBaru.$row["salt"])."' WHERE username = '" . $_SESSION['id'] . "'";
			$res = mysqli_query($link, $sql);
			echo 'success';
		} else {
			echo 'no';
		}

	break;
	case "lock" :
		$id = $_POST["id"];
	    $sql = "UPDATE master_user SET isLock = 't' WHERE username = '" . $id . "'";
              //koneksi yang mana, querynya apaa
        $result = mysqli_query($link, $sql);
        if($result){
			//$_SESSION["goingTo"] = 'pageSettingAdmin';
        	$_SESSION["settingAdminGoesTo"] = 'listUser';
	        echo "success";
        } else {
        	echo "gagal mengubah";
        }
	break;
	case "unlock" :
		$id = $_POST["id"];
	    $sql = "UPDATE master_user SET isLock = 'f' WHERE username = '" . $id . "'";
              //koneksi yang mana, querynya apaa
        $result = mysqli_query($link, $sql);
        if($result){
			//$_SESSION["goingTo"] = 'pageSettingAdmin';
        	$_SESSION["settingAdminGoesTo"] = 'listUser';
	        echo "success";
        } else {
        	echo "gagal mengubah";
        }
	break;


	case "login" :
		$username = $_POST["uName"];
		$password = $_POST["uPass"];

		$sql = "SELECT u.*, um.namaUmkm FROM user u inner join umkm um on u.umkm_idumkm=um.idUmkm WHERE username = '" . $username . "'";
		$res = mysqli_query($link, $sql);
		$row = mysqli_fetch_array($res);

		if($row["username"] == $username){
			$resSalt = mysqli_query($link, $sql);
			$rowSalt = mysqli_fetch_array($resSalt);

			if($row["username"] == $username && 
			md5($password.$rowSalt["salt"]) == $rowSalt["password"]){
				$_SESSION["username"] = $rowSalt["username"];
				$_SESSION["namaUmkm"] = $rowSalt["namaUmkm"];
				$_SESSION["log_nama"] = $rowSalt["nama"];
				$_SESSION["umkm_idumkm"] = $rowSalt["umkm_idumkm"];
				$_SESSION["login"] = true;
				$_SESSION["hak_akses"] = $rowSalt["hak_akses"];
					setcookie("login", true, time()+36000);  
					setcookie("hak_akses", $_SESSION["hak_akses"], time()+36000);
				switch ($rowSalt["hak_akses"]) {
					case 99:
						$_SESSION["hak_akses"] = 'superadmin'; 
						header("Location: index.php");
						break; 
					}  
			} 
			else{
				$_SESSION['pesan']="Password salah, silahkan periksa ulang!";
				header("Location: login.php");
				die();
			}
		}
		else if($row["username"] != $username){
			$_SESSION['pesan']="Username tidak terdaftar!";
			header("Location: login.php");
			die();
		}
	break;
    case "logout" :
	    unset($_SESSION["id"]);
	    unset($_SESSION["username"]);
	    unset($_SESSION["login"]);
	    unset($_SESSION["hak_akses"]);  
		setcookie("login", true, time()-1);
		setcookie("hak_akses", true, time()-1);
		session_unset(); 
		session_destroy();
		echo "logouted";
	break;
    case "submitTambahUser" :
    // 99 super admin
    // 1 skpd
    // 2 penyusun

	$username = $_POST["username"];
	$password = $_POST["pass"];
	$nama = $_POST["nama"];
	$email = $_POST["email"];
	$noTelp = $_POST["telp"];
	$tipe = $_POST["tipe"];
	$idPemda = $_SESSION["idPemda"];

	$sql = "SELECT * FROM master_user WHERE username = '" . $username . "'";
	$res = mysqli_query($link, $sql);
	$row = $res->fetch_assoc();
	if($row["username"] == $username){
		echo "Username sudah ada ";
	} else {
		$salt = rand(1, 99);
		$pass = md5($password.$salt);
		$insertInto = '';
		$hakAkses = 1;
		if($tipe == 'SKPD'){
			$hakAkses = 1;
			$insertInto = 'master_skpd';
		} else if ($tipe == 'penyusun'){
			$hakAkses = 2;
			$insertInto = 'master_penyusun';
		}

		$sql = "INSERT INTO master_user (username, password, salt, hak_akses, isLock) 
		VALUES('$username', '$pass', '$salt', $hakAkses, 'f')";
              //koneksi yang mana, querynya apaa
		// echo $sql;exit;
        $result = mysqli_query($link, $sql);
        if($result){

			if($tipe == 'SKPD'){
				$sql = "INSERT INTO $insertInto (nama, email, noTelp, extFoto, idUser, idPemda) 
				VALUES('$nama', '$email', '$noTelp', '-', '$username', $idPemda)";
			} else if ($tipe == 'penyusun'){
					$sql = "INSERT INTO $insertInto (nama, email, noTelp, extFoto, idUser) 
					VALUES('$nama', '$email', '$noTelp', '-', '$username')";
			}

			// echo $sql;exit;
	        $result = mysqli_query($link, $sql);
	        if($result){
	        	if($tipe == 'SKPD'){
	        		echo 'success';
	        	} else if ($tipe == 'penyusun'){
					$sql = "SELECT * FROM master_penyusun WHERE idUser='$username'";
					//echo $sql;// exit;
					$res = mysqli_query($link, $sql);
					$r = $res->fetch_assoc();

		        	$sql = "INSERT INTO hub_penyusun_pemda(idPenyusun, idPemda) 
		        				VALUES (".$r['id'].", ".$idPemda.")";
					// echo $sql;exit;
			        $result = mysqli_query($link, $sql);
		        	if($result){
		        		echo 'success';
		        	} 
			        else {
			        	echo $sql;
			        }
			    } else {
			    	echo "error";
			    }
	        }
	        else {
	        	echo $sql;
	        }
        }
        else {
        	echo $sql;
        }
	}



    break;
    case "submitEditUser" :
	$wherePemda = 'AND idPemda = ' . $_SESSION["idPemda"] .' ';
    // 99 super admin
    // 1 skpd
    // 2 penyusun

	$username = $_POST["username"];
	$nama = $_POST["nama"];
	$email = $_POST["email"];
	$noTelp = $_POST["telp"];
	$tipe = $_POST["tipe"];
	$idPemda = $_SESSION["idPemda"];
	$into = '';
	if($tipe == 'SKPD'){
		$into = 'master_skpd';
	} else if ($tipe == 'penyusun'){
		$into = 'master_penyusun';
	}

	$sql = "UPDATE $into SET nama='$nama', email='$email', noTelp='$noTelp' WHERE idUser='$username' ";
          //koneksi yang mana, querynya apaa
	// echo $sql;exit;
    $result = mysqli_query($link, $sql);
    if($result){
    	echo 'success';
    }
    else {
    	echo $sql;
    }

	break;
}


?>