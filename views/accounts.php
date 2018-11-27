<main role="main" class="container my-5">
    <h1> Transfer Money </h1>
    </br>
    <form class="form-inline" action="actions.php" method="post">
        <label class="mr-sm-2" for="inlineFormCustomSelect">From</label>
        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="from">
            <?php
include 'classes/account/accountDAO.php';
$db = new AccountDAO();
foreach ($db->getAccountsByClient($_SESSION['client']['id']) as $account) {
	?>
            <option value="<?php echo $account['number'] ?>"><?php echo $account['number'] ?></option>
            <?php }?>
        </select>
        <label class="mr-sm-2" for="inlineFormCustomSelect">To</label>
        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="to">
            <?php
foreach ($db->getAccountsByClient($_SESSION['client']['id']) as $account) {
	?>
            <option value="<?php echo $account['number'] ?>"><?php echo $account['number'] ?></option>
            <?php }?>
        </select>
        <input type="number" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInputGroup" placeholder="Amount" name="amount">
        <button type="submit" class="btn btn-primary" name="transfer">Transfer</button>
    </form>
    </br>
    <h1> My Accounts </h1>
    </br>
    <?php
foreach ($db->getAccountsByClient($_SESSION['client']['id']) as $account) {
	?>
    <div class="card">
        <div class="card-header">
            <?php echo 'Account number: ' . $account['number']; ?>
        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo ucfirst($account['type']); ?></h5>
            <p class="card-text">Balance: $<?php echo ucfirst($account['balance']); ?></p>
            <p class="card-text">Account Category: <?php echo ucfirst($account['category']); ?></p>
        </div>
    </div>
    </br>
    <?php }?>
    <br/>
</main>