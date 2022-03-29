<?php

include_once('inc/db.php');
require ('function/function.php');
if (!$_SESSION) {
    header('location:index.php');
}
  $error = [];
  $message;

// Edit
$get_slug = $_GET['edit'];
$select = $dbc -> prepare (" SELECT * FROM category where c_slug = ? ");
$select -> bind_param("s", $get_slug);
$select -> execute();
$result = $select -> get_result();
$get = $result -> fetch_assoc();
$cart_name = $get['cart_name'];

    if (isset($_POST['update'])) {
     if (empty($_POST['cart_name']) ) {
            $error['empty'] = "The Field cannot empty";
        }else {
            $category = treat($_POST['cart_name']) ;
            $slug = substr(str_replace(" ", "-", $category), 0, 20).date("H-i-s");
            $select = $dbc -> prepare (" SELECT * FROM category where cart_name = ? ");
            $select -> bind_param("s", $category);
            $select -> execute();
            $result = $select -> get_result();
            $count = $result -> num_rows;
            if ($count == 0 ) {
                $update = $dbc -> prepare("UPDATE category SET cart_name = ?, c_slug = ? WHERE c_slug = ? ");
      
                $update -> bind_param("sss", $category, $slug, $get_slug  );
            //        echo  $category ;
            //  die;
                if ($update -> execute()) {
                    $message = "Category Updated";
                    header('location:category.php');
                }else {}
                }else {
                $error['already added'] = " Category Already Added";
            }
} }



?>
<html lang="en">
<head>
<?php require('inc/head.php'); ?>
    <title> Category || Admin   </title>
</head>
<body>

  <div class="container-fluid admin-container-fluid ">
      <!-- container row -->
        <div class="row">
  <!-- Sidebar -->
     <?php
     require('inc/sidebar.php')
     ?>
      <!-- //sidebar -->
      <!-- Content -->
      <div class="col-md-10 bg-light border">
      <?php include('inc/navbar.php') ?>

        <!-- container -->
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-md-4 mt-5">
                   
                    <form action="" method="POST" class="form mt-5">
                        <div class="card">
                            <div class="card-header">
                                <h4>Update The category</h4>
                            </div>
                            <div class="card-body">
                                 <div class="form-group">
                            <input type="text" name="cart_name" class="form-control" value=" <?php echo $cart_name ?> " id="">
                                     </div>
                            </div>
                          <div class="card-footer">
                               <div class="form-group mt-3">
                            <input name="update" type="submit" class="btn btn-primary" value="Update">
                        </div>
                          </div>  
                        </div>
                   
                       
                    </form>
                </div>
            </div>
        </div>
        <!-- //container -->
      </div>
      <!-- //content -->
        </div>
        <!-- //container row -->

  </div>

  
  <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>