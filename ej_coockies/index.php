<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="cabeceraIndex">
        <h2 id="textoCabeceraIndex">Configuración de coockies.</h2>
    </div>
    <?php
    if (isset($_COOKIE['idioma'])) {
        header('Location:./logeo.php');
    }
    echo <<< EOT
    <form action="./coockies/setcoockies.php" method="post" class="formulario_index">
        <div class="lenguaje">
            <label>Seleccione el lenguaje:</label></br>
            <input type="radio" id="español" name="idiomas" value="español" />
            <label for="español">Español</label></br>
            <input type="radio" id="ingles" name="idiomas" value="ingles" />
            <label for="ingles">Inglés</label></br>
            <input type="radio" id="frances" name="idiomas" value="frances" />
            <label for="frances">Francés</label></br>
            <input type="radio" id="italiano" name="idiomas" value="italiano" />
            <label for="italiano">Italiano</label></br>
            <input type="radio" id="portugues" name="idiomas" value="portugues" />
            <label for="portugues">Portugués</label></br>
        </div>
        <div class="color_fondo">
            <label>Seleccione color de fondo: </label>
            <input type="color" name="colorFondo" />
        </div>
        <input type="submit" value="Enviar" name="enviar" />
    </form>
    EOT;
    ?>
</body>
</html>