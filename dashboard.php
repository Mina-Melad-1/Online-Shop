<?php 
session_start();
if(isset($_SESSION['user_id'])){
    if($_SESSION['user_role'] == 'user') {
        
    } else {
        header("Location: admin/dashboard.php");
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
    <link rel="stylesheet" href="css/admin.css">
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
    <div class="dashboard_main">
        <h1>Welcome to User Dashboard</h1>
    </div>
</body>
</html>