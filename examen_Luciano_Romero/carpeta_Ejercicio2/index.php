<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <form action="./setCoockies.php" method="POST" class="form-index-ej2">
        <input type="radio" name="display" id="pantalla" value="pantalla" />
        <label for="pantalla">Ver pantalla</label>
        </br>
        <input type="radio" name="display" id="fichero" value="fichero" />
        <label for="pantalla">Sacar fichero</label>
        </br>
        </br>
        <input type="checkbox" name="diagrama[]" id="barras" value="barras" />
        <label for="barras">Ver diagrama de barras</label>
        </br>
        <input type="checkbox" name="diagrama[]" id="sectores" value="sectores" />
        <label for="sectores">Ver diagrama de sectores</label>
        </br>
        <input type="submit" value="Enviar">

    </form>

    <?php
    ?>
</body>
</html>