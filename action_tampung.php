<?php
session_start();
require './db.php';
$cmd=$_POST['cmd'];

switch ($cmd){
//TAMPIL BOM / RESEP
case "tampilBOM":
	$idKerupuk = $_POST['idKerupuk'];
	?>
  <form action="action_tambah.php?cmd=tambahBOM" method="POST" role="form">
  <div class="row">
    <div class="col-md-12">
    <div class="alert alert-warning alert-dismissable bottom-margin">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <i class="fa fa-exclamation-circle"></i><strong> Kedua, </strong> Isi resep / komposisi dari kerupuk anda disini, dengan cara menambahkan bahan baku apa saja untuk membuat kerupuk tersebut.
      </div>
      <div class="form-group">
        <label> Kerupuk </label>
          <?php
          $nama="";
        $sql = "select * from barang where idBarang=".$idKerupuk;
        $result = mysqli_query($link, $sql);

        while($row = mysqli_fetch_array($result)){
          $nama=$row['nama'];
        } 
        ?>
        <input class="form-control" disabled="disabled" value="<?php echo $nama; ?>">
        <input type="hidden" name="uKerupuk" value="<?php echo $nama; ?>">
        <input type="hidden" name="uIDKerupuk" value="<?php echo $idKerupuk; ?>">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label> Membutuhkan Bahan Baku </label>
        <select class="form-control" id="uBB" name="uBB" onchange="tarikSatuan($('#uBB').val());">
        <?php
        $sql = "SELECT * from bahanbaku";
        $result = mysqli_query($link, $sql);

        while($row = mysqli_fetch_array($result)){
          echo '<option value= "'. $row['idBB'] .'">' . $row['nama'] . '</option>';
        } 
        ?>
          </select>
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label> Jumlah </label>
        <input type="number" min="0" name="uJumlah" class="form-control">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label> (Satuan) </label>
        <input type="text" name="uSatuan" id="uSatuan" class="form-control" disabled="disabled">
      </div>
    </div>
  </div>
  <div class="text-right">
  <input onclick="$('#divMengisiBOM').hide(500);" type="reset" class="btn btn-default" value="Batal">
  <button type="submit" class="btn btn-primary">Simpan</button>
  </div>
  </form>
  <script type="text/javascript"> 
    tarikSatuan($('#uBB').val());

    function tarikSatuan(idBB){
      if(idBB != ""){ 
        $.post('action_tampung.php', 
        {idBB : idBB, cmd : 'tarikSatuan' }, 
        function (data) {
          // alert(data);
          $('#uSatuan').val(data);
        }); 
      }
    }
  </script>
	<?php
break;

case "tarikSatuan":
    $idBB = $_POST['idBB'];
    $sql = "SELECT bb.idBB as idBB, bb.nama as nama, s.idSatuan as idSatuan, s.nama as satuan, bb.harga_beli as harga_beli, bb.stok as stok
                  FROM bahanbaku bb inner join satuan s
                    on bb.idSatuan = s.idSatuan where idBB=$idBB";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    echo $row['satuan'];
break;

//TAMPIL RESEP (TABEL BAWAH)
case "tampilResep":
  $idKerupuk = $_POST['idKerupuk'];
  ?>
  <div class="table-responsive">
  <div class="form-group">
    <label class="col-md-4 control-label"> KERUPUK : </label>
      <?php
    $sql = "SELECT * from barang where idBarang=".$idKerupuk;
    $result = mysqli_query($link, $sql);

    while($row = mysqli_fetch_array($result)){?>
      <input class="form-control" name="uKerupuk" disabled="disabled" value="<?php echo $row['nama']." (1 bal)"; ?>">
      <?php 
    } 
    ?>
  </div>
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th> No </th>
            <th> Membutuhkan Bahan Baku </th>
            <th> Jumlah </th>
            <th class="text-right">Tindakan</th>
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
                  where b.idBarang=".$idKerupuk;

              $result = mysqli_query($link, $sql);
          if(!$result){
              die("<br/>SQL error_log(message)r : " . $sql);
          }
          $no=0;
          $status ='';
          while ($row = mysqli_fetch_array($result)) {
              $no++;
          ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $row['nama_bb']; ?></td>
              <td><?php echo $row['jumlah']." ". $row['satuan']; ?></td>
              <td class="text-right">
                <a href="#modalUbah_<?php echo $no; ?>" class="btn btn-round btn-default btn-xs" data-toggle="modal">Ubah</a>
              <a href="#modalHapus_<?php echo $no; ?>" class="btn btn-round btn-danger btn-xs" data-toggle="modal">Hapus</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      </div>
      <?php
break;

case "tampilModalResep": 
  $idKerupuk = $_POST['idKerupuk'];
  $sql = "SELECT bb.idBB as idBB,b.idBarang as idKerupuk,bb.nama as nama, mn.jumlah as jumlah
  FROM bahanbaku_has_barang mn INNER JOIN bahanbaku bb
  on mn.bahanbaku_idBB = bb.idBB
  INNER JOIN barang b
  on b.idBarang = mn.barang_idBarang
  WHERE b.idBarang =".$idKerupuk;
  $result = mysqli_query($link, $sql);
  if(!$result){
      die("<br/>SQL error_log(message)r : " . $sql);
  }
  $no=0;
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
          <h3><i class="fa fa-ok-circle"></i> UBAH JUMLAH = <strong><?php echo $row['nama']; ?></strong> DARI RESEP </h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">
            <form action="action_ubah.php?cmd=ubahBOM" method="POST" role="form">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Nama Bahan Baku</label>
                    <input type="text" name="uNama" disabled="disabled" value= "<?php echo $row['nama']; ?>" class="form-control">
                    <input type="hidden" name="uIDKerupuk" value= "<?php echo $row['idKerupuk']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" min="0" name="uJumlah" value= "<?php echo $row['jumlah']; ?>" class="form-control">
                    <input type="hidden" name="uIDBB" value= "<?php echo $row['idBB']; ?>">
                  </div>
                </div>
              </div>
              <div class="text-right">
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

  <div class="modal fade" id="modalHapus_<?php echo $no; ?>" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-blue">
        <div class="widget-title">
          <div class="widget-controls">
            <a href="#" class="widget-control " data-dismiss="modal"><i class="fa fa-times-circle"></i></a>
          </div>
          <h3><i class="fa fa-ok-circle"></i> HAPUS = <strong><?php echo $row['nama']; ?></strong> DARI RESEP </h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">
            <form action="action_hapus.php?cmd=hapusBOM" method="POST" role="form">
              <div class="row">
                <div class="col-md-12">
                  <div class="alert alert-warning alert-dismissable bottom-margin">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                  <i class="fa fa-exclamation-circle"></i> <strong>Peringatan!</strong> Anda akan menghapus : <u><?php echo $row['nama'];?></u> dari resep. Data yang dihapus tidak dapat dikembalikan lagi.
                  </div>
                </div>
                <div class="col-md-12 text-right">
                  <input type="hidden" name="uIDKerupuk" value= "<?php echo $row['idKerupuk']; ?>">
                  <input type="hidden" name="uIDBB" value= "<?php echo $row['idBB']; ?>">
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
  <?php
} //TUTUP WHILE (MODAL)
break;

//TAMPIL PROSES KERUPUK
case "tambahProses":
  $idKerupuk = $_POST['idKerupuk'];
  ?>
  <form action="action_tambah.php?cmd=tambahProses" method="POST" role="form">
  <div class="row">
    <div class="col-md-12">
    <!--
    <div class="alert alert-warning alert-dismissable bottom-margin">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <i class="fa fa-exclamation-circle"></i><strong> Kedua, </strong> Fuck off.
      </div>-->
      <div class="form-group">
        <label> Nama Kerupuk </label>
          <?php
          $nama="";
        $sql = "select * from barang where idBarang=".$idKerupuk;
        $result = mysqli_query($link, $sql);

        while($row = mysqli_fetch_array($result)){
          $nama=$row['nama'];
        } 
        ?>
        <input class="form-control" disabled="disabled" value="<?php echo $nama; ?>">
        <input type="hidden" name="uIDKerupuk" value="<?php echo $idKerupuk; ?>">
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>Melalui Proses (Nama Proses)</label>
        <input type="text" name="uNamaProses" class="form-control">
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>Lama Proses (Dalam Jam)</label>
        <input type="number" min="0" name="uLamaProses" class="form-control">
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label> Membutuhkan Mesin </label>
        <select class="form-control" name="uIDMesin">
        <option value="" style="font-weight: bold"> *Tidak Membutuhkan mesin* </option>
        <?php
        $sql = "SELECT * from mesin";
        $result = mysqli_query($link, $sql);

        while($row = mysqli_fetch_array($result)){
          echo '<option value= "'. $row['idMesin'] .'">' . $row['nama'] . '</option>';
        } 
        ?>
          </select>
          <span class="help-block">*Pilih opsi (Tidak membutuhkan mesin), <strong>apabila proses ini tidak membutuhkan mesin</strong></span>
      </div>
    </div>
  </div>
  <div class="text-right">
  <input onclick="$('#divMenambahProses').hide(500);" type="reset" class="btn btn-default" value="Batal">
  <button type="submit" class="btn btn-primary">Simpan</button>
  </div>
  </form>
  <?php
break;

//TAMPIL PROSES (TABEL BAWAH)
case "tampilProses":
  $idKerupuk = $_POST['idKerupuk'];
  ?>
  <div class="table-responsive">
  <div class="form-group">
    <label class="col-md-4 control-label"> KERUPUK : </label>
      <?php
    $sql = "SELECT * from barang where idBarang=".$idKerupuk;
    $result = mysqli_query($link, $sql);

    while($row = mysqli_fetch_array($result)){?>
      <input class="form-control" name="uKerupuk" disabled="disabled" value="<?php echo $row['nama']; ?>">
      <?php 
    } 
    ?>
  </div>
      <table class="table table-bordered table-hover">
        <thead>
          <tr style="text-align: center;font-weight: bold;">
            <td> Urutan ke- </td>
            <td> Nama Proses </td>
            <td> Lama Proses (Jam)</td>
            <td> Menggunakan Mesin </td>
            <td> Tindakan</td>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT b.nama as nama_barang, p.nama as nama_proses, p.lama_proses as lama_proses, m.nama as nama_mesin, p.idProsesproduksi as id_produksi
            FROM barang b INNER JOIN prosesproduksi p
              on b.idBarang = p.barang_idBarang
            INNER JOIN mesin m
              on p.mesin_idMesin = m.idMesin
            WHERE b.idBarang =".$idKerupuk;

              $result = mysqli_query($link, $sql);
          if(!$result){
              die("<br/>SQL error_log(message)r : " . $sql);
          }
          $no=0;
          while ($row = mysqli_fetch_array($result)) {
              $no++;
          ?>
            <tr style="text-align: center;"">
              <td><?php echo $no; ?></td>
              <td><?php echo $row['nama_proses']; ?></td>
              <td><?php echo $row['lama_proses']; ?></td>
              <td><?php echo $row['nama_mesin']; ?></td>
              <td>
                <a href="#modalUbah_<?php echo $row['id_produksi']; ?>" class="btn btn-round btn-default btn-xs" data-toggle="modal">Ubah</a>
              <a href="#modalHapus_<?php echo $row['id_produksi']; ?>" class="btn btn-round btn-danger btn-xs" data-toggle="modal">Hapus</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      </div>
      <?php
break;

case "tabelModalProses": 
$idKerupuk = $_POST['idKerupuk'];
  $sql = "SELECT b.nama as nama_barang, p.nama as nama_proses, p.lama_proses as lama_proses, m.nama as nama_mesin, p.idProsesproduksi as id_produksi, p.urutan as urutan, b.idBarang  as idKerupuk
            FROM barang b INNER JOIN prosesproduksi p
              on b.idBarang = p.barang_idBarang
            INNER JOIN mesin m
              on p.mesin_idMesin = m.idMesin
            where b.idBarang=$idKerupuk";
  $result = mysqli_query($link, $sql);
  if(!$result){
      die("<br/>SQL error_log(message)r : " . $sql);
  }
  $no=0;
  while ($row = mysqli_fetch_array($result)) {
      $no++;
  ?>
  <div class="modal fade" id="modalUbah_<?php echo $row['id_produksi']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-blue">
        <div class="widget-title">
          <div class="widget-controls">
            <a href="#" class="widget-control " data-dismiss="modal"><i class="fa fa-times-circle"></i></a>
          </div>
          <h3><i class="fa fa-ok-circle"></i> UBAH PROSES PRODUKSI : <strong><?php echo $row['nama_proses']; ?></strong></h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">
            <form action="action_ubah.php?cmd=ubahProses" method="POST" role="form">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Melalui Proses (Nama Proses)</label>
                    <input type="text" name="uNamaProses" class="form-control" value="<?php echo $row['nama_proses']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Lama Proses (Dalam Jam)</label>
                    <input type="number" min="0" name="uLamaProses" class="form-control" value="<?php echo $row['lama_proses']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Urutan ke-</label>
                    <input type="number" min="1" name="uUrutan" class="form-control" value="<?php echo $row['urutan']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label> Membutuhkan Mesin </label>
                    <select class="form-control" name="uIDMesin">
                    <option value="" style="font-weight: bold"> *Tidak Membutuhkan mesin* </option>
                    <?php
                    $sqlMsn = "SELECT * from mesin";
                    $r = mysqli_query($link, $sqlMsn);

                    while($rMesin = mysqli_fetch_array($r)){
                      echo '<option value= "'. $rMesin['idMesin'] .'">' . $rMesin['nama'] . '</option>';
                    } 
                    ?>
                      </select>
                      <span class="help-block">*Pilih opsi (Tidak membutuhkan mesin), <strong>apabila proses ini tidak membutuhkan mesin</strong></span>
                  </div>
                </div>
              </div>
              <div class="text-right">
              <input type="hidden" name="uIDKerupuk" value= "<?php echo $row['idKerupuk']; ?>">
              <input type="hidden" name="uIDProses" value= "<?php echo $row['id_produksi']; ?>">
              <input type="hidden" name="uUrut" value= "<?php echo $no; ?>">
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

  <div class="modal fade" id="modalHapus_<?php echo $row['id_produksi']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-blue">
        <div class="widget-title">
          <div class="widget-controls">
            <a href="#" class="widget-control " data-dismiss="modal"><i class="fa fa-times-circle"></i></a>
          </div>
          <h3><i class="fa fa-ok-circle"></i> HAPUS PROSES PRODUKSI <strong><?php echo $row['nama_proses']; ?></strong> DARI KERUPUK <strong><?php echo $row['nama_barang']; ?></strong></h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">
            <form action="action_hapus.php?cmd=hapusProsesProduksi" method="POST" role="form">
              <div class="row">
                <div class="col-md-12">
                  <div class="alert alert-warning alert-dismissable bottom-margin">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                  <i class="fa fa-exclamation-circle"></i> <strong>Peringatan!</strong> Anda akan menghapus proses: <u><?php echo $row['nama_proses'];?></u>. Data yang dihapus tidak dapat dikembalikan lagi.
                  </div>
                </div>
                <div class="col-md-12 text-right">
                  <input type="hidden" name="uIDProses" value= "<?php echo $row['id_produksi']; ?>">
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
  <?php
} //TUTUP WHILE (MODAL)
break;

/* INI MENAMPUNG KETIKA TAMBAH SPK BARU */
//TAMP
case "tampungKerupuk": 
$idJual = $_POST['idJual'];
?> 
    <div class="form-group">
      <label>Kerupuk</label><!--STUCK-->
      <select name="uKerupuk" class="form-control">
      <option value=""> - - KERUPUK YANG DIBELI - - </option>
        <?php
          $sql = "SELECT * ,
                  (select jumlah from barang_has_nota_jual where nota_jual_idJual={$idJual} and barang_idBarang=b.idBarang ) as jumlah
              from barang b 
              where idBarang in 
                (select barang_idBarang from barang_has_nota_jual where nota_jual_idJual={$idJual})
                AND idBarang not in 
                (select barang_idBarang from spk where nota_jual_idJual={$idJual} AND deleted=0 )
                ";
          $result = mysqli_query($link, $sql);
          while($rowModal = mysqli_fetch_array($result)){
            echo '<option value= "'. $rowModal['idBarang'] .'"">' . $rowModal['nama'] . ' ('.$rowModal['jumlah'].' Bal)</option>';
          } 
          ?>
      </select>
    </div> 
  <?php
break;
}
?>