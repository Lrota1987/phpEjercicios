<?php
    require_once("./DBConnection.php");
    $con = new DBConnetion();
    $con->dbConnect();
    header('Location: index.php');
?>