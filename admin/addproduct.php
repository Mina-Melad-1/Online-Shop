<?php 
session_start();
if(isset($_SESSION['user_id'])){
    if($_SESSION['user_role'] == 'admin') {
        
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
            <li><a href="">View Order</a></li>
            <li><a href="../logout.php">Log out</a></li>
        </ul>
    </div>
    <div class="dashboard_main">
        <h1>Add Product</h1>
        <form action="addproduct.php" method="post" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Product Name" required>
            <input type="number" name="price" placeholder="Product Price" required>
            <input type="number" name="stock" placeholder="Product stock" required>
            <input type="file" name="image" required>
            <textarea name="description" placeholder="Product Description" required></textarea>
            <select name="" required>
                <option value="category_id">category_id</option>
            </select>
            <select name="" required>
                <option value="category_name">category_name</option>
            </select>
            <input type="submit" name="submit" value="Add Product">
        </form>
    </div>
</body>
</html>