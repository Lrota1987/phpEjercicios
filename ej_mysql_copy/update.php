<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once("./vendor/autoload.php");
    if (!isset($_POST['isbn'])) {
        $objBook = new Clases\Book("", "", "", "", "");
        
        $values = $objBook->selectBook($_POST['actualizar']);
    }



    print '<form action="./db_viewer.php" method="post">';
        print '<label for="id">ID: </label>';
        print  '<input id="age" name="id" type="number" value="'.$_POST['actualizar'].'" readonly />';

        print '<label for="isbn">ISBN: </label>';
        print '<input type="text" name="isbn" id="isbn" value="'.$values['isbn'].'" />';

        print '<label for="title">Title: </label>';
        print '<input type="text" name="title" id="title" value="'.$values['title'].'" />';

        print '<label for="author">Author: </label>';
        print '<input type="text" name="author" id="author" value="'.$values['author'].'" />';

        print '<br>';

        print '<label for="stock">Stock: </label>';
        print '<input type="text" name="stock" id="stock" value="'.$values['stock'].'" />';

        print '<label for="price">Price: </label>';
        print '<input type="number" name="price" id="price" value="'.$values['price'].'" step="0.01" />';

        print '<br>';

        print '<button type="submit">ACTUALIZAR</button>';
    print '</form>';


    ?>
</body>
</html>