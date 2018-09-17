//TAMPIL NOTA BELI
case "tampilNotaBeli":
  $idPemasok = $_POST['idPemasok'];
  ?>
  <form action="action_tambah.php?cmd=tambahNotaBeli" method="POST" role="form">
  <div class="row">
    <div class="col-md-4">
    <!--<div class="alert alert-warning alert-dismissable bottom-margin">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <i class="fa fa-exclamation-circle"></i><strong> Kedua, </strong> Isi resep / komposisi dari kerupuk anda disini, dengan cara menambahkan bahan baku apa saja untuk membuat kerupuk tersebut.
      </div>-->
      <div class="form-group">
        <label> Nama Pemasok </label>
          <?php
          $nama="";
        $sql = "select * from pemasok where idSupplier=".$idPemasok;
        $result = mysqli_query($link, $sql);

        while($row = mysqli_fetch_array($result)){
          $nama=$row['nama'];
        } 
        ?>
        <input class="form-control" disabled="disabled" value="<?php echo $nama; ?>">
        <input type="hidden" name="uPemasok" value="<?php echo $nama; ?>">
        <input type="hidden" name="uIDPemasok" value="<?php echo $idPemasok; ?>">
      </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label> Status Pembayaran </label>
          <select name="uStatus" class="form-control">
            <option value="1"> Lunas </option>
            <option value="0"> Belum Lunas </option>
          </select>
        </div>
      </div> 
      <div class="col-md-4">
      <p><strong> Tanggal Pembayaran </strong></p>
        <div class="input-group">
          <input type="text" class="form-control input-datepicker">
          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        </div>
        <span class="help-block">*Jika <strong>Belum Lunas</strong>, kosongi saja</span><br>
      </div>
      <hr style="width: 100%;">
      <div class="alert alert-info alert-dismissable col-md-12">
        <center><strong>Daftar Bahan Baku yang akan dibeli</strong></center>
      </div>
      <label class="col-md-12"><center></center></label>
    <div class="col-md-8">
      <div class="form-group">
        <label> Membutuhkan Bahan Baku </label>
        <select class="form-control" name="uBB">
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
    <div class="col-md-4">
      <div class="form-group">
        <label> Jumlah Yang dibutuhkan </label>
        <input type="number" min="0" name="uJumlah" class="form-control">
      </div>
    </div>
    </div>
  </div>
  <div class="text-right">
  <button type="submit" class="btn btn-primary">Simpan</button>
  <input onclick="$('#divMengisiBOM').hide(500);" type="reset" class="btn btn-default" value="Batal">
  </div>
  </form>
  <?php
break;