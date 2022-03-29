<?php
require ('./admin/inc/db.php');
require ('./admin/function/function.php');

if (isset($_GET['search'])) {
    $search = treat($_GET['search_text']);
    $input = "%{$search}%";
  $status = "published";
$select = $dbc -> prepare("SELECT * FROM post 
INNER JOIN category WHERE post.p_title LIKE  ?  AND post.cart_id = category.cart_id  AND post.p_status = ? ") ;
$select -> bind_param("ss", $input,  $status); 
$select -> execute ();

$result= $select ->  get_result() ;
$count = $result -> num_rows;

}

// print_r($_GET);

?>
<html lang="en">
<head>
    <?php
    require ('inc/head.php');
    ?>
    <title>  Search <?php  ?> || God's Blessing </title>
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
                      <h1 class="text-center p-2 my-3 text-primary"> (<?php echo $count; ?>) Search Result For " <?php echo $search; ?> "  </h1>
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
                    $cart_name = $post['cart_name'];
                    $slug = $post['slug'];
                ?>              
        
        <span>
                Posted By : <i> <?php echo $author?> </i> <br>
                <?php echo $date?>  <br>

            </span>
            <span class="badge bg-danger"> <?php echo $cart_name ?></span>
            <h5><a href="news.php?news=<?php echo $slug?>"><?php echo $title?></a> </h5>
             <hr>
            <?php endforeach ?>
   
            </div>
                <!--// News Content -->


        
                <!-- News Content -->
                <div class="col-md-9 col-sm-10 border">
           <?php if ($result->num_rows==0) :?>              
        <h2>No Matching result for . <strong> <?php echo "$search" ?> </strong> </h2>
<hr>
           
         <?php endif ?>
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