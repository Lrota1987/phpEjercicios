<?php
    abstract class Figura {

        private $color;
        private $tamano;
        private $tamano2;

        public function construct($color, $tam1, $tam2) {
            $this->color=$color;
            $this->tamano=$tam1;
            $this->tamano2=$tam2;
        }

        public function tostring() {
            print "<label>Soy un ".get_class()."</label>";
        }
    }
?>