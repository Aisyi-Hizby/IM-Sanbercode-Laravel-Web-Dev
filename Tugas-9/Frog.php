<?php
require_once('animal.php');

class Frog extends Animal {
    public function jump() {
        $kata = "hop";
        printf("%s %s <br>", $kata, $kata);
    }
}