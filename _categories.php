<div class="row m-5">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
        <h1>Our Categories</h1>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="owl-carousel owl-theme">
            <?php
            require_once ('config.php');
            $select = "SELECT * FROM bakery_category";
            $query = mysqli_query($conn, $select);
            while ($res = mysqli_fetch_assoc($query)) {
                ?>
                <div class="item">
                    <div class="card h-100 rounded">
                        <div class="card-body">
                            <a href="shop.php?category=<?php echo $res['category_id']; ?>">
                                <img class="card-img" src="uploads/<?php echo $res['category_image']; ?>">
                            </a>
                            <h3 class="card-title"><?php echo $res['category_name']; ?></h3>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>