            <?php 
                // $cart_name = "Education";
                $select = $dbc -> query ("SELECT * FROM post 
                         INNER JOIN category WHERE post.cart_id = category.cart_id AND post.p_status='published' ORDER BY post.p_id DESC Limit 3 ") ;
              ?> 

            <div class="col-md-3 ">
            <div class="row justify-content-center bg-light">
                <h3>Latest News</h3>
             <?php  
              foreach ($select as $post) :
                    $p_id = $post['p_id'] ;
                    $title = $post['p_title'] ;
                    $content = $post['p_content'] ;
                    $image = $post['p_image'] ;
                    $category = $post['cart_id'] ;
                    $keyword = $post['p_keywords'] ;
                    $author = $post['p_author'] ;
                    $date = $post['p_date'] ;
                ?>              
          
                    <div class="col-md-12">

                         <hr>
                         <h3><a href="news.php?news=<?php echo $p_id?>"><?php echo $title?></a></h3>
                        <img src="./admin/<?php echo $image?>" width="500" height="100" class="img-fluid img-thumbnail" alt="Smilling Lady">
                       
                    </div>
                    <div class="col-md-10 p-3">
                        <p><?php echo substr( $content, 0, 200)?>?.....       
                               <a href="news.php?news=<?php echo $p_id?>" class="">Read More</a></p>
                       <strong>Post By  <span class="text-danger"> <?php echo $author?> <br> </span> <i>  <?php echo $date?> </i></strong>
                       <span class="badge bg-danger">Education</span>
                    </div>
                      <?php endforeach ?>
            </div>
            </div>

