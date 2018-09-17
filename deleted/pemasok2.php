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
  <h1>Menu Utama: Pemasok</h1>
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
    <li class='current'><a href="pemasok.php">Pemasok</a></li>
    <li><a href="karyawan.php">Karyawan</a></li>
    <li><a href="bahanbaku.php">Bahan Baku</a></li>
    <li><a href="kerupuk.php">Kerupuk</a></li>
    <li><a href="mesin.php">Mesin</a></li>
    <li><a href="lahan.php">Sewa Lahan</a></li>
    <li><a href="form_file_upload.html">Harga Listrik<br>(Saat ini)</a></li>
  </ul>
</div>
  </div>
  <div class="main-content">
  <ol class="breadcrumb">
  <li><a href="#">Menu Utama</a></li>
  <li class="active">Pemasok</li>
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
            <h3><i class="fa fa-plus-circle"></i> Tambah Pemasok</h3>
          </div>
          <div class="widget-content">
            <form action="action_tambah.php?cmd=tambahPemasok" method="POST" role="form">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Nama Pemasok</label>
                    <input type="text" name="uNama" class="form-control">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="uAlamat" class="form-control">
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                      <label>Kota</label>
                      <input type="text" name="uKota" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                      <label>No. Telepon</label>
                      <input type="number" min="0" name="uTelepon" class="form-control">
                    </div>
                </div>
              </div>
              <button class="btn btn-primary">Simpan</button>
              <input type="reset" class="btn btn-default" value="Batal">
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
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tampilkan Ulang"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Perkecil / Perbesar"><i class="fa fa-chevron-down"></i></a>
</div>
        <h3><i class="fa fa-group"></i><strong> Data Pemasok</strong></h3>
      </div>
      <div class="widget-content">
        <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Pemasok</th>
              <th>Alamat</th>
              <th>Kota</th>
              <th>No. Telepon</th>
              <th class="text-right">Tindakan</th>
            </tr>
          </thead>
          <tbody>
          <?php
          require 'db.php'; 
          $sql = "SELECT * FROM pemasok";

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
              <td><?php echo $row['nama']; ?></td>
              <td><?php echo $row['alamat']; ?></td>
              <td><?php echo $row['kota']; ?></td>
              <td><?php echo $row['telp']; ?></td>
              <td class="text-right">
                <a href="#" class="btn btn-round btn-default btn-xs">Ubah</a>
                <a href="#" class="btn btn-round btn-danger btn-xs remove-tr">Hapus</a>
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

<div class="modal fade" id="modalFormStyle1" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-blue">
        <div class="widget-title">
          <div class="widget-controls">
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
  <div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
    <ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
      <li class="dropdown-header">Set Widget Color</li>
      <li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
      <li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
      <li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
      <li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
      <li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
    </ul>
  </div>
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
  <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
</div>
          <h3><i class="fa fa-ok-circle"></i> Modal Form</h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">
            <div class="form-group">
              <label>Regular Input</label>
              <input type="email" class="form-control" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox"> Remember me
                </label>
              </div>
            </div>
            <button type="button" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalFormStyle2" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle2Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-blue">
        <div class="widget-title">
          <div class="widget-controls">
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
  <div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
    <ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
      <li class="dropdown-header">Set Widget Color</li>
      <li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
      <li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
      <li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
      <li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
      <li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
    </ul>
  </div>
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
  <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
</div>
          <h3><i class="fa fa-ok-circle"></i> Horizontal Form</h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">

            <form action="" role="form" class="form-horizontal">
              <div class="form-group">
                <label class="col-md-3 control-label">Username</label>
                <div class="col-md-9">
                  <input type="email" class="form-control" placeholder="Enter email">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Password</label>
                <div class="col-md-9">
                  <input type="password" class="form-control" placeholder="Enter password">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-offset-3 col-md-9">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Remember me
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-offset-3 col-md-9">
                  <button type="button" class="btn btn-primary">Submit</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalFormStyle3" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle3Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-blue">
        <div class="widget-title">
          <div class="widget-controls">
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
  <div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
    <ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
      <li class="dropdown-header">Set Widget Color</li>
      <li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
      <li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
      <li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
      <li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
      <li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
    </ul>
  </div>
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
  <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
</div>
          <h3><i class="fa fa-ok-circle"></i> Inline Form</h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">
            <form class="form-inline" role="form">
              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail2">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label class="sr-only" for="exampleInputPassword2">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
              </div>
              <button type="submit" class="btn btn-primary">Sign in</button>
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
</body>
</html>