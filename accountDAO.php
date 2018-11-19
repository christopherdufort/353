<?php
	require_once('account.php');

	class AccountDAO {

		private $connectString;
		private $user;
		private $password;

		function __construct() {
			$this->connectString ="mysql:host=gec353.encs.concordia.ca;dbname=gec353_2;charset=utf8mb4";
			$this->user = "gec353_2";
			$this->password = "W5T7N3C9";
		}

		public function createAccount($type, $balance, $option, $interest){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$stmt = $pdo->prepare("INSERT INTO account(account_type,balance,option,interest) 
					VALUES(:type,:balance,:option,:interest);");

				$stmt->bindValue(':type', $type);
				$stmt->bindValue(':balance', $balance);
				$stmt->bindValue(':option', $option);
				$stmt->bindValue(':interest', $interest);
				$stmt->execute();

				return $pdo->lastInsertId();

			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}		
		}

		public function updateAccount($number, $name, $location, $limit){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$stmt = $pdo->prepare("UPDATE account 
					SET account_type=:type, balance=:balance, option=:option, account_interest=:interest, 
					WHERE account_number=:number");

				$stmt->bindValue(':number', $number);
				$stmt->bindValue(':type', $type);
				$stmt->bindValue(':balance', $balance);
				$stmt->bindValue(':option', $option);
				$stmt->bindValue(':interest', $interest);
				$stmt->execute();

				return $stmt->rowCount();

			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}
		}

		public function deleteAccount($number){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$stmt = $pdo->prepare("DELETE FROM account WHERE account_number=:number;");

				$stmt->bindValue(':number', $number);

				return $stmt->execute();	

			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}
		}

		public function getAccount($number){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$stmt = $pdo->prepare("SELECT * FROM account WHERE account_number=:number");

				$stmt->bindValue(':number', $number);
				$stmt->execute();


				$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Account');

				while ($branch = $stmt->fetch())
				{
				    $response["number"] = $branch->getNumber(); 
				    $response["type"] = $branch->getType();
				    $response["balance"] = $branch->getBalance();
					$response["option"] = $branch->getOption();
					$response["interest"] = $branch->getInterest();
				}

				return $response;

			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}
		}
	}