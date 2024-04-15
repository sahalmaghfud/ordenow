<?php 
session_start();
if (!isset($_SESSION["login"])) {
 header("Location: login_admin.php");
 exit;
}



require "function_admin.php";
$orders = query("SELECT * FROM pesanan WHERE statuspesanan = 'selesai' ");
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="output.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Joti+One&display=swap" rel="stylesheet">
    <title>DASHBOARD</title>
  </head>
  <body class="bg-cyan-700">
    <div class="bg-white flex p-5">
      <a class="hover:text-red-500" href="logout.php"
        ><img src="logout.png" alt="" class="w-6 inline-block" />LOGOUT</a
      >
      <ul class="flex flex-1 justify-end gap-10">
        <li>
          <a class="hover:text-red-500" href="admin_dash.php">Daftar Pesanan</a>
        </li>
        <li>
          <a class="text-red-500" href="admin_riwayat.php"
            >Riwayat Pesanan</a
          >
        </li>
        <li>
          <a class="hover:text-red-500" href="admin_menu.php">Edit Menu</a>
        </li>
      </ul>
    </div>



  <?php
  $j = 0;
  foreach( $orders as $order ): ?>
    <div
      class="bg-yellow-100 w-11/12 m-auto p-4 rounded-lg mt-4 flex shadow-xl"
    >
      <div class="w-3/4">
        <table class="w-3/4 mx-4" >
          <tr>
            <td class="font-Inter "><span class="font-bold">Atas Nama:</span> <?php echo $order["nama_pel"] ?></td>
          </tr>
          <tr>
            <td class="mx-4 font-Inter"><span class="font-bold" >No Meja:</span> <?php echo $order["no_meja"] ?></td>
          </tr>
          <tr>
          <td class=" font-Inter "><span class="font-bold"> Tanggal :</span>  <?php $tgl = date_create($order["tanggal"]);$tanggal = date_format($tgl, "d/m/Y"); $waktu = $order["waktu"];     
        echo "$tanggal , $waktu"; ?></td>
          </tr>
         
        </table>


        <table
          class="border border-collapse border-black bg-yellow-100 text-center table-auto mt-3 mx-4 w-full"
        >

          <tr>
            <th class="border border-black font-Inter">NO</th>
            <th class="border border-black font-Inter">Nama Menu</th>
            <th class="border border-black font-Inter">Jumlah</th>
            <th class="border border-black font-Inter">Harga</th>
            <th class="border border-black font-Inter">Total</th>

          </tr>

        <?php
        $id = $order["idpesanan"];
        $details = query("SELECT * FROM detail_pesanan WHERE idpesan = '$id'");
        $i = 1;
        foreach( $details as $detail ):
        ?>
          
          <tr>
            <td class="border border-black"><?php echo $i; ?></td>
            <td class="border border-black"><?php echo $detail["namaMenu"] ?></td>
            <td class="border border-black"><?php echo $detail["quantity"] ?></td>
            <td class="border border-black">Rp.<?php echo number_format($detail["harga"]) ?></td>
            <td class="border border-black">Rp.<?php echo number_format($detail["jumlah"]) ?></td>

          </tr>
          <?php 
          $i++;
        endforeach; ?>



          <tr class="font-bold font-Inter">
            <td></td>
            <td></td>
            <td></td>
            <td>Total :</td>
            <td>Rp.<?php echo number_format($order["total"]); ?></td>
          </tr>
        </table>



        <div
          class="mt-3 mx-3 bg-yellow-100 px-2 py-1 rounded-lg w-full border border-black"
        >
          <p class="font-Inter font-bold">Catatan:</p>
          <p class="text-sm">
          <?php echo $order["catatan"]; ?>
          </p>
        </div>
       
      </div>
        
      
      <div class="ml-5 flex flex-col items-center justify-center w-1/4">
        <input type="text" name="pesan[<?php echo $j ?>][id]" value="<?php echo $order['idpesanan'] ?>" hidden>
        <label for="spb">Status Pembayaran:</label>
        <select class="p-1 rounded-lg hover:bg-gray-100" name="pesan[<?php echo $j ?>][spb]" disabled  >
          <option  <?php if($order["statuspembayaran"] == "belum")echo "selected"  ?>  value="belum">Belum</option>
          <option   <?php if($order["statuspembayaran"] == "sudah")echo "selected"  ?> value="sudah">Sudah</option>
          <option  <?php if($order["statuspembayaran"] == "tidak")echo "selected"  ?> value="tidak">Tidak</option>
        </select>
        <label for="spb">Status Pesanan:</label>
        <select class="p-1 rounded-lg hover:bg-gray-100" name="pesan[<?php echo $j ?>][spm]" disabled>
          <option <?php if($order["statuspesanan"] == "diproses")echo "selected"  ?> value="diproses">Diproses</option>
          <option <?php if($order["statuspesanan"] == "belum diproses")echo "selected"  ?> value="belum diproses">Belum diproses</option>
          <option <?php if($order["statuspesanan"] == "selesai")echo "selected"  ?> value="selesai">Selesai</option>
        </select>
        </div>
    
   

    </div>

<?php
$j++;
endforeach; ?>
  </body>
</html>
