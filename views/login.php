<main role="main" class="container my-2">
<?php
if (isset($_SESSION['message'])) {
	echo "<div class=\"alert alert-danger\" role=\"alert\">";
	echo $_SESSION['message'];
	echo "</div>";
	unset($_SESSION['message']);
}
?>
    <form class="form-signin" action="actions.php" method="post">
        <h1 class="h3 mb-3 font-weight-normal text-center"> Login </h1>

        <label for="inpinputcardnumberutid"> Card Number (11 digit number printed on your bank card) </label>
        <input type="number" id="inputcardnumber" name="cardNumber" class="form-control" placeholder="Client Card Number" required autofocus min="0" max="99999999999">
    </br>
        <label for="inputPassword"> Password </label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
 </br>
        <button class="btn btn-lg btn-info btn-block" type="submit" name="login" value="Login"> Login </button>
    </form>

</main>
