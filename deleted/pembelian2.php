<?php
session_start(); 
?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  
        <!-- Hammer reload -->
          <script>
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

  <link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,700|Roboto+Condensed:300,400,700' rel='stylesheet' type='text/css'>

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
      <input type="text" class="top-search" placeholder="Search"/>
    </div>
    <div class="dropdown hidden-sm hidden-xs">
      <a href="#" data-toggle="dropdown" class="header-link"><i class="fa fa-bolt"></i> User Alerts <span class="badge alert-animated">5</span></a>

      <ul class="dropdown-menu dropdown-inbar dropdown-wide">
        <li><a href="#"><span class="label label-warning">1 min</span> <i class="fa fa-bell"></i> New Mail Received</a></li>
        <li><a href="#"><span class="label label-warning">4 min</span> <i class="fa fa-fire"></i> Server Crash</a></li>
        <li><a href="#"><span class="label label-warning">12 min</span> <i class="fa fa-flag-o"></i> Pending Alert</a></li>
        <li><a href="#"><span class="label label-warning">15 min</span> <i class="fa fa-smile-o"></i> User Signed Up</a></li>
      </ul>
    </div>
    <div class="dropdown hidden-sm hidden-xs">
      <a href="#" data-toggle="dropdown" class="header-link"><i class="fa fa-cog"></i> Settings</a>

      <ul class="dropdown-menu dropdown-inbar">
        <li><a href="#"><span class="label label-warning">2</span> <i class="fa fa-envelope"></i> Messages</a></li>
        <li><a href="#"><span class="label label-warning">4</span> <i class="fa fa-users"></i> Friends</a></li>
        <li><a href="#"><i class="fa fa-cog"></i> Account Settings</a></li>
        <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
      </ul>
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
        <li><a href="#"><span class="label label-warning">2</span> <i class="fa fa-envelope"></i> Messages</a></li>
        <li><a href="#"><span class="label label-warning">4</span> <i class="fa fa-users"></i> Friends</a></li>
        <li><a href="#"><i class="fa fa-cog"></i> Account Settings</a></li>
        <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
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
    <li>
      <a href="elements.html" data-toggle="tooltip" data-placement="right" title="" data-original-title="UI Elements">
        <span class="badge"></span>
        <i class="fa fa-code-fork"></i>
      </a>
    </li>
    <li>
      <a href="charts.html" data-toggle="tooltip" data-placement="right" title="" data-original-title="Charts">
        <i class="fa fa-bar-chart-o"></i>
      </a>
    </li>
    <li>
      <a href="table.html" data-toggle="tooltip" data-placement="right" title="" data-original-title="Tables">
        <i class="fa fa-th"></i>
      </a>
    </li>
    <li>
      <a href="grid.html" data-toggle="tooltip" data-placement="right" title="" data-original-title="Layouts">
        <i class="fa fa-font"></i>
      </a>
    </li>
    <li>
      <a href="calendar.html" data-toggle="tooltip" data-placement="right" title="" data-original-title="Calendar">
        <span class="badge">5</span>
        <i class="fa fa-calendar"></i>
      </a>
    </li>
    <li>
      <a href="maps.html" data-toggle="tooltip" data-placement="right" title="" data-original-title="Maps">
        <i class="fa fa-map-marker"></i>
      </a>
    </li>
    <li>
      <a href="page_search.html" data-toggle="tooltip" data-placement="right" title="" data-original-title="Extra Pages">
        <i class="fa fa-trophy"></i>
      </a>
    </li>
  </ul>
</div>
  <div class="sub-sidebar-wrapper">
  <ul>
    <li><a href="bom.php">Resep</a></li>
    <li class='current'><a href="pembelian.php">Pembelian BB</a></li>
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
  <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hilangkan"><i class="fa fa-times-circle"></i></a>
