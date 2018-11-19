<?php
	class ChargePlan {

		private $id;
		private $name;
		private $charge;
		private $limit;

		function __construct($id=0, $name="", $charge=0.0, $limit=0.0) {
			$this->setId($id);
			$this->setName($name);
			$this->setCharge($charge);
			$this->setLimit($limit);
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

		public function getCharge(){
			return $this->charge;
		}

		public function setCharge($charge){
			$this->charge = $charge;
		}

		public function getLimit(){
			return $this->limit;
		}

		public function setLimit($limit){
			$this->limit = $limit;
		}

		public function __toString(){
        	return "name: $this->name <br/>
					charge: $this->charge <br/>
					limit: $this->limit";
        }
	}