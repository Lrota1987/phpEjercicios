<?php
if (!isset($_POST['idiomas'])) {
    print "<p>Por favor rellene el formulario</p>";
    header("refresh:5; url=./index.php");
}
else {
    setcookie('idioma',$_POST['idiomas']);
    setcookie('fondo',$_POST['colorFondo']);
    header("refresh:1; url=./logeo.php");
}

?>
