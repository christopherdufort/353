<?php

include "functions.php";
include 'classes/client/clientDAO.php';
$db = new ClientDAO();

# Login
if (isset($_POST['login'])) {

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

# Send Money

?>