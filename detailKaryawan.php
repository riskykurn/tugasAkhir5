<?php
session_start();
require 'db.php'; 

if($_SESSION['umkm_idumkm'] == '' || $_SESSION['umkm_idumkm'] == null || $_SESSION['login'] == '' || $_SESSION['login'] == null){
  $_SESSION['pesan'] = "Anda Belum Login";
  header("Location: login.php");
  exit();
}

$sqlData="SELECT jp.*, pp.idProsesproduksi as idProses, pp.nama as namaProses, s.idSpk as idSpk
          FROM jadwalproduksi jp inner join prosesproduksi pp
            on jp.prosesproduksi_idProsesproduksi = pp.idProsesproduksi
          inner join spk s
            on s.idSpk = jp.spk_idSpk
          where jp.idJadwalproduksi =$_GET[id]";
$res= mysqli_query($link,$sqlData); 
$r_data=mysqli_fetch_array($res);
$idJadwalproduksi = $r_data['idJadwalproduksi'];
$namaProses = $r_data['namaProses'];
$idSpk = $r_data['idSpk'];
?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  
        <!-- Hammer reload --
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
  <h1> MENU PRODUKSI : PENUGASAN KARYAWAN</h1>
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
    <ul>
    <li><a href="detailPenjadwalan.php?id=<?php echo $idSpk; ?>">Penjadwalan Produksi</a></li>
      <ul><li class='current'><a href="#">Penugasan Karyawan</a></li></ul>
    </ul>  
  </ul>
</div>
  </div>
  <div class="main-content">
  <ol class="breadcrumb">
  <li><a href="#">Menu Produksi</a></li>
  <li><a href="spk.php">SPK</a></li>
  <li><a href="detailPenjadwalan.php?id=<?php echo $idSpk; ?>">Penjadwalan Produksi</a></li>
  <li class="active">Penugasan Karyawan</li>
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
        <h3><i class="fa fa-gavel"></i></i><strong> PENUGASAN KARYAWAN PADA PROSES: </strong><?php echo $r_data['namaProses']; ?></h3>
      </div>
      <div class="widget-content">
      <div>
      <a href="detailPenjadwalan.php?id=<?php echo $idSpk; ?>" class="btn btn-iconed btn-default"  ><i class="fa fa-arrow-circle-o-left"></i> Kembali </a>
      <?php 
        if($r_data['tgl_selesai_real'] == NULL){
          ?>
          <a href="#modalKaryawan" class="btn btn-iconed btn-primary" data-toggle="modal"><i class="fa fa-plus-circle"></i> Penugasan Karyawan </a><?php
        }
        else{?>
          <a href="#modalKaryawan" class="btn btn-iconed btn-primary" data-toggle="modal" disabled="disabled"><i class="fa fa-plus-circle"></i> Penugasan Karyawan </a><?php
        }
      ?>
      <a href="#modalRekomendasiKaryawan" data-toggle="modal">(<i class="fa fa-eye"></i> Lihat Rekomendasi Karyawan )</a>
      </div><br>
        <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Karyawan</th>
              <th>Catatan</th>
              <th class="text-right">Tindakan</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $sql = "SELECT tk.idTenagakerja as idKaryawan, tk.nama as namaKaryawan, jp.idJadwalproduksi as idJadwal, mn.catatan as catatan
                  FROM tenagakerja tk inner join  tenagakerja_has_jadwalproduksi mn
                    on tk.idTenagakerja = mn.tenagakerja_idTenagakerja
                  inner join jadwalproduksi jp
                    on jp.idJadwalproduksi = mn.jadwalproduksi_idJadwalproduksi
                  where jp.idJadwalproduksi=$_GET[id]";

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
              <td><?php echo $row['namaKaryawan']; ?></td>
              <td><?php echo $row['catatan']; ?></td>
              <td class="text-right">
              <?php 
                if($r_data['tgl_selesai_real'] == NULL){
                  ?>
                  <a href="#modalUbah_<?php echo $no; ?>" class="btn btn-round btn-default btn-xs" data-toggle="modal">Ubah</a>
                  <a href="#modalHapus_<?php echo $no; ?>" class="btn btn-round btn-danger btn-xs" data-toggle="modal">Hapus</a><?php
                }
                else{?>
                  <span class="help-block" style="font-weight: bold"> *Proses ini sudah dijadwalkan* </span><?php
                }
              ?>
              </td> 
            </tr>
          <?php } ?>
          </tbody>
        </table><br>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
  </div>

