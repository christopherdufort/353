<?php
require_once 'client.php';

class ClientDAO {

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
		$this->password = "";
		#$this->password = "W5T7N3C9";
	}

	public function createClient($firstName, $lastName, $email, $phone, $address,
		$birthDate, $joiningDate, $category, $branchId) {
		try {
			$pdo = new PDO($this->connectString, $this->user, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $pdo->prepare("INSERT INTO client(first_name,last_name,email,phone,address,
					birth_date,joining_date,category,branch_id) VALUES(:firstName,:lastName,:email,:phone,:address,
					:birthDate,:joiningDate,:category,:branchId);");

			$stmt->bindValue(':firstName', $firstName);
			$stmt->bindValue(':lastName', $lastName);
			$stmt->bindValue(':email', $email);
			$stmt->bindValue(':phone', $phone);
			$stmt->bindValue(':address', $address);
			$stmt->bindValue(':birthDate', $birthDate);
			$stmt->bindValue(':joiningDate', $joiningDate);
			$stmt->bindValue(':category', $category);
			$stmt->bindValue(':branchId', $branchId);
			$stmt->execute();

			return $pdo->lastInsertId();

		} catch (PDOException $e) {
			echo ($e->getMessage());
		} finally {
			unset($pdo);
		}
	}

	public function updateClient($id, $firstName, $lastName, $email, $phone,
		$address, $birthDate, $joiningDate, $category, $branchId, $alerts) {
		try {
			$pdo = new PDO($this->connectString, $this->user, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $pdo->prepare("UPDATE client
					SET first_name=:firstName, last_name=:lastName,
					email=:email, phone=:phone, address=:address, birth_date=:birthDate,
					joining_date=:joiningDate, category=:category, branch_id=:branchId, alerts=:alerts WHERE client_id=:id");

			$stmt->bindValue(':id', $id);
			$stmt->bindValue(':firstName', $firstName);
			$stmt->bindValue(':lastName', $lastName);
			$stmt->bindValue(':email', $email);
			$stmt->bindValue(':phone', $phone);
			$stmt->bindValue(':address', $address);
			$stmt->bindValue(':birthDate', $birthDate);
			$stmt->bindValue(':joiningDate', $joiningDate);
			$stmt->bindValue(':category', $category);
			$stmt->bindValue(':branchId', $branchId);
			$stmt->bindValue(':alerts', $alerts);
			$stmt->execute();

			return $stmt->rowCount();

		} catch (PDOException $e) {
			echo ($e->getMessage());
		} finally {
			unset($pdo);
		}
	}

	public function setAlerts($id, $alerts) {
		try {
			$pdo = new PDO($this->connectString, $this->user, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $pdo->prepare("UPDATE client SET alerts=:alerts WHERE client_id=:id");

			$stmt->bindValue(':id', $id);
			$stmt->bindValue(':alerts', $alerts);
			$stmt->execute();

			return $stmt->rowCount();

		} catch (PDOException $e) {
			echo ($e->getMessage());
		} finally {
			unset($pdo);
		}
	}

	public function deleteClient($id) {
		try {
			$pdo = new PDO($this->connectString, $this->user, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $pdo->prepare("DELETE FROM client WHERE client_id=:id;");

			$stmt->bindValue(':id', $id);

			return $stmt->execute();

		} catch (PDOException $e) {
			echo ($e->getMessage());
		} finally {
			unset($pdo);
		}
	}

	public function getClient($id) {
		try {
			$pdo = new PDO($this->connectString, $this->user, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $pdo->prepare("SELECT * FROM client WHERE client_id=:id");

			$stmt->bindValue(':id', $id);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Client');

			$response = [];

			while ($client = $stmt->fetch()) {
				$response["id"] = $client->getId();
				$response["firstName"] = $client->getFirstName();
				$response["lastName"] = $client->getLastName();
				$response["email"] = $client->getEmail();
				$response["phone"] = $client->getPhone();
				$response["address"] = $client->getAddress();
				$response["birthDate"] = $client->getBirthDate();
				$response["joiningDate"] = $client->getJoiningDate();
				$response["category"] = $client->getCategory();
				$response["branchId"] = $client->getBranchId();
				$response["alerts"] = $client->getAlerts();
			}

			return $response;

		} catch (PDOException $e) {
			echo ($e->getMessage());
		} finally {
			unset($pdo);
		}
	}

	public function getClientsByBranch($id) {
		try {
			$pdo = new PDO($this->connectString, $this->user, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $pdo->prepare("SELECT * FROM client WHERE branch_id=:id");
			$stmt->bindValue(':id', $id);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Client');

			$response = [];

			while ($client = $stmt->fetch()) {
				$responseRow["id"] = $client->getId();
				$responseRow["firstName"] = $client->getFirstName();
				$responseRow["lastName"] = $client->getLastName();
				$responseRow["email"] = $client->getEmail();
				$responseRow["phone"] = $client->getPhone();
				$responseRow["address"] = $client->getAddress();
				$responseRow["birthDate"] = $client->getBirthDate();
				$responseRow["joiningDate"] = $client->getJoiningDate();
				$responseRow["category"] = $client->getCategory();
				$responseRow["branchId"] = $client->getBranchId();
				$responseRow["alerts"] = $client->getAlerts();

				$response[] = $responseRow;
			}
			return $response;
		} catch (PDOException $e) {
			echo ($e->getMessage());
		} finally {
			unset($pdo);
		}
	}

	public function getAllClients() {
		try {
			$pdo = new PDO($this->connectString, $this->user, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $pdo->prepare("SELECT * FROM client");
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Client');

			$response = [];

			while ($client = $stmt->fetch()) {
				$responseRow["id"] = $client->getId();
				$responseRow["first_name"] = $client->getFirstName();
				$responseRow["lastName"] = $client->getLastName();
				$responseRow["email"] = $client->getEmail();
				$responseRow["phone"] = $client->getPhone();
				$responseRow["address"] = $client->getAddress();
				$responseRow["birthDate"] = $client->getBirthDate();
				$responseRow["joiningDate"] = $client->getJoiningDate();
				$responseRow["category"] = $client->getCategory();
				$responseRow["branchId"] = $client->getBranchId();
				$responseRow["alerts"] = $client->getAlerts();

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