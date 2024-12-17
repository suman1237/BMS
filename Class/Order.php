<?php

class Order
{
    public function getAllOrders()
    {
        require_once ('../config.php');
        $select = "SELECT * FROM bakery_orders order by orders_id desc";
        $query = mysqli_query($conn, $select);
        $res = mysqli_fetch_assoc($query);
        return $res;
    }
    public function insertOrder()
    {
        require_once ('../config.php');
        $insert_orders = "INSERT INTO bakery_orders (users_id, delivery_date, delivery_address, payment_method, total_amount) VALUES ('', '', '', '', '')";
        mysqli_query($conn, $insert_orders);
        $orders_id = mysqli_insert_id($conn);
    }
    public function insertOrderDetail()
    {
        require_once ('../config.php');
        $insert_orders_detail = "INSERT INTO bakery_orders_detail (orders_id, product_name, quantity) VALUES ('', '', '')";
        mysqli_query($conn, $insert_orders_detail);
    }
    public function stockAvailabe()
    {
        require_once ('../config.php');
        $select = "SELECT * FROM bakery_orders where quantity order by orders_id desc";
        $query = mysqli_query($conn, $select);
        $res = mysqli_fetch_assoc($query);
        return $res;
    }
}

?>