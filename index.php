<?php

#error_reporting(E_ALL);
#sini_set('display_errors', 1);

include "functions.php";
include "views/header.php";

# Redirect to different pages in views/

if (isset($_GET['page']) && $_GET['page'] == 'accounts') {
	include "views/accounts.php";
} else if (isset($_GET['page']) && $_GET['page'] == 'signup') {
    include "views/signup.php";
} else if (isset($_GET['page']) && $_GET['page'] == 'login') {
	include "views/login.php";
} else if (isset($_GET['page']) && $_GET['page'] == 'bills') {
	include "views/pay_bills.php";
} else if (isset($_GET['page']) && $_GET['page'] == 'client_page') {
	include "views/client_page.php";
} else if (isset($_GET['page']) && $_GET['page'] == 'sendmoney') {
	include "views/sendmoney.php";
} else {
	include "views/home.php";
}

?>