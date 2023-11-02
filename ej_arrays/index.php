<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    
    <div class="form">
        <form action="" method="post">
            <div class="BTodaBar">
                <button type="submit" name="todaBaraja">Mostrar Toda la Baraja</button>
            </div>
            <div class="BNumCartas">
                <input type="number" name="numCartas" min="1" max="48" placeholder="Numero de cartas a buscar" />
                <input type="radio" id="random" name="ranNoRan" value="true" />
                <label for="random" id="aleat">Aleatorio</label>
                <div class="noRan">
                    <input type="radio" id="noRan" name="ranNoRan" value="false" />
                    <label for="noRan">Elegir palo. </label>
                    <label> ----- </label>
                    <label>Introduzca los palos a buscar: </label>
                    <label><input type="checkbox" name="oros" value="oros" />
                    Oros</label>
                    <label><input type="checkbox" name="copas" value="copas" />
                    Copas</label>
                    <label><input type="checkbox" name="bastos" value="bastos" />
                    Bastos</label>
                    <label><input type="checkbox" name="espadas" value="espadas" />
                    Espadas</label>
                </div>
            </div>
            <input type="submit" value="Enviar" name="parteBaraja" />
        </form>
    </div>
    <div class="cartas">
<?php
require("funciones.php");
if (isset($_POST['todaBaraja'])) {
    $arraypalos=[];
    seleccionaCartas(48, true, $arraypalos);
}
if (isset($_POST['parteBaraja'])) {
    if ($_POST['ranNoRan'] === 'true') {
        $arraypalos=[];
        seleccionaCartas($_POST['numCartas'], true, $arraypalos);
    }
    else {
        $arraypalos=[];
        if (!empty($_POST['oros'])) {
            array_push($arraypalos, 'oros');
        }
        if (!empty($_POST['copas'])) {
            array_push($arraypalos, 'copas');
        }
        if (!empty($_POST['bastos'])) {
            array_push($arraypalos, 'bastos');
        }
        if (!empty($_POST['espadas'])) {
            array_push($arraypalos, 'espadas');
        }
        seleccionaCartas($_POST['numCartas'], false, $arraypalos);
    }
}

?>
</div>
</body>
</html>