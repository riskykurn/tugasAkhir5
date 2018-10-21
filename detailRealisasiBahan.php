<?php
session_start();
require 'db.php'; 

if($_SESSION['umkm_idumkm'] == '' || $_SESSION['umkm_idumkm'] == null || $_SESSION['login'] == '' || $_SESSION['login'] == null){
  $_SESSION['pesan'] = "Anda Belum Login";
  header("Location: login.php");
  exit();
}

$sqlData="SELECT spk.idSpk as spk, nj.idJual as nota_jual, nj.tanggal as tanggal_nota, spk.tgl_spk as tglSpk, spk.tgl_perencanaan as tglRencana, spk.rencana_produksi as rencana, spk.status as status, p.namaPelanggan as pelanggan, b.nama as nama_barang, b.idBarang as idBarang
  FROM barang b inner join spk
    on b.idBarang = spk.barang_idBarang
  inner join nota_jual nj
    on spk.nota_jual_idJual = nj.idJual
  inner join pelanggan p 
    on nj.pelanggan_idPelanggan = p.idPelanggan
  where spk.deleted=0 AND spk.idSpk=$_GET[id]";
$res= mysqli_query($link,$sqlData); 
$r_data=mysqli_fetch_array($res);
$idBarang = $r_data['idBarang'];
$idSpk = $r_data['spk'];
$statusSpk= $r_data['status'];

/* INI QUERY BOM 
$sql2 = "SELECT b.idBarang as idBarang, bb.idBB as idBB ,b.nama as nama_barang, bb.nama as nama_bb, s.nama as satuan, mn.jumlah as jumlah
        FROM bahanbaku bb inner join bahanbaku_has_barang mn
          on bb.idBB = mn.bahanbaku_idBB
        inner join barang b
          on mn.barang_idBarang = b.idBarang
        inner join satuan s
          on bb.idSatuan = s.idSatuan
        where b.idBarang=".$idBarang;
$res2= mysqli_query($link,$sql2); 
$r_data2=mysqli_fetch_array($res2);*/
?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  
        <!-- Hammer reload -->
          <script>
          /*
            setInterval(function(){
              try {
                if(typeof ws != 'undefined' && ws.readyState == 1){return true;}
                ws = new WebSocket('ws://'+(location.host || 'localhost').split(':')[0]+':35353')
                ws.onopen = function(){ws.onclose = function(){document.location.reload()}}
                ws.onmessage = function(){
                  var links = document.getElementsByTagName('link'); 
                    for (var i = 0; i < links.length;i++) { 
                    var link = links[i]; 
                    if (link.rel === 'stylesheet' && !link.href.match(/typekit/)) { 
                      href = link.href.replace(/((&|\?)hammer=)[^&]+/,''); 
                      link.href = href + (href.indexOf('?')>=0?'&':'?') + 'hammer='+(new Date().valueOf());
                    }
                  }
                }
              }catch(e){}
            }, 1000)
            */
          </script>
        <!-- /Hammer reload -->
      

  <link rel='stylesheet' href='assets/css/plugins/fullcalendar.css'>
<link rel='stylesheet' href='assets/css/plugins/datatables/datatables.css'>
<link rel='stylesheet' href='assets/css/plugins/datatables/bootstrap.datatables.css'>
<link rel='stylesheet' href='assets/css/plugins/chosen.css'>
<link rel='stylesheet' href='assets/css/plugins/jquery.timepicker.css'>
<link rel='stylesheet' href='assets/css/plugins/daterangepicker-bs3.css'>
<link rel='stylesheet' href='assets/css/plugins/colpick.css'>
<link rel='stylesheet' href='assets/css/plugins/dropzone.css'>
<link rel='stylesheet' href='assets/css/plugins/jquery.handsontable.full.css'>
<link rel='stylesheet' href='assets/css/plugins/jscrollpane.css'>
<link rel='stylesheet' href='assets/css/plugins/jquery.pnotify.default.css'>
<link rel='stylesheet' href='assets/css/plugins/jquery.pnotify.default.icons.css'>
<link rel='stylesheet' href='assets/css/app.css'>
<link rel='stylesheet' href="assets/fonts/font-google.css">

  <link href="assets/favicon.ico" rel="shortcut icon">
  <link href="assets/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    @javascript html5shiv respond.min
  <![endif]-->

  <title>SI Produksi: UMKM Kerupuk Krembung</title>

