<?php
class Client {

	private $client_id;
	private $first_name;
	private $last_name;
	private $email;
	private $phone;
	private $address;
	private $birth_date;
	private $joining_date;
	private $category;
	private $branch_id;
	private $alerts;

	function __construct($client_id = 0, $first_name = "", $last_name = "", $email = "", $phone = "",
		$address = "", $birth_date = "", $joining_date = "", $category = "", $branch_id = 0, $alerts = 0) {
		$this->setId($client_id);
		$this->setFirstName($first_name);
		$this->setLastName($last_name);
		$this->setEmail($email);
		$this->setPhone($phone);
		$this->setAddress($address);
		$this->setBirthDate($birth_date);
		$this->setJoiningDate($joining_date);
		$this->setCategory($category);
		$this->setBranchId($branch_id);
		$this->setAlerts($alerts);
	}

	public function getId() {
		return $this->client_id;
	}

	public function setId($client_id) {
		$this->client_id = $client_id;
	}

	public function getFirstName() {
		return $this->first_name;
	}

	public function setFirstName($first_name) {
		$this->first_name = $first_name;
	}

	public function getLastName() {
		return $this->last_name;
	}

	public function setLastName($last_name) {
		$this->last_name = $last_name;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function getPhone() {
		return $this->phone;
	}

	public function setPhone($phone) {
		$this->phone = $phone;
	}

	public function getAddress() {
		return $this->address;
	}

	public function setAddress($address) {
		$this->address = $address;
	}

	public function getBirthDate() {
		return $this->birth_date;
	}

	public function setBirthDate($birth_date) {
		$this->birth_date = $birth_date;
	}

	public function getJoiningDate() {
		return $this->joining_date;
	}

	public function setJoiningDate($joining_date) {
		$this->joining_date = $joining_date;
	}

	public function getCategory() {
		return $this->category;
	}

	public function setCategory($category) {
		$this->category = $category;
	}

	public function getBranchId() {
		return $this->branch_id;
	}

	public function setBranchId($branch_id) {
		$this->branch_id = $branch_id;
	}

	public function getAlerts() {
		return $this->alerts;
	}

	public function setAlerts($alerts) {
		$this->alerts = $alerts;
	}

	public function __toString() {
		return "client_id: $this->client_id <br/>
					first_name: $this->first_name <br/>
					lastName: $this->lastName <br/>
					email: $this->email <br/>
					phone: $this->phone <br/>
					address: $this->address <br/>
					birthDate: $this->birthDate <br/>
					joiningDate: $this->joiningDate <br/>
					category: $this->category <br/>
					branchclient_id: $this->branchclient_id <br/>
					alerts: $this->alerts";
	}
}
?>