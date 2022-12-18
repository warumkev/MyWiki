<?php
session_start();
include('./includes/connect.php');

if (!isset($_SESSION['isAdmin'])) {
  header("Location: home.php");
}

if (isset($_GET["table"])) {

  $table = $_GET["table"];

  if (strcmp($table, "users") == 0 || strcmp($table, "posts") == 0) {

    pg_query($dbConn, "TRUNCATE public.$table RESTART IDENTITY CASCADE;");

    if (strcmp($table, "users") == 0) {

      pg_query($dbConn, "INSERT INTO public.users(id, username, passwordhash, email, isAdminAccount) VALUES (DEFAULT, 'Admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin@mywiki.local', true);");
      pg_query($dbConn, "INSERT INTO public.users(id, username, passwordhash, email, isAdminAccount) VALUES (DEFAULT, 'User', '81dc9bdb52d04dc20036dbd8313ed055', 'user@mywiki.local', false);");

      header('Location: logout.php');

    } else {

      pg_query($dbConn, "INSERT INTO public.posts(id, title, content, cover, views, author) VALUES (DEFAULT, 'Titel des Beitrags', '# Titel 1<br />\n## Titel 2<br />\n### Titel 3<br />\n`Code-Ausschnitt`<br />\n', DEFAULT, DEFAULT, 1);");
      pg_query($dbConn, "INSERT INTO public.posts(id, title, content, cover, views, author) VALUES (DEFAULT, 'Titel des Beitrags', '# Titel 1<br />\n## Titel 2<br />\n### Titel 3<br />\n`Code-Ausschnitt`<br />\n', DEFAULT, DEFAULT, 2);");

      header('Location: settings.php');
    }
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MyWiki | Settings</title>
  <link rel="icon" type="image/x-icon" href="assets/brand/wikiLogo.svg">
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
          <img src="./assets/brand/wikiLogo.svg" class="rounded mx-auto d-block" height="100px">
        </div>
    </section>
    <div class="jumbotron">
      <h1 class="display-4"><span class="text-warning">my</span>Wiki-Settings</h1>
      <p class="lead">Welcome to the settings page! Here you can customize and manage our website and database settings.
      </p>
      <hr class="my-4">
      <p></p>
    </div>
    <br>
    <?php

    $usersResult = pg_query($dbConn, "SELECT * FROM public.users");

    ?>
    <p class="fs-2"><code class="text-dark">public.users</code></p>
    <button type="button" class="btn btn-warning position-relative" data-bs-toggle="modal" data-bs-target="#trunUsers">
      Reset database
      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
        <?php echo pg_num_rows($usersResult); ?>
      </span>
    </button>

    <div class="modal fade" id="trunUsers" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Confirm process</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            "With this, all data and entries, except for the admin account, in the table 'public.users' will be deleted.
            Are you sure you want to do this?<br><br><span class="text-danger">Warning: You need to log in after
              this.</span>
          </div>
          <div class="modal-footer">
            <form method="post" action="settings.php?table=users">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="post" class="btn btn-warning" name="trunUsers" id="trunUsers">Continue</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <p></p>
    <?php

    $postsResult = pg_query($dbConn, "SELECT * FROM public.posts");

    ?>
    <p class="fs-2"><code class="text-dark">public.posts</code></p>
    <button type="button" class="btn btn-warning position-relative" data-bs-toggle="modal" data-bs-target="#trunPosts">
      Reset database
      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
        <?php echo pg_num_rows($postsResult); ?>
      </span>
    </button>

    <div class="modal fade" id="trunPosts" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Confirm process</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            With this, all data and entries in the table 'public.posts' will be deleted and a standard post will be
            created. Are you sure you want to do this?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <a href="settings.php?table=posts" class="btn btn-warning" name="trunPosts" id="trunPosts">Continue</a>
          </div>
        </div>
      </div>
    </div>
    <?php include('./components/footer.php'); ?>

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