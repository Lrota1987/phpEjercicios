<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_POST) && !empty($_POST['display']) && !empty($_POST['diagrama'])) {
            $valor=implode("-", $_POST['diagrama']);
            setcookie('Salida', $_POST['display'], time()+172800,"/");
            setcookie('Estadistica', $valor, time()+172800, "/");
            header('Location: ./apartadoC.php');
        }
        else {
            header('Location: ./index.php');
        }
    ?>
</body>
</html>