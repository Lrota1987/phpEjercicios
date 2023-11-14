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
        if (isset($_GET['terminar_sesion'])) {
            //Borramos todas las variables de la sesion:
            $_SESSION=array();
            //Caducamos la coockie:
            setcookie('PHPSESSID','',time()-3600);
            //Destruimos los datos de la sesión ene lscript actual:
            session_destroy();
            //Redirigimos a la página de acreditación.
            header('Location: ./acreditacion.php');
        }
        if (!isset($_SESSION['identificativo'])) {
            header('Location: acreditacion.php');
        }
        echo '<a href="informacion.php?terminar_sesion=1">Terminar sesion</a><br />';
        echo '<a href="http://www.google.es">GOOGLE</a>';
    ?>
</body>
</html>