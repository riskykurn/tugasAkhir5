<?php 
date_default_timezone_set("Asia/Jakarta");
  $jam= date("H");
  if($jam < 11){?>
    <div class="alert alert-success alert-dismissable">
      <i class="fa fa-exclamation-circle"></i> <strong> Selamat Pagi. </strong> Silahkan <i>login </i> terlebih dahulu untuk masuk kedalam sistem.
    </div><?php
  }
  else if($jam < 15){?>
    <div class="alert alert-warning alert-dismissable">
      <i class="fa fa-exclamation-circle"></i> <strong> Selamat Siang. </strong> Silahkan <i>login </i> terlebih dahulu untuk masuk kedalam sistem.
    </div><?php
  }
  else if($jam < 19){?>
    <div class="alert alert-warning alert-dismissable">
      <i class="fa fa-exclamation-circle"></i> <strong> Selamat Sore. </strong> Silahkan <i>login </i> terlebih dahulu untuk masuk kedalam sistem.
    </div><?php
  }
  else if($jam <= 23){?>
    <div class="alert alert-info alert-dismissable">
      <i class="fa fa-exclamation-circle"></i> <strong> Selamat Malam. </strong> Silahkan <i>login </i> terlebih dahulu untuk masuk kedalam sistem.
    </div><?php 
  }
?>