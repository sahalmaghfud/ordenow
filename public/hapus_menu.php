<?php 
require "function_admin.php";


$id = $_GET["id"];


if (hapusMenu($id) > 0) {
    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>
        alert('Berhasil Menghapus Menu');
        document.location.href='admin_menu.php';
        </script>";
    }else{
        echo "<script>
        alert('Gagal Menghapus Menu);
        </script>";
    }
}
?>
