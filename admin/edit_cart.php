<?php
session_start();
if (!$_SESSION) {
    header('location:index.php');
}
include_once('inc/db.php');
require ('function/function.php');
  $error = [];
  $message;

// Edit
$cart_id = $_GET['edit'];
// $select = $dbc -> prepare (" SELECT * FROM category where cart_id = ? ");
// $select -> bind_param("i", $cart_id);
// $select -> execute();
// $result = $select -> get_result();
// $count = $result -> fetch_assoc;
// $cart_name = $get['cart_name'];

    if (isset($_POST['update'])) {
     if ( empty($_POST['category']) ) {
            $error['empty'] = "The Field cannot empty";
        }else {
            $category = treat($_POST['category']) ;
            $select = $dbc -> prepare (" SELECT * FROM category where cart_name = ? ");
            $select -> bind_param("s", $category);
            $select -> execute();
            $result = $select -> get_result();
            $count = $result -> num_rows;
            // die;
            if ($count == 0 ) {
                $update = $dbc -> prepare("UPDATE category SET cart_name = ? WHERE cart_id = ? ");
                $update -> bind_param("si", $category, $cart_id );
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
        <div class="row bg-primary d-flex flex-row" >
            <div>
                <p>Home</p>
            </div>
            <div>
                <p>Log-Out</p>
               <!-- <a href="#" class="link">Log Out</a> -->
                   </div>
        </div>

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
                            <input type="text" name="category" class="form-control" value=" <?php echo $name ?> " id="">
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