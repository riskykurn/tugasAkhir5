<?php
session_start(); 
require 'db.php'; 
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
          Lionel Messi <i class="fa fa-caret-down"></i>
        </div>
      </a>
      <ul class="dropdown-menu dropdown-inbar">
        <li><a href="gantipassword.php"><i class="fa fa-unlock-alt"></i> Ganti Password </a></li>
        <li><a href="#"><i class="fa fa-power-off"></i> Keluar Dari Sistem </a></li>
      </ul>
    </div>
  </div>
  <a class="current logo hidden-xs" href="index.php" data-toggle="tooltip" data-placement="right" title="" data-original-title="Halaman Depan"><i class="fa fa-home"></i></a>
  <a class="menu-toggler" href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tampilkan / Hilangkan"><i class="fa fa-bars"></i></a>
  <h1> MENU PRODUKSI : Pembelian Bahan Baku</h1>
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
    <li class="current"><a href="spk.php" style="font-size: 0.985em">Surat Perintah Kerja</a></li>
  </ul>
</div>
  </div>
  <div class="main-content">
  <ol class="breadcrumb">
  <li><a href="#">Menu Produksi</a></li>
  <li class="active">Surat Perintah Kerja</li>
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
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tampilkan Ulang"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Perkecil / Perbesar"><i class="fa fa-chevron-down"></i></a>
</div>
      <h3><i class="fa fa-pencil"></i></i><strong> SURAT PERINTAH KERJA </strong></h3>
      </div>
      <div class="widget-content">
        <div class="table-responsive">
        <div>
          <a href="#modalTambah" class="btn btn-iconed btn-primary" data-toggle="modal"><i class="fa fa-plus-circle"></i> Buat SPK Baru </a>
        </div>
        <br> 
        <table class="table table-bordered table-hover datatable">
          <thead>
            <tr style="text-align: center;font-weight: bold;">
              <td>No</td>
              <td>(Pemesan) & <br>Tgl Nota Jual</td>
              <td>Tgl Buat SPK</td>
              <td>Tgl Rencana Usai</td>
              <td>Rencana Produksi <br>(per Bal)</td>
              <td>Produksi Kerupuk & <br>
              Status</td>
              <td>Penggunaan <br>Bahan Baku</td>
              <td>Jadwal Produksi</td>
              <td>Ubah/Hapus</td>
            </tr>
          </thead>
          <tbody>
          <?php
          $sql = "SELECT spk.idSpk as id, nj.idJual as nota_jual, nj.tanggal as tanggal_nota, spk.tgl_spk as tglSpk, spk.tgl_perencanaan as tglRencana, spk.rencana_produksi as rencana, spk.status as status, p.namaPelanggan as pelanggan, b.nama as nama_barang, b.idBarang as idBarang
            FROM barang b inner join spk
              on b.idBarang = spk.barang_idBarang
            inner join nota_jual nj
              on spk.nota_jual_idJual = nj.idJual
            inner join pelanggan p 
              on nj.pelanggan_idPelanggan = p.idPelanggan
            where spk.deleted=0
            order by spk.idSpk desc";

              $result = mysqli_query($link, $sql);
          if(!$result){
              die("<br/>SQL error_log(message)r : " . $sql);
          }
          $no=0;
          $status ='';
          $idSpk = 0;
          while ($row = mysqli_fetch_array($result)) {
            $no++;
            $idSpk = $row['id'];
          ?>
            <tr style="text-align: center;">
              <td><strong><?php echo $no; ?></strong></td>
              <td><strong>( <?php echo $row['pelanggan']; ?> )</strong> & <?php echo $row['tanggal_nota']; ?> <br>
              <a href="#modalDetailNota<?php echo $row['nota_jual']; ?>" data-toggle="modal" class="btn btn-iconed btn-round btn-info btn-xs" ><i class="fa fa-eye"></i><strong> Lihat Detail Nota </strong></a>
              </td>
              <td><?php echo $row['tglSpk']; ?></td>
              <td><?php echo $row['tglRencana']; ?></td>
              <td><?php echo $row['rencana']; ?></td>
              <td><?php echo $row['nama_barang']; echo "<br>";
              if($row['status']==0){
                echo $status = '<span class="label label-warning">Belum Selesai</span>';
              }
              else{
                echo $status = '<span class="label label-success">Sudah Selesai</span>';
              } 
              ?></td>
              <td><a href="detailRealisasiBahan.php?id=<?php echo $row['id']; ?>" class="btn btn-iconed btn-round btn-info btn-xs"><i class="fa fa-eye"></i> Lihat </a></td>
              <?php
              $sqlBaru = "SELECT sum(jumlah_digunakan) as jumlah_digunakan
                      FROM bahanbaku_has_spk mn inner join spk s
                      on mn.spk_idSpk = s.idSpk
                      where mn.spk_idSpk= $idSpk";

              $resultBaru = mysqli_query($link, $sqlBaru);
              if(!$resultBaru){
                  die("<br/>SQL error_log(message)r : " . $sqlBaru);
              }
              while ($rowBaru = mysqli_fetch_array($resultBaru)) {
                if($rowBaru['jumlah_digunakan']>0){?>
                <td><a href="detailPenjadwalan.php?id=<?php echo $row['id']; ?>" class="btn btn-iconed btn-round btn-info btn-xs"><i class="fa fa-eye"></i> Lihat </a></td>
                <?php
                }
                else{
                  ?>
                  <td><a href="detailPenjadwalan.php?id=<?php echo $row['id']; ?>" class="btn btn-iconed btn-round btn-warning btn-xs" disabled="disabled"><i class="fa fa-eye"></i> Lihat </a>
                  <span class="help-block">*Isi penggunaan BB</span></td>
                <?php
                }
              } 
              ?>
              
              <td class="text-center">
                <a href="#modalUbah_<?php echo $row['id']; ?>" class="btn btn-round btn-default btn-xs" data-toggle="modal">Ubah</a>
                <a href="#modalHapus_<?php echo $row['id']; ?>" class="btn btn-round btn-danger btn-xs" data-toggle="modal">Hapus</a>
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
  <!-- QUERY UNTUK AMBIL DETAIL -->
  <?php
  $sql = "SELECT spk.idSpk as spk, nj.idJual as nota_jual, nj.tanggal as tanggal_nota, spk.tgl_spk as tglSpk, spk.tgl_perencanaan as tglRencana, spk.rencana_produksi as rencana, spk.status as status, p.namaPelanggan as pelanggan, b.nama as nama_barang, nj.status as status_nota, b.harga_jual as harga, b.idBarang as idBarang
    FROM barang b inner join spk
      on b.idBarang = spk.barang_idBarang
    inner join nota_jual nj
      on spk.nota_jual_idJual = nj.idJual
    inner join pelanggan p 
      on nj.pelanggan_idPelanggan = p.idPelanggan
    where spk.deleted=0";
  $result = mysqli_query($link, $sql);
  if(!$result){
      die("<br/>SQL error_log(message)r : " . $sql);
  }
  $no=0;
  while ($row = mysqli_fetch_array($result)) {
    $no++;
    $idNotaJual = $row['nota_jual'];
    $idBarang = $row['idBarang'];
  ?>

<div class="modal fade" id="modalDetailNota<?php echo $row['nota_jual']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-blue">
        <div class="widget-title">
          <div class="widget-controls">
            <a href="#" class="widget-control " data-dismiss="modal"><i class="fa fa-times-circle"></i></a>
          </div>
          <h3><i class="fa fa-ok-circle"></i> <strong>Detail Nota Jual : </strong> <?php echo $row['pelanggan']; ?>, <strong>Tgl:</strong> <?php echo $row['tanggal_nota']; ?></h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">
            <div class="row">
              <div class="table-responsive">
                <div class="col-md-12">
                <table style="border: 0px;" cellpadding="5">
                <tr>
                    <td style="text-align: right;font-weight: bold;">No Nota </td>
                    <td style="text-align: left;font-weight: bold;">:</td>
                    <td> <?php echo $row['nota_jual']; ?> </td>
                  </tr>
                  <tr>
                    <td style="text-align: right;font-weight: bold;">Nama Pelanggan</td>
                    <td style="text-align: left;font-weight: bold;">:</td>
                    <td> <?php echo $row['pelanggan']; ?> </td>
                  </tr>
                  <tr>
                    <td style="text-align: right;font-weight: bold;">Tanggal Pemesanan</td>
                    <td style="text-align: left;font-weight: bold;">:</td>
                    <td> <?php echo $row['tanggal_nota']; ?></td>
                  </tr>
                  <tr>
                    <td style="text-align: right;font-weight: bold;">Status Pembayaran</td>
                    <td style="text-align: left;font-weight: bold;">:</td>
                    <td><?php 
                    if($row['status_nota']==0){
                      echo $status = '<span class="label label-warning">Belum Lunas</span>';
                    }
                    else{
                      echo $status = '<span class="label label-success">Lunas</span>';
                    } 
                    ?>
                    </td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </table><br>
                
                <!-- INI DETAIL E -->  
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr style="text-align: center;font-weight: bold;">
                      <td>Kerupuk yang dibeli</td>
                      <td>Harga</td>
                      <td>Jumlah</td>
                      <td>Total</td>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $sqlAmbil = "SELECT b.idBarang as idBarang, nj.idJual as idJual, mn.jumlah as jumlah_pesanan, b.nama as nama_barang, b.harga_jual as harga
                    FROM barang b inner join barang_has_nota_jual mn
                      on b.idBarang = mn.barang_idBarang
                    inner join nota_jual nj
                      on mn.nota_jual_idJual = nj.idJual
                    where nj.idJual=". $idNotaJual;
                  $resultAmbil = mysqli_query($link, $sqlAmbil);
                  if(!$result){
                      die("<br/>SQL error_log(message)r : " . $sqlAmbil);
                  }
                  $no=0;
                  $subTotalFix = 0;
                  $subTotal = 0;
                  while ($rowAmbil = mysqli_fetch_array($resultAmbil)) {
                    $no++;
                    $harga= "Rp " . number_format($rowAmbil['harga'],0,',','.');
                    $total= $rowAmbil['jumlah_pesanan'] * $rowAmbil['harga'];
                    $totalFix= "Rp " . number_format($total,0,',','.');
                    $subTotal+= $total;
                    $subTotalFix= "Rp " . number_format($subTotal,0,',','.');

                  ?>
                    <tr style="text-align: center;">
                      <td><?php echo $rowAmbil['nama_barang']; ?></td>
                      <td><?php echo $harga; ?></td>
                      <td><?php echo $rowAmbil['jumlah_pesanan']; ?></td>
                      <td style="text-align: right;"><?php echo $totalFix; ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                      <td colspan="3" style="text-align: right;"><strong> SubTotal : </strong></td>
                      <td colspan="2" style="text-align: right;"> <?php echo $subTotalFix; ?></td>
                    </tr>
                  </tbody>
                </table><br>

                <!-- KEBUTUHAN BAHAN BAKU -->  
                <p style="font-weight: bold" class="text-center">- - - JUMLAH BAHAN BAKU YANG DIBUTUHKAN - - -</p>
                <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th> No </th>
                        <th> Nama Bahan Baku </th>
                        <!-- <th> Resep </th> -->
                        <th> Jumlah</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $sqlAmbil2 = "SELECT bb.idBB, bb.nama as namaBB, s.nama as satuan, sum(mn1.jumlah*mn2.jumlah) as total, nj.idJual as id 
                          FROM nota_jual nj inner join barang_has_nota_jual mn1
                            on nj.idJual = mn1.nota_jual_idJual
                          inner join barang b
                            on mn1.barang_idBarang = b.idBarang
                          inner join bahanbaku_has_barang mn2
                            on mn2.barang_idBarang = b.idBarang
                          inner join bahanbaku bb
                            on mn2.bahanbaku_idBB = bb.idBB
                          inner join satuan s
                            on s.idSatuan = bb.idSatuan
                          where nj.idJual = $idNotaJual
                            and b.idBarang in (
                                SELECT barang_idBarang from barang_has_nota_jual 
                                where nota_jual_idJual = $idNotaJual
                              )
                           group by bb.idBB, bb.nama, s.nama
                           order by bb.nama";
                      $resultAmbil2 = mysqli_query($link, $sqlAmbil2);
                      if(!$resultAmbil2){
                          die("<br/>SQL error_log(message)r : " . $sqlAmbil2);
                      }
                      $no=0;
                      $idNota='';
                      while ($rowAmbil2 = mysqli_fetch_array($resultAmbil2)) {
                          $no++;
                          $idNota = $rowAmbil2['id'];
                      ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $rowAmbil2['namaBB']; ?></td>
                          <!-- <td><?php echo $rowAmbil2['jumlahResep']; echo ' '.$rowAmbil2['satuan'];?></td> -->
                          <td><?php echo $rowAmbil2['total'] . ' '.$rowAmbil2['satuan'];?></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table><br>
                </div>
              </div>
              <div class="col-md-12 text-right">
                <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                <a href="detailRekomendasi.php?id=<?php echo $idNota; ?>" class="btn btn-iconed btn-primary" data-toggle="modal"><i class="fa fa-shopping-cart"></i> Beli Bahan Baku ini </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<!-- Pengulangan query, di while lg, modalnya ga kebaca -->
  <?php
  $sqlModal = "SELECT spk.idSpk as spk, nj.idJual as nota_jual, nj.tanggal as tanggal_nota, spk.tgl_spk as tglSpk, spk.tgl_perencanaan as tglRencana, spk.rencana_produksi as rencana, spk.status as status, p.namaPelanggan as pelanggan, b.nama as nama_barang
    FROM barang b inner join spk
      on b.idBarang = spk.barang_idBarang
    inner join nota_jual nj
      on spk.nota_jual_idJual = nj.idJual
    inner join pelanggan p 
      on nj.pelanggan_idPelanggan = p.idPelanggan
    where spk.deleted=0";
  $resultModal = mysqli_query($link, $sql);
  if(!$result){
      die("<br/>SQL error_log(message)r : " . $sqlModal);
  }
  $no=0;
  while ($rowModal = mysqli_fetch_array($resultModal)) {
    $no++;
  ?>
<div class="modal fade" id="modalHapus_<?php echo $rowModal['spk']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-blue">
        <div class="widget-title">
          <div class="widget-controls">
            <a href="#" class="widget-control " data-dismiss="modal"><i class="fa fa-times-circle"></i></a>
          </div>
          <h3><i class="fa fa-ok-circle"></i> <strong>HAPUS SPK TANGGAL : </strong> <?php echo $rowModal['tglSpk']; ?></h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">
            <form action="action_hapus.php?cmd=hapusSPK" method="POST" role="form">
              <div class="row">
                <div class="col-md-12">
                  <div class="alert alert-warning alert-dismissable bottom-margin">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                  <i class="fa fa-exclamation-circle"></i> <strong>Peringatan!</strong> Anda akan menghapus SPK pada tanggal : <u><?php echo $rowModal['tglSpk'];?></u>. Data yang dihapus tidak dapat dikembalikan lagi.
                  </div>
                </div>
                <div class="col-md-12 text-right">
                  <input type="hidden" name="uID" value= "<?php echo $rowModal['spk']; ?>">
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
</div>

<div class="modal fade" id="modalUbah_<?php echo $rowModal['spk']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-blue">
        <div class="widget-title">
          <div class="widget-controls">
            <a href="#" class="widget-control " data-dismiss="modal"><i class="fa fa-times-circle"></i></a>
          </div>
          <h3><i class="fa fa-ok-circle"></i> <strong>UBAH SPK TANGGAL: </strong> <?php echo $rowModal['tglSpk']; ?></h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">
            <form action="action_ubah.php?cmd=ubahSPK" method="POST" role="form">
              <div class="row">
                <div class="col-md-12">
                  <p><strong> Tanggal Pembuatan SPK </strong></p>
                    <div class="input-group">
                    <input type="date" name="uTglSpk" value="<?php echo $rowModal['tglSpk']; ?>" class="form-control" disabled="disabled">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div><br>
                <p><strong> Tanggal Rencana Selesai </strong></p>
                    <div class="input-group">
                    <input type="date" name="uRencanaSelesai" min="<?php echo date('Y-m-d'); ?>" class="form-control" value="<?php echo $rowModal['tgl_perencanaan']; ?>">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  </div><br>    
                </div>         
              </div>
              <div class="text-right">
              <input type="hidden" name="uID" value= "<?php echo $rowModal['spk']; ?>">
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

<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-blue">
        <div class="widget-title">
          <div class="widget-controls">
            <a href="#" class="widget-control " data-dismiss="modal"><i class="fa fa-times-circle"></i></a>
          </div>
          <h3><i class="fa fa-ok-circle"></i><strong> Buat SPK Baru </strong></h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">
            <form action="action_tambah.php?cmd=tambahSPK" method="POST" role="form">
              <div class="row">
                <div class="col-md-12">
                  <p><strong> Tanggal Pembuatan SPK </strong></p>
                    <div class="input-group">
                    <input type="date" name="uTgl" value="<?php echo date('Y-m-d'); ?>" class="form-control" disabled="disabled">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div><br>
                <p><strong> Tanggal Rencana Selesai </strong></p>
                    <div class="input-group">
                    <input type="date" name="uRencanaSelesai" min="<?php echo date('Y-m-d'); ?>" class="form-control">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  </div><br>    
                </div>
                <hr style="width: 89%; margin-top: -2%">
                <div class="col-md-12 form-group">
                <div class="col-md-12" style="margin-top: -2%">
                    <div class="form-group">
                      <label>Dari Nota Jual (Nama & Tanggal Pemesanan)</label><!--STUCK-->
                      <select name="uNotaJual" class="form-control" onchange="divTampungKerupuk(this.value);">
                      <option value=""> - - DAFTAR NOTA JUAL - - </option>
                        <?php
                        $sql = "select nj.idJual as idJual, p.namaPelanggan as nama_pelanggan, nj.tanggal as tanggal_nota
                              from nota_jual nj inner join pelanggan p
                              on nj.pelanggan_idPelanggan = p.idPelanggan";
                        $result = mysqli_query($link, $sql);

                        while($rowModal = mysqli_fetch_array($result)){
                          echo '<option value= "'. $rowModal['idJual'] .'"">( ' . $rowModal['nama_pelanggan'] .  ' ) & ' . $rowModal['tanggal_nota'] .  '</option>';
                        } 
                        ?>
                      </select>
                    </div>
                </div>
                <div class="col-md-12" style="margin-top: -2%" id="divTampungKerupuk">
                    <div class="form-group">
                      <label>Kerupuk</label><!--STUCK-->
                      <select name="uKerupuk" class="form-control">
                      <option value=""> - - KERUPUK YANG DIBELI - - </option>
                      </select>
                    </div>
                </div>
                </div>
                <hr style="width: 89%;">
                <div class="col-md-12" style="margin-top: -2%;>
                    <div class="form-group">
                      <label>Rencana Produksi (per Bal)</label>
                      <input type="number" min="0" name="uRencanaProduksi" class="form-control">
                      <span class="help-block" style="font-weight: bold">*Usahakan untuk tidak merencanakan produksi kurang dari jumlah pesanan</span>
                    </div>
                </div>
                <div class="text-right">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary"> Buat SPK </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
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

<script src='assets/js/template_js/table.js'></script>
<script type="text/javascript">
    function loading(name){
      $(name).html('<br><img src="assets/images/load.gif" width="30px"><br>');
    } 
    function divTampungKerupuk(idJual){
      if(idJual != ""){
        loading('#divTampungKerupuk');
        $('#divTampungKerupuk').show(500);
        $.post('action_tampung.php', 
        {idJual : idJual, cmd : 'tampungKerupuk' }, 
        function (data) {
          // alert(data);
          $('#divTampungKerupuk').html(data);
        });
      }
    } 

</script>
</body>
</html>