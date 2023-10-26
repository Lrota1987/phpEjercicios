<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $oros=[];
    $copas=[];
    $bastos=[];
    $espadas=[];
    for ($i = 1 ; $i <= 12 ; $i++ ) {
        array_push($oros, $i."oros");
        array_push($copas, $i."copas");
        array_push($bastos, $i."bastos");
        array_push($espadas, $i."espadas");
        print "<p>".$oros[$i-1]."</p>";
    }
    $baraja=[$oros, $copas, $bastos, $espadas];
    
    ?>
</body>
</html>