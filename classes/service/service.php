<?php
class Service {

	private $service_id;
	private $service_name;
	private $service_interest;
	private $manager_id;
	private $charge_plan_id;
	private $amount_due;

	function __construct($service_id = 0, $service_name = "", $service_interest = 0.0, $manager_id = 0, $charge_plan_id = 0) {
		$this->setId($service_id);
		$this->setName($service_name);
		$this->setInterestRate($service_interest);
		$this->setManagerId($manager_id);
		$this->setChargeId($charge_plan_id);
		$this->setAmountDue($amount_due);
	}

	public function getId() {
		return $this->service_id;
	}

	public function setId($service_id) {
		$this->service_id = $service_id;
	}

	public function getName() {
		return $this->service_name;
	}

	public function setName($service_name) {
		$this->service_name = $service_name;
	}

	public function getInterestRate() {
		return $this->service_interest;
	}

	public function setInterestRate($service_interest) {
		$this->service_interest = $service_interest;
	}

	public function getManagerId() {
		return $this->manager_id;
	}

	public function setManagerId($manager_id) {
		$this->manager_id = $manager_id;
	}

	public function getChargeId() {
		return $this->charge_plan_id;
	}

	public function setChargeId($charge_plan_id) {
		$this->charge_plan_id = $charge_plan_id;
	}

	public function getAmountDue() {
		return $this->amount_due;
	}

	public function setAmountDue($amount_due) {
		$this->amount_due = $amount_due;
	}

	public function __toString() {
		return "id: $this->service_id <br/>
					name: $this->service_name <br/>
					interestRate: $this->service_interest <br/>
					chargeId: $this->charge_plan_id <br/>
					managerId: $this->managerId;
                    amountDue: $this->amount_due";
	}
}