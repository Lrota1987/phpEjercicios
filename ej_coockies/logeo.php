<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    

    <?php
    /*
        $español=["usuario"=>"Usuario","contraseña"=>"Contraseña", "cabecera"=>"Identificación de usuario"];
        $ingles=["usuario"=>"Username", "contraseña"=>"Password", "cabecera"=>"User ID"];
        $frances=["usuario"=>"Utilisateur", "contraseña"=>"Mot de passe", "cabecera"=>"ID de l'utilisateur"];
        $italiano=["usuario"=>"Utente", "contraseña"=> "password", "cabecera"=>"ID utente"];
        $portugues=["usuario"=>"Usuário","contraseña"=>"Senha", "cabecera"=>"ID do usuário"];
    */
        
        $idiomaCoockie=$_COOKIE['idioma'];
        $data=file_get_contents("./idiomas/$idiomaCoockie.json");
        $palabras=json_decode($data);
        pintarForm($palabras);
        //pintarForm($$idioma);


        function pintarForm($idioma) {
            $contraseña = $idioma->contraseña;
            $cabecera = $idioma->cabecera;
            $usuario = $idioma->usuario;
            print "<form action='' method='post' class='formLogeo'>";
            print "<div class='cabeceraLogeo'><h2 id='textoCabeceraIndex'>".$cabecera."</h2></div>";
            print "<div class='cuerpoLogin' style='background-color:".$_COOKIE['fondo']."'><label>".$usuario.": </label><input type='text' name='usu' /></br>";
            print "<label>".$contraseña.": </label><input type='password' name='pass' /></div>";
            print "</form>";
        }
        
    

        
    ?>
</body>

<style>
    .cuerpoLogin {
        height: 100vh;
    }
</style>
</html>