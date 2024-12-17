<?php
require_once ('../config.php');

if (($_SERVER["REQUEST_METHOD"] === "POST") && isset($_POST['delmsg']) && isset($_GET['id'])) {
    $id=$_GET['id'];
    $sql = "update bakery_notification set is_read=1 where msg_id=$id";
    mysqli_query($conn, $sql);
  }

// Fetch unread messages
$sql = "SELECT * FROM bakery_notification WHERE is_read = 0 ORDER BY created_at DESC";
$query = mysqli_query($conn, $sql);
$allmsg = mysqli_fetch_all($query, MYSQLI_ASSOC); // Fetch all messages as an associative array

// Count total unread messages
$total = count($allmsg);
?>

<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg fixed-top">
        <a class="navbar-brand" href="dashboard.php">BAKERY MANAGEMENT SYSTEM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="fas fa-bars mx-3"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top-noti">
                <li class="nav-item dropdown nav-user"  >
                    <a class="nav-link nav-user-img pt-3"  href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell mt-2" style="transform: translateX(50px);"></i><sup>
                            <span class="badge badge-dark">
                                <?php echo $total; ?>
                            </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown rounded mt-1" style="transform: translateX(-200px);
                                                                                                        height: auto;
                                                                                                        max-height: 300px;
                                                                                                        overflow:hidden;
                                                                                                        overflow: auto;"
                        aria-labelledby="navbarDropdownMenuLink1">
                        <?php 
                        if($total != 0) {
                            foreach ($allmsg as $message) { ?>
                                <?php
                                echo '<a class="dropdown-item rounded mt-1 pt-2 pb-2 pl-3" href="view_users.php">' . htmlspecialchars($message['message']) . '</a>';
                                ?>
                               <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $message['msg_id']; ?>" >
                                <input type="submit" value="Delete" name="delmsg" class="btn btn-outline-danger ml-2 p-0 rounded" style="width:80px;" >
                            </form>
                            <?php
                            }   
                        } else {
                            echo '<a class="dropdown-item" href="#">No Notification</a>';
                        }    
                        ?>
                    </div>
                </li>

                <li class="nav-item dropdown nav-user">
                    <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="../uploads/user.png" alt="" class="user-avatar-md rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                        aria-labelledby="navbarDropdownMenuLink2">
                        <div class="nav-user-info">
                            <h3 class="mb-0 ml-3 nav-user-name">
                                <?php echo $admin_username; ?>
                            </h3>
                        </div>
                        <a class="dropdown-item" href="account_admin.php"><i class="fas fa-user mr-2"></i>Account</a>
                        <a class="dropdown-item" href="logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>