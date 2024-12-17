<?php
require_once ('config.php');
$users_username = $_POST['users_username'];
$users_email = $_POST['users_email'];
$users_pass = $_POST['users_password'];
$users_password = sha1($users_pass);
$users_mobile = $_POST['users_mobile'];
$users_address = $_POST['users_address'];
$users_id = $_POST['hidden_users_id'];
$update = "UPDATE bakery_customer set users_username = '$users_username', users_email = '$users_email', users_password = '$users_password', users_mobile = '$users_mobile', users_address = '$users_address' where users_id = $users_id";
mysqli_query($conn, $update);
header("Location: account_users.php?edit_success=1")
?>