<?php
include __DIR__.'./arrays.php';

function inicioComprobarSesion() {
    session_start();
    if(!isset($_POST['enviarDatos'])) {
        $_SESSION['nombre'] = "";
        $_SESSION['apellidos'] = "";
        $_SESSION['edad'] = "";
        $_SESSION['dni'] = "";
        $_SESSION['pais'] = "";
        $_SESSION['ciudad'] = "";
        $_SESSION['cp'] = "";
        $_SESSION['idiomas'] = array();
    }
}
function pintarFormulario() {
    $formulario = <<<FORM
        <form action="#" method="POST">
            <label>Nombre: </label>
                <input type="text" name="nombre" value="$_SESSION[nombre]">
            <br>
            <label>Apellidos: </label>
                <input type="text" name="apellidos" value="$_SESSION[apellidos]">
            <br>
            <label>Edad: </label>
                <input type="number" name="edad" value="$_SESSION[edad]">
            <br>
            <label>DNI: </label>
                <input type="text" name="dni" value="$_SESSION[dni]">
            <br>
            <label>País: </label>
                <input type="text" name="pais" value="$_SESSION[pais]">
            <br>
            <label>Ciudad: </label>
                <input type="text" name="ciudad" value="$_SESSION[ciudad]">
            <br>
            <label>Código postal: </label>
                <input type="number" name="cp" value="$_SESSION[cp]">
            <br>
            <label>Idiomas: </label>
                <select name="idiomas[] multiple">
                    <option>Elegir...</option>
                    <option>Español</option>
                    <option>English</option>
                    <option>Français</option>
                    <option>Deutsch</option>
                </select>
            <br>
            <input type="submit" class="boton" name="enviarDatos" value="Enviar">
        </form>
FORM;
return $formulario;
}

function guardarDatos() {
    $_SESSION['nombre'] = $_POST['nombre'];
    $_SESSION['apellidos'] = $_POST['apellidos'];
    $_SESSION['edad'] = $_POST['edad'];
    $_SESSION['dni'] = $_POST['dni'];
    $_SESSION['pais'] = $_POST['pais'];
    $_SESSION['ciudad'] = $_POST['ciudad'];
    $_SESSION['cp'] = $_POST['cp'];
    $_SESSION['idiomas'] = $_POST['idiomas'];
}

function comprobarDatos($formulario) {
    global $usuarios, $letrasDNI, $paises;
    $errores = array();
    $hayErrores = false;
    
    if(empty($_SESSION['nombre'])) { // Compureba si NOMBRE está vacío
        $formulario = pintarError($formulario, 'Nombre');
        $errores[] = generarMensajeError("'Nombre' está vacío");
    }
    if(empty($_SESSION['apellidos'])) { // Comprueba si APELLIDOS está vacío
        $formulario = pintarError($formulario, 'Apellidos');
        $errores[] = generarMensajeError("'Apellidos' está vacío");
    }
    if((!empty($_SESSION['nombre']) && !empty($_SESSION['apellidos']))) { // Comprueba que el usuario (nombre y apellidos) esté registrado
        $registrado = false;
        foreach($usuarios as $user) {
            if($user[0] == $_SESSION['nombre'] && $user[1] == $_SESSION['apellidos']) {
                $registrado = true;
            }
        }
        if(!$registrado) {
            $formulario = pintarError($formulario, 'Nombre');
            $formulario = pintarError($formulario, 'Apellidos');
            $errores[] = generarMensajeError("El usuario no está registrado");
        }
    }
    if(empty($_SESSION['edad'])) { // Comprueba si EDAD está vacío
        $formulario = pintarError($formulario, 'Edad');
        $errores[] = generarMensajeError("'Edad' está vacío");
    }
    if(empty($_SESSION['dni'])) { // Comprueba si DNI está vacío
        $formulario = pintarError($formulario, 'DNI');
        $errores[] = generarMensajeError("'DNI' está vacío");
    } else { // Comprueba si DNI es válido (letra correcta)
        $DNICompleto = $_SESSION['dni'];
        $DNINumero = substr($DNICompleto, 0, -1);
        $DNILetra = substr($DNICompleto, -1);
        $calculoDNI = $DNINumero%23;
        if($DNILetra != $letrasDNI[$calculoDNI]) {
            $formulario = pintarError($formulario, 'DNI');
            $errores[] = generarMensajeError("DNI inválido");
        }
    }
    if(empty($_SESSION['pais'])) { // Comprueba si PAÍS está vacío
        $formulario = pintarError($formulario, 'País');
        $errores[] = generarMensajeError("'País' está vacío");
    }
    if(empty($_SESSION['ciudad'])) { // Comprueba si CIUDAD está vacío
        $formulario = pintarError($formulario, 'Ciudad');
        $errores[] = generarMensajeError("'Ciudad' está vacío");
    }
    if(!empty($_SESSION['pais']) && !empty($_SESSION['ciudad'])) { // Comprueba si la CIUDAD está en el PAÍS indicado
        $pais = strtolower($_SESSION['pais']);
        $ciudad = ucfirst($_SESSION['ciudad']);

        if(!isset($paises[html_entity_decode($pais)])) { // Comprueba si el PAIS es europeo (si existe en el array $paises)
            $formulario = pintarerror($formulario, 'País');
            $errores[] = generarMensajeError("País inválido (no europeo)");
        } else if(!in_array($ciudad, $paises[$pais])) { // Comprueba si la CIUDAD está en el PAÍS
            $formulario = pintarError($formulario, 'Ciudad');
            $errores[] = generarMensajeError("Ciudad indicada inválida (no está en el país indicado)");
        }
    }
    if(empty($_SESSION['cp'])) { // Comprueba si CÓDIGO POSTAL está vacío
        $formulario = pintarError($formulario, 'Código postal');
        $errores[] = generarMensajeError("'Código postal' está vacío");
    }
    if(in_array("Elegir...", $_SESSION['idiomas'])) { // Comprueba si IDIOMAS es inválido
        $formulario = pintarError($formulario, 'Idiomas');
        $errores[] = generarMensajeError("'Idiomas' está vacío.");
    }
    if(!empty($errores)) {
        foreach($errores as $error) {
            echo $error;
        }
        $hayErrores = true;
        echo '<hr>';
    }
    return [$hayErrores, $formulario];
}


function pintarError($formulario, $campo) {
    $aguja = "<label>";
    $reemplazo = "<label style='color: red'>";

    $formulario = str_replace($aguja.$campo, $reemplazo.$campo, $formulario);
    return $formulario;
}

function generarMensajeError($mensaje) {
    return "<p style='color: red; font-weight: bold'>$mensaje</p>";
}
?>