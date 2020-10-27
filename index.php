<?php
include 'config.php';
spl_autoload_register(function ($class) {
    include CLASS_PATH . $class . '.php';
});

$electricMouse = new Pikachu('Electric Mouse');
$livingTorch = new Charmeleon("Living Torch");

echo $livingTorch->name . " : " .  $livingTorch->getHealth() . "<br>";

$electricMouse->attack($electricMouse->attack[0], $livingTorch);

//Attack 1
echo $livingTorch->name . " : " .  $livingTorch->getHealth() . "<br>";
echo $electricMouse->name . " : " .  $electricMouse->getHealth() . "<br>";

$livingTorch->attack($electricMouse->attack[1], $electricMouse);
//Attack 2
echo $electricMouse->name . " : " .  $electricMouse->getHealth() . "<br>";



 ?>
