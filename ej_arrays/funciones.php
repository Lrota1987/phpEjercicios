<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    function crearBaraja() {
        $oros=[];
        $copas=[];
        $bastos=[];
        $espadas=[];
        for ($i = 1 ; $i <= 12 ; $i++ ) {
            array_push($oros, $i."oros");
            array_push($copas, $i."copas");
            array_push($bastos, $i."bastos");
            array_push($espadas, $i."espadas");
        }
        return $GLOBALS['baraja']=[$oros, $copas, $bastos, $espadas];
    }

    $baraja = crearBaraja();

    function pintarCartas($baraja, $palo, $carta) {
        print "<img src='img/".$baraja[array_search($palo, $baraja)][array_search($carta, $palo)].".jpg' />";
    }
    
    echo pintarCartas($baraja, $baraja[1], $baraja[1][3]);
    ?>
</body>
</html>