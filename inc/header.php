<?php

// if (isset($_GET['search'])) {
//     $search = treat($_GET['search_text']);
//     $input = "%{$search}%";
//   $status = "published";
// $select = $dbc -> prepare("SELECT * FROM post 
// INNER JOIN category WHERE post.p_title LIKE  ? OR p_keywords LIKE ?  AND post.cart_id = category.cart_id  AND post.p_status = ? ") ;
// $select -> bind_param("sss", $input, $input, $status); 
// $select -> execute ();
// $result= $select ->  get_result() ;
// header('location:search.php?'.$search);
// }


?>

<header>



<div class="container-fluid bg-danger">
            <div class="container">
               <div class="row d-flex  justify-content-between header">
                <div class="col-md-3">
                   <a href=""> <img src="images/logo.png" width="80" height="" class="nav-brand" alt=""> </a>
                   
                </div>

                <div class="col-md-4"> 
                    <form action="search.php" method="GET" class="form form-inline">
                        <div class="input-group mt-4">
                            <input type="text" name="search_text" class="form-control">
                            <input type="submit" name="search" value="Go" class="btn btn-success" >
                        </div>
                    </form>
                </div>

                <div class="col-md-3">
                    <div class="s-head mt-4 "> 
                        <a class="px-2" href=""> <i class="text-dark fab fa-facebook"></i></a>
                        <a class="px-2" href=""> <i class="text-dark fab fa-youtube"></i></a>
                        <a class="px-2" href=""> <i class="text-dark fab fa-twitter"></i></a>
                        <a class="px-2" href=""> <i class="text-dark fab fa-google-play"></i></a>
                    </div>
                </div>
            </div>
          
            </div>
        
             
        </div> 
         </header>

         <style>
    a{
    text-decoration: none;
    color: orangered;
    font-size: 20px;
    font-weight: 500;
}
.fab{
    font-size: 25px;
}
</style>
                
           

   