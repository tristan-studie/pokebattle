<?php
namespace classes;
class Pokemon {
  private $name;
  private $energyType;
  private $hitpoints;
  private $health;
  private $attack;
  private $weakness;
  private $resistance;
  public static $totalPokemons = 0;

public function __construct($name, $energyType, $hitpoints, $health, $attack, $weakness, $resistance){
    $this->name = $name;
    $this->energyType = $energyType;
    $this->hitpoints = $hitpoints;
    $this->health = $hitpoints;
    $this->attack = $attack;
    $this->weakness = $weakness;
    $this->resistance = $resistance;
    self::$totalPokemons++;

  }

//get the population total of the pokemons
public static function getPopulation() {
  return Pokemon::$totalPokemons;
}
//Get the health of the specified pokemon
public function getHealth() {
  return $this->health;
}
//Set the health of the specified pokemon
public function setHealth($health){
 $this->health = $health;
}
//Get the name of the specified pokemon
public function getName(){
  return $this->name;
}
//Get the energytype of the specified pokemon
public function getEnergy(){
  return $this->energyType;
}
//Get the weakness of the specified pokemon
public function getWeakness(){
  return $this->weakness;
}
//Get the resistance of the specified pokemmon
public function getResistance(){
  return $this->resistance;
}
//Get the specified attack of the specified pokemon
public function getAttack($i){
  return $this->attack[$i];
}
//Attack an other pokemon
public function attack($attack, $target) {
  $attackingEnergy = $this->getEnergy();

  $damageReduce = $target->checkResist($attackingEnergy);
  $damageMultiplier = $target->checkWeakness($attackingEnergy);


  $damageDone = $attack->damage;
  if ($damageReduce) {
    $damageDone = $damageDone - $damageReduce;
  }
  if ($damageMultiplier) {

    $damageDone = ($damageDone * $damageMultiplier);
  }
  $target->damage($damageDone);
}

public function damage($damageDone){
  $newHealth = $this->getHealth() - $damageDone;
  $this->setHealth($newHealth);
  if ($this->getHealth() <= 0) {
    Pokemon::$totalPokemons--;
  }
}
//Check if there are resists that have to be applied
public function checkResist($attackingEnergy){

  if ($this->getResistance()->name == $attackingEnergy) {
    $damageReduce = $this->getResistance()->value;

    return $damageReduce;
  } else {
    return;
  }
}
//Check if there are weaknesses that have to be applied
public function checkWeakness($attackingEnergy){

if ($this->getWeakness()->name == $attackingEnergy) {
  $damageMultiplier = $this->getWeakness()->multiply;
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
