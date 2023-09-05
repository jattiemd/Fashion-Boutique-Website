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
    <title>Admin</title>

    <!--Styling-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>
<body>

    <div class="container">
        <div class="row justify-content-center text-center">
            <p class='mySpaces'>Manage Website</p>
            <hr class='border border-dark border-1 opacity-25 w-50' style='width:100px; margin: auto;'>
        </div>
    </div>


    <div class="container mt-5">
        <div class="row justify-content-center text-center">
            <p class='navFont'>Aelahn database</p>
        </div>
    
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed linkFont" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Customers
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class='container-fluid'>
                            <div class='row text-center justify-content-center'>
                                <table class='table'>
                                    <thead>
                                        <th scope='col'>User ID</th>
                                        <th scope='col'>User Type</th>
                                        <th scope='col'>User IP</th>
                                        <th scope='col'>Name</th>
                                        <th scope='col'>Surname</th>
                                        <th scope='col'>Email</th>
                                        <th scope='col'>Password</th>
                                        <th scope='col'>Phone Number</th>
                                        <th scope='col'>Street Address</th>
                                        <th scope='col'>Suburb</th>
                                        <th scope='col'>City</th>
                                        <th scope='col'>PostalCode</th>
                                    </thead>
                    
                                    <?php 
                                        //Getting all customers
                                        $get_customers = "SELECT * FROM `customer`";
                                        $get_customers_result = mysqli_execute_query($conn, $get_customers);

                                        //displaying data
                                        if (!$get_customers_result) {
                                            echo "Error! Cannot display customer data";
                                        }
                                        else {
                                            while ($row = mysqli_fetch_assoc($get_customers_result)) {

                                                $user_id = $row['user_id'];
                                                $user_type = $row['user_type'];
                                                $user_ip = $row['ip_address'];
                                                $firstName = $row['firstName'];
                                                $lastName = $row['lastName'];
                                                $email = $row['email'];
                                                $password = $row['password'];
                                                $phoneNumber = $row['phoneNumber'];
                                                $streetAddress = $row['streetAddress'];
                                                $suburb = $row['suburb'];
                                                $city = $row['city'];
                                                $postalCode = $row['postalCode'];

                                                echo "  <tbody class='align-middle'>
                                                            <tr>
                                                                <td>$user_id</td>
                                                                <td>$user_type</td>
                                                                <td>$user_ip</th>
                                                                <td>$firstName</th>
                                                                <td>$lastName</td>
                                                                <td>$email</td>
                                                                <td>#Hashed</td>
                                                                <td>+27 $phoneNumber</td>
                                                                <td>$streetAddress</td>
                                                                <td>$suburb</td>
                                                                <td>$city</td>
                                                                <td>$postalCode</td>
                                                            </tr>
                                                        </tbody>";
                                                                
                                            }
                                        }
                                    ?>
                                </table>

                                <!--Customer Operations-->
                                <div class="container">
                                    <form method="post">
                                        <div class="row text-center my-3">

                                            <div class="col">
                                                <a class='btn btn-dark pFont w-50 mx-end' href='add-user.php' name='add_user'>Add user</a>
                                            </div>

                                            <div class="col">
                                                <button type="button" class="btn btn-dark pFont w-50 mx-start" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Remove User
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <p class="modal-title navFont fs-5" id="exampleModalLabel">Remove User</p>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label class="form-label">
                                                                    Enter the ID value of the user that you would like to delete. <br>
                                                                    <strong>WARNING! <br></strong> This cannot be undone. Double check the user ID before deleting.
                                                                </label>
                                                                <input type="number" name="delete_by_id" class="form-control mx-auto border border-bottom border-0 w-50 my-2" placeholder="Enter here">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-dark pFont" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" name="remove_user" class="btn btn-outline-dark pFont">Confirm</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <button type="button" class="btn btn-dark pFont w-50 mx-start" data-bs-toggle="modal" data-bs-target="#edituser">
                                                    Update user
                                                </button>
                                                <div class="modal fade" id="edituser" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <p class="modal-title navFont fs-5" id="exampleModalLabel2">Update Menu</p>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label class="form-label" for="table_name">Update table</label>
                                                                <select name="table_name" id="table_name" class="form-control">
                                                                    <option value="customer" selected>Customer</option>
                                                                </select>
                                                                <label class="form-label mt-3" for="column_name">Select the column that you would like to update</label>
                                                                <select name="column_name" id="column_name" class="form-control">
                                                                    <option value="user_type" selected>User Type</option>
                                                                    <option value="firstName">Name</option>
                                                                    <option value="lastName">Surname</option>
                                                                    <option value="email">Email</option>
                                                                    <option value="password">Password</option>
                                                                    <option value="phoneNumber">Phone Number</option>
                                                                    <option value="streetAddress">Street Address</option>
                                                                    <option value="suburb">Suburb</option>
                                                                    <option value="city">City</option>
                                                                    <option value="postalCode">Postal Code</option>
                                                                </select>
                                                                <label for="u_user_id" class="form-label mt-3">Enter the User ID that this update should be applied to</label>
                                                                <input type="number" name="u_user_id" id="u_user_id" class="form-control" placeholder="Enter here">

                                                                <label for="u_new_data" class="form-label mt-3">Enter the data that you would like to insert</label>
                                                                <input type="text" name="u_new_data" id="u_new_data" class="form-control" placeholder="Enter here">
                                                            </div> 
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-dark pFont" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" name="update_user" class="btn btn-outline-dark pFont">Update</button>
                                                                <?php 
                                                                    //Updating customer table 
                                                                    updateTable('update_user', 'table_name', 'column_name', 'u_user_id', 'u_new_data');
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed linkFont" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Products
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class='container-fluid'>
                            <div class='row text-center justify-content-center'>
                                <table class='table'>
                                    <thead>
                                        <th scope='col'>Product ID</th>
                                        <th scope='col'>Category</th>
                                        <th scope='col'>Item Name</th>
                                        <th scope='col'>Description</th>
                                        <th scope='col'>Img1</th>
                                        <th scope='col'>Img2</th>
                                        <th scope='col'>Img3</th>
                                        <th scope='col'>Price</th>
                                        <th scope='col'>Qty</th>
                                        <th scope='col'>Date Added</th>

                                    </thead>
                    
                                    <?php 
                                        //Getting all customers
                                        $get_products = "SELECT * FROM `products` ORDER BY `category`";
                                        $get_products_result = mysqli_execute_query($conn, $get_products);

                                        //Displaying data
                                        if (!$get_products_result) {
                                            echo "Error! Cannot display products data";
                                        }
                                        else {
                                            while ($row = mysqli_fetch_assoc($get_products_result)) {

                                                $item_id = $row['item_id'];
                                                $category = $row['category'];
                                                $name = $row['name'];
                                                $description = $row['description'];
                                                $img1 = $row['img1'];
                                                $img2 = $row['img2'];
                                                $img3 = $row['img3'];
                                                $price = $row['price'];
                                                $qty = $row['quantity'];
                                                $date_added = $row['date_added'];

                                                echo "  <tbody class='align-middle'>
                                                            <tr>
                                                                <td>$item_id</td>
                                                                <td>$category</td>
                                                                <td>$name</th>
                                                                <td>$description</th>
                                                                <td>$img1</td>
                                                                <td>$img2</td>
                                                                <td>$img3</td>
                                                                <td>". number_format($price, 2) ."</td>
                                                                <td>$qty</td>
                                                                <td>$date_added</td>
                                                            </tr>
                                                        </tbody>";
                                                                
                                            }
                                        }
                                    ?>
                                </table>
                                
                                <!--Product operations-->
                                <div class="container">
                                    <form method="post">
                                        <div class="row text-center my-3">

                                            <div class="col">
                                                <a class='btn btn-dark pFont w-50 mx-end' href='add-product.php' name='add_item'>Add product</a>
                                            </div>

                                            <div class="col">
                                                <button type="button" class="btn btn-dark pFont w-50 mx-start" data-bs-toggle="modal" data-bs-target="#removeProduct">
                                                    Remove product
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="removeProduct" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <p class="modal-title navFont fs-5" id="exampleModalLabel1">Remove Product</p>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label class="form-label">
                                                                    Enter the ID value of the Product that you would like to delete. <br>
                                                                    <strong>WARNING! <br></strong> This cannot be undone. Double check the Product ID before deleting.
                                                                </label>
                                                                <input type="number" name="delete_product_by_id" class="form-control mx-auto border border-bottom border-0 w-50 my-2" placeholder="Enter here">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-dark pFont" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" name="remove_product" class="btn btn-outline-dark pFont">Confirm</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <button type="button" class="btn btn-dark pFont w-50 mx-start" data-bs-toggle="modal" data-bs-target="#editproduct">
                                                    Update product
                                                </button>
                                                <div class="modal fade" id="editproduct" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <p class="modal-title navFont fs-5" id="exampleModalLabel3">Update Menu</p>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label class="form-label" for="table_name">Update table</label>
                                                                <select name="table_name" id="table_name" class="form-control">
                                                                    <option value="products" selected>Products</option>
                                                                </select>
                                                                <label class="form-label mt-3" for="column_name">Select the column that you would like to update</label>
                                                                <select name="column_name" id="column_name" class="form-control">
                                                                    <option value="category">Category</option>
                                                                    <option value="name" selected>Item Name</option>
                                                                    <option value="description">Description</option>
                                                                    <option value="img1">Image 1</option>
                                                                    <option value="img2">Image 2</option>
                                                                    <option value="img3">Image 3</option>
                                                                    <option value="price">Price</option>
                                                                    <option value="quantity">Qty</option>
                                                                </select>
                                                                <label for="p_item_id" class="form-label mt-3">Enter the Item ID that this update should be applied to</label>
                                                                <input type="number" name="p_item_id" id="p_item_id" class="form-control" placeholder="Enter here">

                                                                <label for="p_new_data" class="form-label mt-3">Enter the data that you would like to insert</label>
                                                                <input type="text" name="p_new_data" id="p_new_data" class="form-control" placeholder="Enter here">
                                                            </div> 
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-dark pFont" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" name="update_item" class="btn btn-outline-dark pFont">Update</button>
                                                                <?php
                                                                    //Updating products
                                                                    updateTable('update_item', 'table_name', 'column_name', 'p_item_id', 'p_new_data');
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed linkFont" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Orders
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class='container-fluid'>
                            <div class='row text-center justify-content-center'>
                                <table class='table'>
                                    <thead>
                                        <th scope='col'>Order ID</th>
                                        <th scope='col'>User ID</th>
                                        <th scope='col'>Total Products</th>
                                        <th scope='col'>Amount</th>
                                        <th scope='col'>Destination</th>
                                        <th scope='col'>Order Date</th>
                                    </thead>
                                    <?php
                                    //PHP code for orders table
                                    //get orders table query
                                    $get_orders = "SELECT * FROM `user_orders`";
                                    $get_orders_result = mysqli_execute_query($conn, $get_orders);

                                    //Displaying orders
                                    if (!$get_orders_result) {
                                        echo "Error! Cannot display orders data";
                                    } 
                                    else {
                                        while ($orders_row = mysqli_fetch_assoc($get_orders_result)) {

                                            $order_id = $orders_row['order_id'];
                                            $user_id = $orders_row['user_id'];
                                            $total_products = $orders_row['total_products'];
                                            $amount_due = $orders_row['amount_due'];
                                            $deliver_to = $orders_row['deliver_to'];
                                            $order_date = $orders_row['order_date'];

                                            echo "  <tbody class='align-middle'>
                                                        <tr>
                                                            <td>$order_id</td>
                                                            <td>$user_id</td>
                                                            <td>$total_products</td>
                                                            <td>". number_format($amount_due, 2) ."</td>
                                                            <td>$deliver_to</td>
                                                            <td>$order_date</td>
                                                        </tr>
                                                    </tbody>";
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed linkFont" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                        Card Details
                    </button>
                </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class='container-fluid'>
                            <div class='row text-center justify-content-center'>
                                <table class='table'>
                                    <thead>
                                        <th scope='col'>ID</th>
                                        <th scope='col'>User ID</th>
                                        <th scope='col'>Payment Method</th>
                                        <th scope='col'>Card Name</th>
                                        <th scope='col'>Card Number</th>
                                        <th scope='col'>Exp Month</th>
                                        <th scope='col'>Exp Year</th>
                                    </thead>
                                    <?php
                                    //PHP code for card details table
                                    //Get card details table query
                                    $get_card_table_query = "SELECT * FROM `user_card_details`";
                                    $get_card_table_result = mysqli_execute_query($conn, $get_card_table_query);

                                    //Displaing card details table
                                    if (!$get_card_table_result) {
                                        echo "Error! Cannot display User card details data";
                                    } 
                                    else {
                                        while ($card_row = mysqli_fetch_assoc($get_card_table_result)) {

                                            $id = $card_row['id'];
                                            $user_id = $card_row['user_id'];
                                            $payment_method = $card_row['payment_method'];
                                            $card_name = $card_row['card_name'];
                                            $card_number = $card_row['card_number'];
                                            $exp_month = $card_row['exp_month'];
                                            $exp_year = $card_row['exp_year'];
                                            
                                            echo "  <tbody class='align-middle'>
                                                        <tr>
                                                            <td>$id</td>
                                                            <td>$user_id</td>
                                                            <td>$payment_method</td>
                                                            <td>$card_name</td>
                                                            <td>$card_number</td>
                                                            <td>$exp_month</td>
                                                            <td>$exp_year</td>
                                                        </tr>
                                                    </tbody>";
                                        }
                                    }
                                    
                                    ?>
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

    //Deleting user
    if (isset($_POST['remove_user'])) {
        
        //Capturing input data
        $user_id = $_POST['delete_by_id'];

        //if user id is empty
        if (empty($user_id)) {
            echo "<script> alert('User Removal Unsuccessful! No User ID given.') </script>";
        }
        else {
            //Delete Query
            $delete_query = "DELETE FROM `customer` WHERE `user_id` = '$user_id'";
            $run_delete_query = mysqli_execute_query($conn, $delete_query);

            if (!$run_delete_query) {
                echo "<script> alert('User Removal Unsuccessful!') </script>";
            }
            else {
                echo "<script> alert('User Removed Successfully!') </script>";
                echo "<script> window.open('admin.php', '_self') </script>";
            }
        }
    }



    //Deleting product
    if (isset($_POST['remove_product'])) {
        
        //Capturing input data
        $item_id = $_POST['delete_product_by_id'];

        //if product id is empty
        if (empty($item_id)) {
            echo "<script> alert('Product Removal Unsuccessful! No Product ID given.') </script>";
        }
        else {
            //Delete Query
            $product_delete_query = "DELETE FROM `products` WHERE `item_id` = '$item_id'";
            $run_product_delete_query = mysqli_execute_query($conn, $product_delete_query);

            if (!$run_product_delete_query) {
                echo "<script> alert('Product Removal Unsuccessful!') </script>";
            }
            else {
                echo "<script> alert('Product Removed Successfully!') </script>";
                echo "<script> window.open('admin.php', '_self') </script>";
            }
        }
    }
?>
