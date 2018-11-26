<?php

include "functions.php";
include 'classes/client/clientDAO.php';
include 'classes/account/accountDAO.php';
include 'classes/login/loginDAO.php';

# Login
if (isset($_POST['login'])) {
	$db = new loginDAO();
	$login = $db->loginUser($_POST['cardNumber'], $_POST['password']);
	if ($login == FALSE) {
		$_SESSION['message'] = 'Wrong card number or password!';
		header("Location: index.php?page=login");
		exit;
	} else {
		$db = new clientDAO();
		$client = $db->getClient($login);
		$_SESSION['client'] = $client;
		$_SESSION['is_logged'] = TRUE;
		header("Location: index.php?page=accounts");
		exit;
	}

}
# Logout
if (isset($_POST['logout'])) {

	unset($_SESSION['client']);
	unset($_SESSION['is_logged']);
	header("Location: index.php");
	exit;
}

# Transfer money between accounts
if (isset($_POST['transfer'])) {

	$db = new AccountDAO();
	$db->transferMoney($_POST['from'], $_POST['to'], $_POST['amount']);
	header("Location: index.php?page=accounts");
	exit;

}

# Pay Bills
if (isset($_POST['paybills'])) {

	$db = new AccountDAO();
	$db->payBills($_POST['from'], $_POST['to'], $_POST['amount']);
	header("Location: index.php?page=pay_bills");
	exit;

}

?>