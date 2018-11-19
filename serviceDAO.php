<?php
	require_once('service.php');

	class ServiceDAO {

		private $connectString;
		private $user;
		private $password;

		function __construct() {
			$this->connectString ="mysql:host=gec353.encs.concordia.ca;dbname=gec353_2;charset=utf8mb4";
			$this->user = "gec353_2";
			$this->password = "W5T7N3C9";
		}

		public function createService($name, $interestRate, $managerId){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$stmt = $pdo->prepare("INSERT INTO service(service_name,interest_rate,manager_id) 
					VALUES(:service_name,:interestRate,:managerId);");

				$stmt->bindValue(':name', $name);
				$stmt->bindValue(':interestRate', $location);
				$stmt->bindValue(':managerId', $managerId);
				$stmt->execute();

				return $pdo->lastInsertId();

			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}		
		}

		public function updateService($id, $name, $interestRate, $managerId){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$stmt = $pdo->prepare("UPDATE service 
					SET service_name=:name, interest_rate=:interestRate, manager_id=:managerId  
					WHERE service_id=:id");
				
				$stmt->bindValue(':id', $id);
				$stmt->bindValue(':name', $name);
				$stmt->bindValue(':interestRate', $interestRate);
				$stmt->bindValue(':managerId', $managerId);
				$stmt->execute();

				return $stmt->rowCount();

			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}
		}

		public function deleteService($id){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$stmt = $pdo->prepare("DELETE FROM service WHERE service_id=:id;");

				$stmt->bindValue(':id', $id);

				return $stmt->execute();	

			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}
		}

		public function getService($id){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$stmt = $pdo->prepare("SELECT * FROM service WHERE service_id=:id");

				$stmt->bindValue(':id', $id);
				$stmt->execute();


				$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Service');

				while ($service = $stmt->fetch())
				{
				    $response["id"] = $service->getId(); 
				    $response["name"] = $service->getName();
				    $response["interestRate"] = $service->getInterestRate();
				    $response["managerId"] = $service->getManagerId();
				}

				return $response;

			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}
		}

		public function getServicesByClient($id){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $pdo->prepare("SELECT * 
					FROM service 
					JOIN client_service ON service.service_id = client_service.service_id 
					JOIN client ON client_service.client_id = client.client_id 
					WHERE client_id=:id");
				$stmt->bindValue(':id', $id);
				$stmt->execute();
				$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Service');
				while ($service = $stmt->fetch())
				{
					$responseRow["id"] = $service->getId(); 
					$responseRow["name"] = $service->getName();
					$responseRow["interestRate"] = $service->getInterestRate();
					$responseRow["managerId"] = $service->getManagerId();
					
					$response[] = $responseRow;
				}
				return $response;
			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}
		}

		public function getAllServices(){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $pdo->prepare("SELECT * FROM service");
				$stmt->execute();
				$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Service');
				while ($branch = $stmt->fetch())
				{
					$responseRow["id"] = $branch->getId(); 
					$responseRow["name"] = $branch->getName();
					$responseRow["interestRate"] = $branch->getInterestRate();
					$responseRow["managerId"] = $branch->getManagerId();
					
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