<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        require("functions.php");
        $usuarios=array();
        $tipoDatos= ["nombre","apellidos","edad","dni","ciudad","cp","clave","clave2"];
        if (!isset($_SESSION['nombre'])) {
            if (isset($_POST['nombre'])) {
               if (!preg_match("/^([a-zA-Z]+(\/{1}[a-zA-Z]+)*)+(?!([\/]{2}))$/", $_POST['nombre'])) {
                 
               }
            }
            else {
                pintarForm("", false, "");

            }
        }
        else {
            header("Location:./welcome.php");
        }
    ?>
    </body>
</home>
