<?php 
session_start();
include '../db.php';
if(isset($_SESSION['user_id'])){
    $sql = "select * from products";
    $result = mysqli_query($conn, $sql);
    if($_SESSION['user_role'] == 'admin') {
        if(!$result) {
            $error = "Error:  {$conn->error}";
        } else {

        }
    }else{
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
    <link rel="stylesheet" href="../css/view_product.css">
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
    <table>
        <thead>
            <tr>
                <th>Product Title</th>
                <th>Product Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Image</th>
                <th>Category Name</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)){

             ?>
             <tr>
                <td><?php echo $row['name'] ?> </td>
                <td><?php echo $row['description'] ?> </td>
                <td><?php echo $row['price'] ?> </td>
                <td><?php echo $row['stock'] ?> </td>
                <td><img src="../image/<?php echo $row['image'] ?>" alt="" width="100px"></td>
                <td><?php echo $row['category_name'] ?> </td>
                <td><a class="update" href="#">Update</a></td>
                <td><a class="delete" href="#">Delete</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
