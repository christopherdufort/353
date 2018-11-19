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

				while ($account = $stmt->fetch())
				{
				    $response["number"] = $account->getNumber(); 
				    $response["type"] = $account->getType();
				    $response["balance"] = $account->getBalance();
					$response["option"] = $account->getOption();
					$response["interest"] = $account->getInterest();
				}

				return $response;

			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}
		}

		public function getAccountsByClient($id){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $pdo->prepare("SELECT * 
					FROM account 
					JOIN client_account ON client_account.account_number = account.account_number 
					JOIN client ON client_account.client_id = client.client_id 
					WHERE client_id=:id");
				$stmt->bindValue(':id', $id);
				$stmt->execute();
				$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Account');
				while ($account = $stmt->fetch())
				{
					$responseRow["number"] = $account->getNumber(); 
					$responseRow["type"] = $account->getType();
					$responseRow["balance"] = $account->getBalance();
					$responseRow["option"] = $account->getOption();
					$responseRow["interest"] = $account->getInterest();
					
					$response[] = $responseRow;
				}
				return $response;
			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}
		}
		
		public function getAccountsByClientAndType($id, $type){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $pdo->prepare("SELECT * 
					FROM account 
					JOIN client_account ON client_account.account_number = account.account_number 
					JOIN client ON client_account.client_id = client.client_id 
					WHERE client_id=:id AND account_type=:type");
				$stmt->bindValue(':id', $id);
				$stmt->bindValue(':type', $type);
				$stmt->execute();
				$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Account');
				while ($account = $stmt->fetch())
				{
					$responseRow["number"] = $account->getNumber(); 
					$responseRow["type"] = $account->getType();
					$responseRow["balance"] = $account->getBalance();
					$responseRow["option"] = $account->getOption();
					$responseRow["interest"] = $account->getInterest();
					
					$response[] = $responseRow;
				}
				return $response;
			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}
		}

		public function transferMoney($fromNumber, $toNumber, $amount){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $pdo->prepare("UPDATE account SET balance=:balance - :amount WHERE account_number=:number");
				$stmt->bindValue(':balance', $balance);
				$stmt->bindValue(':number', $fromNumber);
				$stmt->bindValue(':amount', $amount);
				$stmt->execute();
				
				$stmt = $pdo->prepare("UPDATE account SET balance=:balance + :amount WHERE account_number=:number");
				$stmt->bindValue(':balance', $balance);
				$stmt->bindValue(':number', $toNumber);
				$stmt->bindValue(':amount', $amount);
				$stmt->execute();
				return $stmt->rowCount();
			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}
		}
		
		public function payDebts($payFrom, $payTo, $amount){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $pdo->prepare("UPDATE account SET balance=:balance - :amount WHERE account_number=:number");
				$stmt->bindValue(':balance', $balance);
				$stmt->bindValue(':number', $payFrom);
				$stmt->bindValue(':amount', $amount);
				$stmt->execute();
				
				$stmt = $pdo->prepare("UPDATE account SET balance=:balance - :amount WHERE account_number=:number");
				$stmt->bindValue(':balance', $balance);
				$stmt->bindValue(':number', $payTo);
				$stmt->bindValue(':amount', $amount);
				$stmt->execute();
				return $stmt->rowCount();
			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}
		}
		
		public function eTransfer($number, $emailOrPhone, $amount){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $pdo->prepare("UPDATE account SET balance=:balance - :amount WHERE account_number=:number");
				$stmt->bindValue(':balance', $balance);
				$stmt->bindValue(':number', $number);
				$stmt->bindValue(':amount', $amount);
				$stmt->execute();
				
				//join on client and look for account that is personal checking?
				$stmt = $pdo->prepare("UPDATE account SET balance=:balance + :amount WHERE email=:emailOrPhone OR phone=:emailOrPhone");
				$stmt->bindValue(':balance', $balance);
				$stmt->bindValue(':amount', $amount);
				$stmt->bindValue(':emailOrPhone', $emailOrPhone);
				$stmt->execute();
				return $stmt->rowCount();
			} catch (PDOException $e) {
				echo($e->getMessage()); 
			} finally {
				unset($pdo);
			}
		}

		public function getAllAccounts(){
			try {
				$pdo = new PDO($this->connectString, $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $pdo->prepare("SELECT * FROM account");
				$stmt->execute();
				$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Account');
				while ($account = $stmt->fetch())
				{
					$responseRow["number"] = $account->getNumber(); 
					$responseRow["type"] = $account->getType();
					$responseRow["balance"] = $account->getBalance();
					$responseRow["option"] = $account->getOption();
					$responseRow["interest"] = $account->getInterest();
					
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