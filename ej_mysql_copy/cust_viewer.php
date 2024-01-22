<?php
    require_once("./vendor/autoload.php");


    $customers = new Clases\Customers("", "", "", "");

    $customers->visualizarCustomers();
?>