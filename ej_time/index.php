<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <form action="" method="post">
        <label>Introduzca una año: </label>
        <input type="number" name="anno" />
        <input type="submit" value="Enviar" />
    </form>
    </br>
    <?php
    require("calendario_funciones.php");
    $meses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
    if (isset($_POST['anno'])) {
        print "<div id='calendario'>";
        print "<h1 id='titulo'>".$_POST['anno']."</h1>";
        print "<table id='Tcalendario'>";
        print "<tr class='columna'>";
                array_walk($meses, "escribir_tabla", $_POST['anno'] );
        print "</tr></table>";
    }
    ?>
</body>
</html>