<?php
include 'config.php';
spl_autoload_register(function ($class) {
    include CLASS_PATH . $class . '.php';
});

$test_subject = new Pikachu('test');

echo $test_subject->getHealth();
echo $test_subject;
 ?>
