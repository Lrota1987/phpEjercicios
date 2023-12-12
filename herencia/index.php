<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="contenedor">
        <div style="background-color: #6A5ACD; color: #E0FFFF;" class="divForm">
            <form action="eleccion.php" method="post" class="form">
                <h4>Elija una figura:</h4>
                <select name="figura" id="selectFigura">
                    <option value="circulo">Círculo</option>
                    <option value="cuadrado" selected>Cuadrado</option>
                    <option value="rectangulo">Rectángulo</option>
                    <option value="triangulo">Triángulo</option>
                </select>
                <br>
                <br>
                <input type="submit" value="Enviar">
            </form>
        </div>
    </div>

    <style>
        .contenedor {
            width:100%;
            height:100vh;
            position:relative;
            background-color: red;
        }
        .divForm {
            padding: 15px;
            position:absolute;

        }
    </style>
</body>
</html>