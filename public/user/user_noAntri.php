<?php 
session_start();
require "user_function.php";
if (!isset($_SESSION["namaPelanggan"])){
  header("Location: user_login.html");
  exit;
}

$id = $_SESSION["id"];

$cek = getStatusPesanan($id);
if ($cek == "selesai"){
  header("Location: user_selesai.html");
  session_unset();
  session_destroy();
  exit;
}

$noAntriSekarang = getNoAntriSekarang();
$noAntri = getNoAntri($id);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../output.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter&family=Joti+One&display=swap"
      rel="stylesheet"
    />
    <title>Document</title>
  </head>
  <body class="bg-cyan-600">
    <div class="flex items-center mt-4 flex-col">
      <img
        class="w-36 mb-3"
        src="../logo_ORDerNwow-removebg-preview.png"
        alt=""
      />
    </div>

    <div
      class="rounded-lg bg-yellow-300 w-48 mx-auto mt-16 flex flex-col items-center px-4 py-3 shadow-[4.0px_8.0px_8.0px_rgba(0,0,0,0.38)]"
    >
      <p class="text-lg font-bold">No Antrian Anda:</p>
      <p class="text-2xl" style="font-family: 'Joti One'"><?php echo $noAntri ?></p>
    </div>
    <div
      class="rounded-lg bg-yellow-300 w-48 mx-auto mt-6 flex flex-col items-center px-3 py-3 shadow-[4.0px_8.0px_8.0px_rgba(0,0,0,0.38)]"
    >
      <p class="text-lg font-bold">No antrian saat ini:</p>
      <p class="text-2xl" style="font-family: 'Joti One'"><?php echo $noAntriSekarang ?></p>
    </div>

    <div
      class="rounded-lg bg-yellow-300 w-48 mx-auto mt-6 flex flex-col items-center px-3 py-3 shadow-[4.0px_8.0px_8.0px_rgba(0,0,0,0.38)]"
    >
      <p class="text-lg font-bold">Status Pesanan:</p>
      <p class=" font-bold"><?php echo $cek?> </p>
    </div>

    <p
      class="text-center mx-10 mt-36 text-xl text-white"
      style="font-family: 'Joti One'"
    >
      Teima Kasih Telah Memesan Mohon Tunggu Sebentar Yaaa..
    </p>
  </body>
</html>
