<?php
session_start();
include_once('include/db.php');
require ('include/function.php');
  include('include/head.php');
  $error = [];
  $message;
 
if (isset ($_POST['login'])) {
    if (empty($_POST['email'])) {
        $error['email-e']= "your Email cannot be empty";
}else {
    $email = treat($_POST['email']);
   $check = mysqli_query($dbc, "SELECT email FROM users ");
}
if (empty($_POST['pwd'])) {
    $error['pwd-e']= "Password cannot empty";
}else {
$pwd = treat($_POST['pwd']);
}
    if (! $error) {
        $select = mysqli_query($dbc, "SELECT * FROM users WHERE email= '$email' AND password = '$pwd' ");
       
        if (mysqli_num_rows($select)>0) {
             $fetch= mysqli_fetch_array($select);
             $get_role= $fetch['role'];
            if ($get_role=='user') {
                $_SESSION['id'] =$fetch['id'];
                $_SESSION['fname'] =$fetch['firstname'];
                $_SESSION['lname'] =$fetch['lastname'];
                $_SESSION['email'] =$fetch['email'];
                $_SESSION['no'] =$fetch['phone'];
                $_SESSION['gender'] =$fetch['gender'];
                $_SESSION['image'] =$fetch['image'];
                $_SESSION['role'] =$fetch['role'];
                header('location:id_card.php');
            }else {
                $_SESSION['id'] =$fetch['id'];
                $_SESSION['fname'] =$fetch['firstname'];
                $_SESSION['lname'] =$fetch['lastname'];
                $_SESSION['email'] =$fetch['email'];
                $_SESSION['no']    =$fetch['no'];
                $_SESSION['gender'] =$fetch['gender'];
                $_SESSION['image'] =$fetch['image'];
                $_SESSION['role'] =$fetch['role'];
                header('location:admin.php');
            }
        }else {
          $message= "User Name or password incorrect";
        }
    }else{
      
    }
}
?>



<html lang="en">
<head>
    <?php
    include('include/head.php');
    ?>
    <title>Login || Kollybright </title>
</head>
<body>
     <div class="container">
         <div class="row">
             <div class="col-md-4 mt-5  mx-auto">
                 <form action="" method="POST" >
                     <div class="card">
                         <div class="card-header bg-info">
                             <?php
                             if(isset($message) ):
                             ?>
                             <div class="alert alert-danger alert-dismissible">
                                 <span class="text-center"> <?php echo $message; ?></span>
                                 <button class="btn-close "></button>
                             </div>
                            <?php endif ?>
                            <h2 class="text-center ">Login</h2>
                         </div>
                                    
                         <div class="card-body">

                         <?php
                         err('email-e', $error);
                         ?>
                             <div class="input-group">
                                 <span class="input-group-text fas fa-envelope"></span>
                                 <input type="text" name="email" class="form-control" id="" placeholder="Enter Your Email Address">
                             </div>
                             <?php
                         err('pwd-e', $error);
                         ?>
                             <div class="input-group mt-3">
                                 <span class="input-group-text fas fa-key"></span>
                                 <input type="password" name="pwd" class="form-control " id="" placeholder="Address">
                             </div>
                         </div>
                         <div class="card-footer">
                             <button type="submit" class="btn btn-primary justify-content-center form-control rounded" name="login"> Login </button>
                            <p class="text-center mt-2">New User ? <a class="btn btn-success" href="myform.php">Register</a></p>
                            </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>
</body>
</html>