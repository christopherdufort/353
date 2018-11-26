<?php
include 'classes/account/accountDAO.php';
include 'classes/service/serviceDAO.php';
?>
<main role="main" class="container my-5">
    <h1> Pay Bills </h1>
    </br>
    <form class="form-inline" action="actions.php" method="post">
        <label class="mr-sm-2" for="inlineFormCustomSelect">From Account </label>
        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="from">
            <?php
$db = new AccountDAO();
foreach ($db->getAccountsByClient($_SESSION['client']['id']) as $account) {
	?>
            <option value="<?php echo $account['number'] ?>"><?php echo $account['number'] ?></option>
            <?php }?>
        </select>
        <label class="mr-sm-2" for="inlineFormCustomSelect">To Service ID </label>
        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="to">
            <?php
$db = new serviceDAO();
foreach ($db->getServicesByClient($_SESSION['client']['id']) as $service) {
	?>
            <option value="<?php echo $service['id'] ?>"><?php echo $service['id'] ?></option>
            <?php }?>
        </select>
        <input type="number" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInputGroup" placeholder="Amount" name="amount">
        <button type="submit" class="btn btn-primary" name="paybills">Pay Bills</button>
    </form>
    <br/>
    <h1> My Services </h1>
    <br/>
    <?php
foreach ($db->getServicesByClient($_SESSION['client']['id']) as $service) {
	?>
    <div class="card">
        <div class="card-header">
            <?php echo 'Service ID: ' . $service['id']; ?>
        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo ucwords($service['name']); ?></h5>
            <p class="card-text">Amount Due: $<?php echo $service['amount_due']; ?></p>
            <p class="card-text">Interest Rate: <?php echo $service['interestRate']; ?>%</p>
        </div>
    </div>
    <br/>
    <?php }?>
    <br/>
</main>