<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

if (!isset($_POST['firstname'])) {
    require_once("./vendor/autoload.php");
    $objCust = new Clases\Customers("", "", "", "");
    
    $values = $objCust->selectCust($_POST['actualizar']);
}
    print '<form action="./cust_viewer.php" method="POST">';
        print '<label for="id">ID: </label>';
        print  '<input id="age" name="id" type="number" value="'.$_POST['actualizar'].'" readonly />';

        print '<label for="fistname">Fist name: </label>';
        print '<input type="text" name="firstname" id="firstname" value="'.$values['firstname'].'" />';

        print '<label for="surname">Surname: </label>';
        print '<input type="text" name="surname" id="surname" value="'.$values['surname'].'" />';

        print '<label for="email">Email: </label>';
        print '<input type="text" name="email" id="email" value="'.$values['email'].'" />';

        print '<br>';

        print '<p>Type: </p>';
        print '<label for="basic">Basic: </label>';
        print '<input type="radio" name="type" id="basic" value="basic" checked/>';

        print '<br>';

        print '<label for="premium">Premium: </label>';
        print '<input type="radio" name="type" id="premium" value="premium" />';

        print '<br>';

        print '<button type="submit">ACTUALIZAR</button>';

    print '</form>'
?>
</body>
</html>