<?php

/**
 *This file contains all the functions used within this website 
 */

include("database.php");



//This function for customer account. 
//Updates a customers details 
//it takes three arguments 
//button name and input name from form 
//and column name from table. 
function updateFunc($button_name, $input_name, $column_name) {
    global $conn;
    if (isset($_POST["$button_name"])) {
    
        $new_name_variable = $_POST["$input_name"];
    
        //Update query
        $update_query=" UPDATE `customer` 
                        SET `$column_name` = '$new_name_variable'
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
}



//Function that gets all items
function getAllItems() {
    global $conn;

    //fetching data from table
    $select_query = "SELECT * FROM `products` ORDER BY rand() LIMIT 0,3";
    $result = mysqli_query($conn, $select_query);

    //Accessing table rows and displaying the data dynamically
    while ($row = mysqli_fetch_assoc($result)) {
        
        //Variables
        $item_id = $row['item_id'];
        $name = $row['name'];
        $img = $row['img1'];
        $price = $row['price'];
        
        //Displaying clothing on products page
        echo"   <div class='col-sm-12 col-lg-4'>
                    <div class='card border border-0' style='width: auto; height: auto;'>
                        <a href='view_product.php?item_id=$item_id'>
                            <img src='dbimages/$img' class='border border-dark-subtle rounded card-img-top' width='400' height='540' alt='$img'>
                        </a>
                        <div class='card-body'>
                            <p class='card-text fw-semibold'>$name<p>
                            <p class='card-text fw-normal'>R". number_format($price, 2) ."</p>
                            <div class='dropdown justify-content-end text-end mb-4'>
                                <a class='btn btn-dark pFont' href='view_product.php?item_id=$item_id'>View</a>
                            </div>
                        </div>
                    </div>
                </div>";
    }    
}; 



//function that gets clothing items from database
function getClothingItems() {
    global $conn;

    //fetching data from table
    $select_query = "SELECT * FROM `products` WHERE `category` = 'clothing' LIMIT 0,9";
    $result = mysqli_query($conn, $select_query);

    //Accessing table rows and displaying the data dynamically
    while ($row = mysqli_fetch_assoc($result)) {
        
        //Variables
        $item_id = $row['item_id'];
        $name = $row['name'];
        $img = $row['img1'];
        $price = $row['price'];

        //Displaying data
        echo"   <div class='col-sm-12 col-lg-4'>
                    <div class='card border border-0' style='width: auto; height: auto;'>
                        <a href='view_product.php?item_id=$item_id'>
                            <img src='dbImages/$img' class='border border-dark-subtle rounded card-img-top' width='400' height='540' alt'$img'>
                        </a>
                        <div class='card-body'>
                            <p class='card-text fw-semibold'>$name<p>
                            <p class='card-text fw-normal'>R". number_format($price, 2) ."</p>
                            <div class='justify-content-end text-end mb-4'>
                                <a class='btn btn-dark pFont' href='view_product.php?item_id=$item_id'>View</a>
                                <a class='btn btn-dark pFont' href='products.php?add_to_cart=$item_id&price=$price'>Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>";
    }
};



//Function that gets accessory items from database
function getAccessoriesItems() {
    global $conn;

    //fetching data from table
    $select_query = "SELECT * FROM `products` WHERE `category` = 'accessories' LIMIT 0,9";
    $result = mysqli_query($conn, $select_query);

    //Accessing table rows and displaying the data dynamically
    while ($row = mysqli_fetch_assoc($result)) {
        
        //Variables
        $item_id = $row['item_id'];
        $name = $row['name'];
        $img = $row['img1'];
        $price = $row['price'];

        echo"   <div class='col-sm-12 col-lg-4'>
                    <div class='card border border-0' style='width: auto; height: auto;'>
                        <a href='view_product.php?item_id=$item_id'>
                            <img src='dbImages/$img' class='border border-dark-subtle rounded card-img-top' width='400' height='540' alt'$img'>
                        </a>
                        <div class='card-body'>
                            <p class='card-text fw-semibold'>$name<p>
                            <p class='card-text fw-normal'>R". number_format($price, 2) ."</p>
                            <div class='dropdown justify-content-end text-end mb-4'>
                                <a class='btn btn-dark pFont' href='view_product.php?item_id=$item_id'>View</a>
                                <a class='btn btn-dark pFont' href='products.php?add_to_cart=$item_id&price=$price'>Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>";
    }
};



//function that gets a single item from database
function getItem() {
    global $conn;

    //Checking for the item that was selected
    if (isset($_GET['item_id'])) {
        
        //Storing item_id in variable
        $item_id = $_GET['item_id'];

        //running select query for that specific item
        $select_query = "SELECT * FROM `products` WHERE `item_id` = $item_id";
        $result = mysqli_query($conn, $select_query);
        
        //Accessing table rows and displaying the data dynamically
        while ($row = mysqli_fetch_assoc($result)) {
            
            //variables
            $item_id = $row['item_id'];
            $name = $row['name'];
            $description = $row['description'];
            $img = $row['img1'];
            $price = $row['price'];

            //Displaying item
            echo "  <!--Item image-->
                    <div class='col-sm-12 col-lg-6 px-5'>
                        <div class='container'>
                            <img class='card-img-top border border-dark-subtle rounded mt-1' src='dbImages/$img' width='500' height='650' alt='$name'>
                        </div>
                    </div>
                
                    <!--Item details-->
                    <div class='col-sm-12 col-lg-6'>
                        <div class='row text-center justify-content-center'>
                            <p class='formFont'>$name</p>
                            <hr class='border border-dark border-1 opacity-25 w-25' style='width:100px; margin: auto;'>
                        </div>
                        <!--Description-->
                        <div class='row my-5'>
                            <p class='navFont fw-semibold text-center'>Description</p>
                            <p class='text-start text-center pFont'>$description</p>
                        </div>
                        <!--Sizes-->
                        <div class='row my-5'>
                            <p class='navFont fw-semibold text-center'>Sizes</p>
                            <p class='pFont text-center'>Select a size</p>
                            <div class='col-sm-12 col-lg-6 d-grid gap-2 mx-auto my-1'>
                                <input type='radio' class='btn-check' name='options' id='option1' autocomplete='off' checked>
                                <label class='btn btn-outline-dark pFont' for='option1'>Small</label>
                            </div>
                            <div class='col-sm-12 col-lg-6 d-grid gap-2 mx-auto my-1'>
                                <input type='radio' class='btn-check' name='options' id='option2' autocomplete='off' >
                                <label class='btn btn-outline-dark pFont' for='option2'>Medium</label>
                            </div>
                            <div class='col-sm-12 col-lg-6 d-grid gap-2 mx-auto my-1'>
                                <input type='radio' class='btn-check' name='options' id='option3' autocomplete='off'>
                                <label class='btn btn-outline-dark pFont' for='option3'>Large</label>
                            </div>
                            <div class='col-sm-12 col-lg-6 d-grid gap-2 mx-auto my-1'>
                                <input type='radio' class='btn-check' name='options' id='option4' autocomplete='off'>
                                <label class='btn btn-outline-dark pFont' for='option4'>Extra Large</label>
                            </div>
                        </div>
                        <!--Add to cart-->
                        <div class='row'>
                            <div class='col-sm-12 col-lg-6 mt-5 justify-content-end text-end'>
                                <p class='formFont'>R". number_format($price, 2) ."</p>
                            </div>
                            <div class='col-sm-12 col-lg-6 justify-content-start text-start'>
                                <div class='d-grid gap-2 col-6 mt-5'>
                                <a class='btn btn-outline-dark pFont' href='products.php?add_to_cart=$item_id&price=$price'>Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>";
        }
    }
}



//Function that gets visitor ip address
function getIPAddress() { 
     
    //whether ip is from the share internet  
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
        $ip = $_SERVER['HTTP_CLIENT_IP'];  
    }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
    //whether ip is from the remote address  
    else{  
        $ip = $_SERVER['REMOTE_ADDR'];  
    }  

    return $ip;  
    /**code to display ip. for testing purposes
    * $ip = getIPAddress();
    * echo 'User Real IP Address - '.$ip;
    */
}  



