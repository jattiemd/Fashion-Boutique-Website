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
    <title>Products</title>

    <!--Styling-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    
</head>
<body>

    <!--Clothing heading-->
    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="col-12">
                <p class="mySpaces">Clothing</p>
                <hr class="border border-dark border-1 opacity-25 w-50" style="width:100px; margin: auto;">
            </div>
        </div>
    </div>

    <!--Clothing tiles-->
    <div class="container">
        <div class="row mt-4 gx-5">
            <!--using function to display clothing items-->
            <?php getClothingItems(); ?>
        </div>
    </div>

    <!--Accessories heading-->
    <div class="container mt-5">
        <div class="row text-center justify-content-center">
            <div class="col-12">
            <p class="mySpaces">Accessories</p>
                <hr class="border border-dark border-1 opacity-25 w-50" style="width:100px; margin: auto;">
            </div>
        </div>
    </div>

    <!--Accessories Tiles-->
    <div class="container">
        <div class="row mt-4 gx-5">
            <!--using function to display accessories items-->
            <?php getAccessoriesItems(); ?>     
        </div>
    </div>
    
</body>
</html>
<?php

    include("footer.html");

?>