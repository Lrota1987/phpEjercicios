<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./db_conector.php" method="POST">
        <button type="submit">Crear/Conectarse a Base de Datos</button>
    </form>
    <form action="" method="POST">
        <button type="submit" name="reinicio" value=1>Reiniciar Tablas</button>
    </form>
    <form action="./db_viewer.php" method="POST">
        <button type="submit">Ver base libros</button>
    </form>
    <?php
    require_once("./vendor/autoload.php");
    if (isset($_POST['reinicio'])) {
        $reiBook = new Clases\Book("", "", "", "", "");
        $reiBook->rellenarBook();
        if ($reiBook) {
            echo "Se han reiniciado la base de datos!!";
        }
    }

    ?>
</body>
</html>