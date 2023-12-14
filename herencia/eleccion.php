<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
        session_start();
        if (isset($_POST['figura'])){
            $_SESSION['figura'] = $_POST['figura'];
        }
        
        print "<div class='formCont'>";
            print '<form action="dibujarFigura.php" method="post">';
                print '<h4>Ha elegido usted un '.$_SESSION['figura'].'</h4>';
                print '<label for="color">Color del '.$_SESSION['figura'].': </label>';
                print '<input type="color" name="color" id="color" /></br>';
                print '<label for="tamano">Ancho/Radio: </label>';
                print '<input type="number" name="tamano" value="50" /></br>';
                if ($_SESSION['figura'] === 'triangulo' || $_SESSION['figura'] === 'rectangulo' ) {
                    print '<label for="tamano2">Altura: </label>';
                    print '<input type="number" name="tamano2" value="50" /></br>';
                }
                print '<input type="submit" value="Enviar" />';
            print '</form>';
        print '</div>';
    ?>

    <style>
        .formCont {
            width:100%;
            height:100vh;
            position:relative;
            background-image: radial-gradient(#111ae2, black);
        }

        form {
            padding: 15px;
            position:absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            border: 3px solid black;
            text-align: center;
            font-size: 25px;
            background-color: #999;
            color: #080e8a;
        }
    </style>
</body>
</html>