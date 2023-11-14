<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    $image=imagecreate(200,100);
    $image2=imagecreate(200,100);

    $fuente="./fuente\Anton-Regular.ttf";
    for ($i=0 ; $i<imagesx($image) ; $i=($i+4)) {
        $color=imagecolorallocate($image,rand(0, 255), rand(0, 255), rand(0, 255));
        $color=imagecolorallocate($image2,rand(0, 255), rand(0, 255), rand(0, 255));
        for ($j=0 ; $j<imagesy($image) ; $j++) {
            
            imagesetpixel($image, $i, $j, $color);
            imagesetpixel($image2, $i, $j, $color);
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
            imagefttext($image2, 20, random_int(0, 180), 30*($i+1), 50,$colorfuente,$fuente, $arrayLetras[$i] );
        }
        
        ob_clean();
        imagepng($image);
        imagepng($image2);
     
    

    

    

    ?>
</body>


</html>