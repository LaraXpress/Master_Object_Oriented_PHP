<?php

trait IBANK{
	public $accountNo = '100125455';

	function accountHolder(){
		return $this->accountNo;
	}	
}

class Bank{
	
	use IBANK;
	protected $amount;	

	function getDeposit(){
		return 'BALANCE '.$this->amount.' BDT AND ACCOUNT NO - '.$this->accountHolder();		
	}

	function setDeposit($value){
		return $this->amount = $value;
	}
}

$bank = new Bank;
$bank->setDeposit(50000);
echo $bank->getDeposit();
