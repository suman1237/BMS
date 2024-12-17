<?php
if (isset($_GET['add_msg']) && $_GET['add_msg'] == 2) {
    echo "<script>
    alert('Product added!');
    window.location.assign('add_product.php');
    </script>";
}
?>
<?php
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
        <title>BMS - Add Product</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link href="../fonts/circular-std/style.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../fonts/fontawesome/css/fontawesome-all.css">
        <link rel="stylesheet" href="../css/inputmask.css">
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
                                <h2 class="pageheader-title">Product</h2>
                                <p class="pageheader-text"></p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="dashboard.php"
                                                    class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Product</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Add Product</li>
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
                                <h5 class="card-header rounded">Add Product</h5>
                                <div class="card-body">
                                    <form action="insert_product.php" id="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="inputProductName">Product Name</label>
                                            <input id="inputProductName" type="text" name="product_name" required=""
                                                placeholder="Enter product name" autocomplete="off" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputProductCategory">Categories</label>
                                            <select class="form-control" id="inputProductCategory" name="product_category">
                                                <?php
                                                require_once ('../config.php');
                                                $select = "SELECT * FROM bakery_category";
                                                $query = mysqli_query($conn, $select);
                                                while ($res = mysqli_fetch_assoc($query)) {
                                                    ?>
                                                    <option value="<?php echo $res['category_id']; ?>">
                                                        <?php echo $res['category_name']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                            <!-- <a href="add_category.php">Add category.</a> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="inputProductPrice">Price (Rs.)</label>
                                            <input id="inputProductPrice" type="number" name="product_price" required=""
                                                placeholder="Enter product price" autocomplete="off"
                                                class="form-control currency-inputmask">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputProductQuantity">Product Quantity</label>
                                            <input id="inputProductQuantity" type="number" name="product_quantity"
                                                required="" placeholder="Enter product quantity" autocomplete="off"
                                                class="form-control currency-inputmask">
                                        </div>
                                        <div class="custom-file mb-3">
                                            <input type="file" class="custom-file-input" id="customFile"
                                                name="product_image[]" multiple="" required="">
                                            <label class="custom-file-label form-control" for="customFile">Choose
                                                Image</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputProductDescription">Description</label>
                                            <textarea id="inputProductDescription" name="product_description" required=""
                                                placeholder="Product description" class="form-control"></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit"
                                                        class="btn btn-space btn-dark rounded">Add</button>
                                                    <button type="reset"
                                                        class="btn btn-space btn-danger rounded">Clear</button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
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
        <!-- Optional JavaScript -->
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/bootstrap.bundle.js"></script>
        <script src="../js/jquery.slimscroll.js"></script>
        <script src="../js/main-js.js"></script>
        <script src="../js/jquery.inputmask.bundle.js"></script>
        <script>
            $(function (e) {
                "use strict";
                $(".currency-inputmask").inputmask('');
            });
            // no minus
            document.querySelectorAll('input[type="number"]').forEach(function (input) {
                input.addEventListener('keydown', function (e) {
                    // Prevent minus sign from being entered
                    if (e.key === '-' || e.key === '+' || e.key === 'Subtract') {
                        e.preventDefault();
                    }
                });

                input.addEventListener('keydown', function (e) {
                    if (this.value.length >= 4 && ![8, 37, 38, 39, 40, 46].includes(e.keyCode)) {
                        e.preventDefault();
                    }
                });
            });


        </script>
    </body>

    </html>
    <?php
} else {
    header("Location: index.php");
}
?>