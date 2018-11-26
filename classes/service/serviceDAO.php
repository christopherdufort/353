<?php
require_once 'service.php';

class ServiceDAO {

	private $connectString;
	private $user;
	private $password;

	function __construct() {
		# if connecting to school
		#$this->connectString = "mysql:host=gec353.encs.concordia.ca;dbname=gec353_2;charset=utf8mb4";
		#$this->user = "gec353_2";
		#$this->password = "W5T7N3C9";
		# if local
		$this->connectString = "mysql:host=localhost;dbname=gec353_2;charset=utf8mb4";
		$this->user = "root";
		$this->password = "W5T7N3C9";
	}

	public function createService($name, $interestRate, $managerId, $chargeId) {
		try {
			$pdo = new PDO($this->connectString, $this->user, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $pdo->prepare("INSERT INTO service(service_name,service_interest,manager_id,charge_plan_id)
					VALUES(:name,:interestRate,:managerId,:chargeId);");

			$stmt->bindValue(':name', $name);
			$stmt->bindValue(':interestRate', $interestRate);
			$stmt->bindValue(':managerId', $managerId);
			$stmt->bindValue(':chargeId', $chargeId);
			$stmt->execute();

			return $pdo->lastInsertId();

		} catch (PDOException $e) {
			echo ($e->getMessage());
		} finally {
			unset($pdo);
		}
	}

	public function updateService($id, $name, $interestRate, $managerId, $chargeId) {
		try {
			$pdo = new PDO($this->connectString, $this->user, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $pdo->prepare("UPDATE service
					SET service_name=:name, service_interest=:interestRate, manager_id=:managerId, charge_plan_id=:chargeId
					WHERE service_id=:id");

			$stmt->bindValue(':id', $id);
			$stmt->bindValue(':name', $name);
			$stmt->bindValue(':interestRate', $interestRate);
			$stmt->bindValue(':managerId', $managerId);
			$stmt->bindValue(':chargeId', $chargeId);
			$stmt->execute();

			return $stmt->rowCount();

		} catch (PDOException $e) {
			echo ($e->getMessage());
		} finally {
			unset($pdo);
		}
	}

	public function deleteService($id) {
		try {
			$pdo = new PDO($this->connectString, $this->user, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $pdo->prepare("DELETE FROM service WHERE service_id=:id;");

			$stmt->bindValue(':id', $id);

			return $stmt->execute();

		} catch (PDOException $e) {
			echo ($e->getMessage());
		} finally {
			unset($pdo);
		}
	}

	public function getService($id) {
		try {
			$pdo = new PDO($this->connectString, $this->user, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $pdo->prepare("SELECT * FROM service WHERE service_id=:id");

			$stmt->bindValue(':id', $id);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Service');

			$response = [];

			while ($service = $stmt->fetch()) {
				$response["id"] = $service->getId();
				$response["name"] = $service->getName();
				$response["interestRate"] = $service->getInterestRate();
				$response["managerId"] = $service->getManagerId();
				$response["chargeId"] = $service->getChargeId();
			}

			return $response;

		} catch (PDOException $e) {
			echo ($e->getMessage());
		} finally {
			unset($pdo);
		}
	}

	public function getServicesByClient($id) {
		try {
			$pdo = new PDO($this->connectString, $this->user, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $pdo->prepare("SELECT *
					FROM service
					JOIN client_service ON service.service_id = client_service.service_id
					JOIN client ON client_service.client_id = client.client_id
					WHERE client.client_id=:id");
			$stmt->bindValue(':id', $id);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Service');

			$response = [];

			while ($service = $stmt->fetch()) {
				$responseRow["id"] = $service->getId();
				$responseRow["name"] = $service->getName();
				$responseRow["interestRate"] = $service->getInterestRate();
				$responseRow["managerId"] = $service->getManagerId();
				$responseRow["chargeId"] = $service->getChargeId();

				$response[] = $responseRow;
			}
			return $response;
		} catch (PDOException $e) {
			echo ($e->getMessage());
		} finally {
			unset($pdo);
		}
	}

	public function getAllServices() {
		try {
			$pdo = new PDO($this->connectString, $this->user, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $pdo->prepare("SELECT * FROM service");
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Service');

			$response = [];

			while ($branch = $stmt->fetch()) {
				$responseRow["id"] = $branch->getId();
				$responseRow["name"] = $branch->getName();
				$responseRow["interestRate"] = $branch->getInterestRate();
				$responseRow["managerId"] = $branch->getManagerId();
				$responseRow["chargeId"] = $branch->getChargeId();

				$response[] = $responseRow;
			}
			return $response;
		} catch (PDOException $e) {
			echo ($e->getMessage());
		} finally {
			unset($pdo);
		}
	}
}