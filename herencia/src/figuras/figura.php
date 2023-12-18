<?php
    namespace Clases;

    abstract class Figura {

        private $color;
        private $tamano;
        private $tamano2;

        public function __construct($col, $tam1, $tam2 = null) {
            $this->color=$col;
            $this->tamano=$tam1;
            $this->tamano2=$tam2;

        }

        abstract public function __toString();

        abstract public function area();

        abstract public function perimetro();

        abstract public function estilos();

        public function getTamano() {
            return $this->tamano;
        }

        public function getTamano2() {
            return $this->tamano2;
        }

        public function getColor() {
            return $this->color;
        }


    }
    






?>