<?php
require_once ('config.php');
$users_username = $_POST['users_username'];
$users_email = $_POST['users_email'];
$users_psw = $_POST['users_password'];
$users_password = sha1($users_psw);
$users_mobile = $_POST['users_mobile'];
$users_address = $_POST['users_address'];

$insert = "INSERT INTO bakery_customer (users_username, users_email, users_password, users_mobile, users_address) values ('$users_username', '$users_email', '$users_password', '$users_mobile', '$users_address')";

$select = "SELECT * FROM bakery_customer where users_username = '$users_username'";
$query = mysqli_query($conn, $select);
$res = mysqli_fetch_assoc($query);

if (mysqli_num_rows($query) > 0) {
	header("Location: register.php?register_msg=1");
} 
else {
	echo "<script>alert('Registered Successfully. 
	Please wait for the admin approval before login!')</script>";
	mysqli_query($conn, $insert);

	$select2 = "SELECT users_id FROM bakery_customer where users_username = '$users_username' ";
	$q2=mysqli_query($conn, $select2);
	$res = mysqli_fetch_assoc($q2);
	$users_id=$res['users_id'];
	$msg= " A new customer ''$users_username'' requested to be registered." ;
	$insert_notification= "INSERT INTO bakery_notification (users_id, message) values ('$users_id', '$msg')";
	mysqli_query($conn, $insert_notification);

	header("Location: login_users.php?registration=1");
}
?>