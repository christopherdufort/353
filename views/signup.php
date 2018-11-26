<main role="main" class="container my-2">
<?php
if (isset($_SESSION['message'])) {
	echo "<div class=\"alert alert-danger\" role=\"alert\">";
	echo $_SESSION['message'];
	echo "</div>";
	unset($_SESSION['message']);
}
?>


    <form class="form-signup" action="actions.php" method="post">
        <h1 class="h3 mb-3 font-weight-normal text-center"> Sign up </h1>
        <label for="cardNumber">Client Card Number </label>
        <input type="text" id="cardNumber" name="cardNumber" class="form-control" placeholder="Client Card Number" required autofocus>
        <label for="inputPassword"> Password </label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <label for="inputFirstName"> First Name </label>
        <input type="text" id="inputFirstName" name="firstName" class="form-control" placeholder="First Name" required>
        <label for="inputLastName"> Last Name </label>
        <input type="text" id="inputLastName" name="lastName" class="form-control" placeholder="Last Name" required>
        <label for="inputBirthDate"> Birth Date ex(yyyy-mm-dd) </label>
        <input type="text" id="inputBirthDate" name="birthDate" class="form-control" placeholder="Birth Date" required>
        <label for="inputAddress"> Address </label>
        <input type="text" id="inputAddress" name="Address" class="form-control" placeholder="Address" required>
        <label for="inputEmail"> Email </label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required>
        <label for="inputPhone"> Phone ex(XXX-XXX-XXXX)</label>
        <input type="text" id="inputPhone" name="phone" class="form-control" placeholder="Phone" required>
        <br/>
        <button class="btn btn-lg btn-info btn-block" type="submit" name="signup" value="Signup"> Signup </button>
    </form>

</main>
