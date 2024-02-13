<?php
    require_once("./vendor/autoload.php");


    $customers = new Clases\Customers("", "", "", "");
<<<<<<< HEAD
    if (isset($_POST['firstname'])) {
        print '<p>'.$_POST['type'].'</p>';
        var_dump( $_POST['type']);
        $customers->actualizar($_POST['id'], $_POST['firstname'], $_POST['surname'], $_POST['email'], $_POST['type']);
    }
=======

>>>>>>> 740696b99b8acfc6d8c29ee13818acc843b6f160
    $customers->visualizarCustomers();
?>