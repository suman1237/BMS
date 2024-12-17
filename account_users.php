<?php
if (isset($_GET['edit_success']) && $_GET['edit_success'] == 1) {
    echo "<script>alert('Edited details!')</script>";
    echo "<script>window.location.assign('account_users.php')</script>";
}
session_start();
if (!empty($_SESSION['cart'])) {
    $printCount = count($_SESSION['cart']);
} else {
    $printCount = 0;
}
if (!empty($_SESSION['user_users_id']) && !empty($_SESSION['user_users_username'])) {
    $printUsername = $_SESSION['user_users_username'];
    ?>
    <!doctype html>
    <html lang="en">

    <head> <?php require ('_header.php') ?> </head>


    <body>
        <!-- ============================================================== -->
        <!-- main wrapper -->
        <!-- ============================================================== -->
        <div class="dashboard-main-wrapper">
            <!-- ============================================================== -->
            <!-- navbar -->
            <!-- ============================================================== -->
            <?php require ('_navbar.php') ?>
            <!-- ============================================================== -->
            <!-- end navbar -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- wrapper  -->
            <!-- ============================================================== -->
            <!-- <div class="dashboard-wrapper"> -->
            <div class="container-fluid dashboard-content">

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Users Account</h2>
                            <p class="pageheader-text"></p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Users account</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <?php
                        require_once ("config.php");
                        $users_id = $_SESSION['user_users_id'];
                        $select = "SELECT * FROM bakery_customer where users_id = $users_id";
                        $query = mysqli_query($conn, $select);
                        $res = mysqli_fetch_assoc($query);
                        ?>
                        <form id="form" class="splash-container" method="post" action="update_users.php">
                            <div class="card rounded">
                                <div class="card-body">
                                    <div class="form-group-au">
                                        <label>Username</label>
                                        <input class="form-control form-control-lg" type="text" name="users_username"
                                            placeholder="Username" required="" autocomplete="off"
                                            value="<?php echo $res['users_username']; ?>">
                                    </div>
                                    <div class="form-group-au">
                                        <label>Email</label>
                                        <input class="form-control form-control-lg" type="email" name="users_email"
                                            placeholder="Email" required="" autocomplete="off"
                                            value="<?php echo $res['users_email']; ?>">
                                    </div>
                                    <div class="form-group-au">
                                        <label>Password</label>
                                        <input class="form-control form-control-lg" type="text" required=""
                                            placeholder="Reset password (if forgotten)" name="users_password">
                                    </div>
                                    <div class="form-group-au">
                                        <label>Phone no.</label>
                                        <input class="form-control form-control-lg" type="tel" name="users_mobile"
                                            placeholder="Phone no." required="" pattern="[0-9]{10}" autocomplete="off"
                                            value="<?php echo $res['users_mobile']; ?>">
                                    </div>
                                    <div class="form-group-au">
                                        <label>Address</label>
                                        <input class="form-control form-control-lg" type="text" name="users_address"
                                            placeholder="Address" required="" autocomplete="off"
                                            value="<?php echo $res['users_address']; ?>">
                                    </div>
                                    <div class="form-group-btn">
                                        <input type="hidden" value="<?php echo $res['users_id']; ?>" name="hidden_users_id">
                                        <button class="btn btn-block btn-dark rounded mt-3" type="submit">Change</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Order History</h2>
                            <p class="pageheader-text"></p>
                        </div>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Users account</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Orders Table</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped first table-bordered mb-3 mt-2">
                                        <thead>
                                            <tr>
                                                <th>S. No.</th>
                                                <th>Order id</th>
                                                <th>Delivery date</th>
                                                <th>Delivery address</th>
                                                <th>Payment method</th>
                                                <th>Total amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require_once ('config.php');
                                            $select = "SELECT * FROM bakery_orders where users_id = $users_id ORDER BY orders_id DESC";
                                            $query = mysqli_query($conn, $select);
                                            $i = 1;
                                            while ($res = mysqli_fetch_assoc($query)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $res['orders_id']; ?></td>
                                                    <td><?php echo $res['delivery_date']; ?></td>
                                                    <td><?php echo $res['delivery_address']; ?></td>
                                                    <td><?php echo $res['payment_method']; ?></td>
                                                    <td>Rs. <?php echo $res['total_amount']; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>S. No.</th>
                                                <th>Order id</th>
                                                <th>Delivery date</th>
                                                <th>Delivery address</th>
                                                <th>Payment method</th>
                                                <th>Total amount</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Order Details</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit
                                amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                        </div>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Users account</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Orders Details Table</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first mb-3 mt-2">
                                        <thead>
                                            <tr>
                                                <th>S. No.</th>
                                                <th>Order id</th>
                                                <th>Product name</th>
                                                <th>Ordered Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require_once ('config.php');
                                            // $select = "SELECT * FROM bakery_orders_detail";
                                            $select = "SELECT bakery_orders_detail.*, bakery_orders.orders_id FROM bakery_orders_detail JOIN bakery_orders ON bakery_orders_detail.orders_id = bakery_orders.orders_id WHERE users_id = $users_id ORDER BY bakery_orders.orders_id DESC";
                                            $query = mysqli_query($conn, $select);
                                            $i = 1;
                                            while ($res = mysqli_fetch_assoc($query)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $res['orders_id']; ?></td>
                                                    <td><?php echo $res['product_name']; ?></td>
                                                    <td><?php echo $res['ordered_quantity']; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>S. No.</th>
                                                <th>Order id</th>
                                                <th>Product name</th>
                                                <th>Ordered Quantity</th>
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
            <?php require ('_footer.php') ?>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
            <!-- </div> -->
        </div>
        <!-- ============================================================== -->
        <!-- end main wrapper -->
        <!-- ============================================================== -->
        <!-- Optional JavaScript -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.bundle.js"></script>
        <script src="js/jquery.slimscroll.js"></script>
        <script src="js/main-js.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap4.min.js"></script>
        <script src="js/data-table.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    </body>

    </html>
    <?php
} else {
    header("Location: login_users.php");
}
?>

<script>
    $(document).ready(function () {
        console.log('Initializing DataTable...');
        $('#DataTables_Table_0_wrapper_wrapper').DataTable({
            "order": [[0, "desc"]], // Order by the first column (index 0) in descending order
            "columnDefs": [
                { "orderable": true, "targets": 0 } // Ensure the first column is orderable
            ]
        });
        console.log('DataTable initialized.');
    });
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