//Function that adds items to cart
//and checks for items that are already inside of the cart
function cart() {
    global $conn;

    //Checking request for item that was added to cart
    if (isset($_GET['add_to_cart'])) {

        //Getting user ip address
        $get_ip_address = getIPAddress();

        //Storing selected item_id and item price in variable 
        $item_id = $_GET['add_to_cart'];
        $price = $_GET['price'];

        //Query combination to check if item exists 
        $select_query ="SELECT * FROM `cart_details` 
                        WHERE `item_id` = '$item_id'
                        AND `ip_address` = '$get_ip_address'";
        $result = mysqli_execute_query($conn, $select_query);
        $number_of_rows = mysqli_num_rows($result);

        //Checking for query combination
        //if item is already in cart
        //then display "already in cart" message
        if ($number_of_rows > 0) {
            echo "<script> alert('This item is already in your cart! You will be able to adjust the quantity inside of the cart.') </script>";
            echo "<script> window.open('products.php', '_self') </script>";
        }
        //if item is not in cart
        //then add item to cart
        else {
            $insert_query ="INSERT INTO `cart_details`(item_id, price, ip_address, quantity)
                            VALUES('$item_id', '$price', '$get_ip_address', '1')";
            $result = mysqli_execute_query($conn, $insert_query);
            echo "<script> alert('Item added to cart!') </script>";
            echo "<script> window.open('products.php', '_self') </script>";
        }
    }
}



