<!-- <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
        <a href="index.php" class="navbar-brand logo"> GB </a>
        <button class="navbar-toggler" data-bs-target="#collapsibleNavbar" data-bs-toggle="collapse" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="collapsibleNavbar">
        <ul class="navbar-nav ">
            <li class="nav-item px-4  "><a class="nav-link" href="#">Home</a></li>
            <li class="nav-item px-4 "><a class="nav-link" href="#">Education</a></li>
            <li class="nav-item px-4 "><a class="nav-link" href="#">Sport</a></li>
            <li class="nav-item px-4 "><a class="nav-link" href="#">Education</a></li>
            <li class="nav-item  "><a class="nav-link" href="#">Contact Us</a></li>
        </ul> -->

       <!-- <form action="" class="d-flex px-4">
       <input class="form-control me-2" type="text" placeholder="Search">
        <button class="btn btn-primary" type="button">Search</button>
       </form>   -->
     <!-- </div>
    </div>
    </nav> -->


<nav class="navbar  navbar-expand-sm bg-dark  navbar-dark">
                <div class="container-fluid justify-content-center">
                    
               <ul class="navbar-nav d-flex justify-content-center">
                    <li class=" px-3 nav-item"><a class="active nav-link" href="index.php">Home</a></li>
                    <?php
                    $sel_cart = $dbc -> query("SELECT * FROM category");
                    foreach ($sel_cart as $cart):
                        $cart_id= $cart['cart_id'];
                        $cart_name = $cart['cart_name'];
                        $slug = $cart['c_slug'];
                        $_SESSION['cart_name'] =  $cart['cart_name']; 
                    ?>
                    <li class="px-3  nav-item"><a class=" nav-link" href="category.php?cart_id=<?php echo $slug ?>"><?php echo $cart_name ?></a></li>
                    <?php endforeach ?>
                    <li class="px-3  nav-item"><a class="  nav-link" href="#footer">Contact Us.</a></li>

                </ul>
                 </div>
      </nav>