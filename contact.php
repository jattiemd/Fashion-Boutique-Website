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
    <title>Contact</title>

    <!--Styling-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>
<body>

    <div class="container">
        <div class="row justify-content-center text-center">
        <p class='mySpaces'>Contact us</p>
        <hr class='border border-dark border-1 opacity-25 w-50' style='width:100px; margin: auto;'>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center text-center my-5">
            <div class="col-sm-12 col-lg-6 mt">
                <img src="images/contact3.jpg" width="500" height="650" class="border rounded" alt="">
            </div>
            <div class="col-sm-12 col-lg-6 text-start">
                <p class="formFont">The Studio</p>
                <p class="linkFont mt-3"">Schotsche Kloof, Cape Town, Western Cape, 8001 ZA</p>
                <p class="linkFont mt-5"">PHONE:</p>
                <p class="linkFont">+27 79 355 7699</p>
                <p class="linkFont mt-5">E-MAIL:</p>
                <p class=""><a href="http://gmail.com" class="link-opacity-50-hover link-dark link-underline-opacity-50-hover">hello@aelahn.co.za</a></p>
                <p class="formFont mt-5">Studio Hours</p>
                <p class="linkFont mt-3">Mon – Fri: 09:00 – 16:00</p>
                <p class="linkFont mt-5">VISITS BY APPOINTMENT ONLY</p>
                <p class="pFont mt-5">PLEASE NOTE OUR PHYSICAL STORE IS UNDER CONSTRUCTION AND CLOSED UNTIL FURTHER NOTICE.</p>
            </div>
        </div>
    </div>

</body>
</html>

<?php

    include("footer.html");
    
?>