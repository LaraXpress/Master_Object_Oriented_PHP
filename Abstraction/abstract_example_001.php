<?php

abstract class Teacher{
	public $property;
		
	function __construct(){
		$this->property = 'Welcome to PHP';
	}

	abstract function getVisa();	
}

class Student extends Teacher{

	function getVisa(){
		return 'I am getting married soon...';
	}
}

$student = new Student;
echo $student->getVisa();

var_dump($student);
