<?php
session_start();
include_once('inc/db.php');
require ('function/function.php');//   include('include/head.php');
  $error = [];
  $message;

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
}  
?>



<html lang="en">
<head>
<?php
require('inc/head.php')
?>
    <title>Admin Dashboard ||  </title>
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
        <div class="row bg-primary" >

            <div class="col-md-10 ">
                <p>Home</p>
            </div>
            <div>
                <p>Log-Out</p>
               <!-- <a href="#" class="link">Log Out</a> -->
            </div>
        </div>

        <!-- container -->
        <div class="container">
            <div class="row justify-content-center"> 
                <div class="col-md-12 table-responsive">
                <a href="new_post.php" class="btn btn-success m-3"> Add Post </a>  
                     <table class="table   table-hover table-dark table-bordered table-striped">
            <thead>
                <tr>
                <th>S/N</th>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>Category</th>
                <th>Keywords</th>
                <th>Author</th>
                <th>Date</th>
                <th class="text-center" colspan="2">Action</th>
                <!-- <th>Status</th> -->
                </tr>  
            </thead>
            <tbody>
                <?php
                $select = $dbc -> query("SELECT * FROM post") ;
                $i=1;
                foreach ($select as $post) :
                    $p_id = $post['p_id'] ;
                    $title = $post['p_title'] ;
                    $content = $post['p_content'] ;
                    $image = $post['p_image'] ;
                    $category = $post['cart_id'] ;
                    $keyword = $post['p_keywords'] ;
                    $author = $post['p_author'] ;
                    $date = $post['p_date'] ;

?>
                <tr>

                    <td> <?php echo $i ?></td>
                    <td> <?php echo $title ?></td>
                    <td> <p>   <?php  echo substr($content, 0, 100 ) . "........" ?> </p> </td>
                    <td><img src="<?php echo $image ?>" class="img-fluid" width="80" height="50" alt="" srcset=""></td>
                    <td> <?php echo $category ?></td>
                    <td> <?php echo $keyword ?></td>
                    <td> <?php echo $author ?></td>
                    <td>  <?php echo $date ?></td>
                    <td> <a href="edit_post.php?edit=<?php echo $p_id ?>"> <i class="fas fa-pen text-success"></i> Edit</a></td>
                    <td><a href="post.php?delete=<?php echo $p_id ?>"> <i class="fas fa-trash text-danger"></i> Delete</a></td>
                    <!-- <td><a href="post.php?publish=<?php echo $p_id ?>"> <i class="fas fa-pen-alt text-danger"></i> Approve</a></td> -->
                </tr>
                <?php $i++; 
            endforeach; 
            ?>
            </tbody>
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