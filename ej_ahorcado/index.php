<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include '../utils/functions.php';
    spl_autoload_register('classAutoLoader');
    $miCabecera = new Cabecera("Hola");
    echo $miCabecera->dibujar();
    ?>
    <div class="contenedor">
        <form action="./ahorcado.php" class="contenedor__formulario-entrada" method="POST">
            <input type="text" name="nombre" class="nombre" />
            <input type="submit" value="EMPEZAR" class="enviar">
        </form>
    </div>
</body>
</html>