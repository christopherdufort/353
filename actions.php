<?php

include "functions.php";
include 'classes/client/clientDAO.php';
include 'classes/account/accountDAO.php';

# Login
if (isset($_POST['login'])) {
	$db = new ClientDAO();
	$client = $db->getClient($_POST['id']);
	if (!$client) {
		$_SESSION['message'] = 'Wrong account id or password!';
		# redirect
		header("Location: index.php?page=login");
		exit;
	} else if ($_POST['password'] != $client['client_password']) {

		$_SESSION['message'] = 'Wrong password!';
		header("Location: index.php?page=login");
		exit;

	} else if ($_POST['password'] == $client['client_password']) {
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

?>