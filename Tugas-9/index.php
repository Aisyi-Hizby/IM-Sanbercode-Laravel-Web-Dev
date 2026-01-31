<?php
require_once('animal.php');
require_once('Frog.php');
require_once('Ape.php');

$unit1 = new Animal("shaun");
echo "Name: " . $unit1->identitas . "<br>";
echo "Legs: " . $unit1->total_kaki . "<br>";
echo "Cold blooded: " . $unit1->darah_dingin . "<br><br>";

$unit2 = new Ape("kera sakti");
echo "Name: " . $unit2->identitas . "<br>";
echo "Legs: " . $unit2->total_kaki . "<br>";
echo "Cold blooded: " . $unit2->darah_dingin . "<br>";
echo "Yell: "; $unit2->yell();
echo "<br>";

$unit3 = new Frog("buduk");
echo "Name: " . $unit3->identitas . "<br>";
echo "Legs: " . $unit3->total_kaki . "<br>";
echo "Cold blooded: " . $unit3->darah_dingin . "<br>";
echo "Jump: "; $unit3->jump();