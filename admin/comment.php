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
        <div class="row bg-primary d-flex flex-row" >
            <div>
                <p>Home</p>
            </div>
            <div>
                <p>Log-Out</p>
               <!-- <a href="#" class="link">Log Out</a> -->
            </div>
        </div>

        <!-- container -->
        <div class="container">
        <table class="table bordered stripe">
            <thead>
                <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Email</th>
                <th>Post Title</th>
                <th>Category</th>
                <th>Comment</th>
                <th>Date</th>
                <th class="text-center" rowspan="2">Action</th>
            
                </tr>  
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>kolade</td>
                    <td> <p> Kollybright@gmail.com </p> </td>
                    <td>A yahooo boy</td>
                    <td>News</td>
                    <td>Its cannot not be done pls</td>
                    <td> 20-03-2022</td>
                    <td> <a href=""> <i class="fas fa-pen text-success"></i> Edit</a></td>
                    <td><a href=""> <i class="fas fa-trash text-danger"></i> Delete</a></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
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