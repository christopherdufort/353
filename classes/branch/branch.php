<?php
	class Branch {

		private $branch_id;
		private $branch_name;
		private $location;
		private $phone;
		private $fax;
		private $opening_date;

		function __construct($branch_id=0, $branch_name="", $location="", $phone="", $fax="") {
			$this->setId($branch_id);
			$this->setName($branch_name);
			$this->setLocation($location);
			$this->setPhone($phone);
			$this->setFax($fax);
			$this->setOpeningDate(date("Y-m-d"));
		}

		public function getId(){
			return $this->branch_id;
		}

		public function setId($branch_id){
			$this->branch_id = $branch_id;
		}

		public function getName(){
			return $this->branch_name;
		}

		public function setName($branch_name){
			$this->branch_name = $branch_name;
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
			return $this->opening_date;
		}

		public function setOpeningDate($opening_date){
			$this->opening_date = $opening_date;
		}

		public function __toString(){
        	return "id: $this->branch_id <br/>
					name: $this->branch_name <br/>
					location: $this->opening_date <br/>
					phone: $this->phone <br/>
					fax: $this->fax <br/>
					openingDate: $this->openingDate";
        }
	}