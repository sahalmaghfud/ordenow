<?php
session_start();
if (isset($_SESSION["login"]))
{

header("Location: admin_dash.php");
exit;


}
require "function_admin.php";

if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $password = $_POST["password"]; 

  $data = query1("SELECT * FROM admin WHERE username = '$username' ");

   if(empty($data)) {
    $userErr = true;
  }else{
      if( password_verify($password, $data["password"])) {
      $_SESSION["login"] = true;
      header("Location: admin_dash.php");
      exit;
      }
      else{ 
      $passwordErr = true;
      }
}
}
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
    <title>Login</title>
  </head>
  <body>
    <div class="w-1/3 rounded-lg bg-cyan-700 mx-auto my-32 px-10">
      <img
        class="w-48 h-48 mx-auto mb-6"
        src="logo_ORDerNwow-removebg-preview.png"
        alt=""
      />
      <p class="text-center text-white mb-3 font-Inter font-bold">
        Masuk ke halaman Admin
      </p>
      <form action="" method="post" >
        <input
          class="rounded-lg w-full p-4"
          type="text"
          name="username"
          placeholder="Username"
        />
        <p class="text-red-500  mb-3">
        <?php if(isset($userErr)){
          echo "User Name Salah";
        } ?></p>
        <input
          type="password"
          name="password"
          id=""
          class="rounded-lg w-full p-4"
          type="text"
          placeholder="password"
        />
        <p class="text-red-500 mb-3">
        <?php if(isset($passwordErr)){
          echo "Kata Sandi Salah";
        } ?></p>
        <div class="flex items-center justify-center">
          <button
            type="submit" name="submit"
            class="bg-red-600 w-2/3 text-white rounded-lg py-4 my-6 hover:bg-red-900"
          >
            LOGIN
          </button>
        </div>
      </form>
    </div>
  </body>
</html>
