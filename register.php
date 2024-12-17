<?php
if (isset($_GET['register_msg']) && $_GET['register_msg'] == 1) {
    echo "<script>alert('Username already assigned!!!')</script>";
    echo "<script>window.location.assign('register.php')</script>";
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
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
            padding-top: 20px;
            padding-bottom: 20px;
        }
    </style>
</head>
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->

<body>
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->
    <!-- <form id="form" class="splash-container" data-parsley-validate="" method="post" action="insert_users.php">
        <div class="card rounded">
            <div class="card-header text-center rounded">
                <h3 class="mB-3 text-brown">REGISTRATION FORM</h3>
                <p>Please enter your user information.</p>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="users_username"
                        data-parsley-trigger="change" required="" placeholder="Username"  autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="email" name="users_email"
                        data-parsley-trigger="change" required="" placeholder="E-mail" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" id="pass1" type="password" required=""
                        placeholder="Password" name="users_password">
                        <span id="password-error" style="color: red; display: none;"></span>
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" data-parsley-equalto="#pass1" type="password"
                        required="" placeholder="Confirm password">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="number" name="users_mobile" maxlength="10"
                        minlength="10" data-parsley-trigger="change" patternNUM="/^9\d{9}$/" required=""
                        placeholder="Mobile no." id="tel" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="users_address"
                        data-parsley-trigger="change" required="" placeholder="Address" autocomplete="off">
                </div>
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-dark rounded" type="submit">Register</button>
                </div>
            </div>
            <div class="card-footer bg-white rounded text-center">
                <p>Already member? <a href="login_users.php" class="footer-link text-brown">Login Here</a></p>
            </div>
        </div>
    </form>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/parsley.js"></script>
    <script src="js/main-js.js"></script>
    <script>
        $('#form').parsley();

        // no minus
        document.querySelectorAll('input[type="number"]').forEach(function (input) {
            input.addEventListener('keydown', function (e) {
                // Prevent minus sign from being entered
                if (e.key === '-' || e.key === 'Subtract') {
                    e.preventDefault();
                }
            });
            input.addEventListener('input', function () {
                if (this.value.length > 10) {
                    this.value = this.value.slice(0, 10);
                }
            });

            input.addEventListener('keydown', function (e) {
                if (this.value.length >= 10 && ![8, 37, 38, 39, 40, 46].includes(e.keyCode)) {
                    e.preventDefault();
                }
            });
        });

        document.getElementById('form').onsubmit = function(event) {
            event.preventDefault();
            var password = document.getElementById('pass1').value;
            var passwordError = document.getElementById('password-error');

            // Regular expression for password validation
            var passwordPattern = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

            if (!passwordPattern.test(password)) {
                passwordError.style.display = 'inline';
                passwordError.textContent = 'At least 8 characters and one uppercase, number and symbol.';
            }
            else ;
        }; -->



        <form id="form" class="splash-container" data-parsley-validate="" method="post" action="insert_users.php">
    <div class="card rounded">
        <div class="card-header text-center rounded">
            <h3 class="mB-3 text-brown">REGISTRATION FORM</h3>
            <p>Please enter your user information.</p>
        </div>
        <div class="card-body">
            <div class="form-group">
                <input class="form-control form-control-lg" type="text" name="users_username" id="username"
                    data-parsley-trigger="change" required="" placeholder="Username" autocomplete="off">
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg" type="email" name="users_email"
                    data-parsley-trigger="change" required="" placeholder="E-mail" autocomplete="off">
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg" type="password" id="pass1" required=""
                    placeholder="Password" name="users_password" data-parsley-trigger="change" patternPASS="/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/" >
                <span id="password-error" style="color: red; display: none;"></span>
                <!-- <input class="form-control form-control-lg" id="pass1" type="password" required=""
                    placeholder="Password" name="users_password" data-parsley-trigger="change">
                <span id="password-error" style="color: red; display: none;"></span> -->
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg" data-parsley-equalto="#pass1" data-parsley-trigger="change" type="password"
                    required="" placeholder="Confirm password">
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg" type="number" name="users_mobile" maxlength="10"
                    minlength="10" data-parsley-trigger="change" required="" patternNUM="/^(97|98)\d*$/"
                    placeholder="Mobile no." id="tel" autocomplete="off">
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg" type="text" name="users_address" patternADDRESS="/^[A-Za-z\s]+-\d+,\s[A-Za-z\s]+$/"
                    data-parsley-trigger="change" required="" placeholder="Address" autocomplete="off">
            </div>
            <div class="form-group pt-2">
                <button class="btn btn-block btn-dark rounded" type="submit">Register</button>
            </div>
        </div>
        <div class="card-footer bg-white rounded text-center">
            <p>Already member? <a href="login_users.php" class="footer-link text-brown">Login Here</a></p>
        </div>
    </div>
</form>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.bundle.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/parsley.js"></script>
<script src="js/main-js.js"></script>
<script>
    $('#form').parsley();

    // no minus
    document.querySelectorAll('input[type="number"]').forEach(function (input) {
        input.addEventListener('keydown', function (e) {
            // Prevent minus sign from being entered
            if (e.key === '-' || e.key === 'Subtract') {
                e.preventDefault();
            }
        });
        input.addEventListener('input', function () {
            if (this.value.length > 10) {
                this.value = this.value.slice(0, 10);
            }
        });

        input.addEventListener('keydown', function (e) {
            if (this.value.length >= 10 && ![8, 37, 38, 39, 40, 46].includes(e.keyCode)) {
                e.preventDefault();
            }
        });
    });

    document.getElementById('form').onsubmit = function(event) {
        var password = document.getElementById('pass1').value;
        var passwordError = document.getElementById('password-error');

        // Regular expression for password validation
        var passwordPattern = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

        if (!passwordPattern.test(password)) {
            event.preventDefault();
            passwordError.style.display = 'inline';
            passwordError.textContent = 'At least 8 characters and one uppercase, number and symbol.';
        } else {
            passwordError.style.display = 'none';
        }
    };


    document.addEventListener('DOMContentLoaded', function () {
        const username = document.getElementById('username');

        username.addEventListener('keydown', function (e) {
            // Allow control keys: backspace, delete, tab, escape, enter, arrow keys, etc.
            const controlKeys = [
                'Backspace', 'Delete', 'Tab', 'Escape', 'Enter',
                'ArrowLeft', 'ArrowRight', 'ArrowUp', 'ArrowDown',
                'Home', 'End', 'Shift', 'Control', 'Alt'
            ];

            if (controlKeys.includes(e.key) ||
                (e.key === 'a' && e.ctrlKey === true) || // Allow Ctrl+A
                (e.key === 'c' && e.ctrlKey === true) || // Allow Ctrl+C
                (e.key === 'v' && e.ctrlKey === true) || // Allow Ctrl+V
                (e.key === 'x' && e.ctrlKey === true) // Allow Ctrl+X
            ) {
                return;
            }

            // Allow only alphabets and spaces
            if (!/^[a-zA-Z\d\s]$/.test(e.key)) {
                e.preventDefault();
            }
        });
    });
</script>

    </script>
</body>

</html>