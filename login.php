<?php

    session_start();
    include("database.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!--Styling-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>
<body>

    <div class="container text-center">

        <!--Logo-->
        <div class="row justify-content-center">
            <div class="col-12">
                <a  href="index.php">
                    <img class="img-responsive w-25" src="images/cropped-AELAHN-COLLECTIVE-LOGO-.jpg" alt="logo">
                </a>
                <hr>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <p class="mySpaces">Login</p>
                <p class="pFont">Login with your Aelahn credentials</p>
            </div>
        </div>
        
        <!--Login form-->
        <div class="row justify-content-center">
            <div class="w-50 mx-auto p-3 mb-3">
                <form method="post">

                    <label for="email" class="form-label mt-4 formFont">Email address</label>
                    <input type="email" class="form-control border border-bottom border-0" name="email" id="email" placeholder="Enter here" required>

                    <label for="password" class="form-label mt-4 formFont">Password</label>
                    <input type="password" class="form-control border border-bottom border-0" name="password" id="password"  placeholder="Enter here" required>
                    <p class="my-2"><a href="forgot-password.php" class=" link-opacity-50-hover link-dark link-underline-opacity-50-hover">
                        Forgot Password?
                    </a></p>

                    <div class="d-grid gap-2 col-6 mx-auto mt-5">
                        <button class="btn btn-dark" type="submit" name="login">Login</button>
                    </div>

                </form>
            </div>
        </div>

        <!--Not a member-->
        <div class="row justify-content-center">
            <p>Not a member yet?
                <a href="register.php" class="link-opacity-50-hover link-dark link-underline-opacity-50-hover">
                    Sign up
                </a>
            </p>
        </div>

    </div>
    
</body>
</html>
<?php

//An array for catching errors
$errors = array();

if (isset($_POST['login'])){

    //collecting posted data
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Error catching
    if(count($errors) == 0) {

        //fetching email and password from database
        $select_query = "SELECT * FROM `customer` WHERE `email` = '$email'";
        $result = mysqli_execute_query($conn, $select_query);
    
        //checking If email exists
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            
            //Checking if password match 
            $password = password_verify($password, $row['password']);

            //If password is wrong 
            if (!$password) {
                echo '<script type=text/javascript> alert("Incorrect Password!") </script>';
            } 
            //if password is right
            else {
                //checking for admin
                if ($row['user_type'] == 'admin') {
                    $_SESSION['username'] = $row['email'];
                    header("Location: admin.php");
                }
                else {
                    $_SESSION['username'] = $row['email'];
                    header("Location: index.php");
                }
            }
        }
        else {
            //if email does not exist
            echo '<script type=text/javascript> alert("Incorrect Email!") </script>';
        }
    }
};

?>