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

				while ($branch = $stmt->fetch())
				{
				    $response["id"] = $branch->getId(); 
				    $response["name"] = $branch->getName();
				    $response["interestRate"] = $branch->getInterestRate();
				    $response["managerId"] = $branch->getManagerId();
				}

				return $response;

			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}
		}
	}