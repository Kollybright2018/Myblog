<?php
session_start();
// include_once('include/db.php');
// require ('include/function.php');
//   include('include/head.php');
  $error = [];
  $message;
 
// if (isset ($_POST['login'])) {
//     if (empty($_POST['email'])) {
//         $error['email-e']= "your Email cannot be empty";
// }else {
//     $email = treat($_POST['email']);
//    $check = mysqli_query($dbc, "SELECT email FROM users ");
// }
// if (empty($_POST['pwd'])) {
//     $error['pwd-e']= "Password cannot empty";
// }else {
// $pwd = treat($_POST['pwd']);
// }
//     if (! $error) {
//         $select = mysqli_query($dbc, "SELECT * FROM users WHERE email= '$email' AND password = '$pwd' ");
       
//         if (mysqli_num_rows($select)>0) {
//              $fetch= mysqli_fetch_array($select);
//              $get_role= $fetch['role'];
//             if ($get_role=='user') {
//                 $_SESSION['id'] =$fetch['id'];
//                 $_SESSION['fname'] =$fetch['firstname'];
//                 $_SESSION['lname'] =$fetch['lastname'];
//                 $_SESSION['email'] =$fetch['email'];
//                 $_SESSION['no'] =$fetch['phone'];
//                 $_SESSION['gender'] =$fetch['gender'];
//                 $_SESSION['image'] =$fetch['image'];
//                 $_SESSION['role'] =$fetch['role'];
//                 header('location:id_card.php');
//             }else {
//                 $_SESSION['id'] =$fetch['id'];
//                 $_SESSION['fname'] =$fetch['firstname'];
//                 $_SESSION['lname'] =$fetch['lastname'];
//                 $_SESSION['email'] =$fetch['email'];
//                 $_SESSION['no']    =$fetch['no'];
//                 $_SESSION['gender'] =$fetch['gender'];
//                 $_SESSION['image'] =$fetch['image'];
//                 $_SESSION['role'] =$fetch['role'];
//                 header('location:admin.php');
//             }
//         }else {
//           $message= "User Name or password incorrect";
//         }
//     }else{
      
//     }
// }
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
                <div class="col-md-12 table-hover table-responsive">
                     <table class="table  table-bordered table-striped">
            <thead>
                <tr>
                <th>S/N</th>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>Category</th>
                <th>Keywords</th>
                <th>Admin</th>
                <th>Date</th>
                <th class="text-center" colspan="2">Action</th>
                </tr>  
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>A yahooo</td>
                    <td> <p> Lorem ipsum dolor sit amet consectetu Laboriosam a libero aliquid. </p> </td>
                    <td><img src="images/gb cc.JPG" class="img-fluid" width="80" height="50" alt="" srcset=""></td>
                    <td>Tech</td>
                    <td>Yahoo, Technology</td>
                    <td>kollybright</td>
                    <td> 20-03-2022</td>
                    <td> <a href=""> <i class="fas fa-pen text-success"></i> Edit</a></td>
                    <td><a href=""> <i class="fas fa-trash text-danger"></i> Delete</a></td>
                </tr>
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