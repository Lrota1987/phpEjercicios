<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="./CSS/style.css">
</head>
<body>
    <div class="contenido">
        <?php
        require './PHP/funciones.php';
            if(!isset($_POST['enviarDatos'])) {
                inicioComprobarSesion();

                // pintarFormulario() carga el formulario de petición de datos en una variable, para facilitar modificarlo en caso de datos erróneos (colorear texto en rojo)
                $formulario = pintarFormulario();
                print_r($formulario);
            } else {
                session_start();
                guardarDatos(); // Guarda los datos pasados en POST en variables de sesión
                $resultados = comprobarDatos(pintarFormulario()); // Comprueba si los datos pasados son válidos. Devuelve si la comprobación encontró errores, y el formulario modificado
                if($resultados[0] == false) { 
                    echo 'Bienvenido/a, <b>'.$_SESSION['nombre'].'</b>';
                    echo '<br>';
                    
                    // Cierra la sesión. Al no estar iniciado $_POST['enviarDatos'], el programa entrará en inicioComprobarSesión(), que crea (vacías) de nuevos las variables de sesión.
                    echo '<a class="boton boton--link" href="./index.php">Salir de la sesión</a>'; 
                } else { // Presenta el formulario modificado con los errores encontrados
                    print_r($resultados[1]);
                }
                
            }
        ?>
    </div>
</body>
</html>