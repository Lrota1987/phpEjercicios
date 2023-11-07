<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    
    $path="./imagenes/imagen.png";
    $palabra = [];
    $image=imagecreate(200,100);
    $fuente="./fuente\RubikMaze-Regular.ttf";
    for ($i=0 ; $i<imagesx($image) ; $i++) {
        $color=imagecolorallocate($image,rand(0, 255), rand(0, 255), rand(0, 255));
        for ($j=0 ; $j<imagesy($image) ; $j++) {
            
            imagesetpixel($image, $i, $j, $color);
        }
    }
    $permited_charts='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $arrayLetras=array();
    
    for ($i=0 ; $i<7 ; $i++) {
        $palabraRandom=substr(str_shuffle($permited_charts),0,1);
        array_push($arrayLetras, $palabraRandom);
    }
    for ($i=0 ; $i<sizeof($arrayLetras) ; $i++) {
        $colorfuente=imagecolorallocate($image,rand(0, 255), rand(0, 255), rand(0, 255));
        imagefttext($image, 30, random_int(0, 180), 20*($i+1), 50,$colorfuente,$fuente, $arrayLetras[$i] );
    }
    var_dump($arrayLetras);
    $im = imagepng($image, $path);
    print "<img src=$path />";
    

    ?>
</body>

<style>
@import url('https://fonts.googleapis.com/css2?family=Rubik+Maze&display=swap');
</style>
</html>