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
        $_SESSION['creditos'] =array();
        if (isset($_POST['modulos'])) {
            $_SESSION['modulos_aux']=array();
            $_SESSION['modulos']=$_POST['modulos'];
            foreach ($_SESSION['ciclos-elegidos'] as $ciclo) {
                for ($i=0; $i<sizeof($_POST['modulos']);$i++) {
                    if (array_key_exists($_POST['modulos'][$i], $_SESSION['ciclos'][$ciclo][$_SESSION['curso']])) {
                        $_SESSION['modulos_aux'][$_POST['modulos'][$i]]=$_SESSION['ciclos'][$ciclo][$_SESSION['curso']][$_SESSION['modulos'][$i]];
                        array_push($_SESSION['creditos'],$_SESSION['ciclos'][$ciclo][$_SESSION['curso']][$_SESSION['modulos'][$i]]);
                    }
                }
            }

            $_SESSION['total']=array_sum($_SESSION['creditos']);
            
        }
        
        
        var_dump($_SESSION['total']);
        echo <<< EOT

            <form action="" method="POST">
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre" id="nombre" required/></br>
                <label for="apellidos">Apellidos: </label>
                <input type="text" name="apellidos" id="apellidos" required/></br>
                </br>
                <label>Dirección: </label></br>
                <label for="calle">Calle: </label>
                <input type="text" name="calle" id="calle" required/>
                <label for="numero">Número: </label>
                <input type="number" name="numero" id="numero" step=1 required/></br>
                </br>
                <label for="dni">DNI: </label>
                <input type="text" name="dni" id="dni" required/></br>
                </br>
                <label>Familia Numerosa: </label></br>
                <input type="radio" name="familia-num" id="si" value="si">
                <label for="si">Sí</label></br>
                <input type="radio" name="familia-num" id="no" value="no">
                <label for="no">No</label></br>
                <input type="submit" value="Enviar">
            </form>

        EOT;


        if (isset($_POST['nombre'])) {
            $_SESSION['nombre-completo']=$_POST['nombre'].' '.$_POST['apellidos'];
            $_SESSION['direccion']=$_POST['calle'].' número '.$_POST['numero'];
            $_SESSION['dni']=$_POST['dni'];
            $_SESSION['familia-num']=$_POST['familia-num'];
            var_dump($_SESSION['total']);
            if ($_SESSION['familia-num'] === "si") {
                echo <<< EOT
                    <form action='./ejercicio4-3.php' method='POST'>
                        <label for='general'>Familia Numerosa de carácter General: </label>
                        <input type='radio' name='general' value='general' id='general' /></br>
                        <label for='especial'>Familia Numerosa de carácter Especial: </label>
                        <input type='radio' name='especial' value='especial' id='especial' /></br>
                        <input type='submit' value='Enviar' />
                    </form>
                EOT;
            }
            else {
                header('Location:./ejercicio4-3.php');
            }
        }
    ?>
</body>
</html>