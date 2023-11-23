<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require ("../utils/utilidades.php");
    $arrayEst=explode("-", $_COOKIE['Estadistica']);
    $arrayrepet=[];
    $arraycont=[];
    $arraytotal=[];
    $arrayElementos=explode("-",file_get_contents("../carpeta_Ejercicio2/estadisticas.txt") );
    for ($i=0;$i<sizeof($arrayElementos);$i++) {
        while (in_array($arrayElementos[$i], $arrayrepet)) {
            $i++;
        }
        $cont=0;
        for ($j=0;$j<sizeof($arrayElementos);$j++){
            if ($arrayElementos[$i] === $arrayElementos[$j]){
                $cont++;
            }
        }
        array_push($arrayrepet, $arrayElementos[$i]);
        array_push($arraycont, $cont);

    }
    $arraytotal=array_combine($arrayrepet, $arraycont);
    array_pop($arraytotal);
        if ($_COOKIE['Salida'] === 'pantalla') {
            for ($i=0;$i<sizeof($arrayEst);$i++) {
                    
                if ($arrayEst[$i] === "barras") {
                    $barras=pintarBarras($arraytotal);
                    foreach ($barras as $ind=>$barra){
                        print "<img src='data:image/png;base64,$barra' /></br>";
                    }
                    
                }
                if ($arrayEst[$i] === "sectores") {
                    $sectores=pintarSectores($arraytotal);
                    print "<img src='data:image/png;base64,$sectores' />";
                }
                if ($arrayEst[$i] === "barras" && $arrayEst[$i] === "sectores") {
                    $barras=pintarBarras($arraytotal);
                    foreach ($barras as $ind=>$barra){
                        print "<img src='data:image/png;base64,$barra' /></br>";
                    }
                    print "<h2>-------------------</h2>";
                    $sectores=pintarSectores($arraytotal);
                    print "<img src='data:image/png;base64,$sectores' />";
                }
            }
        }
        else {
            for ($i=0;$i<sizeof($arrayEst);$i++) {
                    
                if ($arrayEst[$i] === "barras") {
                    file_put_contents("./file/barras.png",pintarBarras($arraytotal) );
                    
                }
                if ($arrayEst[$i] === "sectores") {
                    pintarSectoresOnfile($arraytotal,"./file/sectores.png");
                }
                if ($arrayEst[$i] === "barras" && $arrayEst[$i] === "sectores") {
                    pintarBarras($arraytotal);
                    print "<h2>-------------------</h2>";
                    pintarSectores($arraytotal);
                }
            }

        }
    ?>


</body>
</html>