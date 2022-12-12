<?php
include 'credentials.php';

// Datenbankverbindung aufbauen

$connStr = "host=$host port=$port dbname=$db user=$user password=$pw";

$dbConn = pg_connect($connStr);

if (!$dbConn) {
  echo "Ein Fehler ist aufgetreten.\n";
  exit;
}

// Suchfunktion nach Inhalt

if (isset($_GET['search'])) {

  $keyWord = $_GET['search'];

  header("Location: ./home.php?keyword=" . $keyWord);

} else if (isset($_GET['keyword'])) {

  $query = $_GET['keyword'];

  $results = pg_query($dbConn, "SELECT id, title, cover, views, author FROM public.posts WHERE title LIKE '%$query%' ORDER BY id");

} else {

  $results = pg_query($dbConn, "SELECT id, title, cover, views, author FROM public.posts ORDER BY id");

}

// Suchfunktion nach Autor

if (isset($_GET['authorid'])) {

  $authorId = $_GET['authorid'];

  $results = pg_query($dbConn, "SELECT id, title, cover, views, author FROM public.posts WHERE author = '$authorId' ORDER BY id");

}

// Zufälligen Beitrag öffnen

$min = pg_query($dbConn, "SELECT * FROM public.posts WHERE id = (SELECT MIN(id) FROM public.posts)");

$rowMin = pg_fetch_assoc($min);

$max = pg_query($dbConn, "SELECT * FROM public.posts WHERE id = (SELECT MAX(id) FROM public.posts)");

$rowMax = pg_fetch_assoc($max);

$checkRows = pg_num_rows($max);

if ($checkRows < 1) {
} else {
  $randomPost = rand($rowMin['id'], $rowMax['id']);
}

// Beiträge hochladen

$uploadSuccess = False;

if (isset($_POST["post"])) {

  $currentDirectory = getcwd();
  $uploadDirectory = "/img/";

  $errors = [];

  $fileExtensionsAllowed = ['jpeg', 'jpg', 'png'];

  $fileName = $_FILES['coverName']['name'];
  $fileSize = $_FILES['coverName']['size'];
  $fileTmpName = $_FILES['coverName']['tmp_name'];
  $fileType = $_FILES['coverName']['type'];

  $tmp = explode('.', $fileName);

  $fileExtension = strtolower(end($tmp));

  $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName);

  if (!in_array($fileExtension, $fileExtensionsAllowed)) {
    $errors[] = "Bitte lade eine JPEG oder PNG Datei hoch!";
  }

  if ($fileSize > 1900000) {
    $errors[] = "File exceeds maximum size (8MB)";
  }

  if (empty($errors)) {
    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

    if ($didUpload) {
      $uploadSuccess = True;

      
  $newTitle = $_POST['title'];
  $newContent = $_POST['content'];
  $newAuthor = $_SESSION['userid'];

  $newContent = nl2br($newContent);
  $newContent = stripslashes($newContent);


  pg_query($dbConn, "INSERT INTO public.posts(id, title, content, cover, views, author) VALUES (DEFAULT, '$newTitle', '$newContent', '$fileName', DEFAULT, '$newAuthor')");


    } 
  }

}

// Beiträge bearbeiten
$updateSuccess = False;


if (isset($_POST["update"])) {

  $postid = $_GET['p'];
  $newTitle = $_POST['title'];
  $newContent = $_POST['content'];
  $newAuthor = $_SESSION['userid'];

  $newContent = nl2br($newContent);
  $newContent = stripslashes($newContent);

  pg_query($dbConn, "UPDATE public.posts SET title='$newTitle', content='$newContent', author='$newAuthor' WHERE id=$postid");

  header("Location: ./home.php");

}

// Nutzerregistrierung 

$registerSuccess = True;
$passwordMatch = True;
$success = False;
$usernameMatch = False;

if (isset($_POST["register"])) {

  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $passwordCheck = md5($_POST['passwordCheck']);
  $email = $_POST['email'];

  $usernameCheck = pg_query($dbConn, "SELECT username FROM public.users WHERE username LIKE '$username'");

  $usernameExist = pg_num_rows($usernameCheck);

  if (!isset($username) || trim($username) == '' || !isset($password) || trim($password) == '' || !isset($passwordCheck) || trim($passwordCheck) == '') {

    $registerSuccess = False;

  } else if ($_POST['password'] != $_POST['passwordCheck']) {

    $passwordMatch = False;

  }
  if ($usernameExist > 0) {

    $usernameMatch = True;

  } else {
    $success = True;
    $_SESSION['loggedin'] = True;
    pg_query($dbConn, "INSERT INTO public.users(id, username, passwordhash, email) VALUES (DEFAULT, '$username', '$password', '$email')");

    $result = pg_query($dbConn, "SELECT id FROM public.users WHERE username LIKE '$username' AND passwordhash LIKE '$password'");

    $id = pg_fetch_assoc($result);

    $_SESSION['userid'] = $id['id'];

  }
}

// Nutzeranmeldung

$loginCheck = True;

if (isset($_POST["login"])) {

  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $sql = pg_query($dbConn, "SELECT * FROM public.users WHERE username LIKE '$username' AND passwordhash LIKE '$password'");

  $login_check = pg_num_rows($sql);

  if ($login_check > 0) {

    $result = pg_query($dbConn, "SELECT id FROM public.users WHERE username LIKE '$username' AND passwordhash LIKE '$password'");

    $id = pg_fetch_assoc($result);

    $_SESSION['userid'] = $id['id'];
    $_SESSION['loggedin'] = True;
    echo "Login Successfully";

  } else {

    $loginCheck = False;
    
  }

}

?>