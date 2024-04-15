<?php
require "function_admin.php";
if(isset($_POST["submit"])){ 

    $pes =[];
    $i = 0;
  
  foreach($_POST["pesan"] as $pes){ 
     if( $pes["spb"] != "belum"){
      pembaruan($pes["id"],$pes["spb"],$pes["spm"]);}
    $i++;}


mysqli_query($conn,"UPDATE pesanan SET statuspesanan = 'selesai' WHERE statuspembayaran = 'tidak'");

header("Location: admin_dash.php");
exit;}

?>