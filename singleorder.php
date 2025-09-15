<?php
session_start();
include 'db.php';
if(isset($_SESSION['user_id'])){
    if(isset($_GET['user_id']) && isset($_GET['product_id']) && isset($_GET['product_price'])){
        $user_id = $_GET['user_id'];
        $product_id = $_GET['product_id'];
        $total_amount = $_GET['product_price'];
        $sql = "insert into single_order (user_id, product_id, total_amount ) values ('$user_id', '$product_id', '$total_amount')";
        $result = mysqli_query($conn, $sql);
        if($result){
            $order_id = mysqli_insert_id($conn);
            $payment_method = 'cashon';
            $sql_payment = "insert into payments (order_id, user_id, total_amount, payment_method) values ('$order_id', '$user_id', '$total_amount','$payment_method')";
            $result_payment = mysqli_query($conn, $sql_payment);
            if(!$result_payment){
                echo "Payment Error: {$conn->error}";
                exit;
            }
            echo "Order placed successfully <a href='index.php'>Buy More</a>";
            $sql_update_stock = "update products set stock = stock - 1 where id = '$product_id'";
            $result_update_stock = mysqli_query($conn, $sql_update_stock);
            if(!$result_update_stock){
                echo "Stock Update Error: {$conn->error}";
            }
        }
        else {
            echo "Error: {$conn->error}";
        }   
    }
    else {
        header('location: index.php');
    }
}
?>