</head>

<body class="glossed">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42863888-4', 'pinsupreme.com');
  ga('send', 'pageview');

</script>
<div class="all-wrapper fixed-header left-menu">
  <div class="page-header">
  <div class="header-links hidden-xs">
    <div class="top-search-w pull-right">
    </div>
    <div class="dropdown">
      <a href="#" class="header-link clearfix" data-toggle="dropdown">
        <div class="avatar">
          <img src="assets/images/avatar-small.jpg" alt="">
        </div>
        <div class="user-name-w">
          
        <?php echo $_SESSION['namaUmkm']; ?> : (<?php echo $_SESSION['log_nama']; ?>) 
        <i class="fa fa-caret-down"></i>
        </div>
      </a>
      <ul class="dropdown-menu dropdown-inbar">
        <li><a href="gantipassword.php"><i class="fa fa-unlock-alt"></i> Ganti Password </a></li>
        <li><a href="login.php?logout=1"><i class="fa fa-power-off"></i> Keluar Dari Sistem </a></li>
      </ul>
    </div>
  </div>
  <a class="current logo hidden-xs" href="index.php" data-toggle="tooltip" data-placement="right" title="" data-original-title="Halaman Depan"><i class="fa fa-home"></i></a>
  <a class="menu-toggler" href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tampilkan / Hilangkan"><i class="fa fa-bars"></i></a>
  <h1> MENU PRODUKSI : Detail Penggunaan Bahan Baku</h1>
</div>
  <div class="side">
  <div class="sidebar-wrapper">
  <ul>
    <li>
      <a href="index.php" data-toggle="tooltip" data-placement="right" title="" data-original-title="Halaman Depan">
        <i class="fa fa-home"></i>
      </a>
    </li>
    <li >
      <a class='current' href="pemasok.php" data-toggle="tooltip" data-placement="right" title="" data-original-title="Menu Utama">
        <i class="fa fa-th-large"></i>
      </a>
    </li>
    <li class='current'>
      <a href="bom.php" data-toggle="tooltip" data-placement="right" title="" data-original-title="Menu Produksi">
        <i class="fa fa-book"></i>
      </a>
    </li>
  </ul>
</div>
  <div class="sub-sidebar-wrapper">
  <ul>
    <li><a href="bom.php">Resep</a></li>
    <li><a href="prosesproduksi.php">Proses Produksi</a></li>
    <li><a href="pembelian.php" style="font-size: 0.94em">Pembelian Bahan Baku</a></li>
    <li><a href="spk.php" style="font-size: 0.985em">Surat Perintah Kerja</a></li>
    <ul><li class='current'><a href="#">Detail Penggunaan Bahan Baku</a></li></ul>
  </ul>
