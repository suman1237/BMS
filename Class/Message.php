<?php 

class Message {
    public function notify_register_request()
    {
        require_once ('../config.php');
        $sql = "select * from bakery_notification WHERE is_read = 0 ORDER BY created_at DESC";
        $query = mysqli_query($conn, $sql);
        $res = mysqli_fetch_assoc($query);
        return $res;
    }
    public function get_msg_count()
    {
        require_once ('../config.php');
        $sql = "select * from bakery_notification WHERE is_read = 0";
        $total = mysqli_query($conn, $sql);
        // $total = mysqli_fetch_assoc($query);
        return $total;
    }
    
    public function tempDelmsg($id)
    {
        require_once ('../config.php');
        $sql = "update bakery_notification set is_read=0 where id=$id";
        $query = mysqli_query($conn, $sql);
    }

}

?>