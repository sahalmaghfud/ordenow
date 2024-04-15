<?php require "function_admin.php"; ?>
<?php $id = $_GET["id"] ?>
<?php $menus = query("SELECT  * FROM menus WHERE idmenus = $id ") ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="output.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter&family=Joti+One&display=swap" rel="stylesheet">
  <title>Update menu</title>
</head>

<body>
<?php foreach($menus as $menu ): ?>
  <div class="w-1/2 rounded-lg bg-cyan-700 mx-auto my-10 px-10 py-5">

    <p class="text-center text-white mb-3 font-Inter font-bold">
      Form Pengisian Data Menu
    </p>
    <form class="flex flex-col " action="" method="post">
    <input type="text" name="id"  value="<?php echo $menu['idmenus'];?>"  hidden>
      <label class=" text-white font-Inter font-bold" for="nama" >Nama Menu:</label>   
      <input class="rounded-lg p-2 mb-3" type="text" name="nama"  value="<?php echo $menu['nama'];?>" required>
      <label class=" text-white font-Inter font-bold" for="harga">Harga(Rp)</label>
      <input class="rounded-lg p-2 mb-3" type="number" name="harga"  value="<?php echo $menu['harga'];?>" required>
      <label class=" text-white font-Inter font-bold" for="tipe">Tipe:</label>
      <select class="rounded-lg p-2 mb-3" name="tipe" id=""  required>
        <option value="minuman" <?php if($menu['tipe']=="minuman"){echo "selected";};?> >Minuman</option>
        <option value="makanan" <?php if($menu['tipe']=="makanan"){echo "selected";};?>>Makanan</option>
      </select>
      <label class=" text-white font-Inter font-bold" for="mood">Mood yang sesuai</label>
      <select class="rounded-lg p-2 mb-3" name="mood" id="" required>
        <option value="sedih" <?php if($menu['mood']=="sedih"){echo "selected";};?> >sedih</option>
        <option value="senang" <?php if($menu['mood']=="senang"){echo "selected";};?> >senang</option>
        <option value="kecewa" <?php if($menu['mood']=="kecewa"){echo "selected";};?> >kecewa</option>
      </select>
      <label class=" text-white font-Inter font-bold" for="status">Status</label>
      <select class="rounded-lg p-2 mb-3" name="status" id="" required>
        <option value="tersedia" <?php if($menu['status']=="tersedia"){echo "selected";};?> >Tersedia</option>
        <option value="tidak tersedia" <?php if($menu['status']=="tidak tersedia"){echo "selected";};?> >Tidak Tersedia</option>
      </select>
      <label class=" text-white font-Inter font-bold" for="deskripsi" >
        Deskripsi Singkat
      </label>
      <textarea class="rounded-lg p-2 mb-3" name="deskripsi" id="" cols="30" rows="3" > <?php echo $menu['deskripsi'];?></textarea>
      <label class=" text-white font-Inter font-bold" for="foto">Masukan Foto:</label>
      <p class=" text-white font-Inter text-sm ">*jika tidak ingin mengganti foto kosongkan saja</p>
      <input type="file" name="foto" id="">
      <button
        class="text-white self-center hover:text-white border border-white hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-1/2 mt-10"
        type="submit" name="submit">Ubah Sekarang!!</button>
    </form>


  </div>
<?php endforeach;?>
  <?php
  if (isset($_POST["submit"])) {

    updateMenu($_POST);

  }

  ?>
</body>

</html>