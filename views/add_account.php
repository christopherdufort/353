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
        <h1 class="h3 mb-3 font-weight-normal text-center"> Add a new account </h1>
        <label for="accountType"> Account Type </label>
        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="accountType">
            <option value="checking"> Chequing </option>
            <option value="saving"> Savings </option>
        </select>
        <br/>
        <br/>
        <label for="inputPassword"> Account Category </label>
        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="accountPlan">
            <option value="personal"> Personal </option>
            <option value="business"> Business </option>
        </select>

        <br/>
        <br/>

        <button class="btn btn-lg btn-info btn-block" type="submit" name="addaccount" value="Add Account"> Add </button>
    </form>

</main>
