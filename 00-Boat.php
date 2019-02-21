<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class Human
{
    public $weight;
}
class Adult extends Human
{
    public $weight = 1;
    public function getWeight(){
        return $this->weight;
    }
}
class Child extends Human
{
    public $weight = 0.5;
    public function getWeight(){
        return $this->weight;
    }
}
//убрал из использования(проблемы с высадкой людей на правый берег)
class Boat
{
    public $amountOfSits = 1;
    public $arrBoat = array();
    function setIn($value){
        array_push($this->arrBoat,$value);
    }
    function getCapacity(){
        return count($this->arrBoat);
    }
    function getPeople(){
        for($i=0;i<count($this->arrBoat);$i++){
            return $this->arrBoat[$i];
        }
    }

}

interface InterfaceRegistrySide
{
    public function set($key, $value = null);

    public function get($key);

    public function uns($key);

    public function hasSomeone($str);

    public function getIndexOfAdult();

    public function getIndexOfChild();

    public function returnChild();

    public function returnAdult();
}

class Side implements InterfaceRegistrySide
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

    //Check someone on the side
    public function hasSomeone($str)
    {
        foreach ($this->registry as $key=>$value){
            if(get_class($value) == $str)
                return true;
        }
    }
    //return first find index of Adult
    public function getIndexOfAdult()
    {
        foreach ($this->registry as $key=>$value){
            if(get_class($value) == "Adult")
                return $key;
        }
    }
    //return first find index of Child
    public function getIndexOfChild()
    {
        foreach ($this->registry as $key=>$value){
            if(get_class($value) == "Child")
                return $key;
        }
    }
    //return first find Child
    public function returnChild()
    {
        foreach ($this->registry as $key=>$value){
            if(get_class($value) == "Child")
                return $this->registry[$key];
        }
    }
    //return first find Adult
    public function returnAdult()
    {
        foreach ($this->registry as $key=>$value){
            if(get_class($value) == "Adult")
                return $this->registry[$key];
        }
    }
}

$amountChild = 10;
$amountAdult = 4;
//имена обьектов типа Child/Adult + nameIndex
$nameCh = "ch";
$nameAd = "ad";
$nameIndex = 0;
$amountOfPeople = $amountAdult + $amountChild;
//$numberOfIteration = 0;

$leftSide = new Side();

$rightSide = new Side();

$boat = new Boat();

//заполнение левого берега
for($i = 0;$i < $amountOfPeople;$i++){
    if($i < $amountChild){
        $name = $nameCh.$nameIndex;
        $leftSide->set($i,$name = new Child());
        $nameIndex++;
    }
    else{
        $name=$nameAd.$nameIndex;
        $leftSide->set($i,$name = new Adult());
    }
}
echo "____________\n"."</br>";
echo "|LeftSide  |\n"."</br>";
echo "____________\n"."</br>";
print_r($leftSide);

if($amountAdult<2){
    echo "Взрослых меньше 2х. По условию задание не выполняется!!!";
    return false;
}else{
    //index of people on the right side
    $counter = 0;
    do{
        if(($leftSide->hasSomeone("Adult"))&&(!($rightSide->hasSomeone("Adult")))){
            //Adult moves first, because the child shouldn't be alone
            $rightSide->set(0,$leftSide->returnAdult());
            $leftSide->uns($leftSide->getIndexOfAdult());
            $counter++;
        }
        //If left and Right have 1 Adult - move all child
        if(($leftSide->hasSomeone("Adult"))&&($rightSide->hasSomeone("Adult"))){

            //Capacity of the boat = 2( boatman(1)+ child(0.5+0.5)
            if($leftSide->hasSomeone("Child")){
                $rightSide->set($counter,$leftSide->returnChild());
                $leftSide->uns($leftSide->getIndexOfChild());
                $counter++;
            }
            if($leftSide->hasSomeone("Child")){
                $rightSide->set($counter, $leftSide->returnChild());
                $leftSide->uns($leftSide->getIndexOfChild());
                $counter++;
            }
        }
        //If adults are still left - move them on the right side
        if($leftSide->hasSomeone("Adult")&&(!$leftSide->hasSomeone("Child"))){
            $rightSide->set($counter,$leftSide->returnAdult());
            $leftSide->uns($leftSide->getIndexOfAdult());//counter
            $counter++;
        }
        //if no adults on the left side -finish program
        //show information about two sides
        if (!$leftSide->hasSomeone("Adult")){
            echo '</br>';
            echo "Show information about two sides \n"."</br>";
            echo "______________\n";
            echo "|  LeftSide  |\n";
            echo "______________\n";
            print_r($leftSide);

            echo "_______________\n";
            echo "|  RightSide  |\n";
            echo "_______________\n";
            print_r($rightSide);

            echo "Все люди были успешно переправлены!";

            return 0;
        }
    }while(true);
}








