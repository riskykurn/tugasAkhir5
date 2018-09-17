<?php

//jadi yang baru itu MYSQLI
        //mysqli itu biasanya harus ditampung
                     //$host, $user, $password, $database
$link = @mysqli_connect("localhost", "root", "mysql", "tugasakhir");
//@ untuk menghilangkan warning bila gagal connect

//UNTUK MENGECEK SUDAH CONNECT APA BELUM
//echo mysqli_connect_errno() . " " . mysqli_connect_error();
if(mysqli_connect_errno()){
    //echo mysqli_connect_error();
    //exit();//jadi bila sudah error, codingan dibawahnya gak dibaca lagi
    die(mysqli_connect_error());//selain exit bisa pake die
}
    

?>