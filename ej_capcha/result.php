<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php

require("imageCreator.php");

        if (isset($_POST)) {
            $_POST['letrasCapcha']=strtoupper($_POST['letrasCapcha']);
            $cadenaArray=$_COOKIE['cadena'];
            var_dump($cadenaArray);
            if ($_POST['letrasCapcha'] === $cadenaArray ) {
                print "<p>Enhorabuena no eres un robot!!</p>";
            }
            else {
                print "<p>Oiga, es usted un robot!!</p>";
            }
        }
    ?>
</body>
</html>