<html lang="en">
<head>
    <?php
    require ('inc/head.php');
    ?>
    <title>Home || God's Blessing </title>
</head>
<body>
 <!-- Navbar -->
 <?php
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
          
            <!-- Education News -->
                <?php  
                 $select = $dbc -> query("SELECT * FROM post") ; 
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
            <div class="col-md-5 col-sm-10"> 
                <h2>Education News</h2>
                <hr>
                <div class="row justify-content-center">
       
        
                <div class="col-md-4 col-sm-10 gx-0">

                    <a href="#"> <img src="images/cute-lady.jpg" class="img-fluid img-thumbnail" alt="Yahoo" width="100" height="100" ></a>  
                    </div>
                    <div class="col-md-8 col-sm-10  gx-0">
                        <a href=""> <h3>A yahoo boy in our hub</h3></a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                            Illum officiis eveniet ea id dolor magnam vero odit dicta illo. In ab qui 
                            consequatur velit illo nesciunt accusamus et unde voluptates... </p>
                      <a class="btn btn-info" href="#">Read More </a>
                    </div>
                </div>
                <hr>


                <div class="row">
                <div class="col-md-4 gx-0">
                        <img src="images/cute-lady.jpg" class="img-fluid" alt="Yahoo" width="100" height="100" >
                    </div>
                    <div class="col-md-8 gx-0">
                        <h3>A yahoo boy in our hub</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                            Illum officiis eveniet ea id dolor magnam vero odit dicta illo. In ab qui 
                            consequatur velit illo nesciunt accusamus et unde voluptates... </p>
                          <button class="btn btn-info">Read More</button>  
                    </div>
                </div>
                <hr>
            </div>
            <!-- // Education News -->
<?php endforeach   ?>
            <!-- Sport News -->
            <div class="col-md-5 col-sm-10"> 
                <h2>Latest News</h2>
                <hr>
                <div class="row">
                <div class="col-md-4 gx-0">
                        <img src="images/cute-lady.jpg" class="img-fluid" alt="Yahoo" width="100" height="100" >
                    </div>
                    <div class="col-md-8 gx-0">
                        <h3>A yahoo boy in our hub</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                            Illum officiis eveniet ea id dolor magnam vero odit dicta illo. In ab qui 
                            consequatur velit illo nesciunt accusamus et unde voluptates... </p>
                          <button class="btn btn-info">Read More</button>  
                    </div>
                </div>
                <hr>
            </div>
            <!-- // Sport News -->


            <!-- right sidebar -->
       <?php
       include('inc/rightbar.php')
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