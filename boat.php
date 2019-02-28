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

interface InterfaceRegistrySide
{
    public function set($key, $value = null);

//    public function get($key);

    public function uns($key);

    public function hasSomeone($str);

    public function getIndexOfAdult();

    public function getIndexOfChild();

    public function returnChild();

    public function returnAdult();
}

class Side implements InterfaceRegistrySide
{
    public $amount=0;
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

//    public function get($key)
//    {
//        if (!isset($this->registry[$key])) {
//            return false;
//        }
//        return $this->registry[$key];
//    }

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
    public function getArray(){
        return $this->registry;
    }
    public function amountOfSomeone($str){
        $this->amount=0;
        foreach ($this->registry as $key=>$value){
            if(get_class($value) == $str){
                $this->amount++;
            }
        }
        return $this->amount;

    }


}
Class Boat extends Side
{
    public $chWeight;
    public $adWeight;
    public $capacity = 0;


    public function checkCapacity(){
        $this->capacity=0;
        foreach ($this->registry as $key=>$value){
            if(get_class($value) == "Adult")
                $this->capacity+=$this->adWeight;
            if(get_class($value)=="Child")
                $this->capacity+=$this->chWeight;
        }
        return $this->capacity;
    }
}

$amountChild = 70;
$amountAdult = 4;
//имена обьектов типа Child/Adult + nameIndex
$nameCh = "child";
$nameAd = "adult";
$amountOfPeople = $amountAdult + $amountChild;

$leftSide = new Side();

$rightSide = new Side();

$boat = new Boat();


//Fill Left Side
for($i = 0;$i < $amountOfPeople;$i++){
    if($i < $amountChild){
        $name = $nameCh.$i;
        $leftSide->set($i,$name = new Child());
    } else{
        $name=$nameAd.$i;
        $leftSide->set($i,$name = new Adult());
    }
}
//set the weight of people
$boat->chWeight=$leftSide->returnChild()->getWeight();
$boat->adWeight=$leftSide->returnAdult()->getWeight();

echo ">>>>>>>>>>> Start <<<<<<<<<<<<\n";
echo "\n LEFT \n";
print_r($leftSide);
echo "\n BOAT \n";
print_r($boat);
echo "\n Right \n";
print_r($rightSide);

//Start simulation
if ($amountAdult<3){
    echo "Взрослых меньше 2х. По условию задание не выполняется!!!";
    return 0;
}else{
    do{
        //transport only 1 adult on the right side(At once)
        if (!$rightSide->hasSomeone("Adult")){
            $boat->set($leftSide->getIndexOfAdult(),$leftSide->returnAdult());
            $leftSide->uns($leftSide->getIndexOfAdult());
            $boat->set($leftSide->getIndexOfAdult(),$leftSide->returnAdult());
            $leftSide->uns($leftSide->getIndexOfAdult());
            //высадка
            $rightSide->set($boat->getIndexOfAdult(),$boat->returnAdult());
            $boat->uns($boat->getIndexOfAdult());
        }
        //transport last 2 adult on the right side
        //and finish simulation
        if ($leftSide->amountOfSomeone("Adult")==2&&!$leftSide->hasSomeone("Child")&&$boat->checkCapacity()==0){
            $boat->set($leftSide->getIndexOfAdult(),$leftSide->returnAdult());
            $leftSide->uns($leftSide->getIndexOfAdult());
            $boat->set($leftSide->getIndexOfAdult(),$leftSide->returnAdult());
            $leftSide->uns($leftSide->getIndexOfAdult());
            //высадка
            $rightSide->set($boat->getIndexOfAdult(),$boat->returnAdult());
            $boat->uns($boat->getIndexOfAdult());
            $rightSide->set($boat->getIndexOfAdult(),$boat->returnAdult());
            $boat->uns($boat->getIndexOfAdult());
            echo "\n LEFT \n";
            print_r($leftSide);
            echo "\n BOAT \n";
            print_r($boat);
            echo "\n Right \n";
            print_r($rightSide);
            echo "\nВсе участники были успешно переправлены!!!";
            return 0;
        }

        //fill the boat in random order
        if (($leftSide->amountOfSomeone("Adult")==2)&&($leftSide->amountOfSomeone("Child")==1)){
            while ($boat->checkCapacity() < 1.5) {
                $who = array_rand($leftSide->getArray());
                if (get_class($leftSide->getArray()[$who]) == "Child") {
                    $boat->set($leftSide->getIndexOfChild(), $leftSide->returnChild());
                    $leftSide->uns($leftSide->getIndexOfChild());
                } else {
                    $boat->set($leftSide->getIndexOfAdult(), $leftSide->returnAdult());
                    $leftSide->uns($leftSide->getIndexOfAdult());
                }
            }
        }
        else{
            while ($boat->checkCapacity() < 2) {
                $who = array_rand($leftSide->getArray());
                if (get_class($leftSide->getArray()[$who]) == "Child") {
                    $boat->set($leftSide->getIndexOfChild(), $leftSide->returnChild());
                    $leftSide->uns($leftSide->getIndexOfChild());
                } else {
                    $boat->set($leftSide->getIndexOfAdult(), $leftSide->returnAdult());
                    $leftSide->uns($leftSide->getIndexOfAdult());
                }
            }
        }
        //Check if boat can move
        if ($boat->checkCapacity()>2||!$leftSide->hasSomeone("Adult")||!$boat->hasSomeone("Adult")){
            do{
                    if ($boat->hasSomeone("Child")){
                        $leftSide->set($boat->getIndexOfChild(),$boat->returnChild());
                        $boat->uns($boat->getIndexOfChild());
                    }
                    if($boat->hasSomeone("Adult")){
                        $leftSide->set($boat->getIndexOfAdult(),$boat->returnAdult());
                        $boat->uns($boat->getIndexOfAdult());
                    }
                }while($boat->hasSomeone("Child")||$boat->hasSomeone("Adult"));
        }
        else{
            //drop children only (on the right side). Move back on the left side with 1 Adult
            if ($rightSide->hasSomeone("Adult")&&$boat->hasSomeone("Adult")&&$boat->hasSomeone("Child")){
                do{
                    $rightSide->set($boat->getIndexOfChild(),$boat->returnChild());
                    $boat->uns($boat->getIndexOfChild());
                }while($boat->hasSomeone("Child"));
            }
            //if boat has 2 Adult-drop only one. Move back on the left side with 1 Adult
            if ($leftSide->hasSomeone("Adult")&&$boat->amountOfSomeone("Adult")==2){
                $rightSide->set($boat->getIndexOfAdult(),$boat->returnAdult());
                $boat->uns($boat->getIndexOfAdult());
            }
        }
    }while(true);
}















