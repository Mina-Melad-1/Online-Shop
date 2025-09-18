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
    <title>Document</title>
</head>
<style>
    *{
    margin: 0;
    padding: 0;
    overflow-x: hidden;
}
.header{
    position: fixed;
    top: 0;
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    padding: 30px;
    background-color: gray;

}
.header ul li{
    list-style: none;
}
.header a{
    text-decoration: none;
    color: white;
}
.header li{
    display: inline-block;
    margin-right: 45px;
}
.footer{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: row;
    background-color: gray;
    position: fixed;
    bottom: 0;
    width: 100%;
    padding: 10px;
}
.footer p{
    text-align: center;
}
.main {
    margin-top: 100px;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    margin-bottom: 20px;
}

.product {
    margin: 8px;
    border: 2px solid burlywood;
    max-width: 300px;
    padding: 30px;
    text-align: center;
    height: 400px; 
    display: flex;
    flex-direction: column;
    justify-content: space-between; 
}

.product img {
    width: 100%; 
    height: 200px; 
    object-fit: cover;
}

.product a {
    display: block;
    text-decoration: none;
    background-color: rgb(66, 232, 66);
    color: black;
    margin-top: 10px;
    padding: 10px;
    width: 100%; 
}

.productprice {
    font-weight: bold;
    color: rgb(44, 156, 44);
    font-size: 20px;
}
</style>
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
                <?php if($row['stock'] <= 0) continue; ?>
                <img src="image/<?php echo $row['image']; ?>" alt="productimg">
                <h2> <?php echo $row['name']; ?></h2>
                <p><?php echo $row['stock']; ?></p>
                <p class="productprice">$ <?php echo $row['price']; ?></p>

                <?php if(isset($_SESSION['user_id'])){ ?>
                <a href="singleorder.php?user_id=<?php echo $_SESSION['user_id']; ?>&product_id=<?php echo $row['id']; ?>&product_price=<?php echo $row['price']; ?>">Buy Now</a>
                <?php } ?>

                <?php if(!isset($_SESSION['user_id'])){ ?>
                <a href="login.php">Buy Now</a>
                <?php } ?>

            </div>
            <?php } ?>
       </main>
       <footer class="footer">
            <p>copyright@: webtech knowledge </p>
       </footer>
</body>
</html>