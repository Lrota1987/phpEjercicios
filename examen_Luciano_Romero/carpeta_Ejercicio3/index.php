<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if ($_COOKIE['Salida'] === 'pantalla') {
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
            for ($i=0;$i<sizeof($arrayEst);$i++) {
                    
                if ($arrayEst[$i] === "barras") {
                    foreach ($arraytotal as $moneda=>$repe) {
                        $x=$repe;
                        $image=imagecreate($x*100,50);
                        imagecolorallocate($image,rand(0, 255), rand(0, 255), rand(0, 255));
                        ob_start();
                        imagepng($image, "../images/$moneda.png");
                        print $moneda." <img src='../images/$moneda.png' /></br>";
                    }
                }
                if ($arrayEst[$i] === "sectores") {
                    
                }
                if ($arrayEst[$i] === "barras" && $arrayEst[$i] === "sectores") {
                    
                }
            }
        }
        else {

        }
    ?>
</body>
</html>