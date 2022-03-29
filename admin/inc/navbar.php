<div class="row bg-primary " >
            <div class="col-md-4 p-3">
              <strong> <a href="dashboard.php" class="text-light p-3" ><span class=" ms-3 fas fa-home"> </span> Home</a> </strong>
            </div>
            <div class="col-md-4 p-3 ">
            <strong> 
                <?php 
                $status = "pending";
                $select= $dbc -> prepare("SELECT * FROM comment WHERE c_status = ? ");
                $select -> bind_param("s", $status);
                $select -> execute();
                $count = $select -> get_result() -> num_rows; 
                ?>
                <a href="comment.php" class="text-warning p-3" >
                    <span class=" ms-3 fas fa-bell"> </span> Notifications </a> <span class="badge bg-danger"><?php echo $count ?> New Comment</span> </strong>
            
            </div>
            <div class="col-md-4 p-3 ">
            <strong> <a href="inc/logout.php" class="text-danger p-3" ><span class=" ms-3 fas fa-power-off"> </span> Log Out</a> </strong>   
               <!-- <a href="#" class="link">Log Out</a> -->
            </div>
        </div>