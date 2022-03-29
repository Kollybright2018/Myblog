<?php
require ('./admin/inc/db.php');
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
        <div class="row d-flex">
            
            <!-- col-md-3  Education-->
            <?php require('inc/Education.php'); ?>
         <!-- // col-md-3 -->

           <!-- col-md-3  Latest News-->
           <?php require('inc/latest.php'); ?>
         <!-- // col-md-3 -->


            <!-- col-md-3 all news -->
            <?php require('inc/allnews.php'); ?>
    <!--  // col all news -->



             <!-- // col-md-3  Category-->
             <?php require('inc/category.php'); ?>
                <!-- col-md-3 -->
         
        <!--  // d-flex row   -->

        <!-- newsletter row -->
        <div id="newsletter" class="row justify-content-center my-2">
            <div class="col-md-6">
                <h1>Subscribe to Our newsletter</h1>
                <p>Lorem olor sit amet cdam soluta commodi molestiae provident. Sit ati est?</p>
                <div class="form">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter Your email">
                        <input type="submit" value="Subscribe" class="btn btn-success">
                    </div>
                </div>
            </div>
        </div>
        <!--// newsletter row -->
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