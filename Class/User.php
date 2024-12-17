<?php

class User
{
    public function getAllUsers()
    {
        require_once ('../config.php');
        $select = "SELECT * FROM bakery_customer ORDER BY users_id DESC";
        $query = mysqli_query($conn, $select);
        $res = mysqli_fetch_assoc($query);
        return $res;
    }
    public function getUserById($id)
    {
        require_once ('../config.php');
        $select = "SELECT * FROM bakery_customer where users_id =$id";
        $query = mysqli_query($conn, $select);
        $res = mysqli_fetch_assoc($query);
        return $res;
    }
    public function updateUser()
    {
        require_once ('../config.php');
        $update = "UPDATE bakery_customer set users_username = '', users_email = '', users_password = '', users_mobile = '', users_address = '' where users_id = ";
        mysqli_query($conn, $update);
        header("Location: account_users.php?edit_success=1");
    }
}

?>