<?php
  $sql = "SELECT tk.idTenagakerja as idKaryawan, tk.nama as namaKaryawan, jp.idJadwalproduksi as idJadwal, mn.catatan as catatan
  FROM tenagakerja tk inner join  tenagakerja_has_jadwalproduksi mn
    on tk.idTenagakerja = mn.tenagakerja_idTenagakerja
  inner join jadwalproduksi jp
    on jp.idJadwalproduksi = mn.jadwalproduksi_idJadwalproduksi
  where jp.idJadwalproduksi=$_GET[id]";
  $result = mysqli_query($link, $sql);
   
  $no=0;
  while ($row = mysqli_fetch_array($result)) {
      $no++;
  ?>
  <div class="modal fade" id="modalHapus_<?php echo $no; ?>" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-blue">
        <div class="widget-title">
          <div class="widget-controls">
            <a href="#" class="widget-control " data-dismiss="modal"><i class="fa fa-times-circle"></i></a>
          </div>
          <h3><i class="fa fa-ok-circle"></i> Hapus Karyawan: <strong><?php echo $row['namaKaryawan']; ?></strong></h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">
            <form action="action_hapus.php?cmd=hapusDetailKaryawan" method="POST" role="form">
              <div class="row">
                <div class="col-md-12">
                  <div class="alert alert-warning alert-dismissable bottom-margin">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                  <i class="fa fa-exclamation-circle"></i> <strong>Peringatan!</strong> Anda akan menghapus : <u><?php echo $row['namaKaryawan'];?></u> dari proses <?php echo $r_data['namaProses']; ?>. Apakah anda yakin?
                  </div>
                </div>
                <div class="col-md-12 text-right">
                  <input type="hidden" name="uIDKaryawan" value= "<?php echo $row['idKaryawan']; ?>">
                  <input type="hidden" name="uIDJadwal" value= "<?php echo $idJadwalproduksi; ?>">
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

  <div class="modal fade" id="modalUbah_<?php echo $no; ?>" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-blue">
        <div class="widget-title">
          <div class="widget-controls">
            <a href="#" class="widget-control " data-dismiss="modal"><i class="fa fa-times-circle"></i></a>
          </div>
          <h3><i class="fa fa-ok-circle"></i> Ubah Karyawan: <strong><?php echo $row['namaKaryawan']; ?></strong></h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">
            <form action="action_ubah.php?cmd=ubahDetailKaryawan" method="POST" role="form">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Catatan</label>
                    <input type="text" name="uCatatan" class="form-control" value="<?php echo $row['catatan']; ?>">
                    <span class="help-block">*Anda dapat mengosongkan ini jika tidak dibutuhkan</span>
                  </div> 
                </div>
              </div>
              <div class="text-right">
              <input type="hidden" name="uIDKaryawan" value= "<?php echo $row['idKaryawan']; ?>">
              <input type="hidden" name="uIDJadwal" value= "<?php echo $idJadwalproduksi; ?>">
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
<?php } ?>

