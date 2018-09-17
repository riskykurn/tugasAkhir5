<?php 
	session_start();
	require 'db.php';

	$uname=$_POST['uID'];
	$upass=$_POST['uPass'];
	$nama;

	if(empty($upass)||empty($uname)){
			$_SESSION['pesanLogin']="Isi password terlebih dahulu";
			exit();
	}
	$sql='SELECT * from user';
	$result=mysqli_query($link, $sql);
	if(!$result){
		die("SQL ERROR :".mysqli_error($link));
	}
	else{
		while($row=mysqli_fetch_array($result)){
			if($uname==$row['id']){
				if($upass!=$row['password']){
					$_SESSION['pesanLogin']="Password Salah";
					header("Location: login.php");
				}
				else if($upass==$row['password']){
					$nama=$row['nama'];
					$_SESSION['logAdmin']=$nama;
					setcookie("logAdmin", $nama, time() + 400);
					$_SESSION['jabatanAdmin']=$row['jabatan'];
					setcookie("jabatanAdmin", $row['jabatan'], time() + 400);
					echo "<script type='text/javascript'>alert('" . $_SESSION['pesanLogin'] ."')</script>";
					header('Location: index.php');
				}
			}
			else if(($uname)!=$row['id_karyawan']){
				$_SESSION['pesanLogin']="ID karyawan tidak terdaftar";
				header("Location: adminHome.php");
			}
		}
	}
	
	if(isset ($_GET['kodeLog'])){
		if($_GET['kodeLog'] == 404){
			unset($_SESSION["logAdmin"]);
			setcookie("logAdmin", "in", time() - 1);
			unset($_SESSION["jabatanAdmin"]);
			setcookie("jabatanAdmin", "in", time() - 1);
			$_SESSION['pesanLogin']="Logouted";
			header("Location: adminHome.php");
		}
	}
	
?>