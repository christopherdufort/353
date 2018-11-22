<?php
	class ChargePlan {

		private $charge_id;
		private $charge_name;
		private $charge;
		private $limit;

		function __construct($charge_id=0, $charge_name="", $charge=0.0, $limit=0.0) {
			$this->setId($charge_id);
			$this->setName($charge_name);
			$this->setCharge($charge);
			$this->setLimit($limit);
		}

		public function getId(){
			return $this->charge_id;
		}

		public function setId($charge_id){
			$this->charge_id = $charge_id;
		}

		public function getName(){
			return $this->charge_name;
		}

		public function setName($charge_name){
			$this->charge_name = $charge_name;
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
        	return "id: $this->charge_id <br/>
					name: $this->charge_name <br/>
					charge: $this->charge <br/>
					limit: $this->limit";
        }
	}