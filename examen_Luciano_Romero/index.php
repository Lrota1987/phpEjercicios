<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if (isset($_GET['valor']) && ($_GET['valor']>=2 && $_GET['valor']<=4 )) {
        header("Location:./carpeta_Ejercicio".$_GET['valor']."");
    }
    else{
    echo <<< EOT

        <a href="./carpeta_Ejercicio2">Ir al ejercicio 2</a>
    </br>
        <a href="./carpeta_Ejercicio3">Ir al ejercicio 3</a>
    </br>
        <a href="./carpeta_Ejercicio4">Ir al ejercicio 4</a>
    EOT;
    }
    
?>
</body>
</html>