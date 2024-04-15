<?php 
session_start();
$_SESSION["namaPelanggan"] = $_POST["namaPelanggan"];
$_SESSION["noMeja"] = $_POST["noMeja"];
 
header("Location: user_menu.php");
exit;

?>