<?php
trait Active
{
    function defindYourSelf()
    {
        return get_class($this);
    }
}

abstract class Country
{
    use Active;


    protected $slogan;
    abstract function sayHello();
    function setSlogan($value)
    {
        $this->slogan = $value;
    }
    function getSlogan()
    {
        return $this->slogan;
    }
}

interface Boss{
    function checkValidSlogan();
}

class EnglandCountry extends Country implements Boss
{
    function sayHello()
    {
        echo "Xin Chao";
    }
    public function checkValidSlogan()
    {
        $str1 = is_int(strpos($this->getSlogan(), 'england'));
        $str2 = is_int(strpos($this->getSlogan(), 'english'));
        return $str1 || $str2 ;
    }

}

class VietnamCountry extends Country implements Boss
{
    function sayHello()
    {
        echo "Xin Chào";
    }
    public function checkValidSlogan()
    {
        $str1 = is_int(strpos($this->getSlogan(), 'vietnam'));
        $str2 = is_int(strpos($this->getSlogan(), 'hust'));
        return $str1 && $str2 ;
    }
}

$englandCountry = new EnglandCountry();
$vietnamCountry = new VietnamCountry();

$englandCountry->setSlogan('england England is a country that is part of the United Kingdom. It shares land borders with Wales to the west and Scotland to the north. The Irish Sea lies west of England and the Celtic Sea to the southwest.');

$vietnamCountry->setSlogan('Vietnam is the easternmost country on the Indochina Peninsula. With an estimated 94.6 million inhabitants as of 2016, it is the 15th most populous country in the world.');

$englandCountry->sayHello(); // Hello
echo "<br>";
$vietnamCountry->sayHello(); // Xin chao

echo "<br>";

var_dump($englandCountry->checkValidSlogan()); // true
echo "<br>";
var_dump($vietnamCountry->checkValidSlogan()); // false
echo "<br>";
echo 'I am ' . $englandCountry->defindYourSelf();
echo "<br>";
echo 'I am ' . $vietnamCountry->defindYourSelf();
//
