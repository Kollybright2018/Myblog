<?php

require ('./admin/inc/db.php');
require  ('./admin/function/function.php');

$cart_id = $_GET['cart_id'];
$status = "published";
$select = $dbc -> prepare("SELECT * FROM post 
INNER JOIN category WHERE post.cart_id = ? AND post.cart_id = category.cart_id  AND post.p_status = ? ") ;
$select -> bind_param("is", $cart_id, $status); 
$select -> execute ();
$result= $select ->  get_result() ;

?>
<html lang="en">
<head>
    <?php
    require ('inc/head.php');
    ?>
    <title>  Category <?php  ?> || God's Blessing </title>
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
                      <h1 class="text-center p-2 my-3 text-primary"><?php echo $cart_name?> News</h1>
                </div>
  
                <!-- News Content  -->
                <!-- News Content -->
        <div class="col-md-9 col-sm-10 border">
           <?php  
        foreach ($result as $post) :
                    $p_id = $post['p_id'] ;
                    $title = $post['p_title'] ;
                    $content = $post['p_content'] ;
                    $image = $post['p_image'] ;
                    $category = $post['cart_id'] ;
                    $keyword = $post['p_keywords'] ;
                    $author = $post['p_author'] ;
                    $date = $post['p_date'] ;
                    $cart_name = $post['cart_name']
                ?>              
        
        <span>
                Posted By : <i> <?php echo $author?> </i> <br>
                <?php echo $date?>  <br>

            </span>
            <span class="badge bg-danger"> <?php echo $cart_name ?></span>
            <h2><a href="news.php?news= <?php echo $p_id?>"><?php echo $title?></a> </h2>

            <img src="./admin/<?php echo $image ?>" width="350px" height="200px" class="img-fluid justify-content center img-thumbnail mx-auto d-block" alt=""> 
            <p> <?php echo substr($content, 0,250)?>..... <a href="news.php?news= <?php echo $p_id?>">Read More</a> </p>
             <hr>
            <?php endforeach ?>
   
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