
<div class="row d-flex flex-column bg-light">
                <h2 class="text-danger"> Comments</h2>
          
          <?php 
            $status = "approve";
          $select = $dbc -> prepare("SELECT * FROM comment WHERE p_id = ? AND c_status = ? ") ;
                    $select -> bind_param("is", $p_id, $status);
                    $select -> execute(); 
                    $result= $select -> get_result();
                    if ($result->num_rows ==0 ) :
                  ?>
                   
                        <div class="col comment-bx"> 
                       
                        <div class="">
                            <p class="ms-4 ps-5 text-muted"> No Comment for this post yet</p>
                        </div>
                        <hr>
                </div>
<?php
endif;
            foreach ($result as $comment) :
                $c_id = $comment['c_id'] ;
                $date = $comment['com_date'];
                $name = $comment['c_name'] ;
                $email = $comment['c_email'] ;
                
                 $status = $comment['c_status'] ;
                 $comment = $comment['comment'] ;
        
?>
                <!-- comment bx -->
        <div class="col comment-bx"> 
                <div class="d-flex">
                    <img src="images/smiling-lady.jpg" width="50" height="50" class="img-fluid  rounded-circle" alt="" srcset="">
                <p class="ms-3 mt-3"> <strong> <?php echo $name?> </strong>  <?php echo $date?> </p>
                </div>
                <div class="">
                    <p class="ms-4 ps-5 text-muted"> <?php echo $comment ?> </p>
                </div>
                <hr>
        </div>
        <!-- //coment box -->
        <?php endforeach ?>

  
            </div>