<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="main container">
        <form action="" method="POST">
            <div class="isbn-title-author">
                <label for="isbn">ISBN: </label>
                <input type="text" name="isbn" id="isbn" />

                <label for="title">TÍTULO: </label>
                <input type="text" name="title" id="title" />

                <label for="author">AUTOR: </label>
                <input type="text" name="author" id="author" />
            </div>
            <div class="stock-price">
                <label for="stock">STOCK: </label>
                <input type="number" name="stock" id="stock" />

                <label for="price">PRECIO: </label>
                <input type="number" name="price" id="price" step="0.01" />
            </div>
            <div class="submit-form">
                <input type="submit" value="CREAR NUEVO LIBRO">
            </div>
        </form>
    </div>
    <?php
        require_once("./vendor/autoload.php");

        if (isset($_POST['isbn'])) {
            $books = new Clases\Book("", "", "", "", "");
            $books->anadirLibro($_POST['isbn'], $_POST['title'], $_POST['author'], $_POST['stock'], $_POST['price']);
        }
    ?>
</body>
</html>