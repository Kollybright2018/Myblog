<?php
include_once('inc/db.php');
require ('function/function.php');

if (!$_SESSION) {
    header('location:index.php');
}


  $error = [];
  $message;

  if (isset($_POST['submit'])) {
  
    $image =$_FILES['image']['tmp_name'];
    $img_size =$_FILES['image']['size'];
    $basename= basename($_FILES['image']['name']);
    $path= pathinfo($basename, PATHINFO_EXTENSION);
    $img_folder = "images/".$basename;

    if (empty($_POST['title'])) {
         $error['title_e'] = "Title cannot be empty";
      }else {
        $title = treat($_POST['title']) ;
        $slug = substr(str_replace(" ", "-", $title), 0, 20).date("H-i-s");
      }

      if (empty($_POST['category'])) {
        $error['category_e'] = "Please Select one Category";
     }else {
       $category = treat($_POST['category']) ;
     }

     if (empty($_POST['keyword'])) {
        $error['keyword_e'] = "Keyword cannot be empty";
     }else {
       $keyword = treat($_POST['keyword']) ;
     }

     if (empty($_POST['content'])) {
        $error['content_e'] = "content cannot be empty";
     }else {
       $content = treat($_POST['content']) ;
     }


if (empty($error)) {
  $insert  = $dbc -> prepare("INSERT INTO post (p_title, p_author, p_keywords, p_image, p_content, cart_id, slug) 
                        VALUES(?, ?, ?, ?, ?, ?, ?) ");
   
  $author= $_SESSION['fname'];                    
  $insert -> bind_param("sssssis", $title, $author, $keyword, $img_folder, $content, $category, $slug );
  if ($insert -> execute() ) {
      move_uploaded_file($image, $img_folder);
      $_SESSION['message'] = " Post Submitted Successfully";
      $_SESSION['class'] = "info";
      header('location:post.php')   ; 
  }
   

}
  }
// print_r($_POST);
// die;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php
require('inc/head.php')
?>
    <title>New Post Dashboard ||  </title>
</head>
<body>

  <div class="container-fluid admin-container-fluid ">
      <!-- container row -->
        <div class="row">
  <!-- Sidebar -->
     <?php
     require('inc/sidebar.php')
     ?>
      <!-- //sidebar -->
      <!-- Content -->
      <div class="col-md-10 bg-light border">
           <!-- navbar -->
      <?php require ('inc/navbar.php')?>
        <!-- //navbar -->

        <!-- container -->
        <div class="container">
       <h5 class="text-center badge bg-success mt-3">Write Post</h5>
       <?php if(isset($message)) : ?>
        <div class="alert alert-<?php echo $class ?>  alert-dismissible">
            <strong> <?php echo $message ?> Click
            <a href="post.php" class="alert-link  badge bg-Warning"> Here </a>  to check Your Post</strong>
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php endif ?>
       <form action="" enctype="multipart/form-data" method="post">

           <div class="form-group">
               <label for=""> Title:</label>
               <input type="text" class="form-control" name="title" placeholder="title" id="">
           </div>
           <div class="form-group">
               <label for="">Cateogry</label>
               <select name="category" class="form-control" id="">
                   <option value="">Select Cateogry</option>
                   <?php $select = $dbc -> query("SELECT * FROM category") ; 
                    foreach ($select as $cart ) :
                        $cart_name= $cart['cart_name'] ;
                        $cart_id = $cart['cart_id'];
                   ?>
                   <option value="<?php echo $cart_id ?>"><?php echo $cart_name ?></option>

                   <?php endforeach ?>
               </select>
           </div>
           <div class="form-group mt-2">
               <label for="">Keywords</label>
               <input type="text" name="keyword" id="" class="form-control" placeholder="post keyword">
           </div>

           <div class="form-group mt-2">
               <label for="">Image</label>
               <input type="file"  name="image" class="form-control">
           </div>
           <div class="form-group mt-2">
               <label for="">Post Descriptions</label>
               <textarea  name="content" class="content" ></textarea>
           </div>
           <div class="form-group my-3">
               <input type="submit" name="submit" class="form-control btn btn-success" value="Submit">
           </div>
       </form>
        </div>
        <!-- //container -->
      </div>
      <!-- //content -->
        </div>
        <!-- //container row -->

  </div>
  <!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->
    <script src="tinymce/js/tinymce/tinymce.min.js"></script>
     <script>
     tinymce.init({
  selector: '.content',
plugins: [
    'autolink',
    'autoresize',
    'codesample',
    'link',
    'lists',
    'media',
    'powerpaste',
    'table',
    'image',
    'quickbars',
    'codesample',
    'help'
  ],
  // toolbar: true,
  // quickbars_insert_toolbar: 'quicktable image media codesample',
  // quickbars_selection_toolbar: 'bold italic underline | formatselect | bullist numlist | blockquote quicklink',
  // contextmenu: 'undo redo | inserttable | cell row column deletetable | help',
  // powerpaste_word_import: 'clean',
  // powerpaste_html_import: 'clean',
  
});
    </script>
 
   
</body>

</html>