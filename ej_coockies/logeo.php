<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="cabeceraLogeo">
    <h2 id="textoCabeceraIndex">Configuración de coockies.</h2>
</div>
    <?php
        $español=["usuario"=>"Usuario","contraseña"=>"Contraseña"];
        $ingles=["usuario"=>"Username", "contraseña"=>"Password"];
        $frances=["usuario"=>"Utilisateur", "contraseña"=>"Mot de passe"];
        $italiano=["usuario"=>"Utente", "contraseña"=> "password"];
        $portugues=["usuario"=>"Usuário","contraseña"=>"Senha"];
        print "<p>".$_COOKIE['idioma']."</p>";
        print "<form action='' method='post' class='formLogeo'>";
        switch ($_COOKIE['idioma']) {
            case "español":
                print "<label>".$español["usuario"].": </label>";
                print "<input type='text' name='user' />";
        }

        print "</form>";
    ?>
</body>
</html>