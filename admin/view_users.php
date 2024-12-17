<?php

include '../Class/Admin.php';

if (isset($_GET['edit_msg']) && $_GET['edit_msg'] == 1) {
    echo "<script>
    alert('User Edited Successfully!');
    window.location.assign('view_users.php');
    </script>";
}
if (isset($_GET['delete']) && $_GET['delete'] == 1) {
    echo "<script>
    alert('User Deleted Successfully!');
    window.location.assign('view_users.php');
    </script>";
}
?>
<?php
session_start();

$user = new Admin();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['approve_user_id'])) {
    $userID = $_POST['approve_user_id'];
    
    if(isset($_POST['approved'])){
      $user->disapprove($userID);
      Header('Location:view_users.php');
    }
    else if(isset($_POST['pending'])){
      $user->approve($userID);
      Header('Location:view_users.php');
    }
  }

if (isset($_SESSION['user_admin_id']) && $_SESSION['user_admin_id'] != null) {
    $admin_username = $_SESSION['user_admin_username'];
    ?>
    <!doctype html>
    <html lang="en">


    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>BMS - View Users</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link href="../fonts/circular-std/style.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../fonts/fontawesome/css/fontawesome-all.css">
        <link rel="stylesheet" href="../css/dataTables.bootstrap4.css">
    </head>

    <body>
        <!-- ============================================================== -->
        <!-- main wrapper -->
        <!-- ============================================================== -->
        <div class="dashboard-main-wrapper">
            <!-- ============================================================== -->
            <!-- navbar -->
            <!-- ============================================================== -->
            <?php require '_navbar_admin.php' ?>
            <!-- ============================================================== -->
            <!-- end navbar -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- left sidebar -->
            <!-- ============================================================== -->
            <?php require '_sidebar.php' ?>
            <!-- ============================================================== -->
            <!-- end left sidebar -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- wrapper  -->
            <!-- ============================================================== -->
            <div class="dashboard-wrapper">
                <div class="container-fluid dashboard-content">
                    <!-- ============================================================== -->
                    <!-- pageheader -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Users</h2>
                                <p class="pageheader-text"></p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="dashboard.php"
                                                    class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">View users</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card rounded">
                                <h5 class="card-header rounded">Users Table</h5>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped first table-bordered rounded">
                                            <thead>
                                                <tr>
                                                    <th>S. No.</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Mobile</th>
                                                    <th>Address</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                require_once ('../config.php');
                                                $select = "SELECT * FROM bakery_customer ORDER BY users_id DESC";
                                                $query = mysqli_query($conn, $select);
                                                $i = 1;
                                                while ($res = mysqli_fetch_assoc($query)) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $res['users_username']; ?></td>
                                                        <td><?php echo $res['users_email']; ?></td>
                                                        <td><?php echo $res['users_mobile']; ?></td>
                                                        <td><?php echo $res['users_address']; ?></td>
                                                        <td>
                                                            <form method="post">
                                                                <input type="hidden" name="approve_user_id"
                                                                    value="<?php echo $res['users_id']; ?>">
                                                                <?php
                                                                if ($res['users_status'] == 1) {
                                                                    ?>
                                                                    <input type='submit' name="approved"
                                                                        class='btn btn-outline-success rounded'
                                                                        value="Approved">
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <input type='submit' name="pending"
                                                                        class='btn btn-outline-warning rounded'
                                                                        value="Pending">
                                                                    <?php
                                                                }
                                                                ?>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <button data-toggle="modal" data-target="#exampleModal"
                                                                class="btn btn-space btn-dark rounded"
                                                                onclick="edit_users(<?php echo $res['users_id']; ?>)">EDIT</button>
                                                            <button onclick="delete_users(<?php echo $res['users_id']; ?>)"
                                                                class="btn btn-space btn-danger rounded">DELETE</button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>S. No.</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Password</th>
                                                    <th>Mobile</th>
                                                    <th>Address</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                <?php require '_footer_admin.php'; ?>
                <!-- ============================================================== -->
                <!-- end footer -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- end main wrapper -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end main wrapper -->
        <!-- ============================================================== -->
        <div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog " role="document">
                <div class="modal-content rounded">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit users</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="edit_users.php" id="form" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="card rounded">
                                <h5 class="card-header rounded">Edit users</h5>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputUserName">Username</label>
                                        <input id="inputUserName" type="text" name="users_username" required=""
                                            placeholder="Enter username" autocomplete="off" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserEmail">Email</label>
                                        <input id="inputUserEmail" type="email" name="users_email" required=""
                                            placeholder="Enter email" autocomplete="off" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserPassword">Password</label>
                                        <input id="inputUserPassword" type="password" name="users_password" required=""
                                            placeholder="Enter password" autocomplete="off" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserMobile">Mobile No.</label>
                                        <input id="inputUserMobile" type="tel" name="users_mobile" required=""
                                            placeholder="Enter mobile no." pattern="[0-9]{10}" autocomplete="off"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserAddress">Address</label>
                                        <input id="inputUserAddress" type="text" name="users_address" required=""
                                            placeholder="Enter address" autocomplete="off" class="form-control">
                                    </div>
                                    <input type="hidden" name="hidden_users">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-space btn-danger rounded">Clear</button>
                            <button type="submit" class="btn btn-space btn-dark rounded">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Optional JavaScript -->
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/bootstrap.bundle.js"></script>
        <script src="../js/jquery.slimscroll.js"></script>
        <script src="../js/main-js.js"></script>
        <script src="../js/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables.bootstrap4.min.js"></script>
        <script src="../js/data-table.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
        <script>
            function edit_users(users_id) {
                $.ajax({
                    url: 'get_users.php',
                    data: 'id=' + users_id,
                    method: 'get',
                    dataType: 'json',
                    success: function (res) {
                        console.log(res);
                        $('input[name="users_username"]').val(res.users_username);
                        $('input[name="users_email"]').val(res.users_email);
                        $('input[name="users_password"]').val(res.users_password);
                        $('input[name="users_mobile"]').val(res.users_mobile);
                        $('input[name="users_address"]').val(res.users_address);
                        $('input[name="hidden_users"]').val(res.users_id);
                    }
                })
            }
            function delete_users(users_id) {
                var flag = confirm("Do you want to delete?");
                if (flag) {
                    window.location.href = "delete_users.php?users_id=" + users_id;
                }
            }

            $(document).ready(function () {
                console.log('Initializing DataTable...');
                $('#table_id').DataTable({
                    "order": [[0, "desc"]], // Order by the first column (index 0) in descending order
                    "columnDefs": [
                        { "orderable": true, "targets": 0 } // Ensure the first column is orderable
                    ]
                });
                console.log('DataTable initialized.');
            });
        </script>
    </body>

    </html>
    <?php
} else {
    header("Location: index.php");
}
?>