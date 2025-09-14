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
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Sign Up</a></li>
                    <?php if(isset($_SESSION['user_id'])) { ?>
                    <li><a href="admin/dashboard.php">Dashboard</a></li>
                    <?php } ?>
                </ul>
            </nav>
       </header>
       <main class="main">
        <?php for($i=0; $i<15; $i++){ ?>
            <div class="product">
                <img src="productimg/shoe1.jpg" alt="productimg">
                <h2>product title</h2>
                <p>product description</p>
                <p>product quantity</p>
                <p class="productprice">product price</p>
                <a href="#">Buy Now</a>
            </div>
            <?php } ?>
       </main>
       <footer class="footer">
            <p>copyright@: webtech knowledge </p>
       </footer>
</body>
</html>