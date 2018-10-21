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
    <li class="current"><a href="pembelian.php" style="font-size: 0.94em">Pembelian Bahan Baku</a></li>
    <li><a href="spk.php" style="font-size: 0.985em">Surat Perintah Kerja</a></li>
  </ul>
</div>
  </div>
  <div class="main-content">
  <ol class="breadcrumb">
  <li><a href="#">Menu Produksi</a></li>
  <li class="active">Pembelian Bahan Baku</li>
  </ol>
  <!-- not necessary
    <div class="alert alert-warning alert-dismissable bottom-margin">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <i class="fa fa-exclamation-circle"></i> <strong>Welcome!</strong> This is a dashboard of the powerful admin template.
    </div>
  -->
    <div class="row">
      <div class="col-md-4">
        <div class="widget widget-blue">
          <div class="widget-title">
            <div class="widget-controls">
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Perbesar Tampilan"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Kecilkan Tampilan"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Perkecil / Perbesar"><i class="fa fa-chevron-down"></i></a>
</div>
            <h3><i class="fa fa-group"></i><strong> Nota Pembelian </strong></h3>
          </div>
          <div class="widget-content">
            <form action="action_tambah.php?cmd=tambahNotaBeli" method="POST" role="form">
              <div class="row">
                <div class="col-md-12">
                 <!-- not necessary
                <div class="alert alert-warning alert-dismissable bottom-margin">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>                  
                  <i class="fa fa-exclamation-circle"></i><strong> Pertama, Buat Nota Pembelian.</strong> Kemudian isi pembelian bahan baku yang akan dibeli dengan cara pilih "Detail"
                  </div> -->
                  <div class="form-group">
                    <label> Pemasok </label>
                    <select id="uPemasok" class="form-control" name="uPemasok">
                    <option value=""> - - DAFTAR PEMASOK - - </option>
                    <?php
                    $sql = "select * from pemasok where deleted=0 order by nama asc";
                    $result = mysqli_query($link, $sql);

                    while($row = mysqli_fetch_array($result)){
                      echo '<option value= "'. $row['idSupplier'] .'">' . $row['nama'] . '</option>';
                    } 
                    ?>
                      </select>
                  </div>
                  <p><strong> Tanggal Pembelian </strong></p>
                    <div class="input-group">
                    <input type="date" name="uBeli" value="<?php echo date('Y-m-d'); ?>" class="form-control" disabled="disabled">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div><br>       
                  <div class="form-group">
                    <label> Status Pembayaran </label>
                    <select name="uStatus" class="form-control">
                      <option value="1"> Lunas </option>
                      <option value="0"> Belum Lunas </option>
                    </select>
                  </div>
                <p><strong> Tanggal Pembayaran </strong></p>
                  <div class="input-group">
                    <input type="date" name="uBayar" class="form-control">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  </div>
                  <span class="help-block">*Jika <strong>Belum Lunas</strong>, kosongi saja</span><br>
                </div>
              </div>
              <div class="text-right">
              <button type="submit" class="btn btn-iconed btn-primary"><i class="fa fa-plus-circle"></i> Buat Nota Pembelian </button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <div class="widget widget-blue">
          <div class="widget-title">
              <div class="widget-controls">
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Perbesar Tampilan"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Kecilkan Tampilan"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Perkecil / Perbesar"><i class="fa fa-chevron-down"></i></a>
</div>
        <h3><i class="fa fa-suitcase"></i></i><strong> DAFTAR PEMBELIAN </strong></h3>
      </div>
      <div class="widget-content">
        <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Pemasok</th>
              <th>Tanggal Beli</th>
              <th>Status Bayar</th>
              <th>Tanggal Bayar</th>
              <th>Total Harga</th>
              <th>SPK</th>
              <th>Tindakan</th>
            </tr>
          </thead>
          <tbody>
          <?php
          // $sql = "SELECT nb.idBeli as id, nb.tgl_beli as tgl_beli, nb.tgl_bayar as tgl_bayar, nb.status_bayar as status_bayar, nb.total_harga as total_harga, p.nama as nama,
          //   (
          //     SELECT sum(mn2.jumlah*bb2.harga_beli) as jumlah
          //     from nota_beli nb2 inner join nota_beli_has_bahanbaku mn2
          //     on nb2.idBeli = mn2.nota_beli_idBeli
          //     inner join bahanbaku bb2
          //     on mn2.bahanbaku_idBB = bb2.idBB
          //     where nb2.idBeli=nb.idBeli
          //   ) as total_harga_seluruh 
          //   from nota_beli nb inner join pemasok p
          //   on nb.supplier_idSupplier = p.idSupplier
          //   order by id desc";
          $sql = "SELECT nb.idBeli as id, nb.tgl_beli as tgl_beli, nb.tgl_bayar as tgl_bayar, nb.status_bayar as status_bayar, nb.total_harga as total_harga, p.nama as nama 
            from nota_beli nb inner join pemasok p
            on nb.supplier_idSupplier = p.idSupplier
            where nb.deleted=0
            order by id desc";

          $result = mysqli_query($link, $sql);
          if(!$result){
              die("<br/>SQL error_log(message)r : " . $sql);
          }
          $no=0;
          $status ='';
          while ($row = mysqli_fetch_array($result)) {
            $no++;
            $harga= "Rp " . number_format($row['total_harga'],0,',','.');
            $_SESSION['nama']=$row['nama'];
          ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $row['nama']; ?></td>
              <td><?php echo date('d - M - Y', strtotime($row['tgl_beli']));?></td>
              <td><?php 
              if($row['status_bayar']==0){
                ?>
                <a href="#modalBayar_<?php echo $row['id']; ?>" class="btn btn-warning btn-xs" data-toggle="modal">Belum Lunas</a><?php
              }
              else{
                ?>
                <a href="#modalBayar_<?php echo $row['id']; ?>" class="btn btn-success btn-xs" data-toggle="modal">Lunas</a><?php
              } 
              ?></td>
              <td><?php echo $row['tgl_bayar']; ?></td>
              <td><?php echo $harga; ?></td>
              <td>
                <?php
                $idNotaBeli = $row['id'];
                $spk="-";
                $sqlspk = "
                  SELECT *
                  FROM spk
                  WHERE idSpk in (
                    SELECT spk_idSpk 
                    FROM nota_beli_has_spk 
                    WHERE nota_beli_idBeli={$idNotaBeli}
                  )
                ";
                $resspk = mysqli_query($link, $sqlspk);
                $jml = mysqli_num_rows($resspk);
                if($jml > 0){
                  while($rspk = mysqli_fetch_array($resspk)){
                    $spk="ID SPK: ". $rspk['idSpk'] . "<br> " . date('d - M - Y', strtotime($rspk['tgl_spk']));
                  } 
                }
                echo $spk;
                ?> 
              </td>
              <td class="text-right">
                <a href="detailPembelian.php?id=<?php echo $row['id']; ?>" class="btn btn-round btn-info btn-xs">Detail</a>
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
  <!-- Pengulangan query, di while lg, modalnya ga kebaca -->
  <?php
  $sql = "SELECT nb.idBeli as id, nb.tgl_beli as tgl_beli, nb.tgl_bayar as tgl_bayar, nb.status_bayar as status_bayar, nb.total_harga as total_harga, p.nama as nama 
    from nota_beli nb inner join pemasok p
    on nb.supplier_idSupplier = p.idSupplier
    where nb.deleted=0";
  $result = mysqli_query($link, $sql);
  if(!$result){
      die("<br/>SQL error_log(message)r : " . $sql);
  }
  $no=0;
  while ($row = mysqli_fetch_array($result)) {
      $no++;
  ?>

<div class="modal fade" id="modalHapus_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-blue">
        <div class="widget-title">
          <div class="widget-controls">
            <a href="#" class="widget-control " data-dismiss="modal"><i class="fa fa-times-circle"></i></a>
          </div>
          <h3><i class="fa fa-ok-circle"></i> <strong>HAPUS NOTA TANGGAL: </strong> <?php echo $row['tgl_beli']; ?></h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">
            <form action="action_hapus.php?cmd=hapusNotaBeli" method="POST" role="form">
              <div class="row">
                <div class="col-md-12">
                  <div class="alert alert-warning alert-dismissable bottom-margin">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                  <i class="fa fa-exclamation-circle"></i> <strong>Peringatan!</strong> Anda akan menghapus Nota dari : <u><?php echo $row['nama'];?></u> (<?php echo $row['tgl_beli'];?>). Data yang dihapus tidak dapat dikembalikan lagi.
                  </div>
                </div>
                <div class="col-md-12 text-right">
                  <input type="hidden" name="uID" value= "<?php echo $row['id']; ?>">
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

<div class="modal fade" id="modalBayar_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-blue">
        <div class="widget-title">
          <div class="widget-controls">
            <a href="#" class="widget-control " data-dismiss="modal"><i class="fa fa-times-circle"></i></a>
          </div>
          <h3><i class="fa fa-ok-circle"></i> <strong>Ubah Pembayaran : </strong> <?php echo $row['nama']; ?> / <?php echo $row['tgl_beli']; ?></h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">
            <form action="action_ubah.php?cmd=ubahPelunasan" method="POST" role="form">
              <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                    <label> Status Pembayaran </label>
                    <select name="uStatus" class="form-control">
                        <option value="1" <?php if($row['status_bayar'] == 1){ echo "selected"; } ?>>Lunas</option>
                        <option value="0" <?php if($row['status_bayar'] == 0){ echo "selected"; } ?>>Belum Lunas</option>
                      </select>
                  </div>
                  <p><strong> Tanggal Pembayaran </strong></p>
                    <div class="input-group">
                    <input type="date" name="uLunas" class="form-control">
                    <!-- <input type="text" name="uUpdateBayar" class="form-control input-datepicker"> -->
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div><br>  
                </div>
                <div class="col-md-12 text-right">
                  <input type="hidden" name="uID" value= "<?php echo $row['id']; ?>">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary"> Ubah </button> 
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