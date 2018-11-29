<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../../../favicon.ico">
        <title> 353 </title>
        <!-- Bootstrap core CSS -->
        <link href="./static/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="./static/css/mystyle.css" rel="stylesheet">
        <link href="./static/css/fontawesome-all.css" rel="stylesheet">
        <!-- Commonly used Javascript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="."> 353 Banking </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <?php if (isset($_SESSION['is_logged']) && isset($_SESSION['client'])) {?>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=accounts"> My Accounts </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=bills"> Pay Bills </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=sendmoney"> Send Money </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=transactions"> View Transactions </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=add_account"> Add an account </a>
                    </li>
                    <?php } else if (isset($_SESSION['is_logged']) && isset($_SESSION['employee'])) {?>
                        <li class="nav-item">
                        <a class="nav-link" href="?page=view_branches"> View Branches </a>
                    </li>


                    <?php }?>
                </ul>
                <div class="form-inline pull-xs-right">
                    <?php if (isset($_SESSION['is_logged'])) {?>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item px-4">
                            <?php if (isset($_SESSION['client'])) {?>
                            <a class="nav-link" href="?page=client_page"> <?php echo $_SESSION['client']['firstName'] . ' ' . $_SESSION['client']['lastName']; ?> <i class="far fa-user-circle"></i>
                            </a>
                        <?php } else if (isset($_SESSION['employee'])) {?>
                            <a class="nav-link" href="?page=employee_page"> <?php echo $_SESSION['employee']['firstName'] . ' ' . $_SESSION['employee']['lastName']; ?> <i class="far fa-user-circle"></i>
                            </a>
                        <?php }?>
                        </li>
                        <li class="nav-item">
                            <form class="form-signin" action="actions.php" method="post">
                                <button class="btn btn-success-outline" type="submit" name="logout" value="logout"> Logout </button>
                            </form>
                        </li>
                    </ul>
                    <?php } else {?>
                    <a class="btn btn-info" href="?page=login" role="button">
                        Login
                    </a>
                    <a class="btn btn-info ml-2" href="?page=signup" role="button">
                        Sign Up
                    </a>
                    <?php }?>
                </div>
            </div>
        </nav>
        <!-- /.container -->
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>