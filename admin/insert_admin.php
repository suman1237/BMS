<?php
require_once('../config.php');
$admin_username = $_POST['admin_username'];
$admin_email = $_POST['admin_email'];
$admin_psw = $_POST['admin_password'];
$admin_password = sha1($admin_psw);
$insert = "INSERT INTO bakery_admin (admin_username, admin_email, admin_password) values ('$admin_username', '$admin_email', '$admin_password')";
$select = "SELECT * FROM bakery_admin where admin_username = '$admin_username'";
$query = mysqli_query($conn, $select);
$res = mysqli_fetch_assoc($query);
if (mysqli_num_rows($query) > 0) {
	header("Location: admin_signup.php?register_msg=1");
}
else {
	mysqli_query($conn, $insert);
	header("Location: index.php");
}
?>
