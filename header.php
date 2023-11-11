<?php

    session_start();
    include("database.php");
    include("functions.php");

    //Calling function that controls add_to_cart button
    cart();

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Using Bootstrap for styling-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>
<body>

    <header>

        <nav class="navbar navbar-expand-sm" style="background-color: #ffffff;">
            <div class="container">

                <!--Logo-->
                <a class="navbar-brand" href="index.php">
                    <img src="images/cropped-AELAHN-COLLECTIVE-LOGO-.jpg" alt="Logo" width="250" height="140">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <!--Navigation Items-->
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav ms-auto nav-underline">
                        <li class="nav-item">
                            <a class="nav-link navFont" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navFont" aria-current="page" href="products.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navFont" aria-current="page" href="services.php">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navFont" aria-current="page" href="contact.php">Contact</a>
                        </li>
                        <?php
                            //Checking if user is logged in 
                            if(isset($_SESSION['username'])){

                                //Check if user is admin
                                $select_query = "SELECT * FROM `customer` WHERE `user_type` = 'admin'";
                                $result = mysqli_execute_query($conn, $select_query);

                                $row = mysqli_fetch_assoc($result);

                                if ($_SESSION['username'] == $row['email']) {

                                    echo'<li class="nav-item">
                                            <a class="nav-link" href="admin.php" role="button" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tools" viewBox="0 0 16 16">
                                                <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0Zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708ZM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11Z"/>
                                                </svg>
                                            </a>
                                        </li>
                                        <li class="nav-item mt-1">
                                            <a class="badge bg-dark text-wrap nav-link navFont" style="width:8rem;" aria-current="page" href="logout.php">Logout</a>
                                        </li>';
                                }
                                //Else if user is a customer
                                else {
                                    echo'<li class="nav-item">
                                        <a class="nav-link" href="customer.php" role="button" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                        </svg>
                                        </a>
                                    </li>
                                    <li class="nav-item mt-1">
                                        <a class="badge bg-dark text-wrap nav-link navFont" style="width:8rem;" aria-current="page" href="logout.php">Logout</a>
                                    </li>';
                                }
                            } 
                            //No user logged in
                            else {
                                echo'<li class="nav-item">
                                        <a class="nav-link navFont" href="login.php">Login</a>
                                    </li>
                                    <li class="nav-item mt-1">
                                        <a class="badge bg-dark text-wrap nav-link navFont" style="width:8rem;" aria-current="page" href="register.php">Register</a>
                                    </li>';
                            }
                        ?> 
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php" role="button" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                </svg>
                                <sup>
                                    <!--Calling cart item counter function-->
                                    <?php cartItemCounter(); ?> 
                                </sup>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>

</body>
</html>