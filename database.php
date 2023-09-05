<?php

    //Database Vairables
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "aelahn";
    $conn = "";

    try {
        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name); //Establishing connection
    } 
    catch (mysqli_sql_exception) {                                        //Catching error
        echo "Could not establish connection!";
    }

?>