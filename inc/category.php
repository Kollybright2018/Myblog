
<div class="col-md-3 col-sm-10">
                <div class="row justify-content-center bg-light">
                    <h3>Category</h3>
                   
                       <div class="list-group">
                           <?php
                       $sel_cart = $dbc -> query("SELECT * FROM category");
                    foreach ($sel_cart as $cart):
                        $cart_id= $cart['cart_id'];
                        $cart_name = $cart['cart_name'];
                        $c_slug = $cart['c_slug'];                        
                    ?>
                      <b> <a href="category.php?cart_id=<?php echo $c_slug ?>" class="list-group-item my-2 bg-info  list-item-group-action"><?php echo $cart_name ?></a>
                      </b>              
                    <?php endforeach ?>
                            <hr>
                       </div>
                       <h3 class="pt-4 mt-4">Tags</h3>
                       <hr>
                       <div class="list-group-horizontal"> 
                        <span class="badge bg-primary p-1">Tech </span>
                        <span class="badge bg-danger p-1">lorem </span>
                        <span class="badge bg-info p-1"> Are you there </span>
                        <span class="badge bg-success p-1">serious type</span>
                        <span class="badge bg-warning p-1"> Are you there </span>
                        <span class="badge bg-success p-1">Tech </span>
                    </div>   
                   
                    <h3 class="pt-4 mt-4">Recent Post </h3>
                     <hr>
                     <?php  
                     $status = "published";
$select = $dbc -> prepare("SELECT * FROM post 
                        INNER JOIN category WHERE category.cart_id = ? AND
                        post.cart_id = category.cart_id AND post.p_status = ?  ORDER BY  RAND() LIMIT 5  ") ;
 $select -> bind_param("is", $category, $status); 
 $select -> execute ();
 $result= $select ->  get_result();
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
                ?>   

                    <div class="row "> 
                        <div class="col-md-4">
                            <img src="./admin/<?php echo $image ?>" height="150" alt="" class="img-fluid  img-thumbnail">    
                        </div>
                        <div class="col-md-8">
                             <h5> <a href="news.php?news=<?php echo $slug ?> "> <?php echo $title ?> </a></h5>
                        </div>
                    </div>
                <?php endforeach ?>
                    </div>
                </div>
             <!-- // col-md-3 -->
        </div>