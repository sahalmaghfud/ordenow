<?php
session_start();
if (!isset($_SESSION["namaPelanggan"])) {
  header("Location: user_nama.php");
  exit;
}
require "user_function.php";

if (isset($_SESSION["isi"])) {
  $isi = $_SESSION["isi"];
}

$menus = query("SELECT  * FROM menus WHERE status = 'tersedia' ");

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
  <title>Menu</title>
</head>

<body class="bg-cyan-600">
  <a href="user_nama.php"><img class="w-14" src="../back_icon.png" alt="" /></a>
  <div class="flex items-center -mt-14 flex-col">
    <img class="w-36 mb-3" src="../logo_ORDerNwow-removebg-preview.png" alt="" />
    <p class="text-red-500 bg-yellow-200 rounded-lg mb-2 px-2 " style="font-family: Inter" <?php if (!isset($_GET["err"])) {
      echo "hidden";
    } ?>> *Silahkan Pilih Minimal 1 Menu </p>

    <select name="tipe" id="pilihan" class="bg-yellow-400 rounded-lg p-1" style="font-family: 'Joti One'"
      onchange="change()">
      <option style="font-family: serif" value="makanan">makanan</option>
      <option style="font-family: serif" value="minuman">minuman</option>
      <option style="font-family: serif" value="semua menu" selected>
        semua menu
      </option>
    </select>
  </div>

  <form action="user_bill.php" method="post">
    <?php $i = 0; ?>
    <?php foreach ($menus as $menu): ?>
      <div class="flex bg-yellow-100 mt-4 w-11/12 mx-auto p-2 rounded-lg shadow-2xl <?php echo $menu['tipe'] ?> menus">
        <?php $id = $menu["idmenus"] ?>
        <input type="text" name="quans[<?php echo $i ?>][id]" value="<?php echo $id ?>" hidden>
        <img class="w-32 self-center shadow-[4.0px_8.0px_8.0px_rgba(0,0,0,0.38)]"
          src="../gambar/<?php echo $menu['gambar'] ?>" alt="" />
        <div class="flex flex-col ml-5">
          <p style="font-family: 'Joti One'">
            <?php echo $menu["nama"] ?>
          </p>
          <p class="font-bold text-green-500 " style="font-family: 'Joti One'">Rp.
            <?php echo number_format($menu["harga"]) ?>
          </p>
          <p class="text-sm" style="font-family:Inter">
            <?php echo $menu["deskripsi"] ?>
          </p>
          <div class="flex mt-2 items-center">
            <p style="font-family: 'Joti One'">JUMLAH:</p>
            <?php
            $value = 0;
            if (isset($isi)) {
              foreach ($isi as $isiI) {
                if ($isiI["id"] == $id) {
                  $value = $isiI["q"];
                }
              }
            }
            ?>
            <input type="number" name=" quans[<?php echo $i ?>][q]" min="0" max="100" <?php
              if (!$value == 0) {
                echo "value= '$value'";
              } ?> class="rounded-lg h-10 w-10 text-center ml-2" />
          </div>
        </div>
      </div>
      <?php $i++;
    endforeach; ?>
    <div class="flex flex-col p-4">
      <label style="font-family: 'Joti One'" for="catatan">Catatan:</label>
      <textarea name="catatan" id="" cols="20" rows="1" class="p-2 bg-yellow-100 rounded-lg shadow-xl"><?php
      if (isset($_SESSION["catatan"])) {
        echo $_SESSION["catatan"];
      } ?></textarea>
    </div>
    <div class="flex justify-center mt-5 rounded-lg">
      <button style="font-family: 'Joti One'" name="submit" type="submit"
        class="text-black bg-yellow-500 hover:bg-yellow-400 focus:ring-4 focus:ring-slate-500 font-medium rounded-lg text-xl px-10 py-3 mr-2 mb-2 shadow-[4.0px_8.0px_8.0px_rgba(0,0,0,0.38)]">
        Lanjut
      </button>
    </div>
  </form>

  <script src="user_menu.js"></script>
</body>

</html>