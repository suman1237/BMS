<?php
class LogInOut
{

    public function validateLogin($uname,$upass)
    {
        require_once ('../config.php');
        $select = "SELECT * FROM bakery_customer where users_username = '$uname' AND users_password = '$upass'";
        $query = mysqli_query($conn, $select);
        $res = mysqli_fetch_assoc($query);
        return $res;
    }
    public function logOut()
    {
        session_start();
        unset($_SESSION['user_users_id']);
        unset($_SESSION['user_users_username']);
        header("Location: index.php?logout_success=1");
    }

}

?>