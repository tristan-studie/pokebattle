<?php
class Pokemon {
  public $name;
  public $energyType;
  public $hitpoints;
  public $health;
  public $attack;
  public $weakness;
  public $resistance;

public function __construct($name, $energyType, $hitpoints, $health, $attack, $weakness, $resistance){
    $this->name = $name;
    $this->energyType = $energyType;
    $this->hitpoints = $hitpoints;
    $this->health = $hitpoints;
    $this->attack = $attack;
    $this->weakness = $weakness;
    $this->resistance = $resistance;
  }


public static function getPopulation() {

}

public function getHealth() {
  return $this->health;
}

public function attack($attack, $target) {
  $attackingEnergy = $this->energyType;

  $damageReduce = $target->checkResist($attackingEnergy);
  $damageMultiplier = $target->checkWeakness($attackingEnergy);


  $damageDone = $attack->damage;
  if ($damageReduce) {
    $damageDone = $damageDone - $damageReduce;
  }
  if ($damageMultiplier) {

    $damageDone = ($damageDone * $damageMultiplier);
  }

  $target->health = $target->health - $damageDone;

}

public function checkResist($attackingEnergy){

  if ($this->resistance->name == $attackingEnergy) {
    $damageReduce = $this->resistance->value;

    return $damageReduce;
  } else {
    return;
  }
}

public function checkWeakness($attackingEnergy){

if ($this->weakness->name == $attackingEnergy) {
  $damageMultiplier = $this->weakness->multiply;
  return $damageMultiplier;
} else {
  return;
}
}

public function __toString(){
  return json_encode($this);
}
}
 ?>
