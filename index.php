<?php

#error_reporting(E_ALL);
#sini_set('display_errors', 1);

include "functions.php";
include "views/header.php";

# Redirect to different pages in views/
if (isset($_GET['page'])) {
	if ($_GET['page'] == 'accounts') {
		include "views/accounts.php";
	} else if ($_GET['page'] == 'signup') {
		include "views/signup.php";
	} else if ($_GET['page'] == 'login') {
		include "views/login.php";
	} else if ($_GET['page'] == 'bills') {
		include "views/pay_bills.php";
	} else if ($_GET['page'] == 'client_page') {
		include "views/client_page.php";
	} else if ($_GET['page'] == 'employee_page') {
		include "views/employee_page.php";
	} else if ($_GET['page'] == 'sendmoney') {
		include "views/sendmoney.php";
	} else if ($_GET['page'] == 'pay_bills') {
		include "views/pay_bills.php";
	} else if ($_GET['page'] == 'view_branches') {
		include "views/view_branches.php";
	} else if ($_GET['page'] == 'transactions') {
		include "views/transactions.php";
	}} else {
	include "views/home.php";
}

?>