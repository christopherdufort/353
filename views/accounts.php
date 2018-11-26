<main role="main" class="container my-5">
    <h1> Transfer Money </h1>
    </br>
    <form class="form-inline" action="actions.php" method="post">
        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="From" name="from">
        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInputGroup" placeholder="To" name="to">
        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInputGroup" placeholder="Amount" name="account">
        <button type="submit" class="btn btn-primary" name="transfer">Transfer</button>
    </form>
    </br>
    <h1> My Accounts </h1>
    </br>
    <?php
include 'classes/account/accountDAO.php';
$db = new AccountDAO();
foreach ($db->getAccountsByClient($_SESSION['client']['id']) as $account) {
	?>
    <div class="card">
        <div class="card-header">
            <?php echo 'Account number: ' . $account['number']; ?>
        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo ucfirst($account['type']); ?></h5>
            <p class="card-text">Balance: $<?php echo ucfirst($account['balance']); ?></p>
            <a href="#" class="btn btn-primary">View Details</a>
        </div>
    </div>
    </br>
    <?php }?>
    </br>
    <h1> My Services </h1>
    </br>
    <?php
include 'classes/service/serviceDAO.php';
$db = new serviceDAO();
foreach ($db->getServicesByClient($_SESSION['client']['id']) as $service) {
	?>
    <div class="card">
        <div class="card-header">
            <?php echo 'Service ID: ' . $service['id']; ?>
        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo ucwords($service['name']); ?></h5>
            <p class="card-text">Interest Rate: <?php echo $service['interestRate']; ?>%</p>
        </div>
    </div>
    </br>
    <?php }?>
</main>