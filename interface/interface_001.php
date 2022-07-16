<?php

interface IHealth{
	const HEALTH = 'MEDINOVA LTD';	
	function getWeight();
	function getHeight();
	function getBMI();
	function getWidth();	
}

class Person implements IHealth{

	public $weight = 60;
	public $height = 5.8;
	public $bmi;

	const VISA = "INDIAN VISA";

	function getWeight(){
		return 'I am over-weight now';
	}

	function getHeight(){
		return 'I am at 5 feet now';
	}

	function getBMI(){
		return $this->weight * $this->height;
	}

	function getWidth(){

	}
}

$person = new Person;

echo $person->getWeight();
echo $person->getHeight();
echo $person->getBMI();

echo IHealth::HEALTH;
echo Person::VISA;
echo Person::HEALTH;
