<?php
session_start();
if (!empty($_SESSION['cart'])) {
    $printCount = count($_SESSION['cart']);
} else {
    $printCount = 0;
}
if (!empty($_SESSION['user_users_id']) && !empty($_SESSION['user_users_username'])) {
    $printUsername = $_SESSION['user_users_username'];
} else {
    $printUsername = "None";
}
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
                        <h2 class="pageheader-title">Products</h2>
                        <p class="pageheader-text"></p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Our products</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mx-5">

                <?php
                require_once ('config.php');
                $select = "SELECT * FROM bakery_product where product_category = " . $_GET['category'];
                $query = mysqli_query($conn, $select);
                while ($res = mysqli_fetch_assoc($query)) {
                    ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="product-thumbnail rounded">
                            <div class="product-img-head">
                                <div class="product-img">
                                    <?php
                                    $file_array = explode(', ', $res['product_image']);
                                    ?>
                                    <img src="uploads/<?php echo $file_array[0]; ?>" class="img-fluid">
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="product-content-head">
                                    <h3 class="product-title">
                                        <?php echo $res['product_name']; ?>
                                    </h3>
                                    <div class="product-price">Rs.
                                        <?php echo $res['product_price'] * 1; ?>
                                    </div>
                                </div>
                                <div class="product_btn">
                                    <?php
                                    if($res['product_quantity'] > 0) {
                                        ?><button onclick="add_cart(<?php echo $res['product_id']; ?>)"
                                        class="btn btn-dark rounded">Add
                                        to Cart
                                    </button> <?php
                                    }
                                    else{
                                        ?><button disabled onclick="add_cart(<?php echo $res['product_id']; ?>)"
                                        class="btn btn-dark rounded">Add
                                        to Cart
                                    </button>
                                    <?php
                                    }
                                    ?>
                                    <a href="single_product.php?product_id=<?php echo $res['product_id']; ?>"
                                        class="btn btn-outline-dark rounded">Details</a>


                                    <div style="display: inline; font-weight: bold; float:right; transform: translateY(8px);">
                                        Stock: <?php echo $res['product_quantity']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>

            <?php require ('_categories.php') ?>

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
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.owl-carousel').owlCarousel({
                loop: true, margin: 10, dots: 0, autoplay: 4000, autoplayHoverPause: true, responsive: {
                    0: { items: 1 }, 600: { items: 2 }, 1000: { items: 4 }
                }
            })
        });
        // function add_cart(product_id) {
        //     $.ajax({
        //         url: 'fetch_cart.php',
        //         data: 'id=' + product_id,
        //         method: 'get',
        //         dataType: 'json',
        //         success: function (cart) {
        //             console.log(cart);
        //             $('.badge').html(cart.length);
        //         }
        //     });
        // }

        function add_cart(product_id) {
        $.ajax({
            url: 'fetch_cart.php',
            data: 'id=' + product_id,
            method: 'get',
            dataType: 'json',
            success: function (cart) {
                console.log(cart);
                $('.badge').html(cart.length);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    </script>
</body>

</html>