</div>
            <h3><i class="fa fa-group"></i><strong> Pembelian Dari </strong></h3>
          </div>
          <div class="widget-content">
            <form action="action_tambah.php?cmd=tambahNotaBeli" method="POST" role="form">
              <div class="row">
                <div class="col-md-12">
                <div class="alert alert-warning alert-dismissable bottom-margin">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <i class="fa fa-exclamation-circle"></i><strong> Pertama, Buat Nota Pembelian.</strong> Kemudian isi pembelian bahan baku yang akan dibeli dengan cara pilih "Detail"
                  </div>
                  <div class="form-group">
                    <label> Pemasok </label>
                    <select id="uPemasok" class="form-control" name="uPemasok">
                    <option value=""> - - DAFTAR PEMASOK - - </option>
                    <?php
                    require './db.php';
                    $sql = "select * from pemasok";
                    $result = mysqli_query($link, $sql);

                    while($row = mysqli_fetch_array($result)){
                      echo '<option value= "'. $row['idSupplier'] .'">' . $row['nama'] . '</option>';
                    } 
                    ?>
                      </select>
                  </div>
                  <p><strong> Tanggal Pembelian </strong></p>
                    <div class="input-group">
                    <input type="text" value="<?php echo date('d / m / Y'); ?>" name="uBeli" class="form-control input-datepicker" disabled="disabled">
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
                    <input type="text" name="uBayar" class="form-control input-datepicker">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  </div>
                  <span class="help-block">*Jika <strong>Belum Lunas</strong>, kosongi saja</span><br>
                </div>
              </div>
              <div class="text-right">
              <button class="btn btn-primary"> Buat Nota Pembelian </button>
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
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tampilkan Ulang"><i class="fa fa-refresh"></i></a>
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
              <th>Tindakan</th>
            </tr>
          </thead>
          <tbody>
          <?php
          require 'db.php'; 
          $sql = "SELECT nb.idBeli as id, nb.tgl_beli as tgl_beli, nb.tgl_bayar as tgl_bayar, nb.status_bayar as status_bayar, nb.total_harga as total_harga, p.nama as nama
                from nota_beli nb inner join pemasok p
                on nb.supplier_idSupplier = p.idSupplier";

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
              <td><?php echo $row['tgl_beli']; ?></td>
              <td><?php 
              if($row['status_bayar']==0){
                ?>
                <a href="#modalBayar_<?php echo $row['id']; ?>" class="btn btn-warning btn-xs" data-toggle="modal">Belum Lunas</a><?php
              }
              else{
                ?>
                <a href="#" class="btn btn-success btn-xs" data-toggle="modal">Lunas</a><?php
              } 
              ?></td>
              <td><?php echo $row['tgl_bayar']; ?></td>
              <td><?php echo $harga; ?></td>
              <td class="text-right">
                <a href="detailPembelian.php?<?php echo $row['id']; ?>" class="btn btn-round btn-info btn-xs">Detail</a>
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
  $sql = "SELECT nb.idBeli as id, nb.tgl_beli as tgl_beli, nb.tgl_bayar as tgl_bayar, nb.status_bayar as  status_bayar, nb.total_harga as total_harga, p.nama as nama
      from nota_beli nb inner join pemasok p
      on nb.supplier_idSupplier = p.idSupplier";
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
                <div class="col-md-12">
                  <input type="hidden" name="uID" value= "<?php echo $row['id']; ?>">
                  <button class="btn btn-danger">Hapus Data</button>
                  <button class="btn btn-default" data-dismiss="modal">Batal</button>
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
          <h3><i class="fa fa-ok-circle"></i> <strong>Lunasi Pembelian Tanggal : </strong> <?php echo $row['tgl_beli']; ?></h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">
            <form action="action_hapus.php?cmd=hapusKaryawan" method="POST" role="form">
              <div class="row">
                <div class="col-md-12">
                  <p><strong> Tanggal Pembayaran </strong></p>
                    <div class="input-group">
                    <input type="text" name="uUpdateBayar" class="form-control input-datepicker">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div><br>  
                </div>
                <div class="col-md-12">
                  <input type="hidden" name="uID" value= "<?php echo $row['idTenagakerja']; ?>">
                  <button class="btn btn-primary"> Ubah </button>
                  <button class="btn btn-default" data-dismiss="modal">Batal</button>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
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
<script type="text/javascript">
    function loading(name){
      $(name).html('<br><img src="assets/images/load.gif" width="30px"><br>');
    } 

    function tampilResep(idKerupuk){
      if(idKerupuk != ""){
        loading('#tabelTampilResep');
        $.post('action_tampung.php', 
        {idKerupuk : idKerupuk, cmd : 'tampilResep' }, 
        function (data) {
          // alert(data);
          $('#tabelTampilResep').html(data);
        });

        $.post('action_tampung.php', 
        {idKerupuk : idKerupuk, cmd : 'tampilModalResep' }, 
        function (data) {
          // alert(data);
          $('#tabelModalResep').html(data);
        });
      }
    }

</script>
</body>
</html>