//Function that dynamically gets number of items in cart
function cartItemCounter() {
    global $conn;

    //Checking if add_to_cart variable is active
    //and display the number of items in cart
    if (isset($_GET['add_to_cart'])) {

        //Getting user's IP address
        $get_ip_address = getIPAddress();
        
        //Query to check the number of items(rows in table) assigned to user's IP address
        $select_query ="SELECT * FROM `cart_details` 
                        WHERE `ip_address` = '$get_ip_address'";
        $result = mysqli_execute_query($conn, $select_query);
        $items_in_cart = mysqli_num_rows($result);        
    }
    //Even if add_to_cart variable is not active
    //we still need to display the number of items in cart
    //hence the repetition of code
    else {
        //Getting user's IP address
        $get_ip_address = getIPAddress();

        //Query to check the number of items(rows in table) assigned to user's IP address
        $select_query ="SELECT * FROM `cart_details` 
                        WHERE `ip_address` = '$get_ip_address'";
        $result = mysqli_execute_query($conn, $select_query);
        $items_in_cart = mysqli_num_rows($result);        
    }

    echo $items_in_cart;
}



//Function that sums items inside of cart
function cartTotal() {
    global $conn;
    $total_price = 0;

    //Getting user IP address
    $get_ip_address = getIPAddress();
    $select_query ="SELECT * FROM `cart_details` WHERE `ip_address` = '$get_ip_address'";
    $result = mysqli_execute_query($conn, $select_query);

    //Getting all item details that are assigned to IP address (items that are currently in the user's cart)
    while ($row = mysqli_fetch_assoc($result)) {
        $item_id = $row['item_id'];
        $get_item_query = "SELECT * FROM `products` WHERE `item_id` = '$item_id'";
        $items = mysqli_execute_query($conn, $get_item_query);

        //Creating an array and summing the price of items in user's cart
        while ($row_items = mysqli_fetch_assoc($items)) {
            
            //Adding item price to array
            $item_price_array = array($row_items['price']);

            //Summing items
            $item_values = array_sum($item_price_array);
            $total_price += $item_values;
        }
    }

    echo "R$total_price";
}



//Function that updates a table from the admin Manage Website Page
function updateTable($button_name, $table_name, $column_name, $_id, $new_data) {
    global $conn;

    if (isset($_POST["$button_name"])) {
        
        //Capturing data in variables
        $table_name_var = $_POST["$table_name"];
        $column_name_var = $_POST["$column_name"];
        $_id_var = $_POST["$_id"];
        $new_data_var = $_POST["$new_data"];
        
        
        //Checking for empty input fields
        //only user_id and new_data will be checked
        //since the other two columns are preselected
        if (empty($_id_var) or empty($new_data_var)) {
            echo "<script> alert('Error! No New Data or ID was given ') </script>";
        }
        else {
            //Updating table
            if ($table_name_var == 'customer') {
                $update_table_query="UPDATE `$table_name_var` 
                                SET `$column_name_var` = '$new_data_var'
                                WHERE `user_id` = '$_id_var'";
            }
            else {
                $update_table_query="UPDATE `$table_name_var` 
                                SET `$column_name_var` = '$new_data_var'
                                WHERE `item_id` = '$_id_var'";
            }
            
            //Running update query
            $run_update_query = mysqli_execute_query($conn, $update_table_query);

            //Verifying update success
            if (!$run_update_query) {
                echo "<script> alert('Update unsuccessful!') </script";
            } 
            else {
                echo "<script> alert('Column successfully updated!') </script>";
                echo "<script> window.open('admin.php', '_self') </script>";
            }
            
        }
                                                                          
    }
}
?> 