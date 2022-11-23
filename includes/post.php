<?php

if (isset($_POST["post"])){

  $currentDirectory = getcwd();
    $uploadDirectory = "/img/";

    $errors = [];

    $fileExtensionsAllowed = ['jpeg','jpg','png']; 

    $fileName = $_FILES['coverName']['name'];
    $fileSize = $_FILES['coverName']['size'];
    $fileTmpName  = $_FILES['coverName']['tmp_name'];
    $fileType = $_FILES['coverName']['type'];
    $fileExtension = strtolower(end(explode('.',$fileName)));

    $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName); 

      if (! in_array($fileExtension,$fileExtensionsAllowed)) {
        $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
      }

      if ($fileSize > 4000000) {
        $errors[] = "File exceeds maximum size (4MB)";
      }

      if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
          echo "The file " . basename($fileName) . " has been uploaded";
        } else {
          echo "An error occurred. Please contact the administrator.";
        }
      } else {
        foreach ($errors as $error) {
          echo $error . "These are the errors" . "\n";
        }
      }

      $newTitle = $_POST['title'];
      $newContent = $_POST['content'];
      
      
      pg_query($dbConn, "INSERT INTO public.posts(id, title, content, cover) VALUES (DEFAULT, '$newTitle', '$newContent', '$fileName')");    

    }
    
?>