<?php
class Human
{
    public $weight;
}
class Adult extends Human
{
    public $weight=1;
    public function getWeight(){
        return $this->weight;
    }
}
class Child extends Human
{
   public $weight=0.5;
   public function getWeight(){
       return $this->weight;
   }
}
class Boat
{
    public $amountOfSits = 2;
    public $arrBoat = array();
    function setIn($value){
        array_push($this->arrBoat,$value);
    }
    function getCapacity(){
        return count($this->arrBoat);
    }

}

interface RegistryInterface
{
    public function set($key, $value = null);

    public function get($key);

    public function uns($key);
}

class Side implements RegistryInterface
{
    protected $registry = [];


    public function set($key, $value = null)
    {
        if (isset($this->registry[$key])) {
            throw new Exception('Element with key:' . $key . ' already exists!!!');

            return false;
        }

        $this->registry[$key] = $value;

        return $this;
    }

    public function get($key)
    {
        if (!isset($this->registry[$key])) {
            return false;
        }

        return $this->registry[$key];
    }

    public function uns($key)
    {
        if (!isset($this->registry[$key])) {
            throw new Exception('Element with key:' . $key . ' not exists!!!');
        }

        unset($this->registry[$key]);

        return $this;
    }

    public function has($key)
    {
        return isset($this->registry[$key]);
    }

    public function upd($key, $value = null)
    {
        if ($this->has($key)) {
            $this->uns($key);
        }

        $this->set($key, $value);

        return $this;
    }
    function getArr(){
        return $this->registry;
    }

}



$amountChild = 5;
$amountAdult =6;
$nameCh="ch";
$nameAd="ad";
$nameIndex=0;
$amountOfPeople = $amountAdult + $amountChild;

//на данный момент создаются дети и взрослые не как обьекты, а как элементы асоциативного массива
$leftSide=new Side();
for($i=0;$i<$amountOfPeople;$i++){
    if($i<$amountChild){
        $name=$nameCh.$nameIndex;
        $leftSide->set($i,$name = new Child());
        $nameIndex++;
    }
    else{
        $name=$nameAd.$nameIndex;
        $leftSide->set($i,$name = new Adult());
    }
}
$arrLeft=$leftSide->getArr();
$rightSide=new Side();
print_r($arrLeft);
$boat=new Boat();