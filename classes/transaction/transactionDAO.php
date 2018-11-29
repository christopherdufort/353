<?php
class TransactionDAO {

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
		$this->password = "W5T7N3C9";
	}

	public function getTransactionsByClient($clientId) {
		try {
			$pdo = new PDO($this->connectString, $this->user, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $pdo->prepare("SELECT * FROM transactions
                                    WHERE (to_account IN (SELECT account.account_number
                                                        FROM account
                                                        JOIN client_account ON account.account_number = client_account.account_number
                                                        WHERE client_account.client_id = :clientId)
                                    OR from_account IN (SELECT account.account_number
                                                        FROM account
                                                        JOIN client_account ON account.account_number = client_account.account_number
                                                        WHERE client_account.client_id = :clientId))
                                    AND  transaction_date >= DATE_SUB(CURDATE(), INTERVAL 10 YEAR)");
			$stmt->bindValue(':clientId', $clientId);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);

			$response = [];

			while ($transaction = $stmt->fetch()) {
				$response[] = $transaction;
			}
			return $response;
		} catch (PDOException $e) {
			echo ($e->getMessage());
		} finally {
			unset($pdo);
		}
	}
}