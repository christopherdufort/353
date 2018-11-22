<?php
	require_once('branch.php');

	class BranchDAO {

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

		public function createBranch($name, $location, $phone, $fax, $openingDate, $managerId){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$stmt = $pdo->prepare("INSERT INTO branch(branch_name,location,phone,fax,opening_date,manager_id) 
					VALUES(:name,:location,:phone,:fax,:openingDate,:managerId);");

				$stmt->bindValue(':name', $name);
				$stmt->bindValue(':location', $location);
				$stmt->bindValue(':phone', $phone);
				$stmt->bindValue(':fax', $fax);
				$stmt->bindValue(':openingDate', $openingDate);
				$stmt->bindValue(':managerId', $managerId);
				$stmt->execute();

				return $pdo->lastInsertId();

			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}		
		}

		public function updateBranch($id, $name, $location, $phone, $fax, $openingDate, $managerId){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$stmt = $pdo->prepare("UPDATE branch 
					SET branch_name=:name, location=:location, phone=:phone, fax=:fax, 
					opening_date=:openingDate, manager_id=:managerId WHERE branch_id=:id");

				$stmt->bindValue(':id', $id);
				$stmt->bindValue(':name', $name);
				$stmt->bindValue(':location', $location);
				$stmt->bindValue(':phone', $phone);
				$stmt->bindValue(':fax', $fax);
				$stmt->bindValue(':openingDate', $openingDate);
				$stmt->bindValue(':managerId', $managerId);
				$stmt->execute();

				return $stmt->rowCount();

			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}
		}

		public function deleteBranch($id){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$stmt = $pdo->prepare("DELETE FROM branch WHERE branch_id=:id;");

				$stmt->bindValue(':id', $id);

				return $stmt->execute();	

			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}
		}

		public function getBranch($id){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$stmt = $pdo->prepare("SELECT * FROM branch WHERE branch_id=:id");

				$stmt->bindValue(':id', $id);
				$stmt->execute();


				$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Branch');

				$response = [];

				while ($branch = $stmt->fetch())
				{
				    $response["id"] = $branch->getId(); 
				    $response["name"] = $branch->getName();
				    $response["location"] = $branch->getLocation();
					$response["phone"] = $branch->getPhone();
					$response["fax"] = $branch->getFax();
				    $response["openingDate"] = $branch->getOpeningDate();
				    $response["managerId"] = $branch->getManagerId();
				}

				return $response;

			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}
		}

		public function getAllBranches(){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $pdo->prepare("SELECT * FROM branch");
				$stmt->execute();
				$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Branch');

				$response = [];

				while ($branch = $stmt->fetch())
				{
					$reponseRow = [];
					$responseRow["id"] = $branch->getId(); 
					$responseRow["name"] = $branch->getName();
					$responseRow["location"] = $branch->getLocation();
					$responseRow["phone"] = $branch->getPhone();
					$responseRow["fax"] = $branch->getFax();
					$responseRow["openingDate"] = $branch->getOpeningDate();
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