<?php
require_once 'account.php';

class AccountDAO {

	private $connectString;
	private $user;
	private $password;

	function __construct() {
		# if connecting to school
		#$this->connectString = "mysql:host=gec353.encs.concordia.ca;dbname=gec353_2;charset=utf8mb4";
		#$this->user = "gec353_2";
		#$this->password = "";
		# if local
		$this->connectString = "mysql:host=localhost;dbname=gec353_2;charset=utf8mb4";
		$this->user = "root";
		$this->password = "";
		$this->password = "W5T7N3C9";
	}

	public function createAccount($type, $balance, $chargeId, $interest, $category) {
		try {
			$pdo = new PDO($this->connectString, $this->user, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$digits = 7;
			$account_number = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
			$stmt = $pdo->prepare("INSERT INTO account(account_number, account_type,balance,charge_plan_id,account_interest,account_category)
					VALUES(:account_number, :type,:balance,:chargeId,:interest,:category);");
			$stmt->bindValue(':account_number', $account_number);
			$stmt->bindValue(':type', $type);
			$stmt->bindValue(':balance', $balance);
			$stmt->bindValue(':chargeId', $chargeId);
			$stmt->bindValue(':interest', $interest);
			$stmt->bindValue(':category', $category);
			$stmt->execute();

			$stmt = $pdo->prepare("INSERT INTO client_account(client_id, account_number)
                    VALUES(:client_id, :account_number);");
			$stmt->bindValue(':client_id', $_SESSION['client']['id']);
			$stmt->bindValue(':account_number', $account_number);
			$stmt->execute();

			return $pdo->lastInsertId();

		} catch (PDOException $e) {
			echo ($e->getMessage());
		} finally {
			unset($pdo);
		}
	}

	public function updateAccount($number, $type, $balance, $chargeId, $interest, $category) {
		try {
			$pdo = new PDO($this->connectString, $this->user, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $pdo->prepare("UPDATE account
					SET account_type=:type, balance=:balance, charge_plan_id=:chargeId, account_interest=:interest, account_category=:category
					WHERE account_number=:number");

			$stmt->bindValue(':number', $number);
			$stmt->bindValue(':type', $type);
			$stmt->bindValue(':balance', $balance);
			$stmt->bindValue(':chargeId', $chargeId);
			$stmt->bindValue(':interest', $interest);
			$stmt->bindValue(':category', $category);
			$stmt->execute();

			return $stmt->rowCount();

		} catch (PDOException $e) {
			echo ($e->getMessage());
		} finally {
			unset($pdo);
		}
	}

	public function deleteAccount($number) {
		try {
			$pdo = new PDO($this->connectString, $this->user, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $pdo->prepare("DELETE FROM account WHERE account_number=:number;");

			$stmt->bindValue(':number', $number);

			return $stmt->execute();

		} catch (PDOException $e) {
			echo ($e->getMessage());
		} finally {
			unset($pdo);
		}
	}

	public function getAccount($number) {
		try {
			$pdo = new PDO($this->connectString, $this->user, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $pdo->prepare("SELECT * FROM account WHERE account_number=:number");

			$stmt->bindValue(':number', $number);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Account');

			$response = [];

			while ($account = $stmt->fetch()) {
				$response["number"] = $account->getNumber();
				$response["type"] = $account->getType();
				$response["balance"] = $account->getBalance();
				$response["chargeId"] = $account->getChargeId();
				$response["interest"] = $account->getInterest();
				$response["category"] = $account->getCategory();
			}

			return $response;

		} catch (PDOException $e) {
			echo ($e->getMessage());
		} finally {
			unset($pdo);
		}
	}

	public function getAccountsByClient($id) {
		try {
			$pdo = new PDO($this->connectString, $this->user, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $pdo->prepare("SELECT *
					FROM account
					JOIN client_account ON client_account.account_number = account.account_number
					JOIN client ON client_account.client_id = client.client_id
					WHERE client.client_id=:id");
			$stmt->bindValue(':id', $id);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Account');
			while ($account = $stmt->fetch()) {
				$responseRow["number"] = $account->getNumber();
				$responseRow["type"] = $account->getType();
				$responseRow["balance"] = $account->getBalance();
				$responseRow["chargeId"] = $account->getChargeId();
				$responseRow["interest"] = $account->getInterest();
				$responseRow["category"] = $account->getCategory();

				$response[] = $responseRow;
			}
			return $response;
		} catch (PDOException $e) {
			echo ($e->getMessage());
		} finally {
			unset($pdo);
		}
	}

	public function getAccountsByClientAndType($id, $type) {
		try {
			$pdo = new PDO($this->connectString, $this->user, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $pdo->prepare("SELECT *
					FROM account
					JOIN client_account ON client_account.account_number = account.account_number
					JOIN client ON client_account.client_id = client.client_id
					WHERE client.client_id=:id AND account_type=:type");
			$stmt->bindValue(':id', $id);
			$stmt->bindValue(':type', $type);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Account');

			$response = [];

			while ($account = $stmt->fetch()) {
				$responseRow["number"] = $account->getNumber();
				$responseRow["type"] = $account->getType();
				$responseRow["balance"] = $account->getBalance();
				$responseRow["chargeId"] = $account->getChargeId();
				$responseRow["interest"] = $account->getInterest();
				$responseRow["category"] = $account->getCategory();

				$response[] = $responseRow;
			}
			return $response;
		} catch (PDOException $e) {
			echo ($e->getMessage());
		} finally {
			unset($pdo);
		}
	}

	public function getAccountsByClientAndCategory($id, $category) {
		try {
			$pdo = new PDO($this->connectString, $this->user, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $pdo->prepare("SELECT *
					FROM account
					JOIN client_account ON client_account.account_number = account.account_number
					JOIN client ON client_account.client_id = client.client_id
					WHERE client.client_id=:id AND account_category=:category");
			$stmt->bindValue(':id', $id);
			$stmt->bindValue(':category', $category);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Account');

			$response = [];

			while ($account = $stmt->fetch()) {
				$responseRow["number"] = $account->getNumber();
				$responseRow["type"] = $account->getType();
				$responseRow["balance"] = $account->getBalance();
				$responseRow["chargeId"] = $account->getChargeId();
				$responseRow["interest"] = $account->getInterest();
				$responseRow["category"] = $account->getCategory();

				$response[] = $responseRow;
			}
			return $response;
		} catch (PDOException $e) {
			echo ($e->getMessage());
		} finally {
			unset($pdo);
		}
	}

	public function transferMoney($fromNumber, $toNumber, $amount) {
		try {
			$pdo = new PDO($this->connectString, $this->user, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $pdo->prepare("UPDATE account SET balance = balance - :amount WHERE account_number=:number");
			# $stmt->bindValue(':balance', $balance);
			$stmt->bindValue(':number', $fromNumber);
			$stmt->bindValue(':amount', $amount);
			$stmt->execute();

			$stmt = $pdo->prepare("UPDATE account SET balance = balance + :amount WHERE account_number= :number");
			# $stmt->bindValue(':balance', $balance);
			$stmt->bindValue(':number', $toNumber);
			$stmt->bindValue(':amount', $amount);
			$stmt->execute();

			$stmt = $pdo->prepare("INSERT INTO transactions(from_account,to_account,amount,transaction_date)
                    VALUES(:fromAccount,:toAccount,:amount,:transactionDate);");
			$stmt->bindValue(':toAccount', $toNumber);
			$stmt->bindValue(':fromAccount', $fromNumber);
			$stmt->bindValue(':amount', $amount);
			$stmt->bindValue(':transactionDate', date('Y-m-d', time()));
			$stmt->execute();

			return $stmt->rowCount();
		} catch (PDOException $e) {
			echo ($e->getMessage());
		} finally {
			unset($pdo);
		}
	}

	public function payBills($payFrom, $payTo, $amount) {
		try {
			$pdo = new PDO($this->connectString, $this->user, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $pdo->prepare("UPDATE account SET balance=balance - :amount WHERE account_number=:number");
			$stmt->bindValue(':number', $payFrom);
			$stmt->bindValue(':amount', $amount);
			$stmt->execute();

			$stmt = $pdo->prepare("UPDATE service SET amount_due = amount_due - :amount WHERE service_id=:number");
			$stmt->bindValue(':number', $payTo);
			$stmt->bindValue(':amount', $amount);
			$stmt->execute();

			$stmt = $pdo->prepare("INSERT INTO transactions(from_account,to_service,amount,transaction_date)
                    VALUES(:fromAccount,:toService,:amount,:transactionDate);");
			$stmt->bindValue(':toService', $payTo);
			$stmt->bindValue(':fromAccount', $payFrom);
			$stmt->bindValue(':amount', $amount);
			$stmt->bindValue(':transactionDate', date('Y-m-d', time()));
			$stmt->execute();

			return $stmt->rowCount();
		} catch (PDOException $e) {
			echo ($e->getMessage());
		} finally {
			unset($pdo);
		}
	}

	public function eTransfer($number, $emailOrPhone, $amount) {
		try {
			$pdo = new PDO($this->connectString, $this->user, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $pdo->prepare("SELECT account.account_number FROM account
									JOIN client_account ON account.account_number = client_account.account_number
									JOIN client ON client_account.client_id = client.client_id
									WHERE client.email = :emailOrPhone OR client.phone = :emailOrPhone
									LIMIT 1;");
			$stmt->bindValue(':emailOrPhone', $emailOrPhone);
			$stmt->execute();

			$toNumber = 0;
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$toNumber = $row['account_number'];

			$stmt = $pdo->prepare("UPDATE account SET balance=balance - :amount WHERE account_number=:number");
			$stmt->bindValue(':amount', $amount);
			$stmt->bindValue(':number', $number);
			$stmt->execute();

			$stmt = $pdo->prepare("UPDATE account SET balance=balance + :amount WHERE account_number=:toNumber");
			$stmt->bindValue(':amount', $amount);
			$stmt->bindValue(':toNumber', $toNumber);
			$stmt->execute();

			$stmt = $pdo->prepare("INSERT INTO transactions(from_account,to_account,amount,transaction_date)
					VALUES(:fromAccount,:toAccount,:amount,:transactionDate);");
			$stmt->bindValue(':toAccount', $toNumber);
			$stmt->bindValue(':fromAccount', $number);
			$stmt->bindValue(':amount', $amount);
			$stmt->bindValue(':transactionDate', date('Y-m-d', time()));
			$stmt->execute();

			return $stmt->rowCount();
		} catch (PDOException $e) {
			echo ($e->getMessage());
		} finally {
			unset($pdo);
		}
	}

	public function getAllAccounts() {
		try {
			$pdo = new PDO($this->connectString, $this->user, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $pdo->prepare("SELECT * FROM account");
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Account');

			$response = [];

			while ($account = $stmt->fetch()) {
				$responseRow["number"] = $account->getNumber();
				$responseRow["type"] = $account->getType();
				$responseRow["balance"] = $account->getBalance();
				$responseRow["chargeId"] = $account->getChargeId();
				$responseRow["interest"] = $account->getInterest();
				$responseRow["category"] = $account->getCategory();

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