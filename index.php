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
    <title>Home</title>

    <!--Styling-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>
<body>

    <!--Home Page landing images-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div id="HomelandingPageImgAutoplaying" class="carousel carousel-dark slide" data-bs-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/landing page bg image.jpg" class="d-block w-100" alt="landing page bg image 1">
                        </div>
                        <div class="carousel-item">
                            <img src="images/landing page bg image2.jpg" class="d-block w-100" alt="landing page bg image 2">
                        </div>
                        <div class="carousel-item">
                            <img src="images/landing page bg image3.jpg" class="d-block w-100" alt="landing page bg image 3">
                        </div>
                    </div>
                
                    <button class="carousel-control-prev" type="button" data-bs-target="#HomelandingPageImgAutoplaying" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#HomelandingPageImgAutoplaying" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                </div>
            </div>
        </div>
    </div>

    <!--Product highlights heading-->
    <div class="container mt-5">
        <div class="row text-center justify-content-center">
            <p class="mySpaces">Highlights</p>
            <hr class="border border-dark border-1 opacity-25 w-50" style="width:100px; margin: auto;">
        </div>
    </div>

    <!--Product highlights -->
    <div class="container">
        <div class="row mt-4 gx-5">
            <!--using function to display random items-->
            <?php getAllItems(); ?>
        </div>
    </div>

    <!--Services-->
    <div class="container">
        <div class="row mt-4 gx-5">
            <div class='col-sm-12 col-lg-4'>
                <div class='card border border-0' style='width: auto; height: auto;'>
                    <a href='products.php'>
                        <img src='web content/1.jpg' class='no-border rounded card-img-top' alt='img1'>
                    </a>
                    <div class='card-body'>
                        <p class='card-text fw-semibold navFont text-center'>Fashion Apparel<p>
                        <p class='card-text pFont text-center'>Browse our meticulously crafted designer clothing</p>
                    </div>
                </div>
            </div>
            <div class='col-sm-12 col-lg-4'>
                <div class='card border border-0' style='width: auto; height: auto;'>
                    <a href='contact.php'>
                        <img src='web content/3.jpg' class='no-border rounded card-img-top' alt='img1'>
                    </a>
                    <div class='card-body'>
                        <p class='card-text fw-semibold navFont text-center'>Creative Consultant<p>
                        <p class='card-text pFont text-center'>Have an oufit idea in mind? looking for state of the art designer services?</p>
                        <p class='card-text pFont text-center'>Get in touch now.</p>
                    </div>
                </div>
            </div>
            <div class='col-sm-12 col-lg-4'>
                <div class='card border border-0' style='width: auto; height: auto;'>
                    <a href='services.php'>
                        <img src='web content/2.jpg' class='no-border rounded card-img-top' alt='img1'>
                    </a>
                    <div class='card-body'>
                        <p class='card-text fw-semibold navFont text-center'>Pattern Design<p>
                        <p class='card-text pFont text-center'>Interested in developing the necessary skills needed to be a designer?</p>
                        <p class='card-text pFont text-center'>Sign up for our courses.</p>
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