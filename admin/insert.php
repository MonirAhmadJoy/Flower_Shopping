<?php
session_start();
require_once './dbconn.php';

if (!isset($_SESSION['aduser_login'])) {
  header('location:adminlogin.php');
}
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the required fields are present in the $_POST array
    if (isset($_POST["imageName"]) && isset($_POST["className"]) && isset($_POST["photoName"])) {
        // Retrieve the values from the $_POST array
        $imageName = $_POST["imageName"];
        $className = $_POST["className"];
        $photoName = $_POST["photoName"];

        // TODO: Process the image name and class name as needed
        // For example, you can store them in a database or perform other operations

        // Send a response back to the client
        // echo "Data received successfully";
    } else {
        // Required fields are missing
        echo "Required fields are missing";
    }
} else {
    // Invalid request method
    echo "Invalid request method";
}

if (isset($_POST['add-product'])) {
    $cat=$_POST['choose_cat'];
    $cat_info = mysqli_query($link, "SELECT * FROM `categories` WHERE `cat_title`='$cat';");
    $row = mysqli_fetch_assoc($cat_info);
    $cat_id=$row['cat_id'];
    // $brand_id = $_POST['choose_brand'];
    $product_title = $_POST['product_title'];
    $product_price = $_POST['product_price'];

    $photo_name = $_POST['photo'];
    // $photo = explode('.', $photo);
    // $photo_extension = end($photo);
    // $photo_name = $product_title . '.' . $photo_extension;
    $dc = $_POST['dc'];



    $query = "INSERT INTO `products`(`cat_id`, `product_title`, `product_price`, `product_image`,`description`) VALUES ('$cat_id','$product_title','$product_price','$photo_name','$dc')";
    $result = mysqli_query($link, $query);
    if ($result) {
        // move_uploaded_file($_FILES['photo']['tmp_name'], 'images/' . $photo_name);
        // $success = "Data inserted successfully";
        header('location:index.php?page=products');
    } 
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Online Shop</title>
    <style>
        .content {
            min-height: 410px;
        }

        .footer-area {
            padding: 25px;
            background: #3CA9E8;
            text-align: center;
            color: #fff;
            margin-top: 10px;
        }
    </style>
    <!-- Bootstrap -->
    <script src="https://kit.fontawesome.com/cc0fc94170.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/indexSt.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="styles/style1.css" rel="stylesheet">

    <!-- Pagination Table -->

    <link href="../css/dataTables.bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="../js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>


</head>

<body>
<!-- <div class="row">
    <?php if (isset($success)) {
        echo '<p class="alert alert-success">' . $success . '</p>';
    } ?>
    <?php if (isset($error)) {
        echo '<p class="alert alert-danger">' . $error . '</p>';
    } ?> -->
</div>
    <div class="row">
        <div class="col-sm-6 mx-auto">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="choose_cat">Product Category</label>
                    <input type="text" name="choose_cat" id="choose_cat" class="form-control" value="<?= $className ?>" readonly />
                </div>

                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="text" name="photo" id="photo" class="form-control" value="<?= $photoName ?>" readonly />
                </div>

                <div class="form-group">
                    <label for="product_title">Product Title</label>
                    <input type="text" name="product_title" placeholder="Product Name" id="product_title" class="form-control" required />
                </div>

                <div class="form-group">
                    <label for="product_price">Product Price</label>
                    <input type="number" name="product_price" placeholder="Product Price" id="product_price" class="form-control" required />
                </div>

                <div class="form-group">
                    <label for="dc">Description</label>
                    <input type="text" name="dc" placeholder="Product Description" id="dc" class="form-control" required />
                </div>

                <div class="form-group">
                    <input type="submit" name="add-product" value="Add Product" class="btn btn-primary pull-right" />
                </div>

            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>