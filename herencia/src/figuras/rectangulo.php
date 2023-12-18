<?php
    namespace Clases;
    use Clases\figura;
    
    class Rectangulo extends Figura {
        public function __construct($col, $tam, $tam2) {
            parent::__construct($col, $tam, $tam2);
        }

        public function __toString() {
            return "<label> Soy un ".get_class()."</label>";
        }

        public function area() {
            return (parent::getTamano() * parent::getTamano2());
        }

        public function perimetro() {
            return (parent::getTamano()*2 + parent::getTamano2()*2);
        }

        public function estilos() {
            return "<div class='figura' style='width:".parent::getTamano()."px;
                        height:".parent::getTamano2()."px;
                        background-color:".parent::getColor().";'></div>";
        }
    }
?>