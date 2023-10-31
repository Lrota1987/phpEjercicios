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
                    $j = rand(0, count($palo)-1);
                    $baraja2 = ["oros", "copas", "bastos", "espadas"];
                    foreach ($baraja2 as $key => $pal) {
                        if ($palo[$j] === $pal) {
                            $cartaRandom=rand(0,11);
                            if (!in_array($baraja[$key][$cartaRandom], $arrayCartas)) {
                                array_push($arrayCartas, $baraja[$key][$cartaRandom]);
                                pintarCartas($baraja, $baraja[$key], $baraja[$key][$cartaRandom]);
                                $repetido = true;
                            }
                        }
                    }
                }
            }
        }
    }

    ?>
</body>
</html>