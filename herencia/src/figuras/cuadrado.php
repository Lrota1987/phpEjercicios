<?php

    namespace Clases;
    use Clases\figura;
    
    class Cuadrado extends Figura {

        public function __construct($col, $tam) {
            parent::__construct($col, $tam);
        }

        public function __toString() {
            return "<label> Soy un ".substr(get_class(), 7)."</label>";
        }

        public function area() {
            return pow(parent::getTamano(), 2);
        }
        
        public function perimetro() {
            return parent::getTamano()*4;
        }

        public function estilos() {
            return "<div class='figura' style='width:".parent::getTamano()."px;
                        height:".parent::getTamano()."px;
                        background-color:".parent::getColor().";'></div>";
        }


    }
?>