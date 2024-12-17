<?php

class Product
{
    public function getProductById($id)
    {
        require_once ('../config.php');
        $product_id = $_GET['product_id'];
        $select = "SELECT * FROM bakery_product where product_id = $product_id";
        $query = mysqli_query($conn, $select);
        $res = mysqli_fetch_assoc($query);
        return $res;

    }
    public function getProducts()
    {
        require_once ('../config.php');
        $select = "SELECT bakery_product.*, bakery_category.category_name FROM bakery_product JOIN bakery_category ON bakery_product.product_category = bakery_category.category_id order by product_id desc";
        $query = mysqli_query($conn, $select);
        $res = mysqli_fetch_assoc($query);
        return $res;
    }
    public function getProdByCat($category)
    {
        require_once ('../config.php');
        $product_id = $_GET['product_id'];
        $select = "SELECT * FROM bakery_product where product_category = $category";
        $query = mysqli_query($conn, $select);
        $res = mysqli_fetch_assoc($query);
        return $res;
    }

    public function showProducts()
    {
        require_once ('../config.php');
        $select = "SELECT bakery_product.*, bakery_category.category_name FROM bakery_product JOIN bakery_category ON bakery_product.product_category = bakery_category.category_id order by product_id desc";
        $query = mysqli_query($conn, $select);
        $res = mysqli_fetch_assoc($query);
        return $res;
    }
    public function stockAvailable($ordered_q, $product_id)
    {
        require_once ('../config.php');
        $query = "SELECT product_quantity FROM bakery_product WHERE product_id = '$product_id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        if ($row['product_quantity'] < $ordered_quantity) {
            $all_quantities_available = false;
        }
    }
}

?>