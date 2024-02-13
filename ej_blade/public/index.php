<?php

require '../vendor/autoload.php';


use Windwalker\Edge\Loader\EdgeFileLoader;
use Windwalker\Edge\Edge;
use Philo\Blade\Blade;
use Clases\Book;


$edge = new Edge(new EdgeFileLoader(array('../views/plantillas', '../views')));
$titulo='Books';
$encabezado='Listado de Libros';
$libros=(new Book())->recuperarBook();
echo $edge->render('vistaLibros', array('titulo'=>$titulo, 'encabezado'=>$encabezado, 'libros'=>$libros));
?>