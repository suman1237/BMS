<?php
require_once ('../config.php');
if (isset($_GET['edit_msg']) && $_GET['edit_msg'] == 1) {
    echo "<script>
    alert('Orders edited!');
    window.location.assign('view_orders.php');
    </script>";
}
if (isset($_GET['edit_msg']) && $_GET['edit_msg'] == 2) {
    echo "<script>
    alert('Orders detail edited!');
    window.location.assign('view_orders.php');
    </script>";
}
if (isset($_GET['delete']) && $_GET['delete'] == 1) {
    echo "<script>
    alert('Order Deleted Successfully!');
    window.location.assign('view_orders.php');
    </script>";
}
if (isset($_GET['delete']) && $_GET['delete'] == 2) {
    echo "<script>
    alert('Order Detail Deleted Successfully!');
    window.location.assign('view_orders.php');
    </script>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['order_id'])) {
    $orderID = $_POST['order_id'];

    if (isset($_POST['delivered'])) {
        $update = "UPDATE bakery_orders SET delivery_status = 0 where orders_id = $orderID";
        $query = mysqli_query($conn, $update);
        Header('Location:view_orders.php');
    } else if (isset($_POST['pending'])) {
        $update = "UPDATE bakery_orders SET delivery_status = 1 where orders_id = $orderID";
        $query = mysqli_query($conn, $update);
        Header('Location:view_orders.php');
    }
}


