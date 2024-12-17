<?php
require_once ('config.php');
session_start();
if (isset($_SESSION['cart']) && $_SESSION['cart'] !== null) {
    if (isset($_SESSION['user_users_id']) && $_SESSION['user_users_username'] !== null) {
        $username = $_SESSION['user_users_username'];
        $users_id = $_SESSION['user_users_id'];
        
        $product_ids = $_SESSION['hidden_product_id'];
        $product_names = $_SESSION['hidden_product_name'];
        $prices = $_SESSION['hidden_product_price'];
        $quantities = $_SESSION['ordered_quantity'];
        $total = $_SESSION['hidden_product_total'];
        $total_amount = $_SESSION['hidden_total_amount'];
        $delivery_date = $_SESSION['delivery_date'];
        $delivery_address = $_SESSION['delivery_address'];
        $payment_method = $_SESSION['payment_method'];


        $insert_orders = "INSERT INTO bakery_orders (users_id, delivery_date, delivery_address, payment_method, total_amount) 
                              VALUES ('$users_id', '$delivery_date', '$delivery_address', '$payment_method', '$total_amount')";
        mysqli_query($conn, $insert_orders);
        $orders_id = mysqli_insert_id($conn);

        for ($i = 0; $i < count($product_ids); $i++) {
            $product_id = $product_ids[$i];
            $product_name = $product_names[$i];
            $ordered_quantity = $quantities[$i];

            // Insert order details
            $insert_orders_detail = "INSERT INTO bakery_orders_detail (orders_id, product_name, ordered_quantity) 
                                         VALUES ('$orders_id', '$product_name', '$ordered_quantity')";
            mysqli_query($conn, $insert_orders_detail);

            // Update product quantity
            $update_quantity = "UPDATE bakery_product 
                                    SET product_quantity = product_quantity - $ordered_quantity 
                                    WHERE product_id = '$product_id'";
            mysqli_query($conn, $update_quantity);
        }

        unset($_SESSION['cart']);

        unset($_SESSION['hidden_product_id']);
        unset($_SESSION['hidden_product_name']);
        unset($_SESSION['hidden_product_price']);
        unset($_SESSION['ordered_quantity']);
        unset($_SESSION['hidden_product_total']);
        unset($_SESSION['hidden_total_amount']);
        unset($_SESSION['delivery_date']);
        unset($_SESSION['delivery_address']);
        unset($_SESSION['payment_method']);

        header("Location: cart.php?order_success=3");
        
    } else {
        echo "<script>
        alert('Please login!!!');
        location.assign('login_users.php');
        </script>";
    }
} else {
    echo "<script>
    alert('Please select a product!!!');
    location.assign('cart.php');
    </script>";
}
?>