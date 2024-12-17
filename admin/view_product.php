<?php
if (isset($_GET['edit_msg']) && $_GET['edit_msg'] == 2) {
    echo "<script>
    alert('Product edited!');
    window.location.assign('view_product.php');
    </script>";
}
if (isset($_GET['delete']) && $_GET['delete'] == 1) {
    echo "<script>
    alert('Product Deleted Successfully!');
    window.location.assign('view_product.php');
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
        <title>BMS - View Product</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link href="../fonts/circular-std/style.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../fonts/fontawesome/css/fontawesome-all.css">
        <link rel="stylesheet" href="../css/dataTables.bootstrap4.css">
        <link rel="stylesheet" type="text/css" href="../css/owl.carousel.min.css">
        <link rel="stylesheet" type="text/css" href="../css/owl.theme.default.min.css">
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
                                            <li class="breadcrumb-item active" aria-current="page">View product</li>
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
                                <h5 class="card-header rounded">Product Table</h5>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered first rounded">
                                            <thead>
                                                <tr>
                                                    <th>S.No.</th>
                                                    <th>Name</th>
                                                    <th>Category</th>
                                                    <th>Price</th>
                                                    <th>Stock</th>
                                                    <th>Image</th>
                                                    <th>Description</th>
                                                    <th style="padding-right: 140px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                require_once ('../config.php');
                                                $select = "SELECT bakery_product.*, bakery_category.category_name FROM bakery_product JOIN bakery_category ON bakery_product.product_category = bakery_category.category_id order by product_id desc";
                                                $query = mysqli_query($conn, $select);
                                                $i = 1;
                                                while ($res = mysqli_fetch_assoc($query)) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $res['product_name']; ?></td>
                                                        <td><?php echo $res['category_name']; ?></td>
                                                        <td>Rs. <?php echo $res['product_price'] * 1; ?></td>
                                                        <td><?php echo $res['product_quantity']; ?></td>
                                                        <td>
                                                            <?php
                                                            $file_array = explode(', ', $res['product_image']);
                                                            ?>
                                                            <!-- <div class="owl-carousel owl-theme" style="width: 100px;"> -->
                                                            <?php
                                                            for ($j = 0; $j < count($file_array); $j++) {
                                                                ?>
                                                                <div class="item">
                                                                    <img src="../uploads/<?php echo $res['product_image']; ?>"
                                                                        height="100px" width="100px">
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                        </div>
                                        </td>
                                        <td><?php echo $res['product_description']; ?></td>
                                        <td>
                                            <button data-toggle="modal" data-target="#exampleModal"
                                                class="btn btn-space btn-dark rounded"
                                                onclick="edit_prod(<?php echo $res['product_id']; ?>)">EDIT</button>
                                            <button onclick="delete_prod(<?php echo $res['product_id']; ?>)"
                                                class="btn btn-space btn-danger rounded">DELETE</button>
                                        </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>S. No.</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Image</th>
                                            <th>Description</th>
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
                        <h5 class="modal-title">Edit product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="edit_product.php" id="form" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="card rounded">
                                <h5 class="card-header rounded">Edit product</h5>
                                <div class="card-body">
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
                                                    <?php echo $res['category_name']; ?></option>
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
                                        <label for="inputProductQuantity">Stock Level</label>
                                        <input id="inputProductQuantity" type="text" name="product_quantity" required=""
                                            placeholder="Enter product quantity" autocomplete="off"
                                            class="form-control">
                                    </div>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile" name="product_image[]"
                                            multiple="">
                                        <label class="custom-file-label form-control" for="customFile">Choose Image</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputProductDescription">Description</label>
                                        <textarea rows="4" id="inputProductDescription" name="product_description" required=""
                                            placeholder="Product description" class="form-control"></textarea>
                                        <input type="hidden" name="hidden_product">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-space btn-danger rounded">Clear</button>
                            <button type="submit" class="btn btn-space btn-dark rounded">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Optional JavaScript -->
        <!-- <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script> -->
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/bootstrap.bundle.js"></script>
        <script src="../js/jquery.slimscroll.js"></script>
        <script src="../js/main-js.js"></script>
        <script src="../js/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables.bootstrap4.min.js"></script>
        <script src="../js/data-table.js"></script>
        <script type="text/javascript" src="../js/owl.carousel.min.js"></script>
        <script src="../js/jquery.inputmask.bundle.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

        <script>
            $(function (e) {
                "use strict";
                $(".currency-inputmask").inputmask('');
            });
            function edit_prod(product_id) {
                $.ajax({
                    url: 'get_product.php',
                    data: 'id=' + product_id,
                    method: 'get',
                    dataType: 'json',
                    success: function (res) {
                        console.log(res);
                        $('input[name="product_name"]').val(res.product_name);
                        $('select[name="product_category"]').val(res.product_category);
                        $('input[name="product_price"]').val(res.product_price);
                        $('input[name="product_quantity"]').val(res.product_quantity);
                        $('textarea[name="product_description"]').val(res.product_description);
                        $('file[name="product_image[]"]').val(res.product_image);
                        $('input[name="hidden_product"]').val(res.product_id);
                    }
                })
            }
            function delete_prod(prod_id) {
                var flag = confirm("Do you want to delete?");
                if (flag) {
                    window.location.href = "delete_product.php?prod_id=" + prod_id;
                }
            }
            $(document).ready(function () {
                $('.owl-carousel').owlCarousel({
                    loop: true, margin: 10, dots: 0, autoplay: 4000, autoplayHoverPause: true, responsive: {
                        0: { items: 1 }, 600: { items: 1 }, 1000: { items: 1 }
                    }
                })
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