<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Tu cesta de la compra es: </p>

    <?php
        require_once("./vendor/autoload.php");
        if (isset($_POST['arrayPrin'])) {
            $arrayPrin = explode("-",$_POST['arrayPrin']);

        }
        $id = $_POST['custId'];
        $total = 0;
        $books = new Clases\Book("", "", "", "", "");
        if (isset($_POST['comprar'])) {
            $arrayPrin = $_POST['libro'];
            foreach ($arrayPrin as $key => $item ) {

                $arrayBook=$books->selectBook($item);
                print "<p>".$arrayBook['title']."  ".$arrayBook['price']."€</p>";
                $total = $total + $arrayBook['price'];
            }
                print "<p>El total de su pedido es: ".$total."</p>";
                    print '<form action="" method="POST">';
                    print '<input id="arrayPrin" name="arrayPrin" type="hidden" value="'.implode("-",$arrayPrin).'" />';
                echo <<< EOT
                    <input id="custId" name="custId" type="hidden" value="$id" />
                    <input type="submit" name="compraHecha" value="Comprar">
                    </form>
                    <form action="./compraBook.php" method="POST">
                        <input type="submit" name="volver" value="Volver">
                    </form>
                EOT;
            

        }
            if (isset($_POST['arrayPrin'])) {
                $sale = new Clases\Sale("");
                $sale_book = new Clases\Sale_book("", "", "");
                $sale->anadirSale($id);

                $saleLastId = $sale->selectSaleMaxId();
                $saleLastId2 = implode(" ",$saleLastId[0]);
                print "<p>".var_dump($saleLastId)."</p>";
                foreach ($arrayPrin as $key => $item) {
                    $arrayBook=$books->selectBook($item);
                    $sale_book->anadirSaleBook($item, $saleLastId2, $arrayBook['price'], $arrayBook['stock'], $books);
                    header('Location: ./compraHecha.php');
                }
            }
        
    ?>

</body>
</html>