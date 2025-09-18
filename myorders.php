<?php 
session_start();
include 'db.php';
if(isset($_SESSION['user_id'])){
    $sql = "select * from payments where user_id = '{$_SESSION['user_id']}'";
    $result = mysqli_query($conn, $sql);
    if($_SESSION['user_role'] == 'user') {
        if(!$result) {
            $error = "Error:  {$conn->error}";
        } else {

        }
    }else{
        header("Location: admin/dashboard.php");
    }
}
else{
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/view_product.css">
    <title>Document</title>
</head>
<body>
     <div class="dashboard_sidebar">
        <ul>
            <li><a href="index.php">Shop</a></li>
            <li><a href="myorders.php">My Order</a></li>
            <li><a href="logout.php">Log out</a></li>
        </ul>
    </div>
    <table>
        <thead>
            <tr>
                <th>Order id</th>
                <th>User id</th>
                <th>Total Amount</th>
                <th>Payment Method</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)){

             ?>
             <tr>
                <td><?php echo $row['order_id'] ?> </td>
                <td><?php echo $row['user_id'] ?> </td>
                <td><?php echo $row['total_amount'] ?> </td>
                <td><?php echo $row['payment_method'] ?> </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
