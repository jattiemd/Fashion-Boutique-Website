<?php

    include("header.php");
    include("database.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>

    <!--Using Bootstrap for styling-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>
<body>

    <div class="container mt-4">
        
        <?php
            echo "  <div class='row text-center'>
                        <h3 class='formFont'>Welcome Back, {$_SESSION['username']}</h3>
                    </div>";
        ?>

    </div>

    <div class='container mt-5'>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed linkFont" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Personal information
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class='container-fluid'>
                            <div class='row text-center justify-content-center'>
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th scope='col' class='navFont'>Current Details</th>
                                            <th scope='col' class='navFont'>Change Details</th>
                                            <th scope='col' class='navFont'>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php
                                            $select_query = "SELECT * FROM `customer` WHERE `email` = '{$_SESSION['username']}'";
                                            $result = mysqli_execute_query($conn, $select_query);

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                
                                                $firstName = $row['firstName'];
                                                $lastName = $row['lastName'];
                                                $email = $row['email'];
                                                $password = $row['password'];
                                                $phoneNumber = $row['phoneNumber'];
                                                $streetAddress = $row['streetAddress'];
                                                $suburb = $row['suburb'];
                                                $city = $row['city'];
                                                $postalCode = $row['postalCode'];

                                                echo "  <form method='post'>
                                                            <tr>
                                                                <td class='pFont' style='font-size:16px;'>$firstName</td>
                                                                <td><input type='text' name='newFirstName' class='form-control border border-bottom border-0 text-center' placeholder='New first name'></td>
                                                                <td><button class='btn btn-dark pFont' type='submit' name='update_first_name'>Update</button></td>
                                                            </tr>
                                                            <tr>
                                                                <td class='pFont' style='font-size:16px;'>$lastName</td>
                                                                <td><input type='text' name='newLastName' class='form-control border border-bottom border-0 text-center' placeholder='New last name'></td>
                                                                <td><button class='btn btn-dark pFont' type='submit' name='update_last_name'>Update</button></td>
                                                            </tr>
                                                            <tr>
                                                                <td class='pFont' style='font-size:16px;'>$email</td>
                                                                <td><input type='text' name='newEmail' class='form-control border border-bottom border-0 text-center' placeholder='New email'></td>
                                                                <td><button class='btn btn-dark pFont' type='submit' name='update_email'>Update</button></td>
                                                            </tr>
                                                            <tr>
                                                                <td class='pFont' style='font-size:16px;'>#Hashed</td>
                                                                <td><input type='password' name='newPassword' class='form-control border border-bottom border-0 text-center' placeholder='New password'></td>
                                                                <td><button class='btn btn-dark pFont' type='submit' name='update_password'>Update</button></td>
                                                            </tr>
                                                            <tr>
                                                                <td class='pFont' style='font-size:16px;'>+27 $phoneNumber</td>
                                                                <td><input type='tel' name='newPhoneNumber' class='form-control border border-bottom border-0 text-center' maxlength='10' placeholder='New phone number'></td>
                                                                <td><button class='btn btn-dark pFont' type='submit' name='update_phone_number'>Update</button></td>
                                                            </tr>
                                                            <tr>
                                                                <td class='pFont' style='font-size:16px;'>$streetAddress</td>
                                                                <td><input type='text' name='newStreetAddress' class='form-control border border-bottom border-0 text-center' placeholder='New street address'></td>
                                                                <td><button class='btn btn-dark pFont' type='submit' name='update_street_address'>Update</button></td>
                                                            </tr>
                                                            <tr>
                                                                <td class='pFont' style='font-size:16px;'>$suburb</td>
                                                                <td><input type='text' name='newSuburb' class='form-control border border-bottom border-0 text-center' placeholder='New suburb'></td>
                                                                <td><button class='btn btn-dark pFont' type='submit' name='update_suburb'>Update</button></td>
                                                            </tr>
                                                            <tr>
                                                                <td class='pFont' style='font-size:16px;'>$city</td>
                                                                <td><input type= style='font-size:16px;'text' name='newCity' class='form-control border border-bottom border-0 text-center' placeholder='New city'></td>
                                                                <td><button class='btn btn-dark pFont' type='submit' name='update_city'>Update</button></td>
                                                            </tr>
                                                            <tr>
                                                                <td class='pFont' style='font-size:16px;'>$postalCode</td>
                                                                <td><input type='tel' name='newPostalCode' class='form-control border border-bottom border-0 text-center' maxlength='4' placeholder='New postal code'></td>
                                                                <td><button class='btn btn-dark pFont' type='submit' name='update-postal_code'>Update</button></td>
                                                            </tr>
                                                        </form>";
                                            }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed linkFont" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="true" aria-controls="flush-collapseTwo">
                        Orders
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class='container-fluid'>
                            <div class='row text-center justify-content-center'>
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th scope='col' class='navFont'>Items</th>
                                            <th scope='col' class='navFont'>Total Items</th>
                                            <th scope='col' class='navFont'>Amount Paid</th>
                                            <th scope='col' class='navFont'>Delivered to</th>
                                            <th scope='col' class='navFont'>Order Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php
                                            //PHP code to display customer order data
                                            $select_query = "SELECT * FROM `customer_orders` WHERE `email` = '{$_SESSION['username']}'";
                                            $result = mysqli_execute_query($conn, $select_query);

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                
                                                $item_names = $row['item_names'];
                                                $total_items = $row['total_items'];
                                                $amount_paid = $row['amount'];
                                                $delivered_to = $row['deliver_to'];
                                                $date = $row['date'];

                                                echo "  <tr class='pFont'>
                                                            <td>$item_names</td>
                                                            <td>$total_items</td>
                                                            <td>R". number_format($amount_paid, 2) ."</td>
                                                            <td>$delivered_to</td>
                                                            <td>$date</td>
                                                        </tr>";
                                            }
                                            ?>
                                            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



    
</body>
</html>
<?php

    include("footer.html");

?>

<?php
//Customer details update handler
//First Name
updateFunc('update_first_name', 'newFirstName', 'firstName');

//Last Name
updateFunc('update_last_name', 'newLastName', 'lastName');

//Email
updateFunc('update_email', 'newEmail', 'email');

//Password
//Password needs to be hashed first before entering the database
if (isset($_POST['update_password'])) {

    $password = $_POST['newPassword'];
    // Password encryption
    $password = password_hash($password, PASSWORD_DEFAULT);

    $update_query=" UPDATE `customer` 
                    SET `password` = '$password'
                    WHERE `email` = '{$_SESSION['username']}'";
    $run_update_query = mysqli_execute_query($conn, $update_query);

    //If update = true echo success alert and refresh page
    if ($run_update_query) {
        echo "<script> alert('Update Successful!') </script>";
        echo "<script> window.open('customer.php', '_self') </script>";
    }
    else {
        echo "<script> alert('Update Unsuccessful') </script>";
    }
}

//Phone Number
updateFunc('update_phone_number', 'newPhoneNumber', 'phoneNumber');

//Street Address
updateFunc('update_street_address', 'newStreetAddress', 'streetAddress');

//Suburb
updateFunc('update_suburb', 'newSuburb', 'suburb');

//City
updateFunc('update_city', 'newCity', 'city');

//Postal Code
updateFunc('update_postal_code', 'newPostalCode', 'postalCode');




?>
