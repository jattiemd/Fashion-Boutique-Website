<?php

    include("database.php");
    include("header.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>

    <!--Styling-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <!--External Validation file-->
    <script src="validation.js"></script>


</head>
<body>

    <div class="container text-center">

        <div class="row justify-content-center">
            <div class="col">
                <p class="mySpaces">Add a User</p>
                <hr class="border border-dark border-1 opacity-25 w-50" style="width:100px; margin: auto;">
            </div>
        </div>

        <!--Sign Up form-->
        <form method="post">
            <div class="row justify-content-center mt-4">
                <div class="col-sm-12 col-lg-6 mb-3">            
                    <label for="firstName" class="form-label mt-4 formFont">First Name</label>
                    <input type="text" name="firstName" id="firstName" class="form-control border border-bottom border-0" placeholder="Enter here" required>
                </div>                
                <div class="col-sm-12 col-lg-6 mb-3">            
                    <label for="lastName" class="form-label mt-4 formFont">Last Name</label>
                    <input type="text" name="lastName" id="lastName" class="form-control border border-bottom border-0" placeholder="Enter here" required>
                </div>                
            </div>

            <div class="row justify-content-center">
                <div class="col-sm-12 col-lg-6 mb-3">
                    <label for="email" class="form-label mt-4 formFont">Email address</label>
                    <input type="email" class="form-control border border-bottom border-0" name="email" id="email" placeholder="name@example.com" pattern="^[\w._-]+[+]?[\w._-]+@[\w.-]+\.[a-zA-Z]{2,6}" required>
                </div>
                <div class="col-sm-12 col-lg-6 mb-3">
                    <label for="password" class="form-label mt-4 formFont">Password</label>
                    <input type="password" name="password" id="password" class="form-control border border-bottom border-0" placeholder="Enter here" aria-labelledby="passwordHelpBlock" pattern="(?=.*[0-9])(?=.*[!@#$_%^&*])[a-zA-Z0-9!@#$_%^&*]{7,20}" required>
                    <div id="passwordHelpBlock" class="form-text">
                        Your password must be 8+ characters long, contain letters, atleast 1 number and 1 special character.
                    </div>
                </div>    
            </div>

            <div class="row justify-content-center">
                <div class="col-sm-12 col-lg-6 mb-3">
                    <label for="phoneNumber" class="form-label mt-4 formFont">Phone Number</label>
                    <input type="tel" class="form-control border border-bottom border-0" name="phoneNumber" id="phoneNumber" placeholder="1234567890" maxlength='10' pattern="(\d{10})" required>
                </div>
                <div class="col-sm-12 col-lg-6 mb-3">
                    <label for="streetAddress" class="form-label mt-4 formFont">Street Address</label>
                    <input type="text" class="form-control border border-bottom border-0" name="streetAddress" id="streetAddress" placeholder="123 Main street" required>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-12 col-lg-6 mb-3">
                    <label for="suburb" class="form-label mt-4 formFont">Suburb</label>
                    <input type="text" class="form-control border border-bottom border-0" placeholder="Enter here" name="suburb" id="suburb" required>
                </div>
                <div class="col-sm-12 col-lg-6 mb-3">
                    <label for="city" class="form-label mt-4 formFont">City</label>
                    <input type="text" class="form-control border border-bottom border-0" placeholder="Enter here" name="city" id="city" required>
                </div>
            </div>
            <div class="row justify-content-center">
                <label for="postalCode" class="form-label mt-4 formFont">Postal Code</label>
                <input type="number" class="form-control w-50 mx-auto border border-bottom border-0" name="postalCode" id="postalCode" placeholder="7000" maxlength='4' pattern="(\d{4})" required>
                <div id="postalCode" class="form-text">
                    Your postal code must only be 4 numbers.
                </div>
                <button class="btn btn-dark w-25 my-4" type="submit" name="submit">Add user</button>
            </div>

        </form>
        
    </div>

    
</body>
</html>
<?php

$errors = array();

if (isset($_POST['submit'])) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Form data to variables
        $firstName = strtolower($_POST['firstName']);
        $lastName = strtolower($_POST['lastName']);
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phoneNumber = $_POST['phoneNumber'];
        $streetAddress = strtolower($_POST['streetAddress']);
        $suburb = strtolower($_POST['suburb']);
        $city = strtolower($_POST['city']);
        $postalCode = $_POST['postalCode'];
        
        //Getting user's IP address 
        $get_ip_address = getIPAddress();
        
        //Insert query
        $insert_query = "SELECT * FROM `customer` WHERE `email`= '$email' LIMIT 1";
        $result = mysqli_query($conn, $insert_query);

        //Check if user already exists
        if(mysqli_num_rows($result) > 0) {
            echo '<script type=text/javascript> alert("That user already exists! Please login instead.") </script>';
            echo '<script>window.location.href="login.php";</script>';
            exit;
         }

        //if user does not exist
        if (count($errors) == 0) {
            // Password encryption
            $password = password_hash($password, PASSWORD_DEFAULT);

            // Insert query
            $insert = "INSERT INTO `customer` 
                        VALUES ('', '', '$get_ip_address', '$firstName', '$lastName', '$email', '$password', '$phoneNumber', '$streetAddress', '$suburb', '$city', '$postalCode')";
            mysqli_query($conn, $insert);

            //Confirm user registration 
            echo '<script type=text/javascript> alert("User Created!") </script>';
            echo '<script>window.location.href="admin.php";</script>';
            exit;
        }
    }
    
}

include("footer.html");
?>