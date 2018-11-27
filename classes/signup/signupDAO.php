<?php
class SignupDAO {

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

	public function signupUser($cardNumber, $password, $firstName, $lastName, $birthDate, $address, $email, $phone) {
        $noErrors = true;

		try {
			$pdo = new PDO($this->connectString, $this->user, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $pdo->prepare("INSERT INTO client (first_name, last_name, birth_date, joining_date, address, email, phone ,branch_id) VALUES (:firstName, :lastName, :birthDate, :joiningDate, :address, :email, :phone, :branch_id)");
			$stmt->bindValue(':firstName', $firstName);
            $stmt->bindValue(':lastName', $lastName);
            $stmt->bindValue(':birthDate', $birthDate);
            $stmt->bindValue(':joiningDate', date("Y-m-d")); #todays date
            $stmt->bindValue(':address', $address);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':phone', $phone);
            $stmt->bindValue(':branch_id', substr($cardNumber, 0,2)); #first two digits of card number are branch id

			$stmt->execute();
			$userId = $pdo -> lastInsertId();

            $stmt = $pdo->prepare("INSERT INTO login (card_number, password, is_employee, user_id) VALUES (:cardNumber, :password, :is_employee, :user_id)");
            $stmt->bindValue(':cardNumber', $cardNumber);
            $stmt->bindValue(':password', $password);
            $stmt->bindValue(':is_employee', 0);
            $stmt->bindValue(':user_id', $userId);

            $stmt->execute();

		} catch (PDOException $e) {
			echo ($e->getMessage());
            $noErrors = false;
		} finally {
			unset($pdo);
            return $noErrors;
		}
	}
}