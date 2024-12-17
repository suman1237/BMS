<?php

class Admin
{
    public function addProduct()
    {
        require_once ('../config.php');
        $insert = "INSERT INTO bakery_product (product_name, product_category, product_price, product_quantity, product_description, product_image) values ('', '', '', '', '', '')";
        mysqli_query($conn, $insert);
        header("Location: add_product.php?add_msg=2");
    }
    public function addCategory()
    {
        require_once ('../config.php');
        $insert = "INSERT INTO bakery_category (category_name, category_image) values ('', '')";
        mysqli_query($conn, $insert);
        header("Location: add_product.php?add_msg=2");
    }
    public function editUser()
    {
        require_once ('../config.php');
        $update = "UPDATE bakery_customer SET users_username = '', users_email = '', users_password = '', users_mobile = '', users_address = '' where users_id = ";
        mysqli_query($conn, $update);
        header('Location: view_users.php?edit_msg=1');
    }
    public function editProduct()
    {
        require_once ('../config.php');
        $update = "UPDATE bakery_product set product_name = '', product_category = '', product_price = '', product_quantity = '',product_description = '', product_image = '' where product_id = ";
        mysqli_query($conn, $update);
        header("Location: view_product.php?edit_msg=2");
    }
    public function editCategory()
    {
        require_once ('../config.php');
        $update = "UPDATE bakery_category SET category_name = '', category_image = '' where category_id = ";
        mysqli_query($conn, $update);
        header('Location: view_category.php?edit_msg=1');
    }
    public function editOrder()
    {
        require_once ('../config.php');
        $update = "UPDATE bakery_orders SET users_id = '', delivery_date = '', payment_method = '', total_amount = '' where orders_id = ";
        mysqli_query($conn, $update);
        header('Location: view_orders.php?edit_msg=1');
    }
    public function deleteUser()
    {
        require_once ('../config.php');
        $delete = "DELETE FROM bakery_customer where users_id = ";
        mysqli_query($conn, $delete);
        header("Location: view_users.php?delete=1");
    }
    public function deleteProduct()
    {
        require_once ('../config.php');
        $delete = "DELETE FROM bakery_product where product_id = ";
        mysqli_query($conn, $delete);
        header("Location: view_product.php?delete=1");
    }
    public function deleteCategory()
    {
        require_once ('../config.php');
        $delete = "DELETE FROM bakery_category where category_id = ";
        mysqli_query($conn, $delete);
        header("Location: view_category.php?delete=1");
    }
    public function deleteOrder()
    {
        require_once ('../config.php');
        $delete = "DELETE FROM bakery_orders where orders_id = ";
        mysqli_query($conn, $delete);
        header("Location: view_orders.php?delete=1");
    }
    public function login()
    {
        require_once ('../config.php');
        $select = "SELECT * FROM bakery_admin where admin_username = '' AND admin_password = ''";
        $query = mysqli_query($conn, $select);
        $res = mysqli_fetch_assoc($query);
        if (mysqli_num_rows($query) > 0) {
            session_start();
            $_SESSION['user_admin_id'] = $res['admin_id'];
            $_SESSION['user_admin_username'] = $res['admin_username'];
            header("Location: dashboard.php?login_success=1");
        } else {
            header("Location: index.php?login_error=1");
        }
    }

    public function approve($id)
    {
        require_once ('../config.php');
        $sql = "update bakery_customer set users_status=1 where users_id=$id";
        mysqli_query($conn, $sql);
    }
    public function disapprove($id)
    {
        require_once ('../config.php');
        $sql = "update bakery_customer set users_status=0 where users_id=$id";
        mysqli_query($conn, $sql);
    }
}

?>