<?php
        require_once("./vendor/autoload.php");

        $customer = new Clases\Customers("", "", "", "");
        $customer->deleteCust($_POST['eliminar']);
    ?>