<?php
include_once('inc/db.php');
if (!$_SESSION) {
    header('location:index.php');
}

require ('function/function.php');
  $error = [];
  $message;
if (isset($_POST['delete'])) {
       
    if (empty($_POST['del'])) {
      $error['delete_e'] = "You didnt select any item";
       }else {
          $delete = $_POST['del'];
          foreach ($delete as $key ) {
            $select_cart= $dbc -> prepare( "SELECT * FROM category WHERE cart_id = ?");
            $select_cart -> bind_param( "i", $key);
            $select_cart -> execute();
            $get = $select_cart -> get_result();
            foreach ($get as $cart) {
              $c_id = $cart['cart_id'];
              $delete_cart= $dbc -> prepare( "DELETE FROM  category WHERE cart_id = ?");
              $delete_cart -> bind_param( "i", $c_id);
              if ($delete_cart -> execute()) {
                $message  = "Category Deleted Succefully";
                $class= "danger";
              }
            }
     
          }
      }
   
} 
//   $select = mysqli_query ($dbc, "SELECT * FROM category ");
//   $fetch = mysqli_fetch_assoc($select);
//   print_r($fetch);
//   die() ;
// delete Category
if (isset($_GET['delete'])) {
  $cart_id = $_GET['delete'];
  $delete=$dbc -> prepare("DELETE FROM category WHERE cart_id = ? ") ;
  $delete -> bind_param("i", $cart_id);
  if ($delete ->execute()) {
     $message  = "Category Deleted Succefully";
     $class= "danger";
     $delete -> close();
  }  
  
}


if (isset($_POST['submit'])) {
    if ($_POST['category']=="") {
        $error['empty'] = "Field cannot be empty";
    }else {
     $category = treat($_POST['category']) ;
     $slug = substr(str_replace(" ", "-", $category), 0, 20).date("H-i-s");
     $select = $dbc -> prepare (" SELECT * FROM category where cart_name = ? ");
     $select -> bind_param("s", $category);
     $select -> execute();
     $result = $select -> get_result();
     $count = $result -> num_rows;

     if ($count >0 ) {
         $error['already added'] = " Category Already Added";
     }else {
        $insert = $dbc -> prepare("INSERT INTO category (cart_name, c_slug) VALUES( ? ? ) ");
        $insert -> bind_param("ss", $category, $slug);
        if ($insert -> execute()) {
       $message = "Category Added Successfully"; 
       $class = "Success";
       $insert -> close();
        }else {
    
        }    
     }

    }
} 

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
           <!-- navbar -->
      <?php require ('inc/navbar.php')?>
        <!-- //navbar -->

        <!-- container -->
        <div class="container">
            <!-- modal button -->
            <button class="btn btn-success  my-2" data-bs-toggle="modal" data-bs-target="#mymodal" >Add Category</button>
        <table class="table tabel-bordered table-striped table-hover table-dark">
            <form action="" method="post">
         <?php  
              if (isset($message)) : ?>
        <div class="alert  alert-<?php echo $class ?> alert-dismissible">
                <button class="btn-close" data-bs-dismiss="alert"></button>
               <strong class=""> <?php echo $message ?> </strong> 
       </div> 
                 <?php endif ?>      
        <thead>
            <tr>
                <th>S/N</th>
                <th>Categories</th>
                <th class="text-center">Action</th>
           
            </tr>  
            </thead>
            <tbody>
                <?php
                    $select = mysqli_query ($dbc, "SELECT * FROM category ");
                $i=1;
                foreach ($select as $cate) {
                    $cat_name = $cate['cart_name'];
                    ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $cat_name ?> </td>
                    <td class="text-center"> <a href="edit_cart.php?edit=<?php echo $cate['c_slug']; ?>"    class="btn btn-success"> <i class= "fas fa-pen text-success text-dark"></i> Edit</a></td>                   
                </tr>
                <?php
                 $i++;
                 };
                ?>
            </tbody>
          </form>
        </table>
        </div>
        <!-- //container -->
      </div>
      <!-- //content -->
        </div>
        <!-- //container row -->

  </div>




  <!-- modal -->
    <div class="modal" id="mymodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                        <h4 class="modal-title">Add New Category</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>

                <div class="modal-body">
                    <form action="" method="post" class="form">
                        <div class="form-group">
                            <input type="text" name="category" class="form-control" placeholder="Category" id="">
                        </div>
                        <div class="form-group mt-3">
                            <input name="submit" type="submit" class="btn btn-primary" value="Add">
                        </div>
                    </form>
                </div>

                <div class="modal-footer">

                <button data-bs-dismiss="modal" class="btn btn-danger"> Close </button>
                </div>
            </div>
        </div>

    </div>
  <!-- //modal -->
  <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>