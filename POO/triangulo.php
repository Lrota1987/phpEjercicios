<?php
    class Triangulo extends Figura {
        public function __construct($col, $tam, $tam2) {
            parent::__construct($col, $tam, $tam2);
        }

        public function __toString() {
            return "<label> Soy un ".get_class()."</label>";
        }

        public function area() {
            return (parent::getTamano()*parent::getTamano2())/2;
        }

        public function perimetro() {
            return round(2*(sqrt(pow(parent::getTamano()/2, 2)+pow(parent::getTamano2(), 2)))+parent::getTamano(), 2);
        }

        public function estilos() {
            return  "<div style=
                        'width:".parent::getTamano()."px;
                        height:".parent::getTamano2()."px;
                        clip-path: polygon(50% 0, 100% 100%, 0 100%);
                        background-color:".parent::getColor().";' ></div>";
        }
    }
    
?>