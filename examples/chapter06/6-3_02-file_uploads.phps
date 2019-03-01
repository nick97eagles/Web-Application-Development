<!DOCTYPE html>
<html>
  <head>
    <title>File Upload</title>
    <meta charset="UTF-8" />
    <link rel="stylsheet" href="6-2_03-styling_forms.css"/>
  </head>

  <body>

    <h1>File Upload</h1>    
    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post" enctype="multipart/form-data"> 
      <p>
        <label for="fileToUpload">Upload Favorite Image:</label>
        <input type="file" name="FileToUpload" />
      </p>
      <input type="submit" value="Upload" name="upload"/>
    </form>

    <h2>Results</h2>
    <pre>
<?php

  if(isset($_FILES['FileToUpload']['name'])) {
      
    $uploadOk = 1;
    $target_dir = dirname($_SERVER['SCRIPT_FILENAME']);
    $target_file = $target_dir . '/' .  basename($_FILES["FileToUpload"]["name"]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		     

    // Check if image file is a actual image or fake image
    if(isset($_POST["upload"])) {
      $check = getimagesize($_FILES["FileToUpload"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".\n";
        $uploadOk = 1;
      } else {
        echo "File is not an image.\n";
        $uploadOk = 0;
      }
    }

    // Check if file already exists
    if(file_exists($target_file)) {
      echo "Sorry, file already exists.\n";
      $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["FileToUpload"]["size"] > 500000) {
      echo "Sorry, your file is too large.\n";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.\n";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.\n";
	
    // if everything is ok, try to upload file
    } else if (move_uploaded_file($_FILES["FileToUpload"]["tmp_name"], $target_file)) {
	
      echo "The file ". basename( $_FILES["FileToUpload"]["name"]). " has been uploaded.\n";
    } else {
      echo "Sorry, there was an error uploading your file.\n";
    }
  }

?>
    </pre>
  
    <h2>REQUEST variable</h2>
    <pre>    
<?php
  
  print_r($_REQUEST);

?>
    </pre>

    <h2>FILES variable</h2>
    <pre>    
<?php
  
  print_r($_FILES);

?>
    </pre>
    
    <p><a href="https://validator.w3.org/check/referer">validate me</a></p>
  </body>
</html>
