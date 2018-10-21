<?php

//jadi yang baru itu MYSQLI
        //mysqli itu biasanya harus ditampung
                     //$host, $user, $password, $database
$link = @mysqli_connect("localhost", "root", "mysql", "tugasakhir");
//@ untuk menghilangkan warning bila gagal connect

//UNTUK MENGECEK SUDAH CONNECT APA BELUM
//echo mysqli_connect_errno() . " " . mysqli_connect_error();
if(mysqli_connect_errno()){
    //echo mysqli_connect_error();
    //exit();//jadi bila sudah error, codingan dibawahnya gak dibaca lagi
    die(mysqli_connect_error());//selain exit bisa pake die
}
    
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
?>