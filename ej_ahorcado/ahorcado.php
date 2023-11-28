<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego del ahorcado</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="header">
        <?php
        session_start();
        
        if (isset($_POST['nombre'])) {
            $_SESSION['letra']="";
            $_SESSION['nombre']=strtoupper($_POST['nombre']);
            $arrayPalabras=["murcielago", "pera", "nadador", "ordenador", "instituto", "pelicula", "manantial", "hallazgo", "gorila", "furgoneta", "pastel", "hormiga", "calendario", "arbol"];
            $_SESSION['alfabeto']=["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "Ñ", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
            $_SESSION['arrayLetrasUs']=array();
            $_SESSION['palabra']=strtoupper($arrayPalabras[rand(0, sizeof($arrayPalabras)-1)]);
            $_SESSION['contError']=-1;
            $_SESSION['contAciertos']=0;
        }
        print "<h1>BIENVENIDO ".$_SESSION['nombre']."</h1>";
        ?>
    </div>
    <div class="contenedor">
        <div class="contenedor2">
        <?php
            $cont=0;
            $errorTot=strlen($_SESSION['palabra']);
            $fallo=true;

            if (isset($_POST['letra'])) {
                $_SESSION['letra']=$_POST['letra'];
            }
            print "<div class='palabra'>";
                for ($i=0 ; $i<strlen($_SESSION['palabra']) ; $i++) {
                    if ($_SESSION['letra'] === $_SESSION['palabra'][$i] && !in_array($_SESSION['palabra'][$i], $_SESSION['arrayLetrasUs'])) {
                        print $_SESSION['palabra'][$i]." ";
                        array_push($_SESSION['arrayLetrasUs'],$_SESSION['palabra'][$i]);
                        $fallo=false;
                    }
                    elseif (in_array($_SESSION['palabra'][$i], $_SESSION['arrayLetrasUs'])) {
                        print $_SESSION['palabra'][$i]." ";
                    }
                    else {
                        print "_ ";
                    }
                }
            print "</div>";

            print "<div class='errores'>";
                if ($fallo===true) {
                    $_SESSION['contError']++;
                }
                else {
                    $_SESSION['contAciertos']++;
                }
                if ($_SESSION['contError'] === 8) {
                    print "HAS PERDIDO ".$_SESSION['nombre'].", ERES UN MONGOLO";
                }
                else {
                    if ($_SESSION['contAciertos'] === strlen($_SESSION['palabra'])) {
                        print "HAS GANADO ".$_SESSION['nombre'].", ERES UN DIOS CON UN INTELÉCTO OLÍMPICO.";
                    }
                    else {
                        print "<label>Fallos: </label>";
                        for ($i=0 ; $i < $_SESSION['contError'] ; $i++) {
                            print "<label>#</label>";
                        }
                    }

    
                }

            print "</div>";

            print "<div class='teclado'>";
                print "<form action='' method='POST'>";
                for ($i=0 ; $i<sizeof($_SESSION['alfabeto']) ; $i++) {
                    print "<input type='submit' name='letra' value='".$_SESSION['alfabeto'][$i]."' />";
                    $cont++;
                    if ($cont === 10) {
                        $cont=0;
                        print "</br>";
                    }
                }
                print "</form>";
            print "</div>";
        ?>
        </div>
    </div>
</body>

</html>