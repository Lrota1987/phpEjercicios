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


        $books = new Clases\Book("", "", "", "", "");
        if (isset($_POST['isbn'])) {
            $books->actualizar($_POST['id'], $_POST['isbn'], $_POST['title'], $_POST['author'], $_POST['stock'], $_POST['price']);
        }
        $books->visualizarBooks();
    ?>
</body>
</html>