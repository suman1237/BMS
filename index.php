<?php
if (isset($_GET['login_success']) && $_GET['login_success'] == 1) {
    echo "<script>alert('Logged in!')</script>";
    echo "<script>window.location.assign('index.php')</script>";
}
if (isset($_GET['logout_success']) && $_GET['logout_success'] == 1) {
    echo "<script>alert('Logged out!')</script>";
    echo "<script>window.location.assign('index.php')</script>";
}
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

<head>
    <?php require ('_header.php') ?>
</head>


<body>

    <div class="dashboard-main-wrapper ">

        <?php require('_navbar.php') ?>

        <div class="container-fluid dashboard-content">

            <!-- Carousel -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="4000">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="uploads/car1.jpg" alt="First slide">
                                <div class="carousel-caption d-md-block pb-car">
                                    <h3 class="text-white">Indulge in Sweetness, One Slice at a Time!</h3>
                                    <p>Cakes bring people together with their irresistible flavors and artful designs, creating sweet moments of celebration and joy.</p>
                                    <a href="about.php" class="btn btn-rounded btn-outline-light">Read More</a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="uploads/car2.png" alt="Second slide">
                                <div class="carousel-caption d-md-block pb-car">
                                    <h3 class="text-white">Sweeten Your Day with a Slice of Delight!</h3>
                                    <p>Sweet bread tantalizes the taste buds with its soft, fluffy texture and delightful hints of sugar and spice.</p>
                                    <a href="about.php" class="btn btn-rounded btn-outline-light">Read More</a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="uploads/car3.jpg" alt="Third slide">
                                <div class="carousel-caption d-md-block pb-car">
                                    <h3 class="text-white">Crunch Into Happiness with Every Bite!</h3>
                                    <p>Cookies bring warmth and comfort with every bite, offering delightful flavors and textures that make any moment special.</p>
                                    <a href="about.php" class="btn btn-rounded btn-outline-light">Read More</a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="uploads/car4.jpg" alt="Fourth slide">
                                <div class="carousel-caption d-md-block pb-car">
                                    <h3 class="text-white">Freshly Baked, Perfectly Crafted!</h3>
                                    <p>Our products are lovingly made with the finest ingredients, delivering a delightful array of flavors and textures for any meal.</p>
                                    <a href="about.php" class="btn btn-rounded btn-outline-light">Read More</a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="uploads/car5.jpg" alt="Fifth slide">
                                <div class="carousel-caption-dough d-md-block pb-car">
                                    <h3 class="text-white">Round Perfection in Every Bite!</h3>
                                    <p>Doughnuts are a delightful treat, offering a variety of flavors and fillings to satisfy every craving.</p>
                                    <a href="about.php" class="btn btn-rounded btn-outline-light">Read More</a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="uploads/car6.png" alt="Sixth slide">
                                <div class="carousel-caption d-md-block pb-car">
                                    <h3 class="text-white">Soft, Warm, and Oh-So-Satisfying!</h3>
                                    <p>Buns provide a comforting and hearty experience, perfect for any meal or a simple snack.</p>
                                    <a href="about.php" class="btn btn-rounded btn-outline-light">Read More</a>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span> </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span> </a>
                    </div>
                </div>
            </div>
            <!-- Carousel end -->


            <!-- Features -->
            <div class="row m-5">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                    <h1>Our Features</h1>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="card rounded-card text-center p-3">
                        <div class="card-body">
                            <h1 class="card-title"><i class="fas fa-thumbs-up"></i></h1>
                            <h3 class="card-title">Quality</h3>
                            <p class="card-text">Our very first priority is the quality we never compromised in the
                                quality of our bakery products.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="card rounded-card text-center p-3">
                        <div class="card-body">
                            <h1 class="card-title"><i class="fas fa-birthday-cake"></i></h1>
                            <h3 class="card-title">Fresh & natural</h3>
                            <p class="card-text">Our every product is fresh and made with natural ingredients we do
                                not
                                use the artificial food ingredient in our products.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="card rounded-card text-center p-3">
                        <div class="card-body">
                            <h1 class="card-title"><i class="fas fa-shipping-fast"></i></h1>
                            <h3 class="card-title">Smooth delivery</h3>
                            <p class="card-text">Smooth delivery to our customers. We deliver within the preffered time given by the customer.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Features End -->

            <!-- Categories -->
            <?php require ('_categories.php') ?>
            <!-- Categories End -->

            <div class="row m-5 hero-image2">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-3 hero-text">
                    <h1 class="text-light">What characterizes us?</h1>
                    <p class="text-light px-5">Our essence is the art of crafting exceptional baked goods from quality ingredients, infused with passion and creativity to bring warmth, joy, and a touch of sweetness to every customer's day.
                    What makes us unique is our blend of traditional baking methods with innovative flavors and designs, all crafted with the utmost care and passion to create one-of-a-kind treats that stand out and leave a lasting impression.
                    We are about creating a memorable experience with every visit, offering a wide range of freshly baked goods made with love and precision to satisfy your cravings and brighten your day.
                    </p>
                    <a href="about.php" class="btn btn-rounded btn-outline-light">About Us</a>
                </div>
            </div>

            <div class="row mx-5 hero-image">
                <div class="hero-text">
                    <h1 class="text-light">Get in Touch, We'd Love to Hear from You!</h1>
                    <a href="contact.php" class="btn btn-rounded btn-outline-light">Contact Us</a>
                </div>
            </div>

        </div>


        <!-- footer -->
        <?php require ('_footer.php') ?>
        <!-- end footer -->
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