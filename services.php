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
    <title>Services</title>

    <!--Styling-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>
<body>

    <!--Services Introduction-->
    <div class="container">
        <div class="row text-center justify-content-center">

            <div class="col">
                <p class="mySpaces">Fashion Education</p>
                <hr class="border border-dark border-1 opacity-25 w-50" style="width:100px; margin: auto;">
                <p class="pFont my-5" style="font-size: 13px">
                    At Aelahn Collective we believe that knowledge is power and we are happy to share our knowledge and 
                    experience with those wanting to either <br> learn a new skill or start their fashion journey with us.
                </p>
                <img src="images/Screenshot 2023-06-02 175048.png" class="d-block w-100 border rounded">
                <p class="pFont my-5" style="font-size: 13px">
                You can choose from Weekday or Weekend Classes. You will start with the basic level and progress to the 
                advanced level. <br>If you have previous experience let us know and we can advise on which level to register for.<br>
                Classe attendance groups are kept small to provide special attention to students.
                </p>
            </div>

        </div>
    </div>

    <div class="container">
        
        <div class="row text-center justify-content-center mt-5">
            <p class="mySpaces">Learn Sewing</p>
            <p class="border-bottom  border-dark-subtle w-50"></p>
        </div>

        <div class="row text-center justify-content-center mt-3 mb-5">
            
            <!--Service 1-->
            <div class="col-sm-12 col-lg-6 border-end border-dark-subtle">
                <div class="card border border-0" style="width: auto;">
                    <div class="card-body">
                        <h5 class="card-title mySpaces">Basic Level</h5>
                        <p class="card-text pFont mt-4" style="font-size: 13px;">You will start you off with the fundamentals of sewing and familiarizing you with how to use a sewing machine and best practice principles.</p>
                        <h6 class="card-subtitle my-2 text-body-secondary">Course Cost: R3000 (Booking Deposit:R1500 + Balance R1500)</h6>
                        <a href="contact.php" class="card-link mt-4 btn btn-dark pFont">Enroll</a>
                    </div>
                </div>
            </div>

            <!--Service 2-->
            <div class="col-sm-12 col-lg-6 border-start border-dark-subtle">
                <div class="card border border-0" style="width: auto;">
                        <div class="card-body">
                            <h5 class="card-title mySpaces">Advanced Level</h5>
                            <p class="card-text pFont mt-4" style="font-size: 13px;">After completing the basic level you can move on to learning the more advanced skills of sewing.</p>
                            <h6 class="card-subtitle my-2 text-body-secondary">Course Cost: R3000 (Booking Deposit:R1500 + Balance R1500)</h6>
                            <a href="contact.php" class="card-link mt-4 btn btn-dark pFont">Enroll</a>
                        </div>
                    </div>
                </div>                
            </div>

        </div>
    </div>

    <div class="container">
        
        <div class="row text-center justify-content-center mt-5">
            <p class="mySpaces">Learn Pattern Making</p>
            <p class="border-bottom border-dark-subtle w-50"></p>
        </div>

        <div class="row text-center justify-content-center mt-3 mb-5">

            <!--Service 3-->
            <div class="col-sm-12 col-lg-6 border-end border-dark-subtle">
                <div class="card border border-0" style="width: auto;">
                    <div class="card-body">
                        <h5 class="card-title mySpaces">Basic Level</h5>
                        <p class="card-text pFont mt-4" style="font-size: 13px;">You will start with learning the fundamentals of basic pattern making and drafting of patterns and best practice principles.</p>
                        <h6 class="card-subtitle my-2 text-body-secondary">Course Cost: R3000 (Booking Deposit:R1500 + Balance R1500)</h6>
                        <a href="contact.php" class="card-link mt-4 btn btn-dark pFont">Enroll</a>
                    </div>
                </div>
            </div>
            <!--Service 4-->
            <div class="col-sm-12 col-lg-6 border-start border-dark-subtle">
                <div class="card border border-0" style="width: auto;">
                        <div class="card-body">
                            <h5 class="card-title mySpaces">Advanced Level</h5>
                            <p class="card-text pFont mt-4" style="font-size: 13px;">After completing the basic level you can move on to learning the more advanced pattern drafting techniques.</p>
                            <h6 class="card-subtitle my-2 text-body-secondary">Course Cost: R3000 (Booking Deposit:R1500 + Balance R1500)</h6>
                            <a href="contact.php" class="card-link mt-4 btn btn-dark pFont">Enroll</a>
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