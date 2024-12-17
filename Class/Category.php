<?php

class Category
{
    public function getCatById()
    {
        require_once ('../config.php');
        $select = "SELECT * FROM bakery_category order by category_id desc";
        $query = mysqli_query($conn, $select);
        $res = mysqli_fetch_assoc($query);
        return $res;
    }
    public function getAllCategories()
    {
        require_once ('../config.php');
        $select = "SELECT * FROM bakery_category";
        $query = mysqli_query($conn, $select);
        $res = mysqli_fetch_assoc($query);
        return $res;
    }

}

?>