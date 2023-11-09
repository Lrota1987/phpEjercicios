<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    function arrayLetras() {
        
    }
    
    function crearArray() {
    $arrayGlobal=array();
    $image=imagecreate(200,100);
    $fuente="./fuente\Anton-Regular.ttf";
    for ($i=0 ; $i<imagesx($image) ; $i=($i+4)) {
        $color=imagecolorallocate($image,rand(0, 255), rand(0, 255), rand(0, 255));
        for ($j=0 ; $j<imagesy($image) ; $j++) {
            
            imagesetpixel($image, $i, $j, $color);
        }
    }
        $permited_charts='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $arrayLetras=array();
        
        for ($i=0 ; $i<5 ; $i++) {
            $palabraRandom=substr(str_shuffle($permited_charts),0,1);
            array_push($arrayLetras, $palabraRandom);
        }
        for ($i=0 ; $i<sizeof($arrayLetras) ; $i++) {
            $colorfuente=imagecolorallocate($image,rand(0, 255), rand(0, 255), rand(0, 255));
            imagefttext($image, 20, random_int(0, 180), 30*($i+1), 50,$colorfuente,$fuente, $arrayLetras[$i] );
        }
        ob_start();
        imagepng($image);
        $img=ob_get_contents();
        ob_clean();
        $cadena=base64_encode($img);
        array_push($arrayGlobal,$arrayLetras);
        array_push($arrayGlobal,$cadena);

        return $arrayGlobal;
        
    }
    
    

    

    

    ?>
</body>


</html>