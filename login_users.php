<?php
if (isset($_GET['login_error']) && $_GET['login_error'] == 1) {
    echo "<script>alert('Username or Password does not exist!')</script>";
    echo "<script>window.location.assign('login_users.php')</script>";
}
if (isset($_GET['login_error']) && $_GET['login_error'] == 2) {
    echo "<script>alert('You have not been approved by the admin yet!')</script>";
    echo "<script>window.location.assign('login_users.php')</script>";
}
if (isset($_GET['registration']) && $_GET['registration'] == 1) {
    echo "<script>alert('Registered Successfully. Please wait for the admin approval before login!')</script>";
    echo "<script>window.location.assign('login_users.php')</script>";
}
?>
<!doctype html>
<html lang="en">

<head>
    <?php require ('_header.php') ?>
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card rounded">
            <div class="card-header text-center rounded"><a href="index.php">
                    <h2 class="text-brown">BMS</h2>
                </a><span class="splash-description">Please enter your login credentials.</span></div>
            <div class="card-body">
                <form id="form" data-parsley-validate="" method="post" action="login_check_users.php">
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="text" name="users_username"
                            data-parsley-trigger="change" required="" placeholder="Username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="pass1" type="password" required=""
                            placeholder="Password" name="users_password">
                    </div>
                    <button type="submit" class="btn btn-dark rounded btn-lg btn-block">Sign in</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0 rounded text-center">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="register.php" class="footer-link text-brown">Create An Account</a>
                </div>
                <!-- <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Forgot Password</a>
                </div> -->
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/parsley.js"></script>
    <script>
        $('#form').parsley();
    </script>
</body>

</html>