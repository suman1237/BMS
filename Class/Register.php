<?php

class Register
{
    public function insertUsers()
    {
        require_once ('../config.php');
        $insert = "INSERT INTO bakery_customer (users_username, users_email, users_password, users_mobile, users_address) values ('', '', '', '', '')";
        mysqli_query($conn, $insert);
    }
    public function getUserByUsername($username){
        require_once ('../config.php');
        $select = "SELECT * FROM bakery_customer where users_username = '$username'";
        $query = mysqli_query($conn, $select);
        $res = mysqli_fetch_assoc($query);
        return $res;
    }
}

?>