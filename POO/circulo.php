<?php
    class Circulo extends Figura {

        public function __construct($col, $tam) {
            parent::__construct($col, $tam);
        }

        public function __toString() {
            return "<label> Soy un ".get_class()."</label>";
        }

        public function area() {
            return round(pow(parent::getTamano(), 2)*pi(), 2);
        }

        public function perimetro() {
            return 2*pi()*parent::getTamano();
        }

        public function estilos() {
            return "<div style='width:".parent::getTamano()*2 ."px;
                        height:".parent::getTamano()*2 ."px;
                        background-color:".parent::getColor().";
                        border-radius: 50%;'></div>";
        }

    }


?>