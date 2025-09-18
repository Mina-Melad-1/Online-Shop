<?php 
session_start();
include '../db.php';
if(isset($_SESSION['user_id'])){
    $sql1 = "select * from categories";
    $result1 = mysqli_query($conn, $sql1);
    if($_SESSION['user_role'] == 'admin') {
        if(isset($_POST['submit'])) {
            // Get form data
            $name = $_POST['name'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            $description = $_POST['description'];
            $category_name = $_POST['category_name'];
            $image = $_FILES['image']['name'];
            $temp_location = $_FILES['image']['tmp_name'];
            $upload_locaton = "../image/";

            $sql = "INSERT INTO products (name, price, stock, description,category_name,image) VALUES ('$name', '$price', '$stock', '$description', '$category_name', '$image')";

            $result = mysqli_query($conn, $sql);
            if(!$result) {
                $error = "Error:  {$conn->error}";
            } else {
                move_uploaded_file($temp_location, $upload_locaton . $image);
                $success = "Product added successfully.";
            }
        }
    } else {
        echo "Access denied. You are not an admin.";
    }
}
else{
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Document</title>
</head>
<body>
     <div class="dashboard_sidebar">
        <ul>
            <li><a href="addproduct.php">Add Product</a></li>
            <li><a href="displayproduct.php">View Prducts</a></li>
            <li><a href="vieworder.php">View Orders</a></li>
            <li><a href="../logout.php">Log out</a></li>
        </ul>
    </div>
    <div class="dashboard_main">
        <h1>Add Product</h1>
        <form action="addproduct.php" method="post" enctype="multipart/form-data">
            <?php if(isset($error)): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
            <?php if(isset($success)): ?>
                <div class="success"><?php echo $success; ?></div>
            <?php endif; ?>
            <br>
            <input type="text" name="name" placeholder="Product Name" required>
            <input type="number" name="price" placeholder="Product Price" required>
            <input type="number" name="stock" placeholder="Product stock" required>
            <input type="file" name="image" required>
            <textarea name="description" placeholder="Product Description" required></textarea>
            <select name="category_name" required>
                <?php while($row = mysqli_fetch_assoc($result1) ){ ?>
                <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
                <?php } ?>
            </select>
            <input type="submit" name="submit" value="Add Product">
        </form>
    </div>
</body>
</html>