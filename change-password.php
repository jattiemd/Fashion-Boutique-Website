<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>
<body>

    <div class="container text-center">

        <!--Logo-->
        <div class="row justify-content-center">
            <div class="col-12">
                <img href="index.php" class="img-responsive w-25" src="images/cropped-AELAHN-COLLECTIVE-LOGO-.jpg" alt="logo">
                <hr>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <p class="mySpaces">Change Password</p>
            </div>
        </div>

        <!--email form-->
        <div class="row justify-content-center">
            <p class='pFont'>Enter your new Aelahn password</p>
            <div class="w-50 mx-auto p-3 mb-3">
                <!--Displaying new password input-->
                <form action="" method="post">
                    <label for="newPassword" class="form-label mt-5 formFont">Enter new password</label>
                    <input type="password" class="form-control border border-bottom border-0" name="newPassword" id="newPassword" placeholder="Enter here" required>
                    <label for="newPassword2" class="form-label mt-2 formFont">Confirm new password</label>
                    <input type="password" class="form-control border border-bottom border-0" name="newPassword2" id="newPassword2" placeholder="Enter here" required>
                    <button class="btn btn-dark d-grid gap-2 col-6 mx-auto mt-5" type="submit" name="save_new_password">Proceed</button>
                </form>
                <?php
                    //Changing password
                    include("database.php");
                    
                    if (isset($_POST['save_new_password'])) {

                        //Colleting input data
                        $email = $_GET['email'];
                        $new_password = $_POST['newPassword'];
                        $new_password2 = $_POST['newPassword2'];

                        //Verifying if passwords match
                        if ($new_password != $new_password2) {
                            echo "<p class='pFont mt-4'>Passwords do not match!</p>";
                        } 
                        else {
                            
                            // Password encryption
                            $new_password = password_hash($new_password, PASSWORD_DEFAULT);

                            $update_query=" UPDATE `customer` 
                                            SET `password` = '$new_password'
                                            WHERE `email` = '$email'";
                            $run_update_query = mysqli_execute_query($conn, $update_query);
                        
                            //If update = true echo success alert and refresh page
                            if (!$run_update_query) {
                                echo "<script> alert('Password change unsuccessful!') </script>";
                            }
                            else {
                                echo "<script> alert('Password change successful!') </script>";
                                echo "<script> window.open('login.php', '_self') </script>";
                            }
                        }

                    }
                ?>
            </div>
        </div>
        
    </div>
    
</body>
</html>