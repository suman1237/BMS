<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg fixed-top">


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="fas fa-bars mx-3"></i></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-3 navbar-right-top">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">HOME</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">SHOP</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink1" style="transform: translateX(0px);" >
                        <?php
                        require_once ('config.php');
                        $select = "SELECT * FROM bakery_category";
                        $query = mysqli_query($conn, $select);
                        while ($res = mysqli_fetch_assoc($query)) {
                            ?>
                            <a class="dropdown-item" href="shop.php?category=<?php echo $res['category_id']; ?>">
                                <?php echo $res['category_name']; ?>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span
                            class="badge badge-pill badge-primary">
                            <?php echo $printCount; ?>
                        </span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">ABOUT US</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">CONTACT</a>
                </li>
                <li class="nav-item dropdown nav-user">
                    <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="uploads/user.png" alt="" class="user-avatar-md rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                        aria-labelledby="navbarDropdownMenuLink2">
                        <div class="nav-user-info">
                            <h3 class="mb-0 ml-4 nav-user-name">
                                <?php echo $printUsername; ?>
                            </h3>
                        </div>
                        <a class="dropdown-item" href="account_users.php"> <i class="fas fa-user mr-2"></i>
                            Account </a>
                        <?php
                        if (isset($_SESSION['user_users_id'])) {
                            echo '<a class="dropdown-item" href="logout_users.php">';
                            echo '<i class="fas fa-sign-out-alt mr-2"></i> Logout';
                            echo '</a>';
                        } else if (!isset($_SESSION['user_users_id'])) {
                            echo '<a class="dropdown-item" href="login_users.php">';
                            echo '<i class="fas fa-power-off mr-2"></i>Login';
                            echo "</a>";

                            echo '<a class="dropdown-item" href="register.php">';
                            echo '<i class="fas fa-sign-in-alt mr-2"></i> Register';
                            echo '</a>';
                        }
                        ?>
                    </div>
                </li>
            </ul>
        </div>

        <a class="navbar-brand" href="index.php">BAKERY MANAGEMENT SYSTEM</a>
    </nav>
</div>