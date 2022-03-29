<?php

require ('./admin/inc/db.php');
require  ('./admin/function/function.php');

$c_slug = $_GET['cart_id'];
$select_cart = $dbc -> prepare("SELECT * FROM category WHERE c_slug = ?") ;
$select_cart ->bind_param("s", $c_slug);
$select_cart ->execute();
$get = $select_cart -> get_result() -> fetch_assoc();
$cart= $get['cart_name'];
$c_slug= $get['c_slug'];
$cart_id= $get['cart_id'];

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
    <title>Home</title>
</head>
<body>
   
    <!-- <header>
        <div class="container-fluid bg-danger">
            <div class="container">
               <div class="row d-flex  header">
                <div class="col-md-3">
                   <a href=""> <img src="images/logo.png" width="80" height="" class="nav-brand" alt=""> </a>
                   
                </div>

                <div class="col-md-6"> 
                    <form action="" class="form form-inline">
                        <div class="form-group mt-4">
                            <input type="text" class="form-control">
                        </div>
                    </form>
                </div>

                <div class="col-md-2">

                </div>
            </div>
          
            </div>
        
             
        </div> 
           <div class="row bg-warning">
               
                <div class="container">
                     <nav class="navbar sticky navbar-expand-sm bg-dark justify-content-center navbar-dark">

               <ul class="navbar-nav nav-justified">
                    <li class=" px-4 nav-item"><a class=" px-4 nav-link" href="">Home</a></li>
                    <li class=" px-4 nav-item"><a class=" px-4 nav-link" href="">Home</a></li>
                    <li class=" px-4 nav-item"><a class=" px-4 nav-link" href="">Home</a></li>
                    <li class=" px-4 nav-item"><a class=" px-4 nav-link" href="">Home</a></li>
                    <li class=" px-4 nav-item"><a class=" px-4 nav-link" href="">Home</a></li>

                </ul>
                     </nav>
                
            </div>
            </div>
    </header> -->
    <?php
    require('inc/header.php');
    require('inc/navbar.php');
    ?>
    <!-- Container-fluid -->
    <div class="container-fluid bg-light">
        <!-- Container -->
        <div class="container"> 
             <!--d-flex row   -->
        <div class="row d-flex ">
        <div class="news"> 
                      <h1 class="text-center p-2 my-3 text-primary"><?php echo $get['cart_name'] ?></h1>
                </div>
<!-- Col-md-9  -->
            <div class="col-md-9  border">
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

            <div class=" cart-bx"> 
                 <span>
                Posted By : <i> <?php echo $author?> </i> <br>
                <?php echo $date?>  <br>
    </span>
            <span class="badge bg-danger"> <?php echo $cart_name ?></span>
            <h5><a href="news.php?news=<?php echo $slug?>"><?php echo $title?></a> </h5>

            <img src="./admin/<?php echo $image ?>" width="350px" height="200px" class="img-fluid justify-content center img-thumbnail mx-auto d-block" alt=""> 
            <p> <?php echo substr($content, 0,250)?>..... <a href="news.php?news=<?php echo $slug?>">Read More</a> </p>
             <hr>
            </div>
            <?php endforeach ?>

            <?php  if ($result->num_rows==0) : ?>
            <div class=" cart-bx"> 
            <h5 class="p-2 text-danger">No news available under this Category Check Back </h5>
            <hr>
            </div>
            <?php endif ?>

         </div>    
<!-- // col-md-9 -->
                     <!-- // col-md-3  Category-->
       <div class="col-md-3  col-sm-9">
       <div class="row p-2 justify-content-center bg-light">
                    <h3>Category</h3>
                   
                       <div class="list-group">
                           <?php
                       $sel_cart = $dbc -> query("SELECT * FROM category");
                    foreach ($sel_cart as $cart):
                        $cart_id= $cart['cart_id'];
                        $cart_name = $cart['cart_name'];
                        $c_slug = $cart['c_slug'];                        
                    ?>
                      <b> <a href="category.php?cart_id=<?php echo $c_slug ?>" class="list-group-item my-2 bg-info  list-item-group-action"><?php echo $cart_name ?></a>
                      </b>              
                    <?php endforeach ?>
                            <hr>
                       </div>
                       <h3 class="pt-4 mt-4">Tags</h3>
                       <hr>
                       <div class="list-group-horizontal"> 
                        <span class="badge bg-primary p-1">Tech </span>
                        <span class="badge bg-danger p-1">lorem </span>
                        <span class="badge bg-info p-1"> Are you there </span>
                        <span class="badge bg-success p-1">serious type</span>
                        <span class="badge bg-warning p-1"> Are you there </span>
                        <span class="badge bg-success p-1">Tech </span>
                    </div>   
                   
                    <h3 class="pt-4 mt-4">Recent Post </h3>
                     <hr>
                     <?php  
                     $status = "published";
$select = $dbc -> prepare("SELECT * FROM post 
                        INNER JOIN category WHERE category.cart_id = ? AND
                        post.cart_id = category.cart_id AND post.p_status = ?  ORDER BY  RAND() LIMIT 5  ") ;
 $select -> bind_param("is", $category, $status); 
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
                    $slug = $post['slug'];
                ?>   

                    <div class="row "> 
                        <div class="col-md-4">
                            <img src="./admin/<?php echo $image ?>" height="150" alt="" class="img-fluid  img-thumbnail">    
                        </div>
                        <div class="col-md-8">
                             <h5> <a href="news.php?news=<?php echo $slug ?> "> <?php echo $title ?> </a></h5>
                        </div>
                    </div>
                <?php endforeach ?>
                    </div>
       </div>
                <!-- col-md-3 -->
         
        <!--  // d-flex row   -->

      
        </div>
        </div>
        <!-- //container -->

        <!-- footer -->
       <?php require('inc/footer.php') ?>
        <!-- //footer -->
    </div>
    <!-- Container-fluid -->

</body>
<script src="bootstrap/js/bootstrap.min.js">

</script>
</html>