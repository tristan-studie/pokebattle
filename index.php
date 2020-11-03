<?php
include 'config.php';
spl_autoload_register(function ($class) {
    include CLASS_PATH . $class . '.php';
});


$electricMouse = new Pikachu('Electric Mouse');
$livingTorch = new Charmeleon("Living Torch");
echo "population: " .  Pokemon::getPopulation() . "<br>";
echo $livingTorch->getName() . " : " .  $livingTorch->getHealth() . "<br>";

$electricMouse->attack($electricMouse->getAttack(0), $livingTorch);

//Attack 1
echo $livingTorch->getName() . " : " .  $livingTorch->getHealth() . "<br>";
echo $electricMouse->getName() . " : " .  $electricMouse->getHealth() . "<br>";

$livingTorch->attack($livingTorch->getAttack(1), $electricMouse);
//Attack 2
echo $electricMouse->getName() . " : " .  $electricMouse->getHealth() . "<br>";



 ?>
