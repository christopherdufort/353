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

    <div class="container">
        <h2>My Accounts</h2>
        <br>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home">Personal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu1">Business</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="home" class="container tab-pane active"><br>
                <h3>Personal Accounts</h3>
                <?php
                foreach ($db->getAccountsByClientAndCategory($_SESSION['client']['id'], 'personal') as $account) {
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
            </div>
            <div id="menu1" class="container tab-pane fade"><br>
                <h3>Business Accounts</h3>
                <?php
                foreach ($db->getAccountsByClientAndCategory($_SESSION['client']['id'], 'business') as $account) {
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
            </div>
        </div>
    </div>

    <br/>
</main>