<div class="modal fade" id="modalRekomendasiKaryawan" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-blue">
        <div class="widget-title">
          <div class="widget-controls">
            <a href="#" class="widget-control " data-dismiss="modal"><i class="fa fa-times-circle"></i></a>
          </div>
          <h3><i class="fa fa-ok-circle"></i><strong> Rekomendasi Pemilihan Karyawan </strong></h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr style="text-align: center;font-weight: bold;">
                      <td>No</td>
                      <td>Nama Karyawan</td>
                      <td>Menangani Proses</td>
                      <td>Total Pekerjaan<br> di SPK ini</td>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $sql = "SELECT tk.idTenagakerja as idKaryawan, tk.nama as namaKaryawan, jp.idJadwalproduksi as idJadwal, mn.catatan as catatan, count(*) as jumlah
                    FROM tenagakerja tk inner join  tenagakerja_has_jadwalproduksi mn
                      on tk.idTenagakerja = mn.tenagakerja_idTenagakerja
                    inner join jadwalproduksi jp
                      on jp.idJadwalproduksi = mn.jadwalproduksi_idJadwalproduksi
                    inner join spk s
                      on s.idSpk = jp.spk_idSpk 
                    where s.idSpk = $idSpk
                    GROUP by mn.tenagakerja_idTenagakerja
                    order by jumlah asc";

                      $result = mysqli_query($link, $sql);
                  if(!$result){
                      die("<br/>SQL error_log(message)r : " . $sql);
                  }
                  $no=0;
                  while ($row = mysqli_fetch_array($result)) {
                    $no++;
                    $noo=0;
                    $idKaryawan=$row['idKaryawan'];
                    $namaProses='';
                    $namaKary='';

                    $sqlsql = "SELECT tk.nama as namaKaryawan, pp.nama as nama
                    FROM jadwalproduksi jp inner join prosesproduksi pp
                      on jp.prosesproduksi_idProsesproduksi = pp.idProsesproduksi
                    inner join spk s
                        on s.idSpk = jp.spk_idSpk
                    inner join tenagakerja_has_jadwalproduksi mn
                      on mn.jadwalproduksi_idJadwalproduksi = jp.idJadwalproduksi
                    inner join tenagakerja tk
                      on tk.idTenagakerja = mn.tenagakerja_idTenagakerja
                    where s.idSpk = $idSpk and tk.idTenagakerja = $idKaryawan";

                    $res = mysqli_query($link, $sqlsql);
                    if($res){
                      while ($r = mysqli_fetch_array($res)) {
                        $noo++;
                        $namaProses .= $noo . ". " .$r['nama']."<br>";
                      }
                    } 
                  ?>
                    <tr style="text-align: center;">
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['namaKaryawan']; ?></td>
                      <td><span class="help-block" style="font-weight: bold"><?php echo $namaProses; ?></span></td>
                      <td><?php echo $row['jumlah']; ?> Proses</td>
                    </tr>
                  <?php } ?>
                  </tbody>                    
                </table>
                <span class="help-block" style="color: green;">*Pilih karyawan yang total kerjanya sedikit, agar pekerjaan terbagi rata oleh karyawan yang ada</span><br>
                </div>
              <div class="text-right">
              <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalKaryawan" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-blue">
        <div class="widget-title">
          <div class="widget-controls">
            <a href="#" class="widget-control " data-dismiss="modal"><i class="fa fa-times-circle"></i></a>
          </div>
          <h3><i class="fa fa-ok-circle"></i> <strong> Tambah Penugasan Karyawan </strong> </h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">
            <form action="action_tambah.php?cmd=tambahDetailKaryawan" method="POST" role="form">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label> Karyawan </label>
                    <select class="form-control" name="uIDKaryawan">
                    <option value=""> - - DAFTAR KARYAWAN - - </option>
                    <?php
                    $sqlBB = "SELECT * from tenagakerja
                    where idTenagakerja not in (SELECT tenagakerja_idTenagakerja from tenagakerja_has_jadwalproduksi where jadwalproduksi_idJadwalproduksi=$idJadwalproduksi)";
                    $resultBB = mysqli_query($link, $sqlBB);

                    while($rowBB = mysqli_fetch_array($resultBB)){
                      echo '<option value= "'. $rowBB['idTenagakerja'] .'">' . $rowBB['nama'] . '</option>';
                    } 
                    ?>
                      </select>
                  </div> 
                  <div class="form-group">
                    <label>Catatan</label>
                    <input type="text" name="uCatatan" class="form-control">
                    <span class="help-block">*Anda dapat mengosongi ini jika tidak membutuhkan</span>
                  </div>    
                <div class="col-md-12 text-right">
                  <input type="hidden" name="uIDJadwal" value= "<?php echo $idJadwalproduksi; ?>">
                  <button class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button class="btn btn-primary"> Tambahkan </button>
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