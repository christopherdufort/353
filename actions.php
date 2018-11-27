<?php

include "functions.php";
include 'classes/client/clientDAO.php';
include 'classes/account/accountDAO.php';
include 'classes/login/loginDAO.php';
include 'classes/signup/signupDAO.php';
include 'classes/employee/employeeDAO.php';

# Login
if (isset($_POST['login'])) {
	$db = new loginDAO();
	$login = $db->loginUser($_POST['cardNumber'], $_POST['password']);
	if ($login == FALSE) {
		$_SESSION['message'] = 'Wrong card number or password!';
		header("Location: index.php?page=login");
		exit;
	} else if ($login['is_employee'] == 1) {
		$db = new clientDAO();
		$client = $db->getClient($login['user_id']);
		$_SESSION['client'] = $client;
		$_SESSION['is_logged'] = TRUE;
		header("Location: index.php");
		exit;
	} else if ($login['is_employee'] == 0) {
		$db = new employeeDAO();
		$employee = $db->getEmployee($login['user_id']);
		$_SESSION['employee'] = $employee;
		$_SESSION['is_logged'] = TRUE;
		header("Location: index.php");
		exit;

	}

}
# Sign up
if (isset($_POST['signup'])) {
	# Create a record in the client and login table for the user:
	$db = new signupDAO();
	$signup = $db->signupUser($_POST['cardNumber'], $_POST['password'], $_POST['firstName'], $_POST['lastName'], $_POST['birthDate'], $_POST['address'], $_POST['email'], $_POST['phone']);

	if ($signup) {
		# Login the user afterwords;
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
	} else {
		$_SESSION['message'] = 'Error occurred when creating account!';
		header("Location: index.php?page=signup");
	}

}
# Logout
if (isset($_POST['logout'])) {

	unset($_SESSION['client']);
	unset($_SESSION['employee']);
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

if (isset($_POST['paybills'])) {

	$db = new AccountDAO();
	$db->payBills($_POST['from'], $_POST['to'], $_POST['amount']);
	header("Location: index.php?page=pay_bills");
	exit;
}

# eTransfer money between accounts
if (isset($_POST['etransfer'])) {
	$db = new AccountDAO();
	$db->eTransfer($_POST['from'], $_POST['to'], $_POST['amount']);
	header("Location: index.php?page=sendmoney");
	exit;

}

?>