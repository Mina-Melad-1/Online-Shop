<?php 
session_start();
include 'db.php';
$sql = "select * from products";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/master.css">
    <title>Document</title>
</head>
<body>
       <header class="header">
            <a href="index.php">shop</a>
            <a href="index.php"><img src="" alt=""></a>
            <nav>
                <ul>
                    <?php if(!isset($_SESSION['user_id'])){ ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Sign Up</a></li>
                    <?php } ?>
                    <?php if(isset($_SESSION['user_id'])) { ?>
                    <li><a href="admin/dashboard.php">Dashboard</a></li>
                    <?php } ?>
                </ul>
            </nav>
       </header>
       <main class="main">
        <?php while($row = mysqli_fetch_assoc($result)){ ?>
            <div class="product">
                <img src="image/<?php echo $row['image']; ?>" alt="productimg">
                <h2> <?php echo $row['name']; ?></h2>
                <p><?php echo $row['stock']; ?></p>
                <p class="productprice">$ <?php echo $row['price']; ?></p>
                <a href="#">Buy Now</a>
            </div>
            <?php } ?>
       </main>
       <footer class="footer">
            <p>copyright@: webtech knowledge </p>
       </footer>
</body>
</html>