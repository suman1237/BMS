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
                        <h2 class="pageheader-title">About us</h2>
                        <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit
                            amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">About us</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mx-5">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-dark text-justify m-3">
                                <p>
                                    Darpan Bakery in Kathmandu is a well-loved bakery known for its freshly baked goods and exceptional quality. Nestled in the heart of the city, the bakery offers a wide range of treats, including breads, pastries, cakes, and snacks, all prepared with care and expertise. With its cozy and welcoming ambiance, Darpan Bakery has become a favorite spot for locals and tourists alike, who visit to enjoy its delightful selection of baked goods.
                                </p>
                                <p>
                                    Filled with the warm aroma of freshly baked goods, the bakery shop offers an inviting space where customers can enjoy a diverse selection of artisanal treats crafted with passion and skill.
                                    With a focus on quality and creativity, the bakery shop's management system streamlines production and sales, ensuring fresh, delicious products are consistently available to customers while maintaining a smooth and efficient operation.
                                    The Cake Shop provides same day delivery service seven days a week, including Saturday to provide a high level of customer service.
                                </p>
                                <p>
                                    Darpan Bakery in Kathmandu is a cherished destination for bakery enthusiasts, renowned for its wide variety of mouthwatering treats and its warm, inviting atmosphere.
                                </p>
                                <p>Welcome to Our Bakery: Where Sweet Dreams Come True!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Categories -->
            <?php require ('_categories.php') ?>
            <!-- Categories End -->


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
    </script>
</body>

</html>