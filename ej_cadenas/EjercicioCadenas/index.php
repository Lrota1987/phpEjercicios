<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <?php
     $parrafo1="Type something to do with buttons";
     $parrafo2="This is a text inside textarea, Just type word in the box above and give orders clicking the buttons, Enjoy!!";
    include('funciones.php');
    if (isset($_POST["Remark"])) {
       Remarcar($_POST["textarea1"],$_POST["textarea2"]);       
    }
    elseif (isset($_POST["Remove"])) {
        Borrar($_POST["textarea1"],$_POST["textarea2"]); 
    }
    elseif (isset($_POST["Replace"])) {
        Remplazar($_POST["textarea1"],$_POST["textarea2"],$_POST["textarea3"]); 
    }
    elseif (isset($_POST["words"])) {
        Palabras($_POST["textarea1"],$_POST["textarea2"]); 
    }
    elseif (isset($_POST["vowels"])) {
        Letras($_POST["textarea1"],$_POST["textarea2"]); 
    }
    elseif (isset($_POST["Lower"])) {
        Minusculas($_POST["textarea1"],$_POST["textarea2"]); 
    }
    elseif (isset($_POST["Upper"])) {
        Mayusculas($_POST["textarea1"],$_POST["textarea2"]); 
    }
    elseif (isset($_POST["Refresh"])) {
        pintar($parrafo1,$parrafo2);
    }
    else {
        pintar($parrafo1,$parrafo2);
    }
    
    ?>
    
</body>
</html>