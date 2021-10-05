<?php


class Base {
    public $param1;
    protected $param2;
    private $p;

    public function __construct($param2){
        $this->param2 = $param2;
    }
    public function getP(){
        return $this->p;
    }
    public function setP($p){
        $this->p = $p;
    }
    public function __unset($p){
        unset($this->p);
    }
}
class Child extends Base{
    public $param3;
    public $res;
    public $arr;

    public function __construct($param2){
        parent::__construct($param2);
        $this->res = fopen("demo.txt", "w");
        $this->arr = [1,2,3,4];
    }
    public function __sleep() {
        return array('arr');
    }
    public function __wakeup() {
        $this->res = fopen("demo.txt", "w");
    }
}
$obj = new Child(20);
$obj->param1 = 10;
$obj->param3 = 30;
$obj->setP(1000);

echo 'Наш объект с приватным свойством: <br>';
echo '<pre>';
print_r($obj);
echo '</pre>';

$obj->__unset(111);

echo 'Удалили приватное свойство:  <br>';
echo '<pre>';
print_r($obj);
echo '</pre>';

$demo = new Child(111);
$ser_str = serialize($demo);

echo 'Наш объект снова: <br>';
echo '<pre>';
print_r($demo);
echo '</pre>';

echo 'Сериализованный:  <br>';
echo '<pre>';
print_r($ser_str);
echo '</pre>';

echo 'Десериализованный:  <br>';
echo '<pre>';
print_r(unserialize($ser_str));
echo '</pre>';


//var_dump($demo);
//var_dump($ser_str);
//var_dump(unserialize($ser_str));
