<?php
 include_once('inc/db.php');
 require ('function/function.php');
  $error = [];
  $message;

 
//   Delete Comment
if (isset($_GET['delete'])) {
      $c_id = $_GET['delete'];
      $delete=$dbc -> prepare("DELETE FROM comment WHERE c_id = ?  ") ;
      $delete -> bind_param("i", $c_id);
      if ($delete ->execute()) {
         $message  = "Post Deleted Succefully";
         $class= "danger";
         header('location:comment.php');
      }
}

// Approve
if (isset($_GET['approve'])) {
    $c_id = $_GET['approve'];
    $appr ="approve";
    $approve = $dbc -> prepare("UPDATE comment SET c_status = ? WHERE c_id= ?") ;
    $approve-> bind_param("si", $appr, $c_id);
    if ($approve ->execute()) {
       $message  = "Comment Approve Succefully";
       $class= "success";
       header('location:comment.php');
         }
}


// pending
if (isset($_GET['pending'])) {
    $c_id = $_GET['pending'];
    $pend ="pending";
    $pending = $dbc -> prepare("UPDATE comment SET c_status = ? WHERE c_id= ? ") ;
    $pending-> bind_param("si", $pend, $c_id);
    if ($pending ->execute()) {
       $message  = "Comment Disapprove Succefully";
       $class= "info";
       header('location:comment.php');
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
      <div class="row bg-primary " >
            <div class="col-md-5 p-3">
                <p><span class="text-light fas fa-home">Home</span> </p>
            </div>
            <div class="col-md-5 p-3 " >
            <a href="inc/logout.php"><i class="fas fa-power-off text-light">Log Out</i> </a>   
               <!-- <a href="#" class="link">Log Out</a> -->
            </div>
        </div>

        <!-- container -->
        <div class="container ">
            <div class="table-responsive"> 
        <table class="table table-bordered table-striped table-hover table-dark">
            <thead>
                <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Email</th>
                <th>Post Title</th>
                <th>Comment</th>
                <th>Date</th>
                <th class="text-center" >Action</th>
                <th>Status</th>
                </tr>  
            </thead>
            <tbody>
            <?php
            $select = $dbc -> query("SELECT * FROM comment 
            INNER JOIN post WHERE comment.p_id = post.p_id ") ;
       $i=1;
            foreach ($select as $comment) :
                $c_id = $comment['c_id'] ;
                $date = $comment['com_date'];
                $name = $comment['c_name'] ;
                $email = $comment['c_email'] ;
                $p_title = $comment['p_title'] ;
                 $status = $comment['c_status'] ;
                 $comment = $comment['comment'] ;
        
?>
        <tr>
                    <td><?php echo $i?></td>
                    <td><?php echo $name ?></td>
                    <td> <?php echo $email ?> </td>
                    <td><?php echo $p_title?></td>
                    <td><?php echo $comment?></td>
                    <td> <?php echo $date ?></td>
                    <td><a href="comment.php?delete=<?php echo $c_id ?> "> <i class="fas fa-trash text-danger"></i> Delete</a></td>
                     <?php if ($status == "pending"):?>
                    <td> <a href="comment.php?approve=<?php echo $c_id ?> "> <i class="fas fa-check text-primary"></i> Approve</a>   </td>
                    <?php else : ?>
                        <td> <a href="comment.php?pending=<?php echo $c_id ?> "> <i class="fas fa-envelope text-warning"></i> Draft</a>  </td>
                        <?php endif ?>
                </tr>
                <?php $i++; endforeach?>
            </tbody>
        </table>
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