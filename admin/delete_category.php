<?php
$cat_id = $_GET['cat_id'];
require_once('../config.php');
$delete = "DELETE FROM bakery_category where category_id = $cat_id";
mysqli_query($conn, $delete);
header("Location: view_category.php?delete=1");
?>