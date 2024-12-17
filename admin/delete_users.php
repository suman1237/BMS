<?php
$users_id = $_GET['users_id'];
require_once('../config.php');
$delete = "DELETE FROM bakery_customer where users_id = $users_id";
mysqli_query($conn, $delete);
header("Location: view_users.php?delete=1");
?>