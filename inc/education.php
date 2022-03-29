
                <?php 
                $cart_name = "Education";
                $status = "published";
                $select = $dbc -> prepare("SELECT * FROM post 
                                        INNER JOIN category WHERE category.cart_name = ? AND
                                        post.cart_id = category.cart_id AND post.p_status= ? LIMIT 3 ") ;
                 $select -> bind_param("ss", $cart_name, $status); 
                 $select -> execute ();
                 $result= $select ->  get_result() ;
                                    

              ?> 

            <div class="col-md-3 col-sm-10">
            <div class="row justify-content-center bg-light">
                <h3>Education News</h3>
             <?php  
              foreach ($result as $post) :
                    $p_id = $post['p_id'] ;
                    $title = $post['p_title'] ;
                    $content = $post['p_content'] ;
                    $image = $post['p_image'] ;
                    $category = $post['cart_id'] ;
                    $keyword = $post['p_keywords'] ;
                    $author = $post['p_author'] ;
                    $date = $post['p_date'] ;
                    $slug = $post['slug'];
                    $cart_name = $post['cart_name'];

                ?>              
          
                    <div class="col-md-12">

                         <hr>
                         <h5><a href="news.php?news=<?php echo $slug?>"><?php echo $title?></a></h5>
                        <img src="./admin/<?php echo $image?>" width="500" height="100" class="img-fluid img-thumbnail" alt="Smilling Lady">
                       
                    </div>
                    <div class="col-md-10 p-3">
                        <p><?php echo substr( $content, 0, 100)?>?.....       
                               <a href="news.php?news=<?php echo $slug?>" class="">Read More</a></p>
                       <strong>Post By  <span class="text-danger"> <?php echo $author?> <br> </span> <i>  <?php echo $date?> </i></strong>
                       <span class="badge bg-danger"><?php echo $cart_name?></span>
                    </div>
                      <?php endforeach ?>
            </div>
            </div>