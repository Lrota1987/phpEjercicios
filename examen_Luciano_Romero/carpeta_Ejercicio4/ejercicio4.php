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
        if (isset($_POST['ciclos'])) {
            $_SESSION['ciclos-elegidos']=$_POST['ciclos'];
            var_dump($_SESSION['ciclos-elegidos']);
            print '<form action="" method="POST">';
            echo <<< EOT
            
                <input type="radio" name="curso" id="primero" value="primero" />
                <label for="primero">Primero</label>
                </br>
                <input type="radio" name="curso" id="segundo" value="segundo" />
                <label for="segundo">Segundo</label>
                </br>
                <input type="submit" value="Siguiente">
            </form>
            EOT;
        }
        
        if (!empty($_POST['curso'])) {
            $_SESSION['curso']=$_POST['curso'];
            print "<form action='./ejercicio4-2.php' method='POST'>";
            foreach ($_SESSION['ciclos-elegidos'] as $ciclo) {
                if (array_key_exists($ciclo, $_SESSION['ciclos'])){
                    print "<h3>Formulario para ".$ciclo." del curso ".$_SESSION['curso'].":</h3>";
                    foreach ($_SESSION['ciclos'][$ciclo][$_SESSION['curso']] as $modulo => $creditos) {


                        print "<input type='checkbox' name='modulos[]' id='$modulo' value='$modulo' />";
                        print "<label for='$modulo'>$modulo</label></br>";
                    }
                }
            }
            print "<input type='submit' value='Enviar' />";
            print "</form>";
        }
    ?>
</body>
</html>