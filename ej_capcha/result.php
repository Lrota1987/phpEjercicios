<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="result">
    <?php

require("imageCreator.php");

        if (isset($_POST)) {
            $_POST['letrasCapcha']=strtoupper($_POST['letrasCapcha']);
            $_POST['letrasCapcha2']=strtoupper($_POST['letrasCapcha2']);
            $cadenaArray=$_COOKIE['cadena'];
            $cadenaArray2=$_COOKIE['cadena2'];
            if ($_POST['letrasCapcha'] === $cadenaArray && $_POST['letrasCapcha2'] === $cadenaArray2 ) {
                print "<p>Enhorabuena no eres un robot!!</p>";
            }
            else {
                print "<c>Oiga, es usted un robot!!</c>";
                header("refresh: 2; url=./index.php");
            }
        }
    ?>
    </div>
</body>
</html>