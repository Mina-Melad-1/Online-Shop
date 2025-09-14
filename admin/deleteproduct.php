<?php 
include "../db.php";
session_start();
if(isset($_SESSION['user_id']))
{
    if($_SESSION['user_role'] == 'admin') {
        if(isset($_GET['product_id'])) {
            $product_id = $_GET['product_id'];
            $sql = "DELETE FROM products WHERE id = $product_id";
            if(mysqli_query($conn, $sql)){
                header("Location: displayproduct.php");
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        } else {
            echo "No product ID specified.";
        }
    } else {
        echo "Access denied. You are not an admin.";
    }
}
else
{
    header("Location: ../index.php");
}
?>