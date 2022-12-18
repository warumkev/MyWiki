<?php
session_start();
include('./includes/connect.php');

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MyWiki | Startseite</title>
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
      <h1 class="display-4"><span class="text-warning">my</span>Wiki</h1>
      <p class="lead">Welcome to myWiki! We are a business-driven resource for all sort information. Our goal is to
        provide a comprehensive and accurate collection of knowledge about everything, including task specific topics or
        just genereal information. Whether you're a beginner or an expert, we hope you'll find something of value on our
        site.

        Our wiki is constantly growing and evolving, with new content being added and updated all the time. We encourage
        our employees to contribute and share their own knowledge and experiences. So don't be afraid to jump in and
        start
        editing – every contribution helps to make our wiki even better.

        Thank you for visiting and we hope you enjoy your time on our site!</p>
      <p class="lead">
        <a class="btn btn-dark btn-lg" href="about.php" role="button">About this project</a>
      </p>
      <hr class="my-4">
      <?php if (!isset($_SESSION['loggedin'])) { ?>
      <p>Want to contribute to our wiki? <a class="link-warning" style="text-decoration: none;" href="register.php">Sign
          up</a> to create and edit pages. It's free and easy to get started! <span class="text-muted"> You already have
          an account? <a class="link-warning" style="text-decoration: none;" href="login.php">Log in</a> </span></p>
      <?php } else {
      } ?>

    </div>
    <br>
    <div class="row">
      <?php while ($row = pg_fetch_assoc($results)) {

        $titel = $row['title'];
        $id = $row['id'];
        $cover = $row['cover'];
        $content = $row['content'];
        $authorid = $row['author'];

        $getAuthor = pg_query($dbConn, "SELECT username FROM public.users WHERE id = '$authorid'");

        $cardAuthor = pg_fetch_assoc($getAuthor);

      ?>
      <div class="col-sm-6" style="width: 16rem;">
        <div class="card mb-4 text-dark bg-light border border-black">
          <img src="./img/<?php echo $cover; ?>" class="card-img-top img-thumbnail bg-dark border-dark"
            style="height: 14rem; object-fit: cover;" alt="/img/<?php echo $cover; ?>">
          <div class="card-body">
            <h5 class="card-title">
              <?php echo $titel; ?>
            </h5>
            <p class="card-text">
              By:
              <?php echo $cardAuthor['username']; ?>
            </p>
            <a href="post.php?id=<?php echo $id; ?>" class="btn btn-outline-dark">Read more</a>
          </div>
        </div>
      </div>
      <?php } ?>
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