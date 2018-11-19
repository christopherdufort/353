<?php
	class Account {

		private $number;
		private $type;
		private $balance;
		private $option;
		private $interest;

		function __construct($number=0, $type="", $balance=0.0, $option="", $fax="", $interest=0.0) {
			$this->setNumber($number);
			$this->setType($type);
			$this->setBalance($balance);
			$this->setOption($option);
			$this->setInterest($interest);
		}

		public function getNumber(){
			return $this->number;
		}

		public function setNumber($number){
			$this->number = $number;
		}

		public function getType(){
			return $this->type;
		}

		public function setType($type){
			$this->type = $type;
		}

		public function getBalance(){
			return $this->balance;
		}

		public function setBalance($balance){
			$this->balance = $balance;
		}

		public function getOption(){
			return $this->option;
		}

		public function setOption($option){
			$this->option = $option;
		}

		public function getInterest(){
			return $this->interest;
		}

		public function setInterest($interest){
			$this->interest = $interest;
		}

		public function __toString(){
        	return "number: $this->number <br/>
					type: $this->type <br/>
					balance: $this->balance <br/>
					option: $this->option <br/>
					interest: $this->interest";
        }
	}