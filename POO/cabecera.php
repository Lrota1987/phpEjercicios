
    <?php
        class Cabecera {
            public string $cabecera;

            public function __construct($cab) {
                $this->cabecera=$cab;
            }

            public function dibujar() {
                print "<p>".$this->cabecera."</p>";
            }

        }
    ?>
