<?php 
require "user_function.php";

$menus = [];
if(isset($_GET["mood"])){
$mood = $_GET["mood"];
$menus = query("SELECT  * FROM menus WHERE mood = '$mood' ");}
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
    <title>Pilih Mood Yuk</title>
  </head>
  <body class="bg-cyan-600">
    <a href="user_login.html"
      ><img class="w-14" src="../back_icon.png" alt=""
    /></a>
    <p style="font-family: 'Joti One'" class="text-center text-lg">
      Apa Mood Kamu Hari Ini?
    </p>

 <form action="" class=" flex justify-around  w-11/12 mx-auto mt-4">
   

      <button type="submit" name="mood" class="block" value="senang">
          <img src="../gambar/senang.png" alt="" class="w-20">
          <p style="font-family: 'Joti One'">Senang</p>
      </button>
      <button class="block" type="submit" name="mood" value="sedih">
        <img src="../gambar/sedih.png" alt="" class="w-20">
        <p style="font-family: 'Joti One'">Sedih</p>
      </button>

      <button class="block" type="submit" name="mood" value="kecewa">
        <img src="../gambar/kecewa.png" alt="" class="w-20">
        <p style="font-family: 'Joti One'">Kecewa</p>
      </button>
  </form>

<p class="mt-5 ml-3" style="font-family: 'Joti One'">Menu yang cocok buat kamu:</p>
<?php foreach( $menus as $menu ): ?>
<div
        class="flex bg-yellow-100 mt-4 w-11/12 mx-auto p-2 rounded-lg shadow-2xl"
      >
              <img
          class="w-32 self-center shadow-[4.0px_8.0px_8.0px_rgba(0,0,0,0.38)]"
          src="../gambar/<?php echo  $menu['gambar'] ?>"
          alt=""
        />
        <div class="flex flex-col ml-5">
          <p style="font-family: 'Joti One'" ><?php echo  $menu["nama"] ?></p>
          <p class="font-bold text-green-500 " style="font-family: 'Joti One'"  >Rp.<?php echo  number_format($menu["harga"]) ?></p>
          <p class="text-sm"  style="font-family:Inter">
          <?php echo  $menu["deskripsi"] ?>
          </p>
        </div>
      </div>
        <?php endforeach; ?>
  </body>
</html>
