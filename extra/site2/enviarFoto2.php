<html>
<head>
   <title>Multiple Upload</title>
</head>
<body>
   <form action="#" method="POST" enctype="multipart/form-data">
      <input type="file" name="fileUpload[]" multiple>
      <input type="submit" value="Enviar">
   </form>
</body>
</html>
<?php
   if(isset($_FILES['fileUpload']))
   {
      require 'WideImage/WideImage.php';

      date_default_timezone_set("Brazil/East");

      $name     = $_FILES['fileUpload']['name'];
      $tmp_name = $_FILES['fileUpload']['tmp_name'];

      $allowedExts = array(".gif", ".jpeg", ".jpg", ".png", ".bmp");

      $dir = './../biblioteca/up/';

      for($i = 0; $i < count($tmp_name); $i++)
      {
         $ext = strtolower(substr($name[$i],-4));

         if(in_array($ext, $allowedExts))
         {
            $new_name = date("Y.m.d-H.i.s") ."-". $i . $ext;

            $image = WideImage::load($tmp_name[$i]);

            $image = $image->resize(170, 180, 'outside');
            $image = $image->crop('center', 'center', 170, 180);

            $image->saveToFile($dir.$new_name);
         }
      }
   }
?>