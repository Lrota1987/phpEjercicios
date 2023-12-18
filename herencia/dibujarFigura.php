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
        require_once("./vendor/autoload.php");
        use Clases\circulo;
        use Clases\triangulo;
        use Clases\rectangulo;
        use Clases\cuadrado;
        
        if (isset($_POST['color'])) {
            $_SESSION['color'] = $_POST['color'];
            $_SESSION['tamano'] = $_POST['tamano'];
            if (isset($_POST['tamano2'])) {
                $_SESSION['tamano2'] = $_POST['tamano2'];
            }
        }

        $classFigura="Clases\\".ucfirst($_SESSION['figura']);
        if ($_SESSION['figura'] === "cuadrado" || $_SESSION['figura'] === "circulo") {
            $figura = new $classFigura($_SESSION['color'], $_SESSION['tamano']);
        }
        else {
            $figura = new $classFigura($_SESSION['color'], $_SESSION['tamano'], $_SESSION['tamano2']);
        }
        print "<div class='contenedor'>";
            print "<div class='contenedor2'>";
                print $figura->__toString();
                print $figura->estilos();
                print "<label>El área del ".$_SESSION['figura']." es: ".$figura->area()." px.</label></br>";
                print "<label>El perímetro del ".$_SESSION['figura']." es: ".$figura->perimetro()." px.</label>";
                echo <<< EOT
                <div class="boton">
                    <form action="" method="POST">
                        <button type="submit" name="final" value="nuevaF" >
                            Nueva figura
                        </button>
                        <button type="submit" name="final" value="modF" >
                            Modificar
                        </button>
                    </form>
                </div>
            EOT;
            print "</div>";
        print "</div>";


        if (isset($_POST['final'])) {
            if ($_POST['final'] === "nuevaF") {
                header("Location:./index.html");
            }
            if ($_POST['final'] === "modF") {
                header("Location:./eleccion.php");
            }
        }
    ?>



    <style>
        body {
            height: 100vh;
            overflow: scroll;
        }
        .contenedor {
            width:100%;
            height:100%;
            position:relative;
            background-image: radial-gradient(#111ae2, black);
        }
        .contenedor2 {
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

        .figura {
            margin: 0 auto;
        }
    </style>
</body>
</html>