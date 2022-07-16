<?php

class parentClass{
	
	public $parent;
	
	function __construct($value){
		$this->parent = $value;
	}

	function doSomething(){
		return 'I am working now';
	}

}

class childClass extends parentClass{
	
	public $child;

	function __construct($name,$value){
		parent::__construct($name);
		$this->child = $value;
	}

	function doSomething(){
		return 'I am sleeping now';		
	}

	function callParent(){
		return parent::doSomething();
	}
}

$person = new childClass('I am from Parent', 'I am from Child');
$person = new parentClass('I am not happy');
echo $person->parent;
echo $person->child;
