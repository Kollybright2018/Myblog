<?php
session_start();
include_once('inc/db.php');
require ('function/function.php');

  $error = [];
  $message;
 
if (isset ($_POST['login'])) {
    if (empty($_POST['email'])) {
        $error['email-e']= "your Email cannot be empty";
}else {
    $email = treat($_POST['email']);
//    $check = mysqli_query($dbc, "SELECT email FROM users ");
}
if (empty($_POST['pwd'])) {
    $error['pwd-e']= "Password cannot empty";
}else {
$pwd = treat($_POST['pwd']);
}
    if (! $error) {
        $query = "SELECT * FROM admin WHERE admin_email= ? AND admin_password = ? ";
$select = $dbc -> prepare ($query);
$select -> bind_param("ss", $email, $pwd);
$select -> execute();
$get =$select -> get_result();
 $count = $get -> num_rows;
// echo $get['admin_name']. '<br>' ;
       
        if ($count>0) {
             $fetch= $get->fetch_assoc;
                $_SESSION['id'] =$fetch['admin_id'];
                $_SESSION['fname'] =$fetch['admin_name'];
                $_SESSION['email'] =$fetch['admin_email'];
                $_SESSION['pwd']    =$fetch['admin_password'];
                $_SESSION['gender'] =$fetch['gender'];
                $_SESSION['image'] =$fetch['admin_image'];
                header('location:dashboard.php');
         
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
require('inc/head.php')
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

                             <div class="input-group">
                                 <span class="input-group-text fas fa-envelope"></span>
                                 <input type="text" name="email" class="form-control" id="" placeholder="Enter Your Email Address">
                             </div>
                         
                             <div class="input-group mt-3">
                                 <span class="input-group-text fas fa-key"></span>
                                 <input type="password" name="pwd" class="form-control " id="" placeholder="Address">
                             </div>
                         </div>
                         <div class="card-footer">
                             <button type="submit" class="btn btn-primary justify-content-center form-control rounded" name="login"> Login </button>
                           
                            </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>
</body>
</html>