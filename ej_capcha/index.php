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
        $arrayGlobal=crearArray();
        $arrayLetras=$arrayGlobal[0];
        $img=$arrayGlobal[1];
        setcookie("cadena", implode("",$arrayLetras));
        echo <<< EOT
            <div class="formulario">
                <form action="./result.php" method="post">
                    <img src='data:image/png;base64,$img' /></br>
                    </p>
                    <label>Introduzca el capcha: </label>
                    <input type="text" name="letrasCapcha"/></br>
                    <input type="submit" class="submit" value="No soy un robot"/>
                </form>
            </div> 
        EOT;
    ?>
   
</body>
</html>