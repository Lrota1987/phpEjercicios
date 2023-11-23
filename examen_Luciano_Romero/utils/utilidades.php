<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function pintarBarras($array) {
            $arraysalida=array();
            foreach ($array as $moneda=>$repe) {
                $image=imagecreate($repe*100,50);
                imagecolorallocate($image,rand(0, 255), rand(0, 255), rand(0, 255));
                ob_start();
                imagepng($image);
                $img=ob_get_contents();
                ob_clean();
                array_push($arraysalida,base64_encode($img));

            }
            return $arraysalida;

        }

        function pintarSectores($array) {
            $unidadCirculo=360/array_sum($array);
            $cont=0;
            $img=imagecreate(500, 500);
            imagecolorallocate($img,0xC0, 0xC0, 0xC0 );
            foreach ($array as $moneda=>$repe) {
                $color=imagecolorallocate($img, rand(0, 255), rand(0, 255), rand(0, 255));
                $ancho=$repe*$unidadCirculo;
                imagefilledarc($img, 250, 250, 500, 500,$cont,$cont+$ancho,$color, IMG_ARC_PIE);
                $cont=$cont+$ancho;
            }
            ob_start();
            imagepng($img);
            $image=ob_get_contents();
            ob_clean();
            return $cadena=base64_encode($image);
        }

        function pintarSectoresOnfile($array, $dir) {
            $unidadCirculo=360/array_sum($array);
            $cont=0;
            $img=imagecreate(500, 500);
            imagecolorallocate($img,0xC0, 0xC0, 0xC0 );
            foreach ($array as $moneda=>$repe) {
                $color=imagecolorallocate($img, rand(0, 255), rand(0, 255), rand(0, 255));
                $ancho=$repe*$unidadCirculo;
                imagefilledarc($img, 250, 250, 500, 500,$cont,$cont+$ancho,$color, IMG_ARC_PIE);
                $cont=$cont+$ancho;
            }
            ob_start();
            imagepng($img, $dir);
            ob_clean();
        }

        function pintarBarrasOnFile($array, $dir) {
            $alto=50;
            foreach ($array as $moneda=>$repe) {
                $image=imagecreate($repe*100,$alto);
                imagecolorallocate($image,rand(0, 255), rand(0, 255), rand(0, 255));
                ob_start();
                imagepng($image,$dir."/$moneda.png");
                ob_clean();
            }

        }
    ?>
</body>
</html>