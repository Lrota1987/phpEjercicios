<?php
if (!isset($_POST['idiomas'])) {
    print "<p>Por favor rellene el formulario</p>";
    header("refresh:5; url=../index.php");
}
else {
    setcookie('idioma',$_POST['idiomas'], time()+3600, "/ej_coockies/logeo.php");
    setcookie('fondo',$_POST['colorFondo'], time()+3600, "/ej_coockies/logeo.php");
    header("refresh:1; url=../logeo.php");
}

?>
