<?php 
include 'db.php';
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $role = "user";

    $sql = "insert into users(name,email,password,phone,address,role) VALUES('$name','$email','$password','$phone','$address','$role')";
    $result = mysqli_query($conn,$sql);
    if(!$result){
        $error = "Registration Failed: {$conn->error}";
    }
    else{
        $success = "Registration Successful";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <title>Register</title>
</head>
<body>
    <a class="shoplink" href="index.php">Shop</a>
    <div class="register">
        <?php if(isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if(isset($success)): ?>
            <div class="success"><?php echo $success; ?></div>
        <?php endif; ?>
        <form action="register.php" method="post">
            <p class="name">Sign Up</p>
            <input type="text" name="name" placeholder="Enter your name here" required>
            <input type="email" name="email" placeholder="Enter your email here" required>
            <input type="password" name="password" placeholder="Enter your password here" required>
            <input type="text" name="phone" placeholder="Enter your phone here" required>
            <textarea name="address" placeholder="Enter your address here"></textarea>
            <input class="button" type="submit" name="submit" value="Sign up">
            <p>Already have an account?<a style="padding-left: 10px; font-size: 17px;" href="login.php">Login</a></p>
        </form>
    </div>
</body>
</html>