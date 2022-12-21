<?php
session_start();
include('./includes/connect.php');

if (!isset($_SESSION['loggedin'])) {
  header("Location: home.php");
}

if (isset($_GET['p'])) {
  $postid = $_GET['p'];

  $results = pg_query($dbConn, "SELECT title, body, cover_image_url, views, author_id FROM public.posts WHERE id=$postid");

  $row = pg_fetch_assoc($results);

  $views = $row['views'];

  $newViews = $views + 1;

  $cover = $row['cover_image_url'];
  $authorid = $row['author_id'];

  $getAuthor = pg_query($dbConn, "SELECT username FROM public.users WHERE id = '$authorid'");

  $cardAuthor = pg_fetch_assoc($getAuthor);

  pg_query($dbConn, "UPDATE public.posts SET views=$newViews WHERE id=$postid");

}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MyWiki | Beitrag erstellen</title>
  <link rel="icon" type="image/x-icon" href="assets/brand/wikiLogo.svg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

  <?php include('./components/navbar.php'); ?>

  <br>

  <div class="container">
    <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <img src="./assets/brand/wikiLogo.svg" class="rounded mx-auto d-block" height="100px"><br>
          <h1 class="fw-light">Edit this post</h1>
          <p class="lead text-muted">Here you can edit the selected post on myWiki.</p>
        </div>
      </div>
    </section>
    <?php if ($updateSuccess == True) { ?>

    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Changed successfully!</h4>
      <p>Your changes have been successfully added to the database and can now be viewed by anyone.
        Hurray!</p>
      <hr>
      <p>Thanks for your contribution!</p>

    </div>

    <?php } else {
    } ?>
    <form class="row g-3" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Please enter the title."
          value="<?php echo $row['title']; ?>" name="title">
      </div>
      <div class="mb-3">
        <label for="content" class="form-label">Content</label> <a href="https://www.markdownguide.org/cheat-sheet/"
          target="_blank"><span class="badge bg-warning">We support basic markdown syntax.</span></a>
        <textarea class="form-control" id="content" rows="3" placeholder="Please enter the content." name="content">
          <?php 
            $cont = $row['body'];
            $inhalt = str_replace("<br />", "", $cont);
            echo $inhalt;
          ?>
          </textarea>
      </div>
      <!-- <div class="input-group mb-3"> -->
      <!-- <input type="file" class="form-control" name="coverName" id="fileToUpload"> -->
      <!-- </div> -->
      <div class="col-auto">
        <input type="submit" class="btn btn-primary mb-3" name="update" value="Update post">
      </div>
    </form>
    <div class="d-none">
    </div>

    <?php include('./components/footer.php'); ?>


  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
    integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk"
    crossorigin="anonymous"></script>
</body>

</html>