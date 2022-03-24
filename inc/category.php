<div class="col-md-3 ">
                <div class="row justify-content-center bg-light">
                    <h3>Category</h3>
                   
                       <div class="list-group">
                            <hr>
                           <a href="#" class="list-group-item list-item-group-action">Home</a>
                           <a href="#" class="list-group-item list-item-group-action">Home</a>
                           <a href="#" class="list-group-item list-item-group-action">Home</a>
                           <a href="#" class="list-group-item list-item-group-action">Home</a>
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
                ?>   

                    <div class="row "> 
                        <div class="col-md-4">
                            <img src="./admin/<?php echo $image ?>" height="150" alt="" class="img-fluid  img-thumbnail">    
                        </div>
                        <div class="col-md-8">
                             <h5> <a href="news.php?news=<?php echo $p_id ?> "> <?php echo $title ?> </a></h5>
                        </div>
                    </div>
                <?php endforeach ?>
                    </div>
                </div>
             <!-- // col-md-3 -->
        </div>