</div>
  </div>
  <div class="main-content">
  <ol class="breadcrumb">
  <li><a href="#">Menu Produksi</a></li>
  <li><a href="spk.php">SPK</a></li>
  <li class="active">Detail Penggunaan Bahan Baku</li>
  </ol>
  <!-- not necessary
    <div class="alert alert-warning alert-dismissable bottom-margin">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <i class="fa fa-exclamation-circle"></i> <strong>Welcome!</strong> This is a dashboard of the powerful admin template.
    </div>
  -->
    <div class="row">
      <div class="col-md-12">
        <div class="widget widget-blue">
          <div class="widget-title">
              <div class="widget-controls">
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Perbesar Tampilan"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Kecilkan Tampilan"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Perkecil / Perbesar"><i class="fa fa-chevron-down"></i></a>
</div>
        <h3><i class="fa fa-bitbucket"></i><strong> PENGGUNAAN BAHAN BAKU UNTUK: </strong><?php echo $r_data['nama_barang']; ?> / <?php echo date('d-M-Y', strtotime($r_data['tglSpk'])); ?></h3>
      </div>
      <div class="widget-content">
      <div>
      <a href="spk.php" class="btn btn-iconed btn-default"  ><i class="fa fa-arrow-circle-o-left"></i> Kembali </a>
      <a href="#modalBB" class="btn btn-iconed btn-primary" data-toggle="modal"><i class="fa fa-plus-circle"></i> Penggunaan Bahan Baku </a>
      <a href="#modalResep" data-toggle="modal">(<i class="fa fa-eye"></i> Lihat Resep kerupuk ini )</a>
      </div><br>
        <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Bahan Baku</th>
              <th>Dipakai</th>
              <th>Sisa</th>
              <th class="text-right">Tindakan</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $sql = "SELECT s.idSpk as idSpk, bb.idBB as idBB, bb.nama as namaBB, mn.jumlah_digunakan as jumlah, mn.sisa as sisa, st.nama as satuan
                  FROM spk s inner join bahanbaku_has_spk mn
                    on s.idSpk = mn.spk_idSpk
                  inner join bahanbaku bb
                    on mn.bahanbaku_idBB = bb.idBB
                  inner join satuan st
                    on st.idSatuan = bb.idSatuan
                  where s.idSpk=$r_data[spk];";

              $result = mysqli_query($link, $sql);
          if(!$result){
              die("<br/>SQL error_log(message)r : " . $sql);
          }
          $no=0;
          while ($row = mysqli_fetch_array($result)) {
            $no++;
          ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $row['namaBB']; ?></td>
              <td><?php echo $row['jumlah']; ?> <?php echo $row['satuan']; ?></td>
              <td><?php echo $row['sisa']; ?> <?php echo $row['satuan']; ?></td>
              <td class="text-right">
              <?php 
                if($statusSpk == 0){
                  ?>
                  <a href="#modalUbah_<?php echo $no; ?>" class="btn btn-round btn-default btn-xs" data-toggle="modal">Ubah</a><?php
                }
                else{?>
                  <span class="help-block" style="font-weight: bold"> *SPK ini sudah selesai* </span><?php
                }
              ?>
              </td> 
            </tr>
          <?php } ?>
          </tbody>
        </table>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
  </div>

