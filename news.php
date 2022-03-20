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
        <div class="col-md-10 col-sm-10 border">
            <span>
                Posted By : <i>Admin </i> <br>
                March 2018, 09:32 Am  <br>

            </span>
            <span class="badge bg-danger">Education news</span>
            <h2> Lorem ipsum dolor, sit amet consectetur adipisicing elit. cere reprehenderit aut dolorum.</h2>

            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur neque ullam facere sequi 
                a inventore perferendis et 
                vel ut quae consequatur, architecto quasi cum dolorem accusantium libero corporis vitae at?</p>
             
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur neque ullam facere sequi 
                a inventore perferendis et 
                vel ut quae consequatur, architecto quasi cum dolorem accusantium libero corporis vitae at?</p> 
                <img src="images/cute-lady.jpg" width="350px" height="200px" class="img-fluid justify-content center img-thumbnail mx-auto d-block" alt="">   
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus at nemo cupiditate numquam ipsa ut necessitatibus corrupti rem laboriosam,
                 nam aut libero iusto doloremque voluptatum. Deleniti fuga atque cumque a.
            Et, fugit? Blanditiis, obcaecati similique? Sit blanditiis voluptatem nihil alias temporibus deserunt atque, illum, reprehenderit exercitationem
             nulla officia cumque, consequatur totam. Laboriosam sit tenetur alias odit explicabo animi eligendi quasi.
            Exercitationem expedita aliquid, corrupti voluptate officiis dicta fuga quidem eum quae repellendus odio nulla, hic amet suscipit repudiandae, 
            vero dolorum fugiat itaque voluptates aut dignissimos omnis nostrum quod nemo! Odit.
        </p>

        <!-- Related Post -->
        <div class="row justify-content-center">
        <h2>Related Post</h2>    
    
        <!-- post -->
            <div class="col-md-5 col-sm-10">
            <div class="row"> 
                <div class="col-md-3 col-sm-10">
                     <a href="#"><img src="images/smiling-lady.jpg" class="img-fluid img-thumbnail" width="100" height="50" alt=""></a>
                </div>
            <div class="col-md-9 col-sm-10 ">
                <a href=""><h5>Another problem just occured with our education system in nigeria</h5></a>
                    </div>              
            </div>
            </div>
<!-- //post -->


                <!--post  -->
            <div class="col-md-5 col-sm-10">
            <div class="row"> 
                <div class="col-md-3 col-sm-10">
                     <a href="#"><img src="images/smiling-lady.jpg" class="img-fluid img-thumbnail" width="100" height="50" alt=""></a>
                </div>
            <div class="col-md-9 col-sm-10 ">
                <a href=""><h5>Another problem just occured with our education system in nigeria</h5></a>
                    </div>              
            </div>
            </div>
            <!-- //post -->
        </div>
        <!-- // Related Post -->
        <hr>
    <!-- comment  -->
    <div class="row my-4 justify-content-center">
        <h2 class="badges bg-danger">Post  A comment</h2>

        <div class="col-md-10">  <form action="" class="form">
            <div class="form-group mb-3">
                <label for="">Full Name:</label>
                <input type="text" class="form-control " placeholder="Your fullname">
            </div>

            <div class="form-group mb-3">
                <label for="">Email Address:</label>
                <input type="text" class="form-control " placeholder="Your fullname">
            </div>
            <div class="form-group mb-3">
                <label for="Comment">Comment</label>
                <textarea name="comment" id="" cols="30" class="form-control" rows="10"></textarea>
            </div>

            <div class="form-group">
                <input  class="btn form-control btn-success" value="Comment" type="submit">
            </div>
        </form> </div>
       
    </div>
    <!-- //comment -->
            </div>
                <!--// News Content -->

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