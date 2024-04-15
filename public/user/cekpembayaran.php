<?php
 session_start();
require "user_function.php";


$id = $_SESSION["id"];


if(getStatusPembayaran($id) == "sudah"){
   header("Location: user_noAntri.php");
   exit;
}elseif(getStatusPembayaran($id) == "belum"){
    header("Location: bayarDulu.html");
    exit;
}else{
    mysqli_query($conn,"UPDATE pesanan SET statuspesanan='selesai' WHERE idpesanan = '$id'");
    session_unset();
    session_destroy();
    header("Location: user_login");
    exit;
}

?>