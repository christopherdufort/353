<main role="main" class="container my-5">
    <h1> Transactions </h1>
    </br>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">From Account</th>
            <th scope="col">To Account</th>
            <th scope="col">To Service</th>
            <th scope="col">Amount</th>
        </tr>
        </thead>
        <tbody>
    <?php
include 'classes/transaction/transactionDAO.php';
$db = new TransactionDAO();
foreach ($db->getTransactionsByClient($_SESSION['client']['id']) as $transaction) {
	?>
        <tr>
            <td><?php echo $transaction['from_account']; ?></td>
            <td><?php echo $transaction['to_account']; ?></td>
            <td><?php echo $transaction['to_service']; ?></td>
            <td><?php echo '$' . $transaction['amount']; ?></td>
        </tr>
    <?php }?>
        </tbody>
    </table>
    <br/>
</main>