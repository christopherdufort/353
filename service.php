<?php
	class Service {

		private $id;
		private $name;
		private $interestRate;
		private $managerId;

		function __construct($id=0, $name="", $interestRate=0.0, $managerId=0) {
			$this->setId($id);
			$this->setName($name);
			$this->setInterestRate($interestRate);
			$this->setManagerId($managerId);
		}

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getName(){
			return $this->name;
		}

		public function setName($name){
			$this->name = $name;
		}

		public function getInterestRate(){
			return $this->interestRate;
		}

		public function setInterestRate($interestRate){
			$this->interestRate = $interestRate;
		}

		public function getManagerId(){
			return $this->managerId;
		}

		public function setManagerId($managerId){
			$this->managerId = $managerId;
		}

		public function __toString(){
        	return "id: $this->id <br/>
					name: $this->name <br/>
					interestRate: $this->interestRate <br/>
					managerId: $this->managerId";
        }
	}