<?php
include_once('inc/db.php');
require ('function/function.php');
if (!$_SESSION) {
    header('location:index.php');
}
  $error = [];
  $message;
$slug = $_GET['edit']; 

// select data
$select = $dbc -> prepare("SELECT * FROM post INNER JOIN category
                         WHERE post.slug = ? AND post.cart_id = category.cart_id");
$select -> bind_param("s", $slug);
$select -> execute();
$result = $select -> get_result() ;
$get = $result -> fetch_assoc();

  if (isset($_POST['update'])) {
   
    $image =$_FILES['image']['tmp_name'];

    $img_size =$_FILES['image']['size'];
    $basename= basename($_FILES['image']['name']);
    $path= pathinfo($basename, PATHINFO_EXTENSION);
    $img_folder = "images/".$basename;
     if (empty($_files['image']['tmp_name'])) {
      $img_folder =  $get['p_image'];
    }

    if (empty($_POST['title'])) {
         $error['title_e'] = "Title cannot be empty";
      }else {
        $title = treat($_POST['title']) ;
        $slug = substr(str_replace(" ", "-", $title), 0, 20).date("H-i-s");
      }

      if (empty($_POST['category'])) {
        $error['category_e'] = "Please Select one Category";
     }else {
       $cart_id = treat($_POST['category']) ;
     }

     if (empty($_POST['keyword'])) {
        $error['keyword_e'] = "Keyword cannot be empty";
     }else {
       $keyword = treat($_POST['keyword']) ;
     }

     if (empty($_POST['content'])) {
        $error['content_e'] = "content cannot be empty";
     }else {
       $content = $_POST['content'] ;
     }

if (empty($error)) {
  $insert  = $dbc -> prepare("UPDATE post set
   p_title = ?, p_author = ?, p_keywords = ?, p_image = ?, p_content = ?, cart_id = ?, slug = ?
                WHERE  p_id = ? ");  
  $author= $_SESSION['fname'];  
 
  $insert -> bind_param("sssssisi", $title, $author, $keyword, $img_folder, $content, $cart_id, $slug, $get['p_id']  );

  if ($insert -> execute() ) {
      move_uploaded_file($image, $img_folder);
      $_SESSION['message'] = " Updated Submitted Successfully";
      $_SESSION['class'] = "info";
      header('location:post.php') ; 
  }
   }
  }

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

            <?php
            foreach ($result as $post) :
                $id = $post['p_id'];
                $title = $post['p_title'];
                $content = $post['p_content'];
                $image =$post['p_image'];
                $author =$post['p_author'];
                $keyword =$post['p_keywords']; 
                $category =$post['cart_id'];
                $cart_name = $post['cart_name'];
            ?>

           <div class="form-group">
               <label for=""> Title:</label>
               <input type="text" class="form-control" name="title" value="<?php echo $title ?>" placeholder="title" id="">
           </div>
           <div class="form-group">
               <label for="">Cateogry</label>
               <select name="category" class="form-control" id="">
                   <option value="<?php echo $category ?>"> <?php echo $cart_name ?></option>
                
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
               <input type="text" name="keyword" value="<?php echo $keyword ?>" id="" class="form-control" placeholder="post keyword">
           </div>
                        
           <div class="form-group mt-2">
               <label for="">Image</label>
               <input type="file" name="image" class="form-control">
               <input type="hidden" name="img_name" value="<?php echo $image ?>">
               <img src="<?php echo $image ?>" width="80" height="50" alt="" srcset="">
           </div>
           <div class="form-group mt-2">
               <label for="">Post Descriptions</label>
               <textarea name="content" value="" id="content"><?php echo $content ?></textarea>
           </div>
           <div class="form-group my-3">
               <input type="submit" name="update" class="form-control btn btn-info" value="Update">
           </div>
       </form>
       <?php endforeach
       ?>
        </div>
        <!-- //container -->
      </div>
      <!-- //content -->
        </div>
        <!-- //container row -->

  </div>
 <script src="tinymce/js/tinymce/tinymce.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
 
     <script>
     tinymce.init({
  selector: '#content',
  
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

  // menu: {
  //   file: { title: 'File', items: 'newdocument restoredraft | preview | print ' },
  //   edit: { title: 'Edit', items: 'undo redo | cut copy paste | selectall | searchreplace' },
  //   view: { title: 'View', items: 'code | visualaid visualchars visualblocks | spellchecker | preview fullscreen' },
  //   insert: { title: 'Insert', items: 'image link media template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor toc | insertdatetime' },
  //   format: { title: 'Format', items: 'bold italic underline strikethrough superscript subscript codeformat | formats blockformats fontformats fontsizes align lineheight | forecolor backcolor | removeformat' },
  //   tools: { title: 'Tools', items: 'spellchecker spellcheckerlanguage | code wordcount' },
  //   table: { title: 'Table', items: 'inserttable | cell row column | tableprops deletetable' },
  //   help: { title: 'Help', items: 'help' }

  // },
  // toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media | forecolor backcolor emoticons',

  // plugins: [
  //     'advlist autolink link image lists charmap print preview hr anchor pagebreak',
  //     'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
  //     'table emoticons template paste help'
  //   ],
  //   toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
  //     'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
  //     'forecolor backcolor emoticons | help',
});
    </script>
</body>
</html>