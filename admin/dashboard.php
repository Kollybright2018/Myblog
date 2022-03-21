<?php
session_start();
if (!$_SESSION) {
    header('location:index.php');
}

  $error = [];
  $message;
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
        <div class="row bg-primary d-flex flex-row" >
            <div>
                <p>Home</p>
            </div>
            <div>
                <p>Log-Out</p>
               <!-- <a href="#" class="link">Log Out</a> -->
            </div>
        </div>

        <div class="container">
            <!-- bx row -->
        <div class="row justify-content-center gx-5">
           
        <!--bx  -->
                <div class="col-md-4   ">
                    <div class="row bg-warning py-3 my-2 justify-content-center">
                       <div class="col-md-5  col-sm-10">
                           <a href="" class="">
                                 <h4 class="m-3 bx-text">Admin</h4>
                            <p><b>  Kollybright </b></p>
                           </a>
                          
                        </div>
                        <div class="col-md-2  col-sm-10"></div>
                        <div class="col-md-3  col-sm-10">
                            <i class="fas bx-icon fa-user my-3 pe-5"></i>
                        </div>
                        
                    </div>
                </div>
        <!-- //bx -->

          <!--bx  -->
          <div class="col-md-4     ">
                    <div class="row bg-warning py-3 my-2 justify-content-center">
                       <div class="col-md-5  col-sm-10">
                           <a href="" class="">
                                 <h4 class="m-3 bx-text">44</h4>
                            <p><b>  Total Post </b></p>
                           </a>
                          
                        </div>
                        <div class="col-md-2  col-sm-10"></div>
                        <div class="col-md-3  col-sm-10">
                          <a href="">  <i class="fas bx-icon fa-newspaper my-3 pe-5"></i></a>
                        </div>
                        
                    </div>
                </div>
        <!-- //bx -->

          <!--bx  -->
          <div class="col-md-4     ">
                    <div class="row bg-warning py-3 my-2 justify-content-center">
                       <div class="col-md-5  col-sm-10">
                           <a href="" class="">
                                 <h4 class="m-3 bx-text">44</h4>
                            <p><b>  Total Post </b></p>
                           </a>
                          
                        </div>
                        <div class="col-md-2  col-sm-10"></div>
                        <div class="col-md-3  col-sm-10">
                         <a href="">   <i class="fas bx-icon fa-newspaper my-3 pe-5"></i></a>
                        </div>
                        
                    </div>
                </div>
        <!-- //bx -->

           <!--bx  -->
           <div class="col-md-4   ">
                    <div class="row bg-warning py-3 my-2 justify-content-center">
                       <div class="col-md-5  col-sm-10">
                           <a href="" class="">
                                 <h4 class="m-3 bx-text">44</h4>
                            <p><b>  Total Categories </b></p>
                           </a>
                          
                        </div>
                        <div class="col-md-2  col-sm-10"></div>
                        <div class="col-md-3  col-sm-10">
                            <a href="">  <i class="fas bx-icon fa-newspaper my-3 pe-5"></i></a>
                           
                        </div>
                        
                    </div>
                </div>
        <!-- //bx -->

          <!--bx  -->
          <div class="col-md-4     ">
                    <div class="row bg-warning py-3 my-2 justify-content-center">
                       <div class="col-md-5  col-sm-10">
                           <a href="" class="">
                                 <h4 class="m-3 bx-text">44</h4>
                            <p><b>  Total Comment </b></p>
                           </a>
                          
                        </div>
                        <div class="col-md-2  col-sm-10"></div>
                        <div class="col-md-3  col-sm-10">
                          <a href="">  <i class="fas bx-icon fa-comment my-3 pe-5"></i></a>
                        </div>
                        
                    </div>
                </div>
        <!-- //bx -->

          <!--bx  -->
          <div class="col-md-4     ">
                    <div class="row bg-warning py-3 my-2 justify-content-center">
                       <div class="col-md-6  col-sm-10">
                           <a href="" class="">
                                 <h6 class="m-3 bx-text">Log-Out</h6>
                            <p><b>  </b></p>
                           </a>
                          
                        </div>
                        <div class="col-md-2  col-sm-10"></div>
                        <div class="col-md-3  col-sm-10">
                           <a href="#">  <i class="fas bx-icon fa-sign-out-alt my-3 pe-5"></i></a>
                        </div>
                        
                    </div>
                </div>
        <!-- //bx -->
         
         
            </div>
            <!--  //bx row -->
        </div>
      </div>
      <!-- //content -->
        </div>
        <!-- //container row -->

  </div>

  <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>