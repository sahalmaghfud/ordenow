<?php
session_start();
require "user_function.php";

if(isset($_POST["submit"])){ 

  $isi =[];
  $i = 0;

foreach($_POST["quans"] as $quan){ 
  if(!$quan["q"] == 0){
  $isi[$i]["id"]=$quan["id"];
  $isi[$i]["q"] = $quan["q"];
  $isi[$i]["jumlah"] = $quan["q"] * getHarga( $quan["id"] );
  $i++;}}


    if(! empty($isi)){
    $_SESSION["isi"] = $isi;
    $_SESSION["catatan"] = $_POST["catatan"];
  }else{
   echo "
    <script>
    alert('Silahkan Pilih Minimal 1 menu');
    </script>
    ";
    header("Location: user_menu.php?err=true");
    exit;
    }


}
?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../output.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Joti+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="modal.css">
 
    <title>Bill</title>
  </head>
  <body class="bg-cyan-600">
    <a href="user_menu.php"
      ><img class="w-14" src="../back_icon.png" alt=""
    /></a>
    <div class="flex items-center -mt-14 flex-col">
      <img
        class="w-36 mb-3"
        src="../logo_ORDerNwow-removebg-preview.png"
        alt=""
      />

      <p class="bg-yellow-400 px-6 rounded-xl" style="font-family: 'Joti One'">
        pesanan
      </p>
    </div>
    <table
      class="border border-collapse border-black bg-yellow-100 w-11/12 mx-auto text-center table-auto mt-3 shadow-xl"
    >
      <tr style="font-family: 'Joti One'">
        <th class="border border-black">NO</th>
        <th class="border border-black">Nama Menu</th>
        <th class="border border-black">Jumlah</th>
        <th class="border border-black">Harga</th>
        <th class="border border-black">Total</th>
      </tr>

      <?php
      $total = 0;
      $no = 1;
       foreach($isi as $bill): ?>
      <tr>
        <td class="border border-black"><?php echo $no; ?></td>
        <td class="border border-black"><?php echo getNama($bill["id"]); ?></td>
        <td class="border border-black"><?php echo $bill["q"]; ?></td>
        <td class="border border-black">Rp.<?php echo number_format($bill["jumlah"]/$bill["q"]); ?></td>
        <td class="border border-black">Rp.<?php echo number_format($bill["jumlah"]); ?></td>
      </tr>
      <?php 
      $no++;
      $total += $bill["jumlah"];
     endforeach;
     $_SESSION["total"] = $total; ?>

      <tr class="font-bold">
        <td></td>
        <td></td>
        <td></td>
        <td>Bayar :</td>
        <td><?php echo number_format($total);?></td>
      </tr>
    </table>
    <div
      class="mt-3 mx-3 bg-yellow-100 px-2 py-1 rounded-lg shadow-xl w-72 border border-black"
    >
      <p style="font-family: 'Joti One'">Catatan:</p>
      <p class="text-sm">
      <?php echo $_POST["catatan"]?>
      </p>
    </div>
    <div class="flex justify-center mt-6">
     
        <button data-modal-target="#modal" type="button"
          style="font-family: 'Joti One'"
          class="text-black bg-yellow-400 hover:bg-yellow-800 focus:ring-4 focus:ring-red-300 rounded-lg text-xl px-4 py-3 w-40 mr-2 mb-2 shadow-[4.0px_8.0px_8.0px_rgba(0,0,0,0.38)]"
        >
          Konfirmasi
        </button>
    </div>

    <div class="modal p-2" id="modal" >
          <p class="mb-4 font-Inter font-bold">
            Sudah Yakin Dengan Pesanan Anda ?
          </p>
          <div class="flex justify-around">
            <form action="insertPesan.php" method="post">
              <button
              type="submit" name="submit"
                class="text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-7 py-2.5 mr-2 mb-2">
                Ya
              </button>
            </form>
            <button data-close-button
              class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
              Belum
            </button>
          </div>
        </div>

  <div id="overlay" ></div>

  <script src="user_bill.js" ></script>
  </body>
</html>
