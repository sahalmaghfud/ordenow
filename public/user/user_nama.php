<?php session_start()

  ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../output.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter&family=Joti+One&display=swap" rel="stylesheet" />
  <title>Selamat Datang</title>
</head>

<body class="bg-cyan-600">
  <a href="user_login.html"><img class="w-14" src="../back_icon.png" alt="" /></a>
  <div class="flex justify-center -mt-14">
    <img class="w-36" src="../logo_ORDerNwow-removebg-preview.png" alt="" />
  </div>

  <form class="flex flex-col p-10 text-center text-xl" style="font-family: 'Joti One'" action="simpanNama.php"
    method="post">
    <label for="nama">Nama:</label>
    <input class="text-center h-14 rounded-lg text-xl font-Inter font-bold bg-yellow-100 shadow-2xl" type="text"
      name="namaPelanggan" style="font-family: 'Joti One'" maxlength="20" <?php if (isset($_SESSION["namapelanggan"])) {
        $nama = $_SESSION["namapelanggan"];
        echo "value = $nama ";
      } ?> required />
    <label class="mt-10" for="noMeja">No Meja:</label>
    <input class="text-center h-14 rounded-lg text-xl font-Inter font-bold bg-yellow-100 shadow-2xl" type="number"
      style="font-family: 'Joti One'" name="noMeja" max="30" min="0" <?php if (isset($_SESSION["noMeja"])) {
        $meja = $_SESSION["noMeja"];
        echo "value = $meja ";
      } ?> required />
    <button class="bg-yellow-500 rounded-lg mt-10 inline-block py-3 w-32 self-center shadow-2xl active:bg-orange-300"
      value="submit">
      Lanjut
    </button>
  </form>
</body>

</html>