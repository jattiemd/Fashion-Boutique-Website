<?php

    /**
     * Before sending the user to the checkout page,
     * this file verifies whether the user is logged in or not
     * if the user is logged in it will send them to the checkout page
     * if not, they will be sent to the login page.
     */

    include("database.php");
    include("header.php");
    
    if (empty(($_SESSION['username']))) {
        echo "<script> alert('You are not logged in. Please login to use the Checkout service') </script>";
        echo "<script> window.open('login.php', '_self') </script>";
    } 
    else {
        echo "<script> window.open('checkout.php','_self') </script>";
    }
    

?>
