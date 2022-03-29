<?php

include_once('inc/db.php');
require ('function/function.php');//   include('include/head.php');
  $error = [];
  $message;
// Delete Multiple
if (isset($_POST['delete'])) {
       
    if (empty($_POST['del'])) {
      $error['delete_e'] = "You didnt select any item";
       }else {
          $delete = $_POST['del'];
          foreach ($delete as $key ) {
            $select_post= $dbc -> prepare( "SELECT * FROM post WHERE p_id = ?");
            $select_post -> bind_param( "i", $key);
            $select_post -> execute();
            $get = $select_post -> get_result();
            foreach ($get as $post) {
              $p_id = $post['p_id'];
              $delete_post= $dbc -> prepare( "DELETE FROM  post WHERE p_id = ?");
              $delete_post -> bind_param( "i", $p_id);
              if ($delete_post -> execute()) {
                $message  = "Category Deleted Succefully";
                $class= "danger";
              }
            }
     
          }
      }
   
} 


//   delete

if (isset($_GET['delete'])) {
    $p_id = $_GET['delete'];
    $delete=$dbc -> prepare("DELETE FROM post WHERE p_id = ? ") ;
    $delete -> bind_param("i", $p_id);
    if ($delete ->execute()) {
       $message  = "Post Deleted Succefully";
       $class= "danger";
       $delete -> close();
       header('location:post.php');
    }
}; 

// Approve
if (isset($_GET['publish'])) {
    $p_id = $_GET['publish'];
    $publ ="published";
    $published = $dbc -> prepare("UPDATE post SET p_status = ?  WHERE p_id= ?") ;
    $published-> bind_param("si", $publ, $p_id);
    if ($published ->execute()) {
       $message  = "Post Published Succefully";
       $class= "success";
       header('location:post.php');
         }
}

// pending
if (isset($_GET['draft'])) {
    $p_id = $_GET['draft'];
    $dra ="draft";
    $draft = $dbc -> prepare("UPDATE post SET p_status = ? WHERE p_id= ? ") ;
    $draft-> bind_param("si", $dra, $p_id);
    if ($draft ->execute()) {
       $message  = "Post Drafted Succefully";
       $class= "info";
       header('location:post.php');
         }
}

?>

<html lang="en">
<head>
<?php
require('inc/head.php')
?>
    <title>Post ||  </title>
</head>
<body>
    <style>
       
    </style>
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
            <div class="row justify-content-center"> 
                <div class="col-md-12 table-responsive">
                <a href="new_post.php" class="btn btn-success m-3"> Add Post </a>  
                     <table class="table   table-hover table-dark table-bordered table-striped">
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
                <th>S/N 
                </th>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>Category</th>
                <th>Keywords</th>
                <th>Author</th>
                <th>Date</th>
                <th class="text-center" colspan="2">Action</th>
                <th>Status</th> 
             
                </tr>  
            </thead>
            <tbody>
                <?php
                $select = $dbc -> query("SELECT * FROM post INNER JOIN category 
                                        WHERE post.cart_id = category.cart_id") ;
                $i=1;
                foreach ($select as $post) :
                    $p_id = $post['p_id'] ;
                    $title = $post['p_title'] ;
                    $content = $post['p_content'] ;
                    $image = $post['p_image'] ;
                    $category = $post['cart_name'] ;
                    $keyword = $post['p_keywords'] ;
                    $author = $post['p_author'] ;
                    $date = $post['p_date'] ;
                    $status = $post['p_status'];
                    $slug = $post['slug'];
?>
                <tr>

                    <td> 
                <input type="checkbox" name="del[]" value="<?php echo $post['p_id']; ?>">
                  <?php echo $i ?> 
                  </td>
                    <td> <?php echo $title ?></td>
                    <td> <p>   <?php  echo htmlspecialchars(substr($content, 0, 100 ))  . "........" ?> </p> </td>
                    <td><img src="<?php echo $image ?>" class="img-fluid" width="80" height="50" alt="" srcset=""></td>
                    <td> <?php echo $category ?></td>
                    <td> <?php echo $keyword ?></td>
                    <td> <?php echo $author ?></td>
                    <td>  <?php echo $date ?></td>
                    <td> <a href="edit_post.php?edit=<?php echo $slug ?>"> <i class="fas fa-pen text-success"></i> Edit</a></td>
                    <td><a href="post.php?delete=<?php echo $p_id ?>"> <i class="fas fa-trash text-danger"></i> Delete</a></td>
                   
                    <?php if ($status == "draft"):?>
                    <td> <a href="post.php?publish=<?php echo $p_id ?> "> <i class="fas fa-check text-primary"></i> Publish</a>   </td>
                    <?php else : ?>
                        <td> <a href="post.php?draft=<?php echo $p_id ?> "> <i class="fas fa-envelope text-warning"></i> Draft</a>  </td>
                        <?php endif ?>
                 
                </tr>
                <?php $i++; 
            endforeach; 
            ?>
            </tbody>
            <tfoot>
                <tr>
                    <td class="text-center">  <span class="fas fa-trash btn btn-danger ">  <b> <input  class="form-control-sm btn btn-danger" name="delete" type="submit" value="Delete Select"> </b> </span></td>
                     <td colspan="11"></td>
                </tr>
            </tfoot>
            </form>
        </table>
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