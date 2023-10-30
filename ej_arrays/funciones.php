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
    
    function seleccionaCartas($numCartas, $random, $palo) {
        $arrayCartas=[];
        $baraja = crearBaraja();
        if ($random) {
                for ($i = 0 ; $i<$numCartas ; $i++) {
                    $repetido=false;
                    while ($repetido === false) {
                        $paloRandom=rand(0, 3);
                        $cartaRandom=rand(0,11);
                        if (!in_array($baraja[$paloRandom][$cartaRandom], $arrayCartas)) {
                            array_push($arrayCartas, $baraja[$paloRandom][$cartaRandom]);
                            pintarCartas($baraja, $baraja[$paloRandom], $baraja[$paloRandom][$cartaRandom]);
                            $repetido = true;
                        }
                        
                    }
                    
                    
                }
        }
        else {
            for ($i = 0 ; $i<$numCartas ; $i++) {
                $repetido=false;
                while ($repetido === false) {
                    $j = rand(0, sizeof($palo)-1);
                    if ($palo[$j] === "oros") {
                        $cartaRandom=rand(0,11);
                        if (!in_array($baraja[0][$cartaRandom], $arrayCartas)) {
                            array_push($arrayCartas, $baraja[0][$cartaRandom]);
                            pintarCartas($baraja, $baraja[0], $baraja[0][$cartaRandom]);
                            $repetido = true;
                        }
                    }
                    elseif ($palo[$j] === "copas") {
                        $cartaRandom=rand(0,11);
                        if (!in_array($baraja[1][$cartaRandom], $arrayCartas)) {
                            array_push($arrayCartas, $baraja[1][$cartaRandom]);
                            pintarCartas($baraja, $baraja[1], $baraja[1][$cartaRandom]);
                            $repetido = true;
                        }
                    }
                    elseif ($palo[$j] === "bastos") {
                        $cartaRandom=rand(0,11);
                        if (!in_array($baraja[2][$cartaRandom], $arrayCartas)) {
                            array_push($arrayCartas, $baraja[2][$cartaRandom]);
                            pintarCartas($baraja, $baraja[2], $baraja[2][$cartaRandom]);
                            $repetido = true;
                        }
                    }
                    elseif ($palo[$j] === "espadas") {
                        $cartaRandom=rand(0,11);
                        if (!in_array($baraja[3][$cartaRandom], $arrayCartas)) {
                            array_push($arrayCartas, $baraja[3][$cartaRandom]);
                            pintarCartas($baraja, $baraja[3], $baraja[3][$cartaRandom]);
                            $repetido = true;
                        }
                    }
                    
                }
            }
        }
    }

    ?>
</body>
</html>