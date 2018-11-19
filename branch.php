<?php
	class Branch {

		private $id;
		private $name;
		private $location;
		private $phone;
		private $fax;
		private $openingDate;
		private $managerId;

		function __construct($id=0, $name="", $locations="", $phone="", $fax="", $openingDate="", $managerId=0) {
			$this->setId($id);
			$this->setName($name);
			$this->setLocation($location);
			$this->setPhone($phone);
			$this->setFax($fax);
			$this->setOpeningDate($openingDate);
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

		public function getLocation(){
			return $this->location;
		}

		public function setLocation($location){
			$this->location = $location;
		}

		public function getPhone(){
			return $this->phone;
		}

		public function setPhone($phone){
			$this->phone = $phone;
		}

		public function getFax(){
			return $this->fax;
		}

		public function setFax($fax){
			$this->fax = $fax;
		}

		public function getOpeningDate(){
			return $this->openingDate;
		}

		public function setOpeningDate($openingDate){
			$this->openingDate = $openingDate;
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
					location: $this->location <br/>
					phone: $this->phone <br/>
					fax: $this->fax <br/>
					openingDate: $this->openingDate <br/>
					managerId: $this->managerId";
        }
	}