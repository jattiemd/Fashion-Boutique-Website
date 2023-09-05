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
    <title>Cart</title>

    <!--Styling-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>
<body>

    <div class="container">

        <div class='row text-center justify-content-center'>
            <p class='mySpaces'>Shopping Cart</p>
            <hr class='border border-dark border-1 opacity-25 w-50' style='width:100px; margin: auto;'>
        </div>

        <!--Items table-->
        <div class='row text-center justify-content-center'>
            <form action="" method="post">
                <table class='table mt-5'>

                        <?php 
                            $total_price = 0;

                            //Getting user IP address
                            $get_ip_address = getIPAddress();
                            
                            //Fetching user cart details
                            $select_query ="SELECT * FROM `cart_details` WHERE `ip_address` = '$get_ip_address'";
                            $result = mysqli_execute_query($conn, $select_query);

                            //Counting number of rows inside of user's cart
                            $result_count = mysqli_num_rows($result);

                            //Only display cart data if cart has rows(items) in
                            if ($result_count > 0) {

                                echo "  <thead>
                                            <tr>
                                                <th scope='col' class='linkFont'>Product</th>
                                                <th scope='col' class='linkFont'>Price</th>
                                                <th scope='col' class='linkFont'>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>";
                                //displaying price of added items
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $item_id = $row['item_id'];
                                    $qty = $row['quantity'];
                                    $i_price =$row['price'];

                                    //Summing items added to cart with default quantity 1 
                                    $total_price += $i_price;
                                            
                                    //Getting all item details that are assigned to IP address (items that are currently in the user's cart)
                                    $get_item_query = "SELECT * FROM `products` WHERE `item_id` = '$item_id'";
                                    $items = mysqli_execute_query($conn, $get_item_query);
                                    
                                    //summing items
                                    while ($row_items = mysqli_fetch_assoc($items)) {
                                        $name = $row_items['name'];
                                        $img = $row_items['img1'];
                                        $price = $row_items['price'];       
                            ?>
                            <!--While loop continues-->

                            <tr class='align-middle'>

                                <!--Item-->
                                <td class='pFont'>
                                    <img <?php echo "src='dbImages/$img'"; ?> class='rounded' width='120px' height='150px' <?php echo "alt='$img'" ?>>
                                    <p><?php echo $name ?></p>
                                </td>

                                <!--Price-->
                                <td class='pFont'>
                                    <?php
                                        echo number_format($price, 2);
                                    ?>
                                </td>

                                <!--Quantity-->
                                <td class='pFont'>
                                    <input type='number' name='qty' min="1" class='form-input border border-bottom border-0 mx-auto w-50 text-center' value='<?php echo $qty ?>'>
                                </td>
                                
                                <!--php code that updates quantity upon click-->
                                <?php
                                    //Getting user IP addess
                                    $get_ip_address = getIPAddress();
                                    
                                    //If update_cart is clicked
                                    if (isset($_POST['update_cart'])) {

                                        //Setting total price = 0 for new equation 
                                        $total_price = 0;
                                        
                                        //getting input data
                                        $quantity = $_POST['qty'];
                                        
                                        //Update cart details table query
                                        $update_query ="UPDATE `cart_details` 
                                                        SET `quantity` = '$quantity'
                                                        WHERE `ip_address` = '$get_ip_address'
                                                        AND `item_id` = $item_id";
                                        mysqli_query($conn, $update_query);
                                        
                                        //Updating total price
                                        $get_cart_details_query="SELECT * FROM `cart_details` WHERE `ip_address` = '$get_ip_address'";
                                        $get_cart_details_result = mysqli_execute_query($conn, $get_cart_details_query);
                                        
                                        //Fetching item_id from cart
                                        while ($cart_row = mysqli_fetch_assoc($get_cart_details_result)) {
                                            $cart_item_id = $cart_row['item_id'];
                                            $cart_item_price = $cart_row['price'];
                                            $cart_item_qty = $cart_row['quantity'];
                    
                                            //Getting total price with updated quantity
                                            $subtotal = $cart_item_price * $cart_item_qty;
                                            $total_price += $subtotal;                    
                                        }
                                    }
                                ?>
                            </tr>
                        <!--End of if statement and While loops-->
                        <!--Beginning of else statement-->
                        <?php }} ?>
                    </tbody>
                </table>
                <div class="row mb-2">
                    <input type='submit' class='btn btn-dark pFont w-25 mx-auto' value='Update' name='update_cart'>
                </div>
                <div class="row mb-5">
                    <input type='submit' class='btn btn-dark pFont w-25 mx-auto' value='Remove <?php $item_id?>' name='remove_from_cart'>
                </div>
                <?php
                //Checking for click on remove cart button
                if (isset($_POST['remove_from_cart'])) {
                    
                    $delete_query = "DELETE FROM `cart_details` WHERE `item_id` = '$item_id'";
        
                    //Execute query
                    $run_delete_query = mysqli_execute_query($conn, $delete_query);
        
                    if ($run_delete_query) {
                        echo "<script> window.open('cart.php', '_self') </script>";
                    }
                }
                ?>
                <?php
                    }
                    else {
                        echo "<p class='formFont mt-5'>Cart is empty</p>";
                        echo "<p class='pFont mt-3'>Add items to your cart and come back to checkout</p>";
                    } 
                ?>

            </div>

            <!--Shopping total-->
            <div class='row text-center justify-content-center my-4'>
                
                <!--Only display checkout button if cart has rows(items) in-->
                <?php
                //Getting user IP address
                $get_ip_address = getIPAddress();
                            
                //Fetching user cart details
                $select_query ="SELECT * FROM `cart_details` WHERE `ip_address` = '$get_ip_address'";
                $result = mysqli_execute_query($conn, $select_query);

                //Counting number of rows inside of user's cart
                $result_count = mysqli_num_rows($result);

                //Only display cart button if cart has rows(items) in
                if ($result_count > 0) {

                    echo "  <div class='col'>
                                <p class='navFont'>
                                    <!--Displaying total-->
                                    Total: R". number_format($total_price, 2) ."
                                </p>
                            </div>

                            <!--Checkout or continue shopping button-->
                            <div class='row text-center justify-content-center'>
                                <div class='col'>
                                    <a class='btn btn-dark pFont' href='products.php'>Continue Shopping</a>
                                    <a class='btn btn-dark pFont' href='verify-checkout.php'>Checkout</a>
                                </div>
                            </div>";
                }
                else {
                    echo "  <!--Only display continue shopping button-->
                            <div class='row text-center justify-content-center'>
                                <div class='col'>
                                    <a class='btn btn-dark pFont' href='products.php'>Continue Shopping</a>
                                </div>
                            </div>";
                }
                ?>
            </div>

            </form>
        <?php
            
        ?>

    </div>
    
</body>
</html>
<?php
//Function that removes item from the cart
function removeCartItem() {
    global $conn;
    
    //Checking for click on remove cart button
    if (isset($_POST['remove_from_cart'])) {
        
        foreach ($_POST['removeitem'] as $remove_id) {
            echo $remove_id;
            $delete_query = "DELETE FROM `cart_details` WHERE `item_id` = '$remove_id'";

            //Execute query
            $run_delete_query = mysqli_execute_query($conn, $delete_query);

            if ($run_delete_query) {
                echo "<script> window.open('cart.php', '_self') </script>";
                }
                
            }
        }
    }
?>