session_start();
if (isset($_SESSION['user_admin_id']) && $_SESSION['user_admin_id'] != null) {
    $admin_username = $_SESSION['user_admin_username'];
    ?>
    <!doctype html>
    <html lang="en">


    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>BMS - View Orders</title>
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

            <?php require '_sidebar.php' ?>
            <!-- ============================================================== -->
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
                                <h2 class="pageheader-title">Orders</h2>
                                <p class="pageheader-text"></p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="dashboard.php"
                                                    class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">View orders</li>
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
                                <h5 class="card-header rounded">Orders Table</h5>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped first table-bordered rounded">
                                            <thead>
                                                <tr>
                                                    <th>S. No.</th>
                                                    <th>Order id</th>
                                                    <th>User id</th>
                                                    <th>Delivery date</th>
                                                    <th style="padding-right: 129px;">Delivery adddress</th>
                                                    <th style="padding-right: 60px;">Payment method</th>
                                                    <th>Total amount</th>
                                                    <th>Delivery status</th>
                                                    <th style="padding-right: 135px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $select = "SELECT * FROM bakery_orders order by orders_id desc";
                                                $query = mysqli_query($conn, $select);
                                                $i = 1;
                                                while ($res = mysqli_fetch_assoc($query)) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $res['orders_id']; ?></td>
                                                        <td><?php echo $res['users_id']; ?></td>
                                                        <td><?php echo $res['delivery_date']; ?></td>
                                                        <td><?php echo $res['delivery_address']; ?></td>
                                                        <td><?php echo $res['payment_method']; ?></td>
                                                        <td>Rs. <?php echo $res['total_amount']; ?></td>
                                                        <td>
                                                            <form method="post">
                                                                <input type="hidden" name="order_id"
                                                                    value="<?php echo $res['orders_id']; ?>">

                                                                <?php
                                                                if ($res['delivery_status'] == 1) {
                                                                    ?>
                                                                    <input type='submit' name="delivered"
                                                                        class='btn btn-outline-success rounded'
                                                                        value="<?php echo "Delivered"; ?>">
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <input type='submit' name="pending"
                                                                        class='btn btn-outline-warning rounded'
                                                                        value="<?php echo "Pending"; ?>">
                                                                    <?php
                                                                }
                                                                ?>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <button data-toggle="modal" data-target="#exampleModal"
                                                                class="btn btn-space btn-dark rounded"
                                                                onclick="edit_orders(<?php echo $res['orders_id']; ?>)">EDIT</button>
                                                            <button onclick="delete_orders(<?php echo $res['orders_id']; ?>)"
                                                                class="btn btn-space btn-danger rounded">DELETE</button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>S. No.</th>
                                                    <th>Order id</th>
                                                    <th>User id</th>
                                                    <th>Delivery date</th>
                                                    <th>Delivery address</th>
                                                    <th>Payment method</th>
                                                    <th>Total amount</th>
                                                    <th>Delivery status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card rounded">
                                <h5 class="card-header rounded">Orders Detail Table</h5>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped first table-bordered rounded">
                                            <thead>
                                                <tr>
                                                    <th>S. No.</th>
                                                    <th>Order id</th>
                                                    <th style="padding-right: 200px;">Product name</th>
                                                    <th>Ordered Quantity</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                require_once ('../config.php');
                                                // $select = "SELECT * FROM bakery_orders_detail  order by orders_detail_id desc";
                                                $select = "SELECT bakery_orders_detail.*, bakery_orders.orders_id FROM bakery_orders_detail JOIN    bakery_orders ON bakery_orders_detail.orders_id = bakery_orders.orders_id 
                                                            ORDER BY bakery_orders_detail.orders_detail_id DESC";

                                                $query = mysqli_query($conn, $select);
                                                $i = 1;
                                                while ($res = mysqli_fetch_assoc($query)) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $res['orders_id']; ?></td>
                                                        <td><?php echo $res['product_name']; ?></td>
                                                        <td><?php echo $res['ordered_quantity']; ?></td>
                                                        <td>
                                                            <button data-toggle="modal" data-target="#exampleModal1"
                                                                class="btn btn-space btn-dark rounded"
                                                                onclick="edit_orders_detail(<?php echo $res['orders_detail_id']; ?>)">Edit</button>
                                                            <button
                                                                onclick="delete_orders_detail(<?php echo $res['orders_detail_id']; ?>)"
                                                                class="btn btn-space btn-danger rounded">DELETE</button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>S. No.</th>
                                                    <th>Order id</th>
                                                    <th>Product name</th>
                                                    <th>Ordered Quantity</th>
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
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit orders</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="edit_orders.php" id="form" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="card rounded">
                                <h5 class="card-header rounded">Edit orders</h5>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputUsersId">Users id</label>
                                        <input id="inputUsersId" type="number" min="1" name="users_id" required=""
                                            placeholder="Enter users id" autocomplete="off" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDeliveryDate">Delivery date</label>
                                        <input id="inputDeliveryDate" type="date" name="delivery_date" required=""
                                            placeholder="Enter delivery date" autocomplete="off" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDeliveryAddress">Delivery address</label>
                                        <input id="inputDeliveryAddress" type="address" name="delivery_address" required=""
                                            placeholder="Enter delivery address" autocomplete="off" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPaymentMethod">Payment method</label>
                                        <select id="inputPaymentMethod" name="payment_method" class="form-control rounded">
                                            <option>Cash On Delivery</option>
                                            <option>Khalti</option>
                                            <option>Online Card</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputTotalAmount">Total amount</label>
                                        <input id="inputTotalAmount" type="number" min="1" name="total_amount" required=""
                                            placeholder="Enter total amount" autocomplete="off" class="form-control">
                                    </div>
                                    <input type="hidden" name="hidden_orders">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-space btn-dark rounded">Clear</button>
                            <button type="submit" class="btn btn-space btn-danger rounded">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal1" data-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit orders detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="edit_orders_detail.php" id="form" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="card rounded">
                                <h5 class="card-header rounded">Edit orders detail</h5>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputOrdersId">Order id</label>
                                        <input id="inputOrdersId" type="number" min="1" name="orders_id" required=""
                                            placeholder="Enter orders id" autocomplete="off" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputProductName">Product name</label>
                                        <input id="inputProductName" type="text" name="product_name" required=""
                                            placeholder="Enter product name" autocomplete="off" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputQuantity">Ordered Quantity</label>
                                        <input id="inputQuantity" type="number" min="1" max="9" name="quantity" required=""
                                            placeholder="Enter quantity" autocomplete="off" class="form-control">
                                    </div>
                                    <input type="hidden" name="hidden_orders_detail">
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

            function edit_orders(orders_id) {
                $.ajax({
                    url: 'get_orders.php',
                    data: 'id=' + orders_id,
                    method: 'get',
                    dataType: 'json',
                    success: function (res) {
                        console.log(res);
                        $('input[name="users_id"]').val(res.users_id);
                        $('input[name="delivery_date"]').val(res.delivery_date);
                        $('input[name="delivery_address"]').val(res.delivery_address);
                        $('select[name="payment_method"]').val(res.payment_method);
                        $('input[name="total_amount"]').val(res.total_amount);
                        $('input[name="hidden_orders"]').val(res.orders_id);
                    }
                })
            }
            function delete_orders(orders_id) {
                var flag = confirm("Do you want to delete?");
                if (flag) {
                    window.location.href = "delete_orders.php?orders_id=" + orders_id;
                }
            }
            function edit_orders_detail(orders_detail_id) {
                $.ajax({
                    url: 'get_orders_detail.php',
                    data: 'id=' + orders_detail_id,
                    method: 'get',
                    dataType: 'json',
                    success: function (res) {
                        console.log(res);
                        $('input[name="orders_id"]').val(res.orders_id);
                        $('input[name="product_name"]').val(res.product_name);
                        $('input[name="quantity"]').val(res.ordered_quantity);
                        $('input[name="hidden_orders_detail"]').val(res.orders_detail_id);
                    }
                })
            }
            function delete_orders_detail(orders_detail_id) {
                var flag = confirm("Do you want to delete?");
                if (flag) {
                    window.location.href = "delete_orders_detail.php?orders_detail_id=" + orders_detail_id;
                }
            }

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
    </body>

    </html>
    <?php
} else {
    header("Location: index.php");
}
?>