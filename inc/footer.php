<div class="row bg-dark p-5 d-flex justify-content-center" id="footer">
    
       
                    <div class="col-md-3 col-sm-10">
                        <h3 class="text-light">Main-Menu</h3>
                        <ul class="">
                        <a href="Home.php ?>" class="nav">Home</a>
                        <?php
                       $sel_cart = $dbc -> query("SELECT * FROM category");
                    foreach ($sel_cart as $cart):
                        $cart_id= $cart['cart_id'];
                        $cart_name = $cart['cart_name'];
                        
                    ?>
                        <a href="category.php?cart_id=<?php echo $cart['c_slug'] ?>" class="nav"><?php echo $cart_name ?></a>
                        
                    <?php endforeach ?>
                         
                        </ul>
                    </div>


                    <div class="col-md-3 col-sm-10">
                        <h3 class="text-light">Useful Link</h3>
                        <ul class="">
                            <li ><a href="#">Category's</a></li>
                            <li><a  href="#newsletter">Subscribe to our newsletter</a></li>
                            
                        </ul>
                    </div>


                    <div class="col-md-3 col-sm-10">
                        <h3 class="text-light">Social Media Link</h3>
                        <ul class=" d-flex flex-column  ">
                        <a href=""> <i class=" my-2 text-primary mx-2 fab fa-facebook"></i> Facebook</a>
                        <a href=""> <i class=" my-2 text-danger fab fa-youtube mx-2"></i>Youtube</a>
                        <a href=""> <i class=" my-2 text-primary fab fa-twitter mx-2"></i> Twitter</a>
                        <a href=""> <i class=" my-2 text-success  fab fa-whatsapp mx-2"></i>whatsapp</a>
                   
                        </ul>
                    </div>

                    <div class="col-md-3 col-sm-10">
                        <h3 class="text-light">Contact Us</h3>
                        <ul class="">
                            <li fas fa-phone><a href="">07063516699</a></li>
                            <li class="fas fa-map"><a href="#">Orita sabo</a></li>
                         
                        </ul>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.074918023985!2d4.566931014098811!3d7.78188150941552!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1037895c78efeac5%3A0xac5ed308fc48ad34!2sOIC%20Hub!5e0!3m2!1sen!2sng!4v1648209131136!5m2!1sen!2sng" 
                            width="150" height="150" style="border:0;" allowfullscreen="" loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>

                </div>

        <div class="row bg-dark border d-flex justify-content-evenly p-3 footer-f">
            
            <!-- <div class="col-md-5">   <strong class="ps-3 text-light py-3">Design By Kollybright 2022 </strong> </div>
            <div class="col-md-5">  <strong class="ms-3 ps-5 text-light py-3">Design By Kollybright 2022 </strong> </div> -->
    
        </div>