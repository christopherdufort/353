<?php
	require_once('chargePlan.php');

	class ChargePlanDAO {

		private $connectString;
		private $user;
		private $password;

		function __construct() {
			$this->connectString ="mysql:host=gec353.encs.concordia.ca;dbname=gec353_2;charset=utf8mb4";
			$this->user = "gec353_2";
			$this->password = "W5T7N3C9";
			$this->connectString ="mysql:host=localhost;dbname=gec353_2;charset=utf8mb4";
			$this->user = "root";
			$this->password = "";
		}

		public function createChargePlan($name, $charge, $limit){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$stmt = $pdo->prepare("INSERT INTO charge_plan(charge_name,charge,`limit`) VALUES(:name,:charge,:limit);");

				$stmt->bindValue(':name', $name);
				$stmt->bindValue(':charge', $charge);
				$stmt->bindValue(':limit', $limit);
				$stmt->execute();

				return $pdo->lastInsertId();

			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}		
		}

		public function updateChargePlan($id, $name, $charge, $limit){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$stmt = $pdo->prepare("UPDATE charge_plan 
					SET charge_name=:name, charge=:charge, `limit`=:limit WHERE charge_id=:id");

				$stmt->bindValue(':id', $id);
				$stmt->bindValue(':name', $name);
				$stmt->bindValue(':charge', $charge);
				$stmt->bindValue(':limit', $limit);
				$stmt->execute();

				return $stmt->rowCount();

			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}
		}

		public function deleteChargePlan($id){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$stmt = $pdo->prepare("DELETE FROM charge_plan WHERE charge_id=:id;");

				$stmt->bindValue(':id', $id);

				return $stmt->execute();	

			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}
		}

		public function getChargePlan($id){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$stmt = $pdo->prepare("SELECT * FROM charge_plan WHERE charge_id=:id");

				$stmt->bindValue(':id', $id);
				$stmt->execute();


				$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ChargePlan');

				$response = [];

				while ($chargePlan = $stmt->fetch())
				{
				    $response["id"] = $chargePlan->getId(); 
				    $response["name"] = $chargePlan->getName();
				    $response["charge"] = $chargePlan->getCharge();
				    $response["limit"] = $chargePlan->getLimit();
				}

				return $response;

			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}
		}

		public function getChargePlansByAccount($number){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $pdo->prepare("SELECT * 
					FROM charge_plan 
					JOIN account ON charge_id = charge_plan_id 
					WHERE account_number=:number");
				$stmt->bindValue(':number', $number);
				$stmt->execute();
				$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ChargePlan');
				
				$response = [];

				while ($chargePlan = $stmt->fetch())
				{
					$responseRow["id"] = $chargePlan->getId(); 
					$responseRow["name"] = $chargePlan->getName();
					$responseRow["charge"] = $chargePlan->getCharge();
					$responseRow["limit"] = $chargePlan->getLimit();
					
					$response[] = $responseRow;
				}
				return $response;
			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}
		}
		
		public function getChargePlansByService($id){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $pdo->prepare("SELECT * 
					FROM charge_plan 
					JOIN service ON charge_id = charge_plan_id 
					WHERE service_id=:id");
				$stmt->bindValue(':id', $id);
				$stmt->execute();
				$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ChargePlan');
				
				$response = [];
				
				while ($chargePlan = $stmt->fetch())
				{
					$responseRow["id"] = $chargePlan->getId(); 
					$responseRow["name"] = $chargePlan->getName();
					$responseRow["charge"] = $chargePlan->getCharge();
					$responseRow["limit"] = $chargePlan->getLimit();
					
					$response[] = $responseRow;
				}
				return $response;
			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}
		}
		
		public function getAllChargePlans(){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $pdo->prepare("SELECT * FROM charge_plan");
				$stmt->execute();
				$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ChargePlan');
				
				$response = [];
				
				while ($chargePlan = $stmt->fetch())
				{
					$responseRow["id"] = $chargePlan->getId(); 
					$responseRow["name"] = $chargePlan->getName();
					$responseRow["charge"] = $chargePlan->getCharge();
					$responseRow["limit"] = $chargePlan->getLimit();
					
					$response[] = $responseRow;
				}
				return $response;
			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}
		}
	}