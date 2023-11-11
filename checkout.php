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
    <title>Checkout</title>

    <!--Styling-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>
<body>

    <div class="container">
        <div class="row justify-content-center text-center">
            <p class='mySpaces'>Checkout</p>
        </div>
    </div>

    <!--Order Summary-->
    <div class="container w-75 shadow bg-body-tertiary rounded">
        <div class="row">
            <p class="navFont my-3 fw-normal mx-auto badge bg-dark text-wrap" style="width: 20rem;">Order Summary</p>
            <table class="table text-center mt-3">
                <thead class='navFont' style='text-size: 16px;'>
                    <th scope='col'>Items</th>
                    <th scope='col'>Quantity</th>
                    <th scope='col' class='text-start'>Price</th>
                </thead>
                <tbody>
                    <?php
                    //Displaying order data
                    //Getting users ip
                    $get_user_ip = getIPAddress();

                    //initializing total
                    $total= 0;
                    $delivery_fee = 75;

                    //Query to get user's cart details
                    $get_cart_details_query="SELECT * FROM `cart_details` WHERE `ip_address` = '$get_user_ip'";
                    $get_cart_details_result = mysqli_execute_query($conn, $get_cart_details_query);
                    
                    //Fetching item_id from cart
                    while ($cart_row = mysqli_fetch_assoc($get_cart_details_result)) {
                        $cart_item_id = $cart_row['item_id'];
                        $cart_item_price = $cart_row['price'];
                        $cart_item_qty = $cart_row['quantity'];

                        //Getting total price
                        $subtotal = $cart_item_price * $cart_item_qty;
                        $total = $delivery_fee + $subtotal;

                        //Query to get products using item_id
                        $get_items_query = "SELECT * FROM `products` 
                                            WHERE `item_id` = '$cart_item_id'";
                        $get_items_result = mysqli_execute_query($conn, $get_items_query);

                        //Fetching data to be displayed
                        while ($item_row = mysqli_fetch_assoc($get_items_result)) {
                            $item_name = $item_row['name'];
                            $item_price = $item_row['price'];?>

                            <!--Displaying data-->
                            <tr class='pFont my-3'>
                                <td><?php echo $item_name ?></td>
                                <td class='fw-bold'><?php echo $cart_item_qty ?></td>
                                <td class='text-start fw-bold'><?php echo number_format($item_price, 2) ?></td>
                            </tr>
                    <?php            
                    }}
                    ?>      <tr class='pFont mb-3'>
                                <td colspan='2' class='text-end fw-bold'>Delivery fee:</td>
                                <td class='text-start fw-bold'><?php echo number_format($delivery_fee, 2) ?></td>
                            </tr>
                            <tr class='pFont mb-3'>
                                <td colspan='2' class='text-end fw-bold'>Total:</td>
                                <td class='text-start fw-bold'>R<?php echo number_format($total, 2) ?></td>
                            </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!--Shipment Details-->
    <form action="" method="post">
    <div class="container w-50 shadow bg-body-tertiary rounded text-center mt-5">

        <div class="row">
            <p class="navFont my-3 fw-normal mx-auto badge bg-dark text-wrap" style="width: 20rem;">Shipment Details</p>
            <p class="pFont">Order will be shipped to</p>
        </div>

        <?php
        //Getting user's IP address
        $get_user_ip = getIPAddress();
        

        //Query to get user's cart details
        $get_cart_details_query="SELECT * FROM `cart_details` WHERE `ip_address` = '$get_user_ip'";
        $get_cart_details_result = mysqli_execute_query($conn, $get_cart_details_query);

        //Fetching user ip address from cart
        $cart_row = mysqli_fetch_assoc($get_cart_details_result);
        
        //Getting user details via IP address
        $user_cart_ip = $cart_row['ip_address'];
        $user_cart_quantity = $cart_row['quantity'];

        //Query to get user details using ip_address
        $get_user_details_query = "SELECT * FROM `customer` WHERE `email` = '{$_SESSION['username']}'";
        $get_user_details_result = mysqli_execute_query($conn, $get_user_details_query);

        //Fetching data to be displayed
        $user_row = mysqli_fetch_assoc($get_user_details_result);

        //User column variables
        $user_id = $user_row['user_id'];
        $name = $user_row['firstName'];
        $surname = $user_row['lastName'];
        $streetAddress = $user_row['streetAddress'];
        $suburb = $user_row['suburb'];
        $city = $user_row['city'];
        $postalCode = $user_row['postalCode'];?>

        <div class='row my-3'>
            <div class='col-sm-12 col-lg-6'>
                <label for='name' class='form-label formFont'>Name</label>
                <input type='text' id='name' name='name' class='form-control w-100 mx-auto border border-bottom border-0' value='<?php echo $name ?>' disabled>
            </div>
            <div class='col-sm-12 col-lg-6'>
                <label for='surname' class='form-label formFont'>Surname</label>
                <input type='text' id='surname' name='surname' class='form-control w-100 mx-auto border border-bottom border-0' value='<?php echo $surname ?>' disabled>
            </div>
        </div>
        <div class='row my-3'>
            <div class='col-sm-12 col-lg-6'>
                <label for='streetAddress' class='form-label formFont'>Street Address</label>
                <input type='text' id='streetAddress' name='streetAddress' class='form-control w-100 mx-auto border border-bottom border-0' value='<?php echo $streetAddress ?>'>
            </div>
            <div class='col-sm-12 col-lg-6'>
                <label for='suburb' class='form-label formFont'>Suburb</label>
                <input type='text' id='suburb' name='suburb' class='form-control w-100 mx-auto border border-bottom border-0' value='<?php echo $suburb ?>'>
            </div>
        </div>
        <div class='row mt-3'>
            <div class='col-sm-12 col-lg-6'>
                <label for='city' class='form-label formFont'>City</label>
                <input type='text' name='city' class='form-control ww-100 mx-auto border border-bottom border-0 mb-3' value='<?php echo $city ?>'>
            </div>
            <div class='col-sm-12 col-lg-6'>
                <label for='postalCode' class='form-label formFont'>Postal Code</label>
                <input type='tel' id='postalCode' name='postalCode' class='form-control w-100 mx-auto border border-bottom border-0 mb-3' maxlength="4" value='<?php echo $postalCode ?>'>
            </div>
        </div>

    </div>

    <!--Payment information-->
    <div class="container w-50 shadow bg-body-tertiary rounded text-center mt-5">

        <div class="row my-3">
            <p class="navFont my-3 fw-normal mx-auto badge bg-dark text-wrap" style="width: 20rem;">Payment Information</p>
        </div>
        <div class='row my-3'>
            <div class='col-sm-12 col-lg-6'>
                <label for='paymentMethod' class='form-label formFont'>Payment Method</label>
                <select id='paymentMethod' name='paymentMethod' class="form-select w-100 mx-auto border border-bottom border-0" aria-label="Default select example" required>
                    <option >Choose...</option>
                    <option value="mastercard">Mastercard</option>
                    <option value="visa">Visa</option>
                </select>
            </div>
            <div class='col-sm-12 col-lg-6'>
                <label for='cardName' class='form-label formFont'>Name on Card</label>
                <input type='text' id='cardName' name='cardName' class='form-control w-100 mx-auto border border-bottom border-0' placeholder='Full Name' required>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-sm-12 col-lg-6">
                <label for='cardNumber' class='form-label formFont'>Card Number</label>
                <input type='tel' id='cardNumber' name='cardNumber' class='form-control w-100 mx-auto border border-bottom border-0' maxlength="19" placeholder="xxxx xxxx xxxx xxxx" required>
                <div id="cardNumber" class="form-text">
                    Please include a space after every 4 digits
                </div>
            </div>
            <div class="col-sm-12 col-lg-6">
                <label for='cvv' class='form-label formFont'>CVV</label>
                <input type='tel' id='cvv' name='cvv' class='form-control w-100 mx-auto border border-bottom border-0' maxlength="3" placeholder='xxx' required>
                <div id="cvv" class="form-text">
                    3 digit number on the back of your card
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-sm-12 col-lg-6">
                <label for='expMonth' class='form-label formFont'>Exp Month</label>
                <input type='tel' id='expMonth' name='expMonth' class='form-control w-100 mx-auto border border-bottom border-0 mb-3' maxlength="2" placeholder='mm' required>
            </div>
            <div class="col-sm-12 col-lg-6">
                <label for='expYear' class='form-label formFont'>Exp Year</label>
                <input type='tel' id='expYear' name='expYear' class='form-control w-100 mx-auto border border-bottom border-0 mb-3' maxlength="2" placeholder='yy' required>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <button type="submit" name="process_order" class="btn btn-dark pFont d-grid gap-2 col-3 mx-auto my-5" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                Order now
            </button>
        </div>
    </div>
    
