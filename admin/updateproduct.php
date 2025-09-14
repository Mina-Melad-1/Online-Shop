<?php 
session_start();
include '../db.php';
if(isset($_SESSION['user_id'])){
    $sql1 = "select * from categories";
    $result1 = mysqli_query($conn, $sql1);
    if(isset($_GET['product_id']))
    {
        $product_id = $_GET['product_id'];
        $sql2 = "select * from products where id = $product_id";
        $result2 = mysqli_query($conn, $sql2);
        $row = mysqli_fetch_assoc($result2);
    }
    if($_SESSION['user_role'] == 'admin') {
        if(isset($_POST['submit'])) {
            $product_id = $_GET['product_id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            $description = $_POST['description'];
            $sql3 = "UPDATE products SET name='$name', price=$price, stock=$stock, description='$description' WHERE id=$product_id";
            $result3 = mysqli_query($conn, $sql3);
            if($result3) {
                header("Location: displayproduct.php");
            }
            else{
                $error = "Error:  {$conn->error}";
            }
            $image = $_FILES['image']['name'];
            if($image)
            {
                $temp_location = $_FILES['image']['tmp_name'];
                $upload_locaton = "../image/";
                $sql4 = "UPDATE products SET name='$name', price=$price, stock=$stock, description='$description', image = '$image' WHERE id=$product_id";
                $result4 = mysqli_query($conn, $sql4);
                if($result4) {
                    move_uploaded_file($temp_location, $upload_locaton . $image);
                    $success = "Product added successfully.";
                    header("Location: displayproduct.php");
                }
                else{
                    $error = "Error:  {$conn->error}";
                }
            }
            $category_name = $_POST['category_name'];
            if($category_name)
            {
                $sql5 = "UPDATE products SET name='$name', price=$price, stock=$stock, description='$description', category_name = '$category_name' WHERE id=$product_id";
                $result5 = mysqli_query($conn, $sql5);
                if($result5) {
                    header("Location: displayproduct.php");
                }
                else{
                    $error = "Error:  {$conn->error}";
                }
            }
            $result = mysqli_query($conn, $sql);
            if(!$result) {
                $error = "Error:  {$conn->error}";
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
            <li><a href="displayproduct.php">View Order</a></li>
            <li><a href="../logout.php">Log out</a></li>
        </ul>
    </div>
    <div class="dashboard_main">
        <h1>Add Product</h1>
        <form action="updateproduct.php?product_id=<?php echo $product_id ?>" method="post" enctype="multipart/form-data">
            <?php if(isset($error)): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
            <?php if(isset($success)): ?>
                <div class="success"><?php echo $success; ?></div>
            <?php endif; ?>
            <br>
            <input type="text" name="name" value="<?php echo $row['name']; ?>">
            <input type="number" name="price" value="<?php echo $row['price']; ?>">
            <input type="number" name="stock" value="<?php echo $row['stock']; ?>">
            <img src="../image/<?php echo $row['image'];?>" alt="" width="100px">
            <input type="file" name="image">
            <textarea name="description"><?php echo $row['description']; ?></textarea>
            <h3>Category name is: <?php echo $row['category_name']; ?> </h3>
            <select name="category_name" required>
                <?php while($row = mysqli_fetch_assoc($result1) ){ ?>
                <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
                <?php } ?>
            </select>
            <input type="submit" name="submit" value="Update Product">
        </form>
    </div>
</body>
</html>