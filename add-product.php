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
    <title>Add Product</title>

    <!--Styling-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <!--External Validation file-->
    <script src="validation.js"></script>


</head>
<body>

    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col">
                <p class="mySpaces">Add a Product</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row text-center justify-content-center">

            <form method="post" enctype="multipart/form-data">
                <table class="table">
                    <thead>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody class='align-middle'>
                        <tr class="mb-2">
                            <td>
                                <label for="category" class="form-lable navFont">Category</label>
                                <select class="form-select border border-0" name="category" id="category" aria-label="Default select example" required>
                                    <option value="clothing" selected>Clothing</option>
                                    <option value="accessories">Accessories</option>
                                </select>
                            </td>
                            <td class='w-50'>
                                <label for="name" class="form-lable navFont">Product Name</label>
                                <input type="text" name="name" id="name" placeholder="Enter here" class="form-control border border-0" required>
                            </td>
                        </tr>
                        <tr class="mb-2">
                            <td>
                                <label for="price" class="form-lable navFont">Price</label>
                                <input type="text" name="price" id="price" placeholder="0.00" class="form-control border border-0" required>
                            </td>
                            <td>
                                <label for="qty" class="form-lable navFont">Quantity</label>
                                <input type="number" name="qty" id="qty" placeholder="Enter here" class="form-control border border-0" required>
                            </td>
                        </tr>
                        <tr class="mb-2">
                            <td>
                                <label for="img1" class="form-lable navFont">Image 1</label>
                                <input type="file" name="img1" id="img1" class="form-control border border-0" required>
                            </td>
                            <td>
                                <label for="description" class="form-lable navFont">Description</label>
                                <textarea name="description" id="description" placeholder="Item description" class="form-control border border-0" required></textarea>
                            </td>
                        </tr>
                        <tr class="mb-2">
                            <td>   
                                <label for="img2" class="form-lable navFont">Image 2</label><sup style='font-size:10px;'>Optional</sup>
                                <input type="file" name="img2" id="img2" class="form-control border border-0" >
                            </td>
                            <td>
                                <label for="img3" class="form-lable navFont">Image 3</label><sup style='font-size:10px;'>Optional</sup>
                                <input type="file" name="img3" id="img3" class="form-control border border-0" >
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-dark w-25 my-4" type="submit" name="add_product">Add product</button>
            </form>

        </div>
    </div>
    
</body>
</html>
<?php

    include("footer.html");

    //Adding product
    if (isset($_POST['add_product'])) {
        
        //Capturing input data
        $category = $_POST['category'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $description = $_POST['description'];
        
        //Capturing image
        $img1 = $_FILES['img1']['name'];
        $img2 = $_FILES['img2']['name'];
        $img3 = $_FILES['img3']['name'];

        //Capturing image temporary name
        $temp_img1 = $_FILES['img1']['temp_name'];
        $temp_img2 = $_FILES['img2']['temp_name'];
        $temp_img3 = $_FILES['img3']['temp_name'];

        //Storing uploaded images inside of a designated image folder for database
        move_uploaded_file($temp_img1, "/dbImages/$img1");
        move_uploaded_file($temp_img2, "/dbImages/$img2");
        move_uploaded_file($temp_img3, "/dbImages/$img3");

        //Inserting product
        $add_product_query="INSERT INTO `products` 
                            VALUES('', '$category', '$name', '$description', '$img1', '$img2', '$img3', '$price', '$qty', NOW())";
        $run_add_product = mysqli_execute_query($conn, $add_product_query);

        //Display error or success message
        if (!$run_add_product) {
            echo "<script> alert('Error! could not add product to the database.') </script>";
        }
        else {
            echo "<script> alert('Success! product added to the database.') </script>";
            echo "<script> window.open('admin.php', '_self') </script>";
        }
    }
?>