</form>
    
</body>
</html>

<?php

//Processing order
if (isset($_POST['process_order'])) {

    $total_items = 0;

    //getting form input data
    $form_street_address = $_POST['streetAddress'];
    $form_suburb = $_POST['suburb'];
    $form_city = $_POST['city'];
    $form_postal = $_POST['postalCode'];

    //Combining delivery details
    $delivery_array = ["$form_street_address", "$form_suburb", "$form_city", "$form_postal"];
    $delivery_details = implode(", ", $delivery_array);
    
    //inserting into orders table
    //getting user ID
    $get_user = "SELECT * FROM `customer` WHERE `email` = '{$_SESSION['username']}'";
    $get_user_result = mysqli_execute_query($conn, $get_user);

    $row = mysqli_fetch_assoc($get_user_result);

    $user_id = $row['user_id'];

    //Getting total items and total price
    //from cart_details table
    $get_cart_details_query="SELECT * FROM `cart_details` WHERE `ip_address` = '$get_user_ip'";
    $get_cart_details_result = mysqli_execute_query($conn, $get_cart_details_query);

    //Fetching item_id from cart
    while ($cart_row = mysqli_fetch_assoc($get_cart_details_result)) {
        global $c_item_id;
        $c_item_id = $cart_row['item_id'];
        $cart_item_price = $cart_row['price'];
        $cart_item_qty = $cart_row['quantity'];

        //Getting total items
        $total_items += $cart_item_qty;
    }

    //Inserting into customer orders for customers to view
    //Getting item name
    $item_name_query = "SELECT `name` FROM `products` WHERE `item_id` = '$c_item_id'";
    $item_name_result = mysqli_execute_query($conn, $item_name_query);

    //Creating array to store item names
    $item_names_array = [];

    //Adding name of items to array
    while ($item_name_row = mysqli_fetch_assoc($item_name_result)) {

        array_push($item_names_array, $item_name_row['name']);
    }

    //putting item names together
    $item_names = implode(", ", $item_names_array);

    //Inserting customer order
    $customer_insert_query = "INSERT INTO `customer_orders` VALUES('', '{$_SESSION['username']}', '$item_names', '$total_items', '$total', '$delivery_details', NOW())";
    $customer_insert_result = mysqli_execute_query($conn, $customer_insert_query);

    //Insert into orders query
    $orders_insert_query = "INSERT INTO `user_orders` VALUES('', '$user_id', '$total_items', '$total', '$delivery_details',  NOW())";
    $orders_insert_result = mysqli_execute_query($conn, $orders_insert_query);

    //Inserting card details
    //Getting form input data
    $payment_method = $_POST['paymentMethod'];
    $card_name = $_POST['cardName'];
    $card_number = $_POST['cardNumber'];
    $exp_month = $_POST['expMonth'];
    $exp_year = $_POST['expYear'];

    //Insert into card details query
    $card_insert_query="INSERT INTO `user_card_details` VALUES('', '$user_id', '$payment_method', '$card_name', '$card_number', '$exp_month', '$exp_year')";
    $card_insert_result = mysqli_execute_query($conn, $card_insert_query);

    //Order insert check
    if ($orders_insert_result && $card_insert_result) {
        echo "<script> alert('Your order has been processed ') </script>";

        //Clear cart
        $clear_cart_query = "DELETE FROM `cart_details` WHERE `ip_address` = '$get_user_ip'";
        mysqli_execute_query($conn, $clear_cart_query);

        //Return to home page
        echo "<script> window.open('index.php', '_self') </script>";
    } 
    else {
        echo "<script> alert('Error! Cannot process order.') </script>";
    }
}
?>