<?php

class OrderDetail
{
    public function getAllOrderDetail()
    {
        require_once ('../config.php');
        $select = "SELECT * FROM bakery_orders_detail order by orders_detail_id desc";
        $query = mysqli_query($conn, $select);
        $res = mysqli_fetch_assoc($query);
        return $res;
    }
    public function insertOrderDetail()
    {
        require_once ('../config.php');
        $insert_orders_detail = "INSERT INTO bakery_orders_detail (orders_id, product_name, ordered_quantity) VALUES ('', '', '')";
        mysqli_query($conn, $insert_orders_detail);
    }

}

?>