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
    
    function seleccionaCartas($baraja, $numCartas, $random) {
        if ($random) {
            for ($i = 0 ; $i<$numCartas ; $i++) {
                $paloRandom=rand(0, 3);
                $cartaRandom=rand(0,11);
                pintarCartas($baraja, $baraja[$paloRandom], $baraja[$paloRandom][$cartaRandom]);
            }
        }
        else {

        }
    }

    seleccionaCartas($baraja, 5, true);
    ?>
</body>
</html>