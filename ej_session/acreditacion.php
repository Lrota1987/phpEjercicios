<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ej_session</title>
</head>
<body>
    <?php
        session_start();
        if (!isset($_SESSION['identificativo'])) {//No está acreditado?
            if(isset($_REQUEST['identificativo']) && isset($_REQUEST['clave'])) {
                //Ha rellenado el formulario??
                print "hola";
                if($_REQUEST['identificativo'] == 'juanfe' && 
                $_REQUEST['clave'] == 'secreto') { //Son correctas las credenciales
                    //Se comprueba si son correctas las credenciales (user and password)
                    $_SESSION['identificativo'] = $_REQUEST['identificativo'];
                    header('Location: informacion.php' );
                }
                else { //No son correctas las credenciales.
                    header('Location: acreditacion.php');
                }
            }
            else { //No ha rellenado el formulario
                echo '<form action="" method="POST">';
                echo '<label for="id_identificativo">Identificativo:</label>';
                echo '<input type="text" id="id_identificativo" name="identificativo"/>';
                echo '<br />';
                echo '<label for="id_clave">Clave:</label>';
                echo '<input type="password" id="id_clave" name="clave"/>';
                echo '<br />';
                echo '<input type="submit" value="Entrar"/>';
                echo '</form>';

            }
        }
        else { //Ya está acreditado.
            header('Location: informacion.php');
        }
    ?>
</body>
</html>