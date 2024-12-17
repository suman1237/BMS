<?php
require_once ('config.php');
$users_username = $_POST['users_username'];
$users_pass = $_POST['users_password'];
$users_password = sha1($users_pass);


$select = "SELECT * FROM bakery_customer where users_username = '$users_username' 
AND users_password = '$users_password'";
$query = mysqli_query($conn, $select);
$res = mysqli_fetch_assoc($query);



	if (mysqli_num_rows($query) > 0) {
		if($res['users_status'] == 1){
			session_start();
			$_SESSION['user_users_id'] = $res['users_id'];
			$_SESSION['user_users_username'] = $res['users_username'];
			$_SESSION['user_users_email'] = $res['users_email'];
			header("Location: index.php?login_success=1");
		}
		else if($res['users_status'] == 0 ) {
			header("Location: login_users.php?login_error=2");
		}
	}
	else {
		header("Location: login_users.php?login_error=1");
	}
?>