<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>
<body>

    <div class="container text-center">

        <!--Logo-->
        <div class="row justify-content-center">
            <div class="col-12">
                <img href="home.php" class="img-responsive w-25" src="images/cropped-AELAHN-COLLECTIVE-LOGO-.jpg" alt="logo">
                <hr>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <p class="mySpaces">Forgot Password</p>
            </div>
        </div>

        <!--email form-->
        <div class="row justify-content-center">
            <p class='pFont'>Enter the email address that was used to register with Aelahn</p>
            <div class="w-50 mx-auto p-3 mb-3">
                <form action="" method="post">
                    <label for="email" class="form-label mt-4 formFont">Email address</label>
                    <input type="email" class="form-control border border-bottom border-0" name="email" id="email" placeholder="Enter here" required>
                    <button class="btn btn-dark d-grid gap-2 col-6 mx-auto mt-5" type="submit" name="password_reset_request">Verify Email</button>
                </form>
                <?php
                include("database.php");
                    //verifying email
                    if (isset($_POST['password_reset_request'])) {

                        //Colleting input data
                        $form_email = $_POST['email'];

                        //get email query
                        $get_email_query = "SELECT `email` FROM `customer` WHERE `email` = '$form_email'";
                        $get_email_result = mysqli_execute_query($conn, $get_email_query);

                        //if email exists
                        if (mysqli_num_rows($get_email_result) > 0) { 
                            echo "<script> window.open('change-password.php?email=$form_email', '_self')</script>";
                        } 
                        else {
                            echo "<p class='pFont mt-4'>Email does not exist</p>";
                        }
                    } 
                ?>
            </div>
        </div>

        <div class="row justify-content-center">
            <p>Remembered password?
                <a href="login.php" class="link-opacity-50-hover link-dark link-underline-opacity-50-hover">
                    Login
                </a>
            </p>
        </div>
        
    </div>
    
</body>
</html>
