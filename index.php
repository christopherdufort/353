<?php

    include("functions.php");

    include("views/header.php");

    # Redirect to different pages in views/
    if (isset($_GET['page']) && $_GET['page'] == 'accounts') {
        
        include("views/accounts.php");
        
    } else if (isset($_GET['page']) && $_GET['page'] == 'login') {
        
        include("views/login.php");
        
    } else {

        include("views/home.php");
        
    }

?>