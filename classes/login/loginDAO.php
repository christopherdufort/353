<?php
class LoginDAO {

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

	public function checkIfUserExists($cardNumber) {
		try {
			$pdo = new PDO($this->connectString, $this->user, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $pdo->prepare("SELECT user_id, isEmployee FROM login WHERE cardNumber = :cardNumber;");
			$stmt->bindValue(':cardNumber', $cardNumber);
			$stmt->execute();
			$resultCount = $stmt->rowCount();

			return $resultCount;
		} catch (PDOException $e) {
			echo ($e->getMessage());
		} finally {
			unset($pdo);
		}
	}
	public function createLogin($cardNumber, $password, $isEmployee, $userId) {
		try {
			$pdo = new PDO($this->connectString, $this->user, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $pdo->prepare("INSERT INTO login(card_number,password,is_employee,user_id)
                                   VALUES(:cardNumber,:password,:isEmployee,:userId);");
			$stmt->bindValue(':cardNumber', $cardNumber);
			//$stmt->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
			$stmt->bindValue(':password', $password);
			$stmt->bindValue(':isEmployee', $isEmployee);
			$stmt->bindValue(':userId', $userId);
			$stmt->execute();
			$id = $pdo->lastInsertId();
			return $id;
		} catch (PDOException $e) {
			echo ($e->getMessage());
		} finally {
			unset($pdo);
		}
	}
	public function loginUser($cardNumber, $password) {

		try {
			$pdo = new PDO($this->connectString, $this->user, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $pdo->prepare("SELECT password, user_id, is_employee FROM login WHERE card_number = :cardNumber");
			$stmt->bindValue(':cardNumber', $cardNumber);

			$stmt->execute();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			# if (password_verify($password, $row['password'])) {
			if ($password === $row['password']) {
				return $row['user_id'];
			} else {
				return FALSE;
			}
		} catch (PDOException $e) {
			echo ($e->getMessage());
		} finally {
			unset($pdo);
		}
	}
}