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
                        <h2 class="pageheader-title">Contact</h2>
                        <p class="pageheader-text"></p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Contact us</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mx-5 justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 text-center">
                    <div class="card rounded">
                        <div class="card-body">

                            <iframe class="rounded border-shadow"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1765.    9123866029631!2d85.30381168469405!3d27. 722696012683368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.   1!3m3!1m2!1s0x39eb19dcf2fa7abf%3A0x4c62131fb1d4a0b8!2sDarpan%20Bakery!5e0!3m2!1sen!2sn p!4v1714114375684!5m2!1sen!2snp"
                                width="563" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>

                            <h3 class="text-dark font-italic mt-3 text-left">Address:</h3>
                            <p class="text-dark font-italic text-left">
                                Darpan Bakery, Pahikwo Street, Nayabazar, Kathmandu 44600
                            </p>
                            <h3 class="text-dark font-italic mt-3 text-left">Email:</h3>
                            <p class="text-dark font-italic text-left">
                                darpanbakery@gmail.com
                            </p>
                            <h3 class="text-dark font-italic mt-3 text-left">Call on:</h3>
                            <p class="text-dark font-italic text-left">
                                (+977) 9823390274
                            </p>
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
</body>

</html>