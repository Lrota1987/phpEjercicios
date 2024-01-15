<?php
    session_start();
    
    require_once("./vendor/autoload.php");
    //use Clases;
    
    $con = new Clases\DBconnection("./config.json");
    $_SESSION['conectado']=$con;
    header('Location: index.php');
?>