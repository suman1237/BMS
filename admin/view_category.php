<?php
if (isset($_GET['edit_msg']) && $_GET['edit_msg'] == 1) {
    echo "<script>
    alert('Category edited!');
    window.location.assign('view_category.php');
    </script>";
}
if (isset($_GET['delete']) && $_GET['delete'] == 1) {
    echo "<script>
    alert('Category Deleted Successfully!');
    window.location.assign('view_category.php');
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
    <title>BMS - View Category</title>
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
        <?php require'_navbar_admin.php' ?> 
<?php require'_sidebar.php' ?> 
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
                            <h2 class="pageheader-title">Category</h2>
                            <p class="pageheader-text"></p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="dashboard.php" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Category</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">View category</li>
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
                            <h5 class="card-header rounded">Category Table</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first rounded">
                                        <thead>
                                            <tr>
                                                <th>S. No.</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require_once('../config.php');
                                            // $select = "SELECT * FROM bakery_category order by category_id desc";
                                            $select = "SELECT * FROM bakery_category";
                                            $query = mysqli_query($conn, $select);
                                            $i = 1;
                                            while ($res = mysqli_fetch_assoc($query)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $res['category_name'];?></td>
                                                <td><img src="../uploads/<?php echo $res['category_image'];?>" height="100px" width="100px"></td>
                                                <td>
                                                    <button data-toggle="modal" data-target="#exampleModal" class="btn btn-space btn-dark rounded" onclick="edit_cat(<?php echo $res['category_id'];?>)">EDIT</button>
                                                    <button onclick="delete_cat(<?php echo $res['category_id'];?>)" class="btn btn-space btn-danger rounded">DELETE</button>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>S. No.</th>
                                                <th>Name</th>
                                                <th>Image</th>
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
            <?php require'_footer_admin.php'; ?>
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
        <h5 class="modal-title">Edit category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="edit_category.php" id="form" method="post" enctype="multipart/form-data">
      <div class="modal-body">
            <div class="card rounded">
                                <h5 class="card-header rounded">Edit category</h5>
                                <div class="card-body">
                                    
                                        <div class="form-group">
                                            <label for="inputCategoryName">Category Name</label>
                                            <input id="inputCategoryName" type="text" name="category_name" required="" placeholder="Enter category name" autocomplete="off" class="form-control">
                                        </div>
                                        <div class="custom-file mb-3">
                                            <input type="file" class="custom-file-input" id="customFile" name="category_image">
                                            <label class="custom-file-label form-control" for="customFile">Choose Image</label>
                                            <input type="hidden" name="hidden_category">
                                        </div>
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
    <!-- <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script> -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/jquery.slimscroll.js"></script>
    <script src="../js/main-js.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap4.min.js"></script>
    <script src="../js/data-table.js"></script>
    <script>
        function edit_cat(category_id) {
            $.ajax({
                url:'get_category.php',
                data:'id='+category_id,
                method:'get',
                dataType:'json',
                success:function(res){
                    console.log(res);
                    $('input[name="category_name"]').val(res.category_name);
                    $('input[name="hidden_category"]').val(res.category_id);
                }
            })
        }
        function delete_cat(cat_id) {
            var flag = confirm("Do you want to delete?");
            if (flag) {
                window.location.href = "delete_category.php?cat_id="+cat_id;
            }
        }
    </script>
</body>
 
</html>
<?php
}
else {
    header("Location: index.php");
}
?>