<?php

    include("functions.php");

    include("views/header.php");

    # Redirect to different pages in views/
    if ($_GET['page'] == 'example1') {
        
        include("views/example1.php");
        
    } else if ($_GET['page'] == 'example2') {
        
        include("views/example2.php");
        
    } else {

        include("views/home.php");
        
    }

?>