<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if (!isset($_SESSION["login"])) {
 header("Location: login_admin.php");
 exit;
}



require "function_admin.php" ?>
<?php $menus = query("SELECT  * FROM menus") ?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="output.css" />
  <link rel="stylesheet" href="modal.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Joti+One&display=swap" rel="stylesheet">
</head>

<body class="bg-cyan-700">
  <div class="bg-white flex p-5">
    <a class="hover:text-red-500" href="logout.php"><img src="logout.png" alt=""
        class="w-6 inline-block" />LOGOUT</a>
    <ul class="flex flex-1 justify-end gap-10">
      <li>
        <a class="hover:text-red-500" href="admin_dash.php">Daftar Pesanan</a>
      </li>
      <li>
        <a class="hover:text-red-500" href="admin_riwayat.php">Riwayat Pesanan</a>
      </li>
      <li>
        <a class="text-red-500" href="admin_menu.php">Edit Menu</a>
      </li>
    </ul>
  </div>

  <br />
  <div class="w-full flex justify-end">
    <button type="button"
      class="text-white hover:text-white border border-white hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
      onclick="location.href='edit_menu.php'">
      Tambahkan Menu
    </button>
  </div>

  <?php foreach ($menus as $menu): ?>
    
    <div class="flex w-3/4 bg-white border border-gray-200 rounded-lg shadow ml-3 p-3 mt-3">
      <img class="w-24 rounded-l-lg  self-center mr-3" src="gambar/<?= $menu['gambar'] ?>" alt="" />
      <div class="flex-1" style=" font-family :Inter">

        <p>Nama Menu :

          <?= $menu["nama"] ?>

        </p>
        <p>Harga:Rp.
          <span class="font-bold">
            <?= number_format($menu["harga"]) ?>
          </span>
        </p>
        <p>Tipe:
          <?= $menu["tipe"] ?>
        </p>
        <p>Mood:
          <?= $menu["mood"] ?>
        </p>
        <p>Status:
          <?= $menu["status"] ?>
        </p>
        <p>Deskripsi:
       
          <?= $menu["deskripsi"] ?></p>
      </div>
      
      <div class="flex flex-col w-28 justify-center">
      <?php  $tujuan = "updatee_menu.php?id=" . strval($menu['idmenus']); ?> 
        <button type="button" 
          class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
          onclick="location.href= '<?php echo $tujuan ?>'">
          Edit
        </button>
        
      <button data-modal-target="#i<?= $menu['idmenus'] ?>" type="button"
          class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
          Hapus
        </button>
      </div>


        <div id="i<?= $menu['idmenus'] ?>" class="modal p-2">
          <p class="mb-4 font-Inter font-bold">
            Apakah anda yakin ingin menghapus  <?= $menu["nama"] ?> ?
          </p>
          <div class="flex justify-around">
            <form action="hapus_menu.php">
              <input type="text" value="<?= $menu['idmenus'] ?>" name="id" hidden>
              <button
              type="submit" name="submit"
                class="text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-7 py-2.5 mr-2 mb-2">
                Ya
              </button>
            </form>
            <button data-close-button
              class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
              Tidak
            </button>
          </div>
        </div>

      </div>
  <?php endforeach; ?>










  <div id="overlay"></div>
  <script src="admin_menus.js"></script>
</body>

</html>