<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="output.css">
  <title>Edit Menu</title>
</head>

<body>


  <div class="w-1/2 rounded-lg bg-cyan-700 mx-auto my-10 px-10 py-5">

    <p class="text-center text-white mb-3 font-Inter font-bold">
      Form Pengisian Data Menu
    </p>
    <form class="flex flex-col " action="" method="post" enctype="multipart/form-data">
      <label class=" text-white font-Inter font-bold" for="nama">Nama Menu:</label>
      <input class="rounded-lg p-2 mb-3" type="text" name="nama" maxlength="30" required>
      <label class=" text-white font-Inter font-bold" for="harga">Harga(Rp)</label>
      <input class="rounded-lg p-2 mb-3" type="number" name="harga" required>
      <label class=" text-white font-Inter font-bold" for="tipe">Tipe Makanan</label>
      <select class="rounded-lg p-2 mb-3" name="tipe" id="" required>
        <option value="minuman">Minuman</option>
        <option value="makanan">Makanan</option>
      </select>
      <label class=" text-white font-Inter font-bold" for="mood">Mood yang sesuai</label>
      <select class="rounded-lg p-2 mb-3" name="mood" id="" required>
        <option value="sedih">sedih</option>
        <option value="senang">senang</option>
        <option value="kecewa">kecewa</option>
      </select>
      <label class=" text-white font-Inter font-bold" for="status">Status</label>
      <select class="rounded-lg p-2 mb-3" name="status" id="" required>
        <option value="tersedia">Tersedia</option>
        <option value="tidak tersedia">Tidak Tersedia</option>
      </select>
      <label class=" text-white font-Inter font-bold" for="deskripsi">
        Deskripsi Singkat
      </label>
      <textarea class="rounded-lg p-2 mb-3" name="deskripsi" id="" cols="30" rows="3" maxlength="90" ></textarea>
      <label class=" text-white font-Inter font-bold" for="foto">Masukan Foto:</label>
      <input type="file" name="gambar">
      <button
        class="text-white self-center hover:text-white border border-white hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-1/2 mt-10"
        type="submit" name="submit">Tambahkan</button>
    </form>



  </div>
  <?php
  require "function_admin.php";


  if (isset($_POST["submit"])) {

    tambahMenu($_POST);

  }

  ?>
</body>

</html>