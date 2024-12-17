<?php
session_start();
if (!empty($_SESSION['cart'])) {
    $printCount = count($_SESSION['cart']);
}
else {
    $printCount = 0;
}
if (!empty($_SESSION['user_users_id']) && !empty($_SESSION['user_users_username'])) {
    $printUsername = $_SESSION['user_users_username'];
}
else {
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
                            <h2 class="pageheader-title">Product</h2>
                            <p class="pageheader-text"></p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Product details</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mx-5">

                    <?php
                    require_once('config.php');
                    $product_id = $_GET['product_id'];
                    $select = "SELECT * FROM bakery_product where product_id = $product_id";
                    $query = mysqli_query($conn, $select);
                    $res = mysqli_fetch_assoc($query);
                    ?>
                    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pr-xl-0 pr-lg-0 pr-md-0 m-b-30">
                                <div class="product-slider p-4 rounded">
                                    <div id="carouselExampleIndicators" class="product-carousel carousel slide" data-ride="carousel">
                                        <?php
                                        $file_array = explode(', ', $res['product_image']);
                                        ?>
                                        <div class="carousel-inner">
                                            <?php
                                            for ($i = 0; $i < count($file_array); $i++) {
                                            ?>
                                            <div class="carousel-item <?php if($i == 0) {echo 'active';} ?>">
                                                <img class="d-block w-100" src="uploads/<?php echo $file_array[$i];?>" alt="slide<?php echo $i;?>">
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30 d-flex">
                                <div class="product-details p-5 rounded">
                                    <div class="border-bottom pb-3 mb-3">
                                        <h2 class="mb-3"><?php echo $res['product_name'];?></h2>
                                        <h3 class="mb-0 text-brown">Rs. <?php echo $res['product_price']*1;?></h3>
                                    </div>
                                    <div class="product-description">
                                        <h4 class="mb-1">Descriptions</h4>
                                        <p><?php echo $res['product_description'];?></p>

                                        <div style="display: block; font-weight: bold; margin-bottom: 5px;">
                                        Stock: <?php echo $res['product_quantity']; ?>
                                    </div>

                                        <?php if($res['product_quantity']>0){
                                            ?>
                                            <button onclick="add_cart(<?php echo $res['product_id'];?>)" class="btn btn-dark rounded btn-block btn-lg">Add to Cart</button> <?php
                                        }
                                        else{
                                            ?>
                                            <button disabled onclick="add_cart(<?php echo $res['product_id'];?>)" class="btn btn-dark rounded btn-block btn-lg">Add to Cart</button>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
        $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                loop: true, margin: 10, dots: 0, autoplay: 4000, autoplayHoverPause: true, responsive:{
                    0:{items:1}, 600:{items:2}, 1000:{items:4}
                }
            })
        });
        function add_cart(product_id) {
                $.ajax({
                    url:'fetch_cart.php',
                    data:'id='+product_id,
                    method:'get',
                    dataType:'json',
                    success:function(cart){
                        console.log(cart);
                        $('.badge').html(cart.length);
                    }
                });
            }
    </script>
</body>
 
</html>
