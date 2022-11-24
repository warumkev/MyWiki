<?php

    $host = "localhost";
    $port = "5432";
    $db = "myWiki";
    $user = "postgres";
    $pw = "IchbinKevin03.";
    $connStr = "host=$host port=$port dbname=$db user=$user password=$pw";

    $dbConn = pg_connect($connStr);

    if(!$dbConn) {
        echo "Ein Fehler ist aufgetreten.\n";
        exit;
    }

    // Suchfunktion

    if(isset($_GET['search'])) {

        $keyWord = $_GET['search'];
    
        header("Location: ./home.php?keyword=".$keyWord);
    
    } else {
    
        $results = pg_query($dbConn, "SELECT id, title, cover FROM public.posts ORDER BY id");
    
    }
    
    if(isset($_GET['keyword'])) {
    
        $query = $_GET['keyword'];
    
        $results = pg_query($dbConn, "SELECT id, title, cover FROM public.posts WHERE title LIKE '%$query%'");
    
    } else {
    
    $results = pg_query($dbConn, "SELECT id, title, cover FROM public.posts");
    
    }

    // Beiträge hochladen
    
    $uploadSuccess = False;

    if (isset($_POST["post"])){
    
      $currentDirectory = getcwd();
        $uploadDirectory = "/img/";
    
        $errors = [];
    
        $fileExtensionsAllowed = ['jpeg','jpg','png']; 
    
        $fileName = $_FILES['coverName']['name'];
        $fileSize = $_FILES['coverName']['size'];
        $fileTmpName  = $_FILES['coverName']['tmp_name'];
        $fileType = $_FILES['coverName']['type'];

        $tmp = explode('.',$fileName);

        $fileExtension = strtolower(end($tmp));
    
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
              $uploadSuccess = True;
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