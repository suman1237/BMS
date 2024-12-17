<?php
require_once('../config.php');
$orders_id = $_POST['orders_id'];
$product_name = $_POST['product_name'];
$quantity = $_POST['quantity'];
$hidden_id = $_POST['hidden_orders_detail'];
$update = "UPDATE bakery_orders_detail SET orders_id = '$orders_id', product_name = '$product_name', ordered_quantity = '$quantity' where orders_detail_id = $hidden_id";
mysqli_query($conn, $update);
header('Location: view_orders.php?edit_msg=2');
?>