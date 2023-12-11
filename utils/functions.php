<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function classAutoLoader($class) {
            $class=strtolower($class);

            $classFile=$_SERVER['DOCUMENT_ROOT'].'/POO/'.$class.'.php';
            
            if (is_file($classFile) && !class_exists($class)) {
                include $classFile;
            }
        }
    ?>
</body>
</html>