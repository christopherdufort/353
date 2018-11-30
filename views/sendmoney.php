<main role="main" class="container my-5">
    <h1> eTransfer </h1>
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
        <input type="number" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInputGroup" placeholder="Email or Phone" name="to" required min="0.00" max="99999.99" step="0.1">
        <input type="number" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInputGroup" placeholder="Amount" name="amount" required min="0.00" max="99999.99" step="0.1">
        <button type="submit" class="btn btn-primary" name="etransfer">eTransfer</button>
    </form>
</main>