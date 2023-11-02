<?php
    if (!isset($_COOKIE['comprobar'])) {
        setcookie('comprobar',1,time()+3600);
        header("Refresh: 5; url=http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
        echo 'Comprobando si tiene activadas las coockies</br>';
        echo 'Esta comprobacion se repetira cada 5 segundos';
    }
    else {
        echo 'Gracias por activar las coockies';
    }
?>