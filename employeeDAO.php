<?php
	require_once('employee.php');

	class EmployeeDAO {

		private $connectString;
		private $user;
		private $password;

		function __construct() {
			$this->connectString ="mysql:host=gec353.encs.concordia.ca;dbname=gec353_2;charset=utf8mb4";
			$this->user = "gec353_2";
			$this->password = "W5T7N3C9";
		}

		public function createEmployee($title, $firstName, $lastName, $email, $phone, $address, 
			$type, $salary, $startDate){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$stmt = $pdo->prepare("INSERT INTO employee(title,first_name,last_name,email,phone,address
					employee_type,salary,start_date) VALUES(:title,:firstName,:lastName,:email,:phone,:address,
					:type,:salary,:startDate);");

				$stmt->bindValue(':title', $title);
				$stmt->bindValue(':firstName', $firstName);
				$stmt->bindValue(':lastName', $lastName);
				$stmt->bindValue(':email', $email);
				$stmt->bindValue(':phone', $phone);
				$stmt->bindValue(':address', $address);
				$stmt->bindValue(':type', $type);
				$stmt->bindValue(':salary', $salary);
				$stmt->bindValue(':startDate', $startDate);
				$stmt->execute();

				return $pdo->lastInsertId();

			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}		
		}

		public function updateEmployee($id, $title, $firstName, $lastName, $email, $phone, 
			$address, $type, $salary, $startDate){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$stmt = $pdo->prepare("UPDATE employee 
					SET title=:title, first_name=:firstName, last_name=:lastName, 
					email=:email, phone=:phone, address=:address, employee_type=:type,
					salary=:salary, start_date:startDate WHERE employee_id=:id");

				$stmt->bindValue(':id', $id);
				$stmt->bindValue(':title', $title);
				$stmt->bindValue(':firstName', $firstName);
				$stmt->bindValue(':lastName', $lastName);
				$stmt->bindValue(':email', $email);
				$stmt->bindValue(':phone', $phone);
				$stmt->bindValue(':address', $address);
				$stmt->bindValue(':type', $type);
				$stmt->bindValue(':salary', $salary);
				$stmt->bindValue(':startDate', $startDate);
				$stmt->execute();

				return $stmt->rowCount();

			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}
		}

		public function deleteEmployee($id){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$stmt = $pdo->prepare("DELETE FROM employee WHERE employee_id=:id;");

				$stmt->bindValue(':id', $id);

				return $stmt->execute();	

			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}
		}

		public function getEmployee($id){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$stmt = $pdo->prepare("SELECT * FROM employee WHERE employee_id=:id");

				$stmt->bindValue(':id', $id);
				$stmt->execute();


				$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Employee');

				while ($employee = $stmt->fetch())
				{
				    $response["id"] = $employee->getId(); 
				    $response["title"] = $employee->getTitle();
				    $response["firstName"] = $employee->getFirstName();
					$response["lastName"] = $employee->getLastName();
					$response["email"] = $employee->getEmail();
				    $response["phone"] = $employee->getPhone();
					$response["address"] = $employee->getAddress();
					$response["type"] = $employee->getType();
				    $response["salary"] = $employee->getSalary();
				    $response["startDate"] = $employee->getStartDate();
				}

				return $response;

			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}
		}
	}