<?php
session_start();
require "user_function.php";



if (isset($_SESSION["isi"]) && isset($_SESSION["namaPelanggan"])) {

    $id = uniqid();
    $_SESSION["id"] = $id;
    $namaPelanggan = $_SESSION["namaPelanggan"];
    $noMeja = $_SESSION["noMeja"];
    $total = $_SESSION["total"];
    $catatan = $_SESSION["catatan"];

    $query = "INSERT INTO pesanan VALUES('$id', '$namaPelanggan','$noMeja', '$total', 'belum', 'belum diproses','$catatan',current_date(),current_time())";

    mysqli_query($conn, $query);
     
    if(mysqli_affected_rows($conn) > 0) {
      $cek =  tambahDetail($_SESSION["isi"],$id);
        if($cek >0) {
            header("Location: user_payment.html");
        }
    }

}



?>