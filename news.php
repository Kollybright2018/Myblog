<?php
require ('./admin/inc/db.php');
require ('./admin/function/function.php');
if (!isset($_GET['news'])) {
    header('location:index.php');
}
$slug = $_GET['news'];

// $select_post = mysqli_query($dbc, "SELECT * FROM post WHERE slug = '$slug' ");
// $get = mysqli_fetch_row($select_post);
// print_r($get);
// die;
$error = [];
  $message;

// Fetch News Data
$select = $dbc -> prepare("SELECT * FROM post 
INNER JOIN category WHERE post.slug = ? AND post.cart_id = category.cart_id ") ;
$select -> bind_param("s", $slug); 
$select -> execute ();
$result= $select ->  get_result() ;
$post = $result -> fetch_assoc();

$p_id = $post['p_id'] ;
$title = $post['p_title'] ;
$content = $post['p_content'] ;
$image = $post['p_image'] ;
$category = $post['cart_id'] ;
$keyword = $post['p_keywords'] ;
$author = $post['p_author'] ;
$date = $post['p_date'] ;
$cart_name1 = $post['cart_name'];
$slug_p = $post['slug'];

// print_r($post);
// die;
if (isset($_POST['comment'])) {
  
    // $image =$_FILES['image']['tmp_name'];
    // $img_size =$_FILES['image']['size'];
    // $basename= basename($_FILES['image']['name']);
    // $path= pathinfo($basename, PATHINFO_EXTENSION);
    // $img_folder = "images/".$basename;
$name = $_POST['name'];
    if ($_POST['name']=="") {
         $name= "Anonymous";
      }else {
        $name = treat($_POST['name']) ;
      }

      if (empty($_POST['email'])) {
        $error['email_e'] = "Please Enter YOur mail";
     }else {
       $email = $_POST['email'];
     }

     if (empty($_POST['comment_text'])) {
        $error['text_e'] = "Comment cannot be empty";
     }else {
       $text = treat($_POST['comment_text']) ;
     }

if (empty($error)) {
  $insert  = $dbc -> prepare("INSERT INTO comment (c_name, c_email, p_id, comment) 
                        VALUES(?, ?, ?, ?) ");                  
  $insert -> bind_param("ssis", $name, $email, $p_id, $text );

  if ($insert -> execute() ) {
      $message = " Post Submitted Successfully";
      $class = "info";
    //   echo ' <script> alert("I Have issue")  </script>';
      header("location:news.php?news=".$slug)   ; 
  }else {
      echo ' <script> alert("I Have issue")  </script>';
  }
   
}
  }


?>
<html lang="en">
<head>
    <?php
    require ('inc/head.php');
    ?>
    <title>News || God's Blessing </title>
</head>
<body>
 <!-- Navbar -->
 <?php
  require('inc/header.php');
  require('inc/navbar.php');
 ?>
<!-- Navbar -->
        <!-- Container-fuid -->
    <div class="container-fluid bg-light">
        <!-- Container -->
        <div class="container">
   
        <!-- news Sections -->
        <section>
            <!-- Row -->
            <div class="row">
                <div class="news"> 
                      <h1 class="text-center p-2 my-3 text-primary">News Update</h1>
                </div>
                <!-- News Content  -->
                <!-- News Content -->
        <div class="col-md-9 col-sm-10 border">
                    
        <span>
                Posted By : <i> <?php echo $author?> </i> <br>
                <?php echo $date?>  <br>

            </span>
            <span class="badge bg-danger"> <?php echo $cart_name1 ?></span>
            <h2><a href="news.php?news=<?php echo $slug_p?>"><?php echo $title?></a> </h2>

            <img src="./admin/<?php echo $image ?>" width="350px" height="200px" class="img-fluid justify-content center img-thumbnail mx-auto d-block" alt=""> 
           <?php echo html_entity_decode($content)
         
            ?> 
         <hr>
<!-- comments -->
    <?php require ("inc/comment.php")?>
<!-- /comments -->
<!-- Related Post -->

        <div class="row justify-content-center">

        <h2>Related Post</h2>    
    
        <!-- post -->
        <?php  
$select = $dbc -> prepare("SELECT * FROM post 
                        INNER JOIN category WHERE category.cart_id = ? AND
                        post.cart_id = category.cart_id  ORDER BY RAND() LIMIT 2  ") ;
 $select -> bind_param("i", $category); 
 $select -> execute ();
 $result= $select ->  get_result();
        foreach ($result as $post) :
                    $p_id = $post['p_id'] ;
                    $title = $post['p_title'] ;
                    $content = $post['p_content'] ;
                    $image = $post['p_image'] ;
                    $category = $post['cart_id'] ;
                    $keyword = $post['p_keywords'] ;
                    $author = $post['p_author'] ;
                    $date = $post['p_date'] ;
                    $slug= $post['slug'];
                ?>   

            <div class="col-md-5 col-sm-10">
            <div class="row"> 
                <div class="col-md-3 col-sm-10">
                     <a href="news.php?news=<?php echo $slug ?>"><img src="./admin/<?php echo $image ?>" class="img-fluid img-thumbnail" width="100" height="50" alt=""></a>
                </div>
            <div class="col-md-9 col-sm-10 ">
                <a href="news.php?news=<?php echo $slug ?>"><h5><?php echo $title ?></h5></a>
                    </div>              
            </div>
            </div>
            <?php endforeach ?>
<!-- //post -->
        </div>
        <!-- // Related Post -->
        <hr>
    <!-- comment  -->
    <div class="row my-4 justify-content-center">
        <h2 class="badges bg-danger">Post  A comment</h2>

        <div class="col-md-10">  
            <form action="" class="form" method="POST">
            <div class="form-group mb-3">
                <label for="">Full Name:</label>
                <input type="text" name="name" class="form-control " placeholder="Your fullname">
            </div>

            <div class="form-group mb-3">
                <label for="">Email Address:</label>
                <input type="text" name="email" class="form-control " placeholder="Your Email Address">
            </div>
            <div class="form-group mb-3">
                <label for="Comment">Comment</label>
                <textarea name="comment_text" id="" cols="30" class="form-control" rows="10"></textarea>
            </div>

            <div class="form-group">
                <input  class="btn form-control btn-success" name="comment" value="Comment" type="submit">
            </div>
        </form> </div>
       
    </div>
    <!-- //comment -->
            </div>
                <!--// News Content -->

            <!-- right sidebar -->
       <?php
       include('inc/category.php')
       ?>
        <!-- //right sidebar -->
            </div>
            <!-- //row -->
        </section>
        <!-- News Section -->
        </div>
        <!-- //container -->

    <!-- footer -->
    <?php
    include('inc/footer.php');
    ?>

    </div>

    <!-- //container-Fliud -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>