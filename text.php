<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    

  </head>

  <body>
  <h1>TinyMCE Quick Start Guide</h1>
    <form method="post">
      <textarea id="mytext"></textarea>
    </form>


    <!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->

    <script src="tinymce/js/tinymce/tinymce.min.js"></script>
    <script>
      tinymce.init({
        selector: '#mytext'
      });
    </script>
  </body>
</html>
