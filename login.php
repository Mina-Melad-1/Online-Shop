<?php 
    include 'db.php';
    session_start();
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "select * from users where email='$email'";
        $result = mysqli_query($conn, $sql);
        if($result->num_rows > 0)
        {
            $row = mysqli_fetch_assoc($result);
            if($row['password'] == $password) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_role'] = $row['role'];
                if($_SESSION['user_role'] == 'admin') {
                    header("Location: admin/dashboard.php");
                } else {
                    echo "dashboard for user";
                }
            }
            else
            {
                $error = "Password is incorrect";
            }
        }
        else
        {
            $error = "Email is incorrect"; 
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>
<body>
    <div class="login">
        <?php if(isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if(isset($success)): ?>
            <div class="success"><?php echo $success; ?></div>
        <?php endif; ?>
        <h1>Login</h1>
        <form action="login.php" method="post">
            <input type="email" name="email" placeholder="Enter your email here" required>
            <input type="password" name="password" placeholder="Enter your password here" required>
            <input class="button" type="submit" name="submit" value="Login">
            <p>Don't have an account?<a href="register.php">Sign up</a></p>
        </form>
    </div>
</body>
</html>