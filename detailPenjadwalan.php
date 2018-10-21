<?php
session_start();
require 'db.php'; 

if($_SESSION['umkm_idumkm'] == '' || $_SESSION['umkm_idumkm'] == null || $_SESSION['login'] == '' || $_SESSION['login'] == null){
  $_SESSION['pesan'] = "Anda Belum Login";
  header("Location: login.php");
  exit();
}

$sqlData="SELECT spk.idSpk as spk, nj.idJual as nota_jual, nj.tanggal as tanggal_nota, spk.tgl_spk as tglSpk, spk.tgl_perencanaan as tglRencana, spk.rencana_produksi as rencana, spk.status as status, p.namaPelanggan as pelanggan, b.nama as nama_barang, b.idBarang as idBarang, spk.tgl_mulai_real as tgl_mulai_real, spk.tgl_selesai_real as tgl_selesai_real
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

// //INI QUERY AMBIL PROSES
// $sqlData="SELECT b.nama as nama_barang, p.nama as nama_proses, p.lama_proses as lama_proses, m.nama as nama_mesin, p.idProsesproduksi as id_produksi, p.urutan as urutan
//       FROM barang b INNER JOIN prosesproduksi p
//       on b.idBarang = p.barang_idBarang
//       INNER JOIN mesin m
//       on p.mesin_idMesin = m.idMesin
//       WHERE b.idBarang =$idBarang
//       order by urutan asc";
// $res2= mysqli_query($link,$sqlData2); 
// $r_data2=mysqli_fetch_array($res2);
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
  <h1> MENU PRODUKSI : Penjadwalan Produksi</h1>
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
    <ul><li class='current'><a href="#">Penjadwalan Produksi</a></li></ul>
  </ul>
</div>
  </div>
  <div class="main-content">
  <ol class="breadcrumb">
  <li><a href="#">Menu Produksi</a></li>
  <li><a href="spk.php">SPK</a></li>
  <li class="active">Penjadwalan Produksi</li>
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
        <h3><i class="fa fa-calendar"></i><strong> PENJADWALAN PRODUKSI UNTUK : </strong><?php echo $r_data['nama_barang']; ?> / <?php echo date('d-M-Y', strtotime($r_data['tglSpk'])); ?></h3>
      </div>
      <div class="widget-content">
      <div>
      <a href="spk.php" class="btn btn-iconed btn-default"  ><i class="fa fa-arrow-circle-o-left"></i> Kembali </a>
      <a href="#modalPenjadwalan" class="btn btn-iconed btn-primary" data-toggle="modal"><i class="fa fa-plus-circle"></i> Lakukan Rencana Penjadwalan </a>
      </div><br>
        <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr style="text-align: center;font-weight: bold;">
              <td>Urutan</td>
              <td>Nama<br>Proses</td>
              <td>Perkiraan<br>Mulai</td>
              <td>Perkiraan<br>Selesai</td>
              <td>Keterangan</td>
              <td>Biaya Lain2</td>
              <td>Dikerjakan<br>Oleh</td>
              <td>Mesin</td>
              <td class="text-right">Tindakan</td>
            </tr>
          </thead>
          <tbody>
          <?php 
          $sql = "SELECT jp.*, pp.idProsesproduksi as idProses, pp.nama as namaProses, m.nama as nama_mesin, pp.urutan as urutan, m.idMesin as idMesin, m.nama as nama_mesin, s.idSpk as idSpk
                  FROM jadwalproduksi jp inner join prosesproduksi pp
                    on jp.prosesproduksi_idProsesproduksi = pp.idProsesproduksi
                  inner join spk s
                    on s.idSpk = jp.spk_idSpk
                  inner join mesin m
                    on m.idMesin = pp.mesin_idMesin
                  where s.idSpk =$idSpk
                  order by pp.urutan asc";

              $result = mysqli_query($link, $sql);
          if(!$result){
              die("<br/>SQL error_log(message)r : " . $sql);
          }
          $no=0;
          $jadwalTerisi=true;
          while ($row = mysqli_fetch_array($result)) {
            $no++;
            $idJadwalnya=$row['idJadwalproduksi'];
            $namaKaryawan='';
            $biayaLain2= "Rp " . number_format($row['biaya_lain'],0,',','.');

            $sqlsql = "SELECT tk.*
                  FROM tenagakerja tk inner join tenagakerja_has_jadwalproduksi mn
                    on tk.idTenagakerja = mn.tenagakerja_idTenagakerja
                  inner join jadwalproduksi jp
                    on mn.jadwalproduksi_idJadwalproduksi = jp.idJadwalproduksi 
                  WHERE mn.jadwalproduksi_idJadwalproduksi=".$idJadwalnya;
                // echo $sqlsql . "<br>";
            $res = mysqli_query($link, $sqlsql);
            if($res){
              while ($r = mysqli_fetch_array($res)) {
                $namaKaryawan .= "*".$r['nama']."<br>";
              }
            } 
          ?>
            <tr style="text-align: center;">
              <td><?php echo $row['urutan']; ?></td>
              <td><?php echo $row['namaProses']; ?></td> 
              <td><?php echo date('d-M-Y', strtotime($row['tgl_mulai'])); ?></td>
              <td><?php echo date('d-M-Y', strtotime($row['tgl_selesai'])); ?></td>
              <td><?php echo $row['keterangan']; ?></td>
              <td><?php echo $biayaLain2; ?></td>
              <td><span class="help-block" style="font-weight: bold"><?php echo $namaKaryawan; ?></span>
              <?php 
              if($row['tgl_mulai_real'] == NULL){
              ?>
                <a href="detailKaryawan.php?id=<?php echo $row['idJadwalproduksi']; ?>" class="btn btn-iconed btn-round btn-warning btn-xs"><i class="fa fa-plus-circle"></i> Pilih Karyawan </a><?php
              }
              else{?>
                <a href="detailKaryawan.php?id=<?php echo $row['idJadwalproduksi']; ?>" class="btn btn-iconed btn-round btn-success btn-xs"><i class="fa fa-eye"></i> Lihat Catatan </a><?php
              }
              ?>
              </td>
              <td><?php 
              if($row['status_mesin']==0){
                ?>
                <span class="help-block" style="font-weight: bold">
                    *Tidak pakai mesin*
                  </span><?php
              }
              else{
                ?>
                <?php echo $row['nama_mesin']; ?><?php
              } 
              ?></td>
              <td class="text-right">
                <?php
                  if($row['tgl_selesai_real'] != NULL)
                  {?>
                    <a href="#modalJadwal_<?php echo $no; ?>" class="btn btn-iconed btn-round btn-info btn-xs" data-toggle="modal"><i class="fa fa-calendar"></i> Jadwalkan </a><?php
                  }
                  else{
                    if($jadwalTerisi == true){
                    $jadwalTerisi = false;
                    ?>
                      <a href="#modalJadwal_<?php echo $no; ?>" class="btn btn-iconed btn-round btn-info btn-xs" data-toggle="modal"><i class="fa fa-calendar"></i> Jadwalkan </a><?php
                      
                    }
                    else{?>
                      <a href="#modalJadwal_<?php echo $no; ?>" class="btn btn-iconed btn-round btn-info btn-xs" data-toggle="modal" disabled="disabled"><i class="fa fa-calendar"></i> Jadwalkan </a><?php
                    }
                  }
                ?>
                <?php 
                if($row['tgl_mulai_real'] == NULL){
                  ?>
                  <a href="#modalUbah_<?php echo $no; ?>" class="btn btn-round btn-default btn-xs" data-toggle="modal">Ubah</a><?php
                }
                else{
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

<div class="modal fade" id="modalPenjadwalan" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-blue">
        <div class="widget-title">
          <div class="widget-controls">
            <a href="#" class="widget-control " data-dismiss="modal"><i class="fa fa-times-circle"></i></a>
          </div>
          <h3><i class="fa fa-ok-circle"></i> <strong>RENCANA PENJADWALAN: <?php echo $r_data['nama_barang']; ?> / <?php echo $r_data['tglSpk']; ?></strong></h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">
            <form action="action_tambah.php?cmd=tambahJadwalProduksi" method="POST" role="form" class="form-horizontal"> 
            <?php
              $sqlJadwal = "SELECT b.nama as nama_barang, p.nama as nama_proses, m.nama as nama_mesin, p.idProsesproduksi as id_proses, p.urutan as urutan, m.idMesin as idMesin
                FROM barang b INNER JOIN prosesproduksi p
                on b.idBarang = p.barang_idBarang
                INNER JOIN mesin m
                on p.mesin_idMesin = m.idMesin
                WHERE b.idBarang =$idBarang
                order by urutan asc";
              $resultJadwal = mysqli_query($link, $sqlJadwal);
              if(!$resultJadwal){
                    die("<br/>SQL error_log(message)r : " . $sqlJadwal);
              }
              $noid = 0;
              while ($rowJadwal = mysqli_fetch_array($resultJadwal)) {
                  $noid ++;
              ?>
              <div class="row" style="border: 2px #2E93D7 solid; border-radius: 10px; padding-top: 5px; padding-bottom: 5px">
              <div class="form-group" style="margin-left: 1px; margin-right: 1px">
                <label class="col-md-3 control-label" style="text-align: right;">Nama Proses : </label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="uProses" disabled="disabled" value="<?php echo $rowJadwal['nama_proses']; ?> *(Urutan ke-<?php echo $rowJadwal['urutan']; ?>)">
                </div>
                <div class="col-md-6">
                <p><strong> Perkiraan Mulai : </strong></p>
                    <div class="input-group">
                    <input type="date" name="uPerkiraanMulai<?php echo $rowJadwal['id_proses']; ?>" value="<?php echo date('Y-m-d'); ?>" min="<?php echo $r_data['tgl_mulai_real']; ?>" max="<?php echo $r_data['tglRencana']; ?>" class="form-control">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div>
                </div>
                <div class="col-md-6">
                <p><strong> Perkiraan Selesai : </strong></p>
                    <div class="input-group">
                    <input type="date" name="uPerkiraanSelesai<?php echo $rowJadwal['id_proses']; ?>" id="uPerkiraanSelesai<?php echo $rowJadwal['id_proses']; ?>" value="<?php echo date('Y-m-d'); ?>" min="<?php echo $r_data['tgl_mulai_real']; ?>" max="<?php echo $r_data['tglRencana']; ?>" class="form-control" 
                      oninput="$('#date').datepicker('option', 'minDate', new Date(startDate));"
                    >
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div>
                </div>
              </div>
              <div class="form-group" style="margin-left: 1px; margin-right: 1px; margin-top: -2%;">
                <p class="col-md-12 control-label" style="color:#2E93D7; text-align: left">Lain-Lain (*Kosongkan jika dirasa tidak perlu) <i class="fa fa-hand-o-down"></i></p>
                <label class="col-md-3 control-label" style="text-align: right;"> Mesin : </label>
                <?php 
                if($rowJadwal['idMesin']==0){
                  ?>
                  <div class="col-md-9">
                  <label class="control-label"><input type="radio" value="0" name="uIDMesin<?php echo $rowJadwal['id_proses']; ?>" checked="checked"> Tidak Pakai Mesin (Proses ini tidak butuh mesin) </label>
                  </div><?php
                }
                else{
                  ?>
                  <div class="col-md-9">
                  <label class="control-label"><input type="radio" value="0" name="uIDMesin<?php echo $rowJadwal['id_proses']; ?>"> Tidak Pakai Mesin </label><br>
                  <label class="control-label"><input type="radio" value="<?php echo $rowJadwal['idMesin']; ?>" checked="checked" name="uIDMesin<?php echo $rowJadwal['id_proses']; ?>"> <?php echo $rowJadwal['nama_mesin']; ?></label>
                  <label>&nbsp;&nbsp; = &nbsp;&nbsp; </label> <label class="control-label"><input type="number" min="0" name="uJamMesin<?php echo $rowJadwal['id_proses']; ?>" placeholder="Total pemakaian">&nbsp; (Jam)</label>
                  uJamMesin<?php echo $rowJadwal['id_proses']; ?>
                  </div><?php
                } 
                ?>
              </div>
              <div class="form-group" style="margin-left: 1px; margin-right: 1px; margin-top: -2%;"> 
                <label class="col-md-3 control-label" style="text-align: right;"> Keterangan : </label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="uKeterangan<?php echo $rowJadwal['id_proses']; ?>" placeholder="Anda dapat mengisi keterangan tambahan untuk proses ini">
                </div>
              </div>
              <div class="form-group" style="margin-left: 1px; margin-right: 1px; margin-top: -2%;">
                <label class="col-md-3 control-label" style="text-align: right;"> Biaya Lain2 : </label>
                <div class="col-md-9">
                  <input type="number" min="0" class="form-control" name="uBiayaLain<?php echo $rowJadwal['id_proses']; ?>" placeholder="Biaya lain-lain yang ditimbulkan dari proses ini">
                </div>
              </div>
              <input type="hidden" name="uIDProses<?php echo $rowJadwal['id_proses']; ?>" value= "<?php echo $rowJadwal['id_proses'];?>"> 
              </div>      
              <br> 
                <?php } ?>
                <div class="col-md-12 text-right">
                  <input type="hidden" name="uIDSPK" value= "<?php echo $r_data['spk'];?>"> 
                  <input type="hidden" name="uIDBarang" value= "<?php echo $idBarang;?>"> 
                  <button class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button class="btn btn-primary"> Jadwalkan </button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  $sql = "SELECT jp.*, pp.idProsesproduksi as idProses, pp.nama as namaProses, pp.urutan as urutan, m.idMesin as idMesin, m.nama as nama_mesin, s.idSpk as idSpk
    FROM jadwalproduksi jp inner join prosesproduksi pp
      on jp.prosesproduksi_idProsesproduksi = pp.idProsesproduksi
    inner join spk s
      on s.idSpk = jp.spk_idSpk
    inner join mesin m
      on m.idMesin = pp.mesin_idMesin
    where s.idSpk =$idSpk
    order by pp.urutan asc";
  $result = mysqli_query($link, $sql);
  if(!$result){
      die("<br/>SQL error_log(message)r : " . $sql);
  }
  $no=0;
  $jumlahArray = mysqli_num_rows ( $result );
  while ($row = mysqli_fetch_array($result)) {
      $no++;
  ?>
  <div class="modal fade" id="modalUbah_<?php echo $no; ?>" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-blue">
        <div class="widget-title">
          <div class="widget-controls">
            <a href="#" class="widget-control " data-dismiss="modal"><i class="fa fa-times-circle"></i></a>
          </div>
          <h3><i class="fa fa-ok-circle"></i> UBAH PROSES : <strong><?php echo $row['namaProses']; ?></strong> </h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">
            <form action="action_ubah.php?cmd=ubahJadwalProduksi" method="POST" role="form">
              <div class="row">
                <div class="col-md-12">
                  <p><strong> Tanggal Perkiraan Mulai </strong></p>
                    <div class="input-group">
                    <input type="date" name="uPerkiraanMulai" value="<?php echo $row['tgl_mulai']; ?>" min="<?php echo $r_data['tgl_mulai_real']; ?>" max="<?php echo $r_data['tglRencana']; ?>" class="form-control">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div><br>
                <p><strong> Tanggal Perkiraan Selesai </strong></p>
                    <div class="input-group">
                    <input type="date" name="uPerkiraanSelesai" class="form-control" value="<?php echo $row['tgl_selesai']; ?>" min="<?php echo $r_data['tgl_mulai_real']; ?>" max="<?php echo $r_data['tglRencana']; ?>">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  </div><br> 
                  <div class="form-group">
                    <label>Mesin</label><br>
                    <div style="border: 1px #B9AD9D solid; border-radius: 4px; width: 100%; background-color: white;">
                    <?php 
                    if($row['status_mesin']==0 && $row['idMesin']!=0){
                      ?>
                      <label class="control-label"><input type="radio" value="0" checked="checked" name="uIDMesin"> Tidak Pakai Mesin </label><br>
                      <label class="control-label"><input type="radio" value="<?php echo $row['idMesin']; ?>" name="uIDMesin"> <?php echo $row['nama_mesin']; ?></label>
                      <label>&nbsp;&nbsp; = &nbsp;&nbsp;</label><label class="control-label"><input type="number" min="0" name="uKeterangan<?php echo $rowJadwal['id_proses']; ?>" placeholder="Total pemakaian">&nbsp; (Jam)</label>
                      <?php
                    }
                    else if($row['status_mesin']==0 && $row['idMesin']==0){
                      ?>
                      <label class="control-label"><input type="radio" value="0" checked="checked" name="uIDMesin"> Proses ini tidak butuh mesin </label><?php
                    }
                    else if($row['status_mesin']>=0 && $row['idMesin']!=0){
                      ?>
                      <label class="control-label"><input type="radio" value="0" name="uIDMesin"> Tidak Pakai Mesin </label><br>
                      <label class="control-label"><input type="radio" value="<?php echo $row['idMesin']; ?>" checked="checked" name="uIDMesin"> <?php echo $row['nama_mesin']; ?></label>
                      <?php
                    } 
                    ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="uKeterangan" value="<?php echo $row['keterangan']; ?>" class="form-control" >
                  </div> 
                  <div class="form-group">
                    <label>Biaya Lain-lain</label>
                    <input type="number" min="0" name="uBiayaLain" value="<?php echo $row['biaya_lain']; ?>" class="form-control" >
                  </div>   
                </div>  
              </div>
              <div class="text-right">
                <input type="hidden" name="uIDSPK" value= "<?php echo $idSpk; ?>">
                <input type="hidden" name="uIDJadwal" value= "<?php echo $row['idJadwalproduksi']; ?>">
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

  <div class="modal fade" id="modalJadwal_<?php echo $no; ?>" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-blue">
        <div class="widget-title">
          <div class="widget-controls">
            <a href="#" class="widget-control " data-dismiss="modal"><i class="fa fa-times-circle"></i></a>
          </div>
          <h3><i class="fa fa-ok-circle"></i> Realisasi Penjadwalan proses : <strong><?php echo $row['namaProses']; ?></strong></h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">
            <form action="action_ubah.php?cmd=ubahRealisasiJadwal" method="POST" role="form">
              <div class="row">
                <div class="col-md-12">
                  <div class="alert alert-info alert-dismissable bottom-margin">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                  <i class="fa fa-exclamation-circle"></i> <strong>Info!</strong> Anda akan membuat realisasi penjadwalan dari proses <u><?php echo $row['namaProses']; ?></u>. Setelah anda melakukan realisasi, data yang sebelumnya telah diisi pada proses ini tidak dapat diubah lagi. Apakah anda yakin?
                  </br></br>
                  <?php 
                    if($row['tgl_mulai_real'] != NULL){
                      ?>
                      <p><strong> Tanggal Realisasi Mulai </strong></p>
                      <div class="input-group">
                      <input type="date" name="uMulaiReal" min="<?php echo date('Y-m-d'); ?>" value="<?php echo $row['tgl_mulai_real']; ?>" class="form-control" readonly="">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                      </div>
                      <span class="help-block" style="font-weight: bold"><i class="fa fa-thumbs-up"></i> Anda memulai penjadwalan pada tanggal diatas</span><?php
                    }
                    else{
                      ?>
                      <p><strong> Tanggal Realisasi Mulai </strong></p>
                      <div class="input-group">
                      <input type="date" name="uMulaiReal" min="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                      </div><br><?php
                    } 
                    ?>
                    <?php 
                    if($row['tgl_selesai_real'] != NULL){
                      ?>
                      <p><strong> Tanggal Realisasi Selesai </strong></p>
                      <div class="input-group">
                        <input type="date" name="uSelesaiReal" min="<?php echo date('Y-m-d'); ?>" value="<?php echo $row['tgl_selesai_real']; ?>" class="form-control" disabled="disabled">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                      </div>
                      <span class="help-block" style="font-weight: bold"><i class="fa fa-thumbs-up"></i> Penjadwalan telah selesai sesuai tanggal diatas</span>
                      <?php
                    }
                    else{
                      ?>
                      <p><strong> Tanggal Realisasi Selesai </strong></p>
                      <div class="input-group">
                      <input type="date" name="uSelesaiReal" min="<?php echo date('Y-m-d'); ?>" class="form-control">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                      </div><?php
                    } 
                    ?>
                  </div>
                </div>
                <div class="col-md-12 text-right">
                  <input type="hidden" name="uNamaProses" value= "<?php echo $row['namaProses']; ?>">
                  <input type="hidden" name="uIDProses" value= "<?php echo $row['idProses']; ?>">
                  <input type="hidden" name="uIDJadwal" value= "<?php echo $row['idJadwalproduksi']; ?>">
                  <input type="hidden" name="uIDSPK" value= "<?php echo $idSpk; ?>">
                  <?php
                  if($jumlahArray == $no){?>
                    <input type="hidden" name="uTerakhir" value= "1"><?php
                  }
                    $sql_cekBB = "SELECT *
                    from tenagakerja_has_jadwalproduksi
                    where jadwalproduksi_idJadwalproduksi=".$row['idJadwalproduksi'];
                    $res_cekBB= mysqli_query($link,$sql_cekBB);
                    $jmlAda=mysqli_num_rows($res_cekBB);
                    if($jmlAda > 0){
                      if($row['tgl_selesai_real'] != NULL){?>
                        <button class="btn btn-default" data-dismiss="modal">Kembali</button><?php
                      }
                      else{?>
                        <button class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button class="btn btn-primary">Realisasikan Proses Ini</button><?php
                      }
                    ?>   
                    <?php
                    }
                    else{
                    ?>
                    <button class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" disabled="disabled">Realisasikan Proses Ini</button>
                    <span class="help-block">*Isi dahulu pengerjaan karyawan di proses ini</span><?php
                    }
                    ?>
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

<script src='assets/js/template_js/forms.js'></script>
</body>
</html>