<div class="modal fade" id="modalBB" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-blue">
        <div class="widget-title">
          <div class="widget-controls">
            <a href="#" class="widget-control " data-dismiss="modal"><i class="fa fa-times-circle"></i></a>
          </div>
          <h3><i class="fa fa-ok-circle"></i> <strong> PENGGUNAAN BAHAN BAKU: <?php echo $r_data['nama_barang']; ?></strong></h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">
            <form action="action_tambah.php?cmd=realisasiBB" method="POST" role="form"> 
                  <div class="form-group">
                    <label> Rencana Produksi </label>
                    <input type="text"  value= "<?php echo $r_data['rencana']; ?> Bal" name="uRencanaProduksi" class="form-control" disabled="disabled">
                  </div> 
                <?php
                $sqlTest = "SELECT b.idBarang as idBarang, bb.idBB as idBB, bb.stok as stok, b.nama as nama_barang, bb.idBB as idBB, bb.nama as nama_bb, s.nama as satuan, mn.jumlah as jumlah
                  FROM bahanbaku bb 
                  inner join bahanbaku_has_barang mn
                    on bb.idBB = mn.bahanbaku_idBB
                  inner join barang b
                    on mn.barang_idBarang = b.idBarang
                  inner join satuan s
                    on bb.idSatuan = s.idSatuan
                  where b.idBarang=".$idBarang;
                $resultTest = mysqli_query($link, $sqlTest);
                if(!$resultTest){
                    die("<br/>SQL error_log(message)r : " . $sqlTest);
                }
                while ($rowTest = mysqli_fetch_array($resultTest)) {
                $idBB= $rowTest['idBB'];
                $rencanaProduksi= $r_data['rencana']; ?>
                <div class="row">
                <div class="col-md-8">
                <?php
                if(($rowTest['jumlah'] * $rencanaProduksi) <= $rowTest['stok']){?>
                  <div class="form-group">
                    <label>Nama Bahan Baku </label>
                    <input type="text" value="<?php echo $rowTest['nama_bb']; ?>" class="form-control" disabled="disabled"> 
                  </div><?php
                } 
                else{?>
                <div class="form-group" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Stok kurang! Hanya ada: <?php echo $rowTest['stok']; ?> <?php echo $rowTest['satuan']; ?>">
                    <p style="font-weight: bold;" > Nama Bahan Baku (<a href="detailRekomendasiSpk.php?id=<?php echo $idSpk; ?>&BB=<?php echo $idBB; ?>" data-toggle="modal"><i class="fa fa-shopping-cart"></i> Beli BB yang kurang </a>)</p>
                    <input type="text" style="color:red" value="<?php echo $rowTest['nama_bb']; ?> (kurang <?php echo ($rowTest['jumlah'] * $rencanaProduksi) - $rowTest['stok']; ?>)" class="form-control" disabled="disabled"> 
                  </div><?php
                }
                ?>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Jumlah (<?php echo $rowTest['satuan']; ?>)</label>
                    <input type="number" min="<?php echo $rowTest['jumlah'] * $rencanaProduksi; ?>" placeholder="<?php echo $rowTest['jumlah'] * $rencanaProduksi; ?>" name="uJumlah<?php echo $rowTest['idBB']; ?>" class="form-control"> 
                    <input type="hidden" value="<?php echo $rowTest['jumlah'] * $rencanaProduksi; ?>" name="uJumlahAsli<?php echo $rowTest['idBB']; ?>" >
                  </div>
                </div>
                </div> 
                <input type="hidden" name="uIDBB<?php echo $rowTest['idBB']; ?>" value= "<?php echo $rowTest['idBB']; ?>">
                <?php } ?>
                <div class="col-md-12 text-right">
                  <input type="hidden" name="uIDSPK" value= "<?php echo $r_data['spk'];?>"> 
                  <input type="hidden" name="uIDBarang" value= "<?php echo $idBarang;?>"> 
                  <button class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button class="btn btn-primary"> Tambahkan </button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalResep" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-blue">
        <div class="widget-title">
          <div class="widget-controls">
            <a href="#" class="widget-control " data-dismiss="modal"><i class="fa fa-times-circle"></i></a>
          </div>
          <h3><strong> Resep : <?php echo $r_data['nama_barang']; ?> (/Bal)</strong></h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">
            <div class="row">
              <div class="table-responsive">
                <div class="col-md-12">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th> No </th>
                        <th> Nama Bahan Baku </th>
                        <th> Jumlah </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT b.idBarang as idBarang, bb.idBB as idBB ,b.nama as nama_barang, bb.nama as nama_bb, s.nama as satuan, mn.jumlah as jumlah
                        FROM bahanbaku bb inner join bahanbaku_has_barang mn
                          on bb.idBB = mn.bahanbaku_idBB
                        inner join barang b
                          on mn.barang_idBarang = b.idBarang
                        inner join satuan s
                          on bb.idSatuan = s.idSatuan
                        where b.idBarang=".$idBarang;
                      $result = mysqli_query($link, $sql);
                      if(!$result){
                          die("<br/>SQL error_log(message)r : " . $sql);
                      }
                      $no=0;
                      while ($row = mysqli_fetch_array($result)) {
                          $no++;
                      ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $row['nama_bb']; ?></td>
                          <td><?php echo $row['jumlah']; echo ' '.$row['satuan'];?></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  </div>
                </div>
                <div class="col-md-12 text-right">
                <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  $sql = "SELECT s.idSpk as idSpk, bb.idBB as idBB, bb.nama as namaBB, mn.jumlah_digunakan as jumlah, mn.sisa as sisa, st.nama as satuan
    FROM spk s inner join bahanbaku_has_spk mn
      on s.idSpk = mn.spk_idSpk
    inner join bahanbaku bb
      on mn.bahanbaku_idBB = bb.idBB
    inner join satuan st
      on st.idSatuan = bb.idSatuan
    where s.idSpk=$r_data[spk];";
  $result = mysqli_query($link, $sql);
  if(!$result){
      die("<br/>SQL error_log(message)r : " . $sql);
  }
  $no=0;
  while ($row = mysqli_fetch_array($result)) {
      $sqlTest = "SELECT *
        FROM bahanbaku_has_barang 
        where barang_idBarang=$idBarang 
          AND bahanbaku_idBB=$row[idBB] ";
      $resultTest = mysqli_query($link, $sqlTest);
      $r = mysqli_fetch_array($resultTest);

      $no++;
      $jumlahasli = 0;
 
      $sqlTest = "SELECT b.idBarang as idBarang, bb.idBB as idBB, bb.stok as stok, b.nama as nama_barang, bb.idBB as idBB, bb.nama as nama_bb, s.nama as satuan, mn.jumlah as jumlah
        FROM bahanbaku bb 
        inner join bahanbaku_has_barang mn
          on bb.idBB = mn.bahanbaku_idBB
        inner join barang b
          on mn.barang_idBarang = b.idBarang
        inner join satuan s
          on bb.idSatuan = s.idSatuan
        where b.idBarang=".$idBarang." 
          AND mn.bahanbaku_idBB=".$row['idBB']."
            "; 
      $resultTest = mysqli_query($link, $sqlTest); 
      while ($rowTest = mysqli_fetch_array($resultTest)) {
        $idBB= $rowTest['idBB'];
        $rencanaProduksi= $r_data['rencana']; 
        $jumlahasli = $rowTest['jumlah'] * $rencanaProduksi;
      } 
  ?>
  <div class="modal fade" id="modalUbah_<?php echo $no; ?>" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-blue">
        <div class="widget-title">
          <div class="widget-controls">
            <a href="#" class="widget-control " data-dismiss="modal"><i class="fa fa-times-circle"></i></a>
          </div>
          <h3><i class="fa fa-ok-circle"></i> UBAH JUMLAH PENGGUNAAN = <strong><?php echo $row['namaBB']; ?></strong> </h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">
            <form action="action_ubah.php?cmd=ubahRealisasiBB" method="POST" role="form">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Nama Bahan Baku</label>
                    <input type="text" name="uNama" disabled="disabled" value= "<?php echo $row['namaBB']; ?>" class="form-control">
                    <input type="hidden" name="uIDBB" value= "<?php echo $row['idBB']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" min="<?php echo $r['jumlah']*$r_data['rencana']; ?>" name="uJumlah" value= "<?php echo $row['jumlah']+$row['sisa']; ?>" class="form-control" placeholder="<?php echo $r['jumlah']*$r_data['rencana']; ?>"> 
                    <!-- JUMLAH ASLI = SISANYA -->
                    <input type="hidden" value="<?php echo $jumlahasli; ?>" name="uJumlahAsli" >

                    <!-- JUMLAH LAMA = JUMLAH SEBELUM DIUBAH -->
                    <input type="hidden" value="<?php echo $row['jumlah']; ?>" name="uJumlahLama" >
                  </div>
                </div>
              </div>
              <div class="text-right">
                <input type="hidden" name="uIDSPK" value= "<?php echo $row['idSpk']; ?>">
                <input type="hidden" name="uIDBarang" value= "<?php echo $idBarang;?>"> 
                <input type="hidden" name="uSisaLama" value= "<?php echo $row['sisa'];?>"> 
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button class="btn btn-primary">Ubah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

<!-- NOT USED, KARENA GA PERLU HAPUS
  <div class="modal fade" id="modalHapus_<?php echo $no; ?>" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-blue">
        <div class="widget-title">
          <div class="widget-controls">
            <a href="#" class="widget-control " data-dismiss="modal"><i class="fa fa-times-circle"></i></a>
          </div>
          <h3><i class="fa fa-ok-circle"></i> HAPUS = <strong><?php echo $row['nama']; ?></strong> DARI DETAIL NOTA BELI </h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">
            <form action="action_hapus.php?cmd=hapusBBNota" method="POST" role="form">
              <div class="row">
                <div class="col-md-12">
                  <div class="alert alert-warning alert-dismissable bottom-margin">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                  <i class="fa fa-exclamation-circle"></i> <strong>Peringatan!</strong> Anda akan menghapus : <u><?php echo $row['nama'];?></u> dari detail nota beli. Apakah anda yakin?
                  </div>
                </div>
                <div class="col-md-12 text-right">
                  <input type="hidden" name="uIDBB" value= "<?php echo $row['idBB']; ?>">
                  <input type="hidden" name="uIDBeli" value= "<?php echo $row['idBeli']; ?>">
                  <button class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button class="btn btn-danger">Hapus Data</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>-->

<?php } ?>

  <div class="modal fade" id="modalValidasi" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-blue">
        <div class="widget-title">
          <div class="widget-controls">
            <a href="#" class="widget-control " data-dismiss="modal"><i class="fa fa-times-circle"></i></a>
          </div>
          <h3><i class="fa fa-ok-circle"></i><strong> VALIDASI DETAIL NOTA BELI </strong></h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">
            <form action="action_ubah.php?cmd=ubahValidasiNota" method="POST" role="form">
              <div class="row">
                <div class="col-md-12">
                  <div class="alert alert-warning alert-dismissable bottom-margin">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                  <i class="fa fa-exclamation-circle"></i> <strong>Peringatan!</strong> Detail Nota yang sudah divalidasi tidak dapat diubah lagi. Apakah anda yakin?
                  </div>
                </div>
                <div class="col-md-12 text-right">
                <?php $sqlAmbil = "SELECT nb.idBeli as idBeli, bb.idBB as idBB, bb.nama as nama, bb.harga_beli as harga, mn.jumlah as jumlah, nb.total_harga as total, mn.validasi as validasi
            from nota_beli nb inner join nota_beli_has_bahanbaku mn
            on nb.idBeli = mn.nota_beli_idBeli
            inner join bahanbaku bb
            on mn.bahanbaku_idBB = bb.idBB
            where nb.idBeli=$_GET[id]";

              $resultAmbil = mysqli_query($link, $sqlAmbil);

              while ($rowAmbil = mysqli_fetch_array($resultAmbil)) {
          ?>
                  <input type="hidden" name="uIDBB<?php echo $rowAmbil['idBB']; ?>" value= "<?php echo $rowAmbil['idBB']; ?>">
                  <input type="hidden" name="uIDBeli<?php echo $rowAmbil['idBB']; ?>" value= "<?php echo $rowAmbil['idBeli']; ?>">
                  <input type="hidden" name="uJumlah<?php echo $rowAmbil['idBB']; ?>" value= "<?php echo $rowAmbil['jumlah']; ?>">

                  <?php } ?>
                  <input type="hidden" name="uIDNotaBeli" value="<?php echo $_GET['id']; ?>">
                  <button class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button class="btn btn-success">Validasi</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
  if(isset($_SESSION['pesan'])){
      echo "<script type='text/javascript'>alert('" . $_SESSION['pesan'] ."')</script>";
  unset($_SESSION['pesan']);
}
?>
<script src="assets/ajax/jquery.min.js"></script>
<script src="assets/ajax/jquery-ui.min.js"></script>
<script src='assets/js/plugins/jquery.pnotify.js'></script>
<script src='assets/js/plugins/jquery.sparkline.min.js'></script>
<script src='assets/js/plugins/mwheelIntent.js'></script>
<script src='assets/js/plugins/mousewheel.js'></script>
<script src='assets/js/bootstrap/tab.js'></script>
<script src='assets/js/bootstrap/dropdown.js'></script>
<script src='assets/js/bootstrap/tooltip.js'></script>
<script src='assets/js/bootstrap/collapse.js'></script>
<script src='assets/js/bootstrap/scrollspy.js'></script>
<script src='assets/js/plugins/bootstrap-datepicker.js'></script>
<script src='assets/js/bootstrap/transition.js'></script>
<script src='assets/js/plugins/jquery.knob.js'></script>
<script src='assets/js/plugins/jquery.flot.min.js'></script>
<script src='assets/js/plugins/fullcalendar.js'></script>
<script src='assets/js/plugins/datatables/datatables.min.js'></script>
<script src='assets/js/plugins/chosen.jquery.min.js'></script>
<script src='assets/js/plugins/jquery.timepicker.min.js'></script>
<script src='assets/js/plugins/daterangepicker.js'></script>
<script src='assets/js/plugins/colpick.js'></script>
<script src='assets/js/plugins/moment.min.js'></script>
<script src='assets/js/plugins/datatables/bootstrap.datatables.js'></script>
<script src='assets/js/bootstrap/modal.js'></script>
<script src='assets/js/plugins/raphael-min.js'></script>
<script src='assets/js/plugins/morris-0.4.3.min.js'></script>
<script src='assets/js/plugins/justgage.1.0.1.min.js'></script>
<script src='assets/js/plugins/jquery.maskedinput.min.js'></script>
<script src='assets/js/plugins/jquery.maskmoney.js'></script>
<script src='assets/js/plugins/summernote.js'></script>
<script src='assets/js/plugins/dropzone-amd-module.js'></script>
<script src='assets/js/plugins/jquery.validate.min.js'></script>
<script src='assets/js/plugins/jquery.bootstrap.wizard.min.js'></script>
<script src='assets/js/plugins/jscrollpane.min.js'></script>
<script src='assets/js/application.js'></script>

<script src='assets/js/template_js/forms.js'></script>
</body>
</html>