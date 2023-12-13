<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include '../utils/functions.php';
        spl_autoload_register('classAutoLoader');
        session_start();
        if (isset($_POST['color'])) {
            $_SESSION['color'] = $_POST['color'];
            $_SESSION['tamano'] = $_POST['tamano'];
            if (isset($_POST['tamano2'])) {
                $_SESSION['tamano2'] = $_POST['tamano2'];
            }
        }

        switch ($_SESSION['figura']) {
            case "cuadrado":
                $cuadrado = new Cuadrado($_SESSION['color'], $_SESSION['tamano']);
                print $cuadrado->estilos();
                print "<label>El área del ".$_SESSION['figura']." es: ".$cuadrado->area()." px.</label>";
                break;
        }
    ?>
</body>
</html>