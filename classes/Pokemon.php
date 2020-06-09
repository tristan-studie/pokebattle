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

public static function getPopulationHealth() {

}

public function __toString(){
  return json_encode($this);
}
}
 ?>
