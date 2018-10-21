<?php
session_start(); 
require 'db.php'; 

if($_SESSION['umkm_idumkm'] == '' || $_SESSION['umkm_idumkm'] == null || $_SESSION['login'] == '' || $_SESSION['login'] == null){
  $_SESSION['pesan'] = "Anda Belum Login";
  header("Location: login.php");
  exit();
}
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
  <h1>Menu Utama: Bahan Baku</h1>
</div>
  <div class="side">
  <div class="sidebar-wrapper">
  <ul>
    <li>
      <a href="index.php" data-toggle="tooltip" data-placement="right" title="" data-original-title="Halaman Depan">
        <i class="fa fa-home"></i>
      </a>
    </li>
    <li class='current'>
      <a class='current' href="pemasok.php" data-toggle="tooltip" data-placement="right" title="" data-original-title="Menu Utama">
        <i class="fa fa-th-large"></i>
      </a>
    </li>
    <li>
      <a href="bom.php" data-toggle="tooltip" data-placement="right" title="" data-original-title="Menu Produksi">
        <i class="fa fa-book"></i>
      </a>
    </li>
  </ul>
</div>
  <div class="sub-sidebar-wrapper">
  <ul>
    <li><a href="pemasok.php">Pemasok</a></li>
    <li><a href="karyawan.php">Karyawan</a></li>
    <li class="current"><a href="bahanbaku.php">Bahan Baku</a></li>
    <ul><li><a href="satuan.php">Satuan BB</a></li></ul>
    <li><a href="kerupuk.php">Kerupuk</a></li>
    <ul><li><a href="jenis.php">Jenis Kerupuk</a></li></ul>
    <li><a href="mesin.php">Mesin</a></li>
    <li><a href="listrik.php">Tarif Listrik / KWH<br>(Saat ini)</a></li>
  </ul>
</div>
  </div>
  <div class="main-content">
  <ol class="breadcrumb">
  <li><a href="#">Menu Utama</a></li>
  <li class="active">Bahan Baku</li>
  </ol>
  <!-- not necessary
    <div class="alert alert-warning alert-dismissable bottom-margin">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <i class="fa fa-exclamation-circle"></i> <strong>Welcome!</strong> This is a dashboard of the powerful admin template.
    </div>
  -->
    <div class="row">
      <div class="col-md-8">
        <div class="widget widget-blue">
          <div class="widget-title">
            <div class="widget-controls">
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Perbesar Tampilan"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Kecilkan Tampilan"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Perkecil / Perbesar"><i class="fa fa-chevron-down"></i></a>
</div>
            <h3><i class="fa fa-plus-circle"></i> Tambah Bahan Baku</h3>
          </div>
          <div class="widget-content">
            <form action="action_tambah.php?cmd=tambahBahanBaku" method="POST" role="form">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Nama Bahan Baku</label>
                    <input type="text" name="uNama" class="form-control">
                  </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                      <label>Stok (Jumlah)</label>
                      <input type="number" min="0" name="uStok" class="form-control" disabled="disabled">
                      <span class="help-block">*Saat pertamakali menambah bahan baku, <b>stok tidak dapat diubah</b>. Anda harus beli terlebih dahulu</span>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Satuan</label>
                    <select name="uSatuan" class="form-control">
                    <?php
                    $sql = "select * from satuan";
                    $result = mysqli_query($link, $sql);

                    while($row = mysqli_fetch_array($result)){
                      echo '<option value= "'. $row['idSatuan'] .'"">' . $row['nama'] . '</option>';
                    } 
                    ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="text-right">
              <input type="reset" class="btn btn-default" value="Batal">
              <button class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-4">
              <div class="widget widget-blue">
                <div class="widget-title">
                  <div class="widget-controls">
        <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Perbesar Tampilan"><i class="fa fa-expand"></i></a>
        <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Kecilkan Tampilan"><i class="fa fa-expand"></i></a> 
        <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Perkecil / Perbesar"><i class="fa fa-chevron-down"></i></a>
      </div>
            <h3><i class="fa fa-plus-circle"></i> Tambah Satuan Bahan Baku </h3>
          </div>
          <div class="widget-content">
            <form action="action_tambah.php?cmd=tambahSatuanBB" method="POST" role="form">
              <div class="row">
                <div class="col-md-12">
                <div class="alert alert-warning alert-dismissable bottom-margin">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <i class="fa fa-exclamation-circle"></i> Tambahkan <u>Satuan bahan baku</u> anda disini. Sehingga anda dapat memilih <u>satuan</u> pada saat menambahkan bahan baku baru. <a href="satuan.php"> *Master Satuan* </a>
                  </div>
                  <div class="form-group">
                    <label>Nama Satuan</label>
                    <input type="text" name="uSatuan" class="form-control">
                  </div>
                </div>
              </div>
              <div class="text-right">
              <input type="reset" class="btn btn-default" value="Batal">
              <button class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="widget widget-blue">
      <div class="widget-title">
              <div class="widget-controls">
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Perbesar Tampilan"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Kecilkan Tampilan"><i class="fa fa-expand"></i></a> 
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Perkecil / Perbesar"><i class="fa fa-chevron-down"></i></a>
</div>
        <h3><i class="fa fa-bitbucket"></i><strong> Data Bahan Baku</strong></h3>
      </div>
      <div class="widget-content">
        <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Bahan Baku</th>
              <th>Harga Beli</th>
              <th>Stok</th>
              <th>Satuan</th>
              <th class="text-right">Tindakan</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT b.*, 
                (
                    SELECT phb.`harga_beli` FROM `pemasok_has_bahanbaku` phb WHERE phb.`bahanbaku_idBB`=b.`idBB` ORDER BY phb.`harga_beli` asc LIMIT 1
                  ) as harga_rendah ,
                  (
                    SELECT p.nama FROM pemasok p inner join pemasok_has_bahanbaku pp on p.idSupplier = pp.pemasok_idSupplier WHERE pp.bahanbaku_idBB=b.idBB ORDER BY pp.`harga_beli` asc LIMIT 1 
                  ) as namaPemasok , s.nama as satuan
              FROM `bahanbaku` b inner join `satuan` s 
                on b.idSatuan = s.idSatuan";

                $result = mysqli_query($link, $sql);
            if(!$result){
                die("<br/>SQL error_log(message)r : " . $sql);
            }
            $no=0;
            while ($row = mysqli_fetch_array($result)) {
              $no++;
              $harga_beli = "Rp " . number_format($row['harga_rendah'],0,',','.');
             
            $namaPemasoknya = "";
            $idBBnya = $row['idBB'];
            $hargaNya = $row['harga_rendah'];

            $sqlsql = "SELECT p.* 
                FROM `pemasok` p inner join pemasok_has_bahanbaku pp
                on p.idSupplier=pp.pemasok_idSupplier 
                WHERE pp.bahanbaku_idBB=".$idBBnya." and harga_beli=".$hargaNya ;
                // echo $sqlsql . "<br>";
            $res = mysqli_query($link, $sqlsql);
            if($res){
              while ($r = mysqli_fetch_array($res)) {
                $namaPemasoknya .= "*".$r['nama']."<br>";
              }
            } 
            ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $harga_beli; ?><br>
                  <span class="help-block" style="color:blue;">
                    <?php echo $namaPemasoknya; ?>
                  </span></td>
                <td><?php echo $row['stok']; ?>
                </td>
                <td><?php echo $row['satuan']; ?></td>
                <td class="text-right">
                  <a href="#modalUbah_<?php echo $row['idBB']; ?>" class="btn btn-round btn-default btn-xs" data-toggle="modal">Ubah</a>
                <a href="#modalHapus_<?php echo $row['idBB']; ?>" class="btn btn-round btn-danger btn-xs" data-toggle="modal">Hapus</a>
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

<!-- Pengulangan query, di while lg, modalnya ga kebaca -->
<?php
$sqlModal = "SELECT bb.idBB as idBB, bb.nama as nama, s.idSatuan as idSatuan, s.nama as satuan, bb.harga_beli as harga_beli, bb.stok as stok
                  FROM bahanbaku bb inner join satuan s
                    on bb.idSatuan = s.idSatuan
                  order by bb.idBB desc";
$resultModal = mysqli_query($link, $sqlModal);
if(!$resultModal){
    die("<br/>SQL error_log(message)r : " . $sqlModal);
}
$no=0;
while ($rowModal = mysqli_fetch_array($resultModal)) {
    $no++;
?>
<div class="modal fade" id="modalUbah_<?php echo $rowModal['idBB']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="widget widget-blue">
      <div class="widget-title">
        <div class="widget-controls">
          <a href="#" class="widget-control " data-dismiss="modal"><i class="fa fa-times-circle"></i></a>
        </div>
        <h3><i class="fa fa-ok-circle"></i> <strong>UBAH BAHAN BAKU: </strong> <?php echo $rowModal['nama']; ?></h3>
      </div>
      <div class="widget-content">
        <div class="modal-body">
          <form action="action_ubah.php?cmd=ubahBB" method="POST" role="form">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nama Bahan Baku</label>
                  <input type="text" name="uNama" value= "<?php echo $rowModal['nama']; ?>" class="form-control">
                </div>
              </div>
              <div class="col-md-8">
                  <div class="form-group">
                    <label>Stok (Jumlah)</label>
                    <input type="number" min="0" name="uStok" value= "<?php echo $rowModal['stok']; ?>" class="form-control" disabled="disabled">
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                    <label>Satuan</label>
                    <select name="uSatuan" class="form-control">
                      <?php
                      require './db.php';
                      $sqlJenis = "select * from satuan";
                      $resultJenis = mysqli_query($link, $sqlJenis);

                      while($rowJenis = mysqli_fetch_array($resultJenis)){
                        $selected='';
                        if($rowJenis['idSatuan'] == $rowModal['idSatuan']){
                          $selected='selected';
                        }
                        echo '<option '.$selected.' value= "'. $rowJenis['idSatuan'] .'">' . $rowJenis['nama'] . '</option>';
                      } 
                      ?>
                    </select>
                  </div>
              </div>
            </div>
            <div class="text-right">
            <input type="hidden" name="uID" value= "<?php echo $rowModal['idBB']; ?>">
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

<div class="modal fade" id="modalHapus_<?php echo $rowModal['idBB']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-blue">
        <div class="widget-title">
          <div class="widget-controls">
            <a href="#" class="widget-control " data-dismiss="modal"><i class="fa fa-times-circle"></i></a>
          </div>
          <h3><i class="fa fa-ok-circle"></i> <strong>HAPUS BAHAN BAKU: </strong> <?php echo $rowModal['nama']; ?></h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">
            <form action="action_hapus.php?cmd=hapusBB" method="POST" role="form">
              <div class="row">
                <div class="col-md-12">
                  <div class="alert alert-warning alert-dismissable bottom-margin">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                  <i class="fa fa-exclamation-circle"></i> <strong>Peringatan!</strong> Anda akan menghapus Bahan Baku : <u><?php echo $rowModal['nama'];?></u>. Data yang dihapus tidak dapat dikembalikan lagi.
                  </div>
                </div>
                <div class="col-md-12 text-right">
                  <input type="hidden" name="uID" value= "<?php echo $rowModal['idBB']; ?>">
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