<?php
require "function_admin.php";

var_dump(isset($_POST["submit"]));

if (isset($_POST["submit"])) {

    foreach ($_POST as $key) {
        var_dump($key);
    }

    tambahMenu($_POST);

}

?>