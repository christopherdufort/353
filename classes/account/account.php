<?php
	class Account {

		private $account_number;
		private $account_type;
		private $balance;
		private $charge_plan_id;
		private $account_interest;
		private $account_category;

		function __construct($account_number=0, $account_type="", $balance=0.0, $charge_plan_id=0, $account_interest=0.0, $account_category="") {
			$this->setNumber($account_number);
			$this->setType($account_type);
			$this->setBalance($balance);
			$this->setChargeId($charge_plan_id);
			$this->setInterest($account_interest);
			$this->setCategory($account_category);
		}

		public function getNumber(){
			return $this->account_number;
		}

		public function setNumber($account_number){
			$this->account_number = $account_number;
		}

		public function getType(){
			return $this->account_type;
		}

		public function setType($account_type){
			$this->account_type = $account_type;
		}

		public function getBalance(){
			return $this->balance;
		}

		public function setBalance($balance){
			$this->balance = $balance;
		}

		public function getChargeId(){
			return $this->charge_plan_id;
		}

		public function setChargeId($charge_plan_id){
			$this->charge_plan_id = $charge_plan_id;
		}

		public function getInterest(){
			return $this->account_interest;
		}

		public function setInterest($account_interest){
			$this->account_interest = $account_interest;
		}

		public function getCategory(){
			return $this->account_category;
		}

		public function setCategory($account_category){
			$this->account_category = $account_category;
		}

		public function __toString(){
        	return "number: $this->account_number <br/>
					type: $this->account_type <br/>
					balance: $this->balance <br/>
					chargeId: $this->charge_plan_id <br/>
					category: $this->account_category <br/>
					interest: $this->account_interest";
        }
	}