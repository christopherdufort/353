<?php
	class Client {

		private $id;
		private $firstName;
		private $lastName;
		private $email;
		private $phone;
		private $address;
		private $birthDate;
		private $joiningDate;
		private $category;

		function __construct($id=0, $firstName="", $lastName="", $email="", $phone="", 
			$address="", $birthDate="", $joiningDate="", $category="") {
			$this->setId($id);
			$this->setFirstName($firstName);
			$this->setLastName($lastName);
			$this->setEmail($email);
			$this->setPhone($phone);
			$this->setAddress($address);
			$this->setBirthDate($birthDate);
			$this->setJoiningDate($joiningDate);
			$this->setCategory($category);
		}

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
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

		public function getBirthDate(){
			return $this->birthDate;
		}

		public function setBirthDate($birthDate){
			$this->birthDate = $birthDate;
		}

		public function getJoiningDate(){
			return $this->joiningDate;
		}

		public function setJoiningDate($joiningDate){
			$this->joiningDate = $joiningDate;
		}

		public function getCategory(){
			return $this->category;
		}

		public function setCategory($category){
			$this->category = $category;
		}

		public function __toString(){
			return "id: $this->id <br/>
					firstName: $this->firstName <br/>
					lastName: $this->lastName <br/>
					email: $this->email <br/>
					phone: $this->phone <br/>
					address: $this->address <br/>
					birthDate: $this->birthDate <br/>
					joiningDate: $this->joiningDate <br/>
					category: $this->category";
        }
	}