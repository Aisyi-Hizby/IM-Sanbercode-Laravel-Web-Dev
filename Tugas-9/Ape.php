<?php
require_once('animal.php');

class Ape extends Animal {
    public function __construct(string $identitas) {
        parent::__construct($identitas);
        $this->total_kaki = 2;
    }

    public function yell() {
        print("Auooo <br>");
    }
}