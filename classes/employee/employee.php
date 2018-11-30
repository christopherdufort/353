<?php
	class Employee {

		private $employee_id;
		private $title;
		private $first_name;
		private $last_name;
		private $email;
		private $phone;
		private $address;
		private $employee_type;
		private $salary;
		private $start_date;
		private $works_for_branch;

		function __construct($employee_id=0, $title="", $first_name="", $last_name="", $email="", $phone="", 
			$address="", $employee_type="", $salary=0.0, $start_date="", $works_for_branch=0) {
			$this->setId($employee_id);
			$this->setTitle($title);
			$this->setFirstName($first_name);
			$this->setLastName($last_name);
			$this->setEmail($email);
			$this->setPhone($phone);
			$this->setAddress($address);
			$this->setType($employee_type);
			$this->setSalary($salary);
			$this->setStartDate($start_date);
			$this->setBranchId($works_for_branch);
		}

		public function getId(){
			return $this->employee_id;
		}

		public function setId($employee_id){
			$this->employee_id = $employee_id;
		}

		public function getTitle(){
			return $this->title;
		}

		public function setTitle($title){
			$this->title = $title;
		}

		public function getFirstName(){
			return $this->first_name;
		}

		public function setFirstName($first_name){
			$this->first_name = $first_name;
		}

		public function getLastName(){
			return $this->last_name;
		}

		public function setLastName($last_name){
			$this->last_name = $last_name;
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
			return $this->employee_type;
		}

		public function setType($employee_type){
			$this->employee_type = $employee_type;
		}

		public function getSalary(){
			return $this->salary;
		}

		public function setSalary($salary){
			$this->salary = $salary;
		}

		public function getStartDate(){
			return $this->start_date;
		}

		public function setStartDate($start_date){
			$this->start_date = $start_date;
		}

		public function getBranchId(){
			return $this->works_for_branch;
		}

		public function setBranchId($works_for_branch){
			$this->works_for_branch = $works_for_branch;
		}

		public function __toString(){
			return "id: $this->employee_id <br/>
					title: $this->title <br/>
					firstName: $this->first_name <br/>
					lastName: $this->last_name <br/>
					email: $this->email <br/>
					phone: $this->phone <br/>
					address: $this->address <br/>
					type: $this->type <br/>
					salary: $this->salary <br/>
					branchId: $this->works_for_branch <br/>
					startDate: $this->start_date";
        }
	}