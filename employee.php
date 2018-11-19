<?php
	class Employee {

		private $id;
		private $title;
		private $firstName;
		private $lastName;
		private $email;
		private $phone;
		private $address;
		private $type;
		private $salary;
		private $startDate;

		function __construct($id=0, $title="", $firstName="", $lastName="", $email="", $phone="", 
			$address="", $type="", $salary=0.0, $startDate="") {
			$this->setId($id);
			$this->setTitle($title);
			$this->setFirstName($firstName);
			$this->setLastName($lastName);
			$this->setEmail($email);
			$this->setPhone($phone);
			$this->setAddress($address);
			$this->setType($type);
			$this->setSalary($salary);
			$this->setStartDate($startDate);
		}

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getTitle(){
			return $this->title;
		}

		public function setTitle($title){
			$this->title = $title;
		}

		public function getFirstName(){
			return $this->firstName;
		}

		public function setFirstName($firstName){
			$this->firstName = $firstName;
		}

		public function getLastName(){
			return $this->lastName;
		}

		public function setLastName($lastName){
			$this->lastName = $lastName;
		}

		public function getEmail(){
			return $this->email;
		}

		public function setEmail($email){
			$this->email = $email;
		}

		public function getPhone(){
			return $this->phone;
		}

		public function setPhone($phone){
			$this->phone = $phone;
		}

		public function getAddress(){
			return $this->address;
		}

		public function setAddress($address){
			$this->address = $address;
		}

		public function getType(){
			return $this->type;
		}

		public function setType($type){
			$this->type = $type;
		}

		public function getSalary(){
			return $this->salary;
		}

		public function setSalary($salary){
			$this->salary = $salary;
		}

		public function getStartDate(){
			return $this->startDate;
		}

		public function setStartDate($startDate){
			$this->startDate = $startDate;
		}

		public function __toString(){
			return "id: $this->id <br/>
					title: $this->title <br/>
					firstName: $this->firstName <br/>
					lastName: $this->lastName <br/>
					email: $this->email <br/>
					phone: $this->phone <br/>
					address: $this->address <br/>
					type: $this->type <br/>
					salary: $this->salary <br/>
					startDate: $this->startDate";
        }
	}