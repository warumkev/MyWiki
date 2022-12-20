<?php
session_start();
include('./includes/connect.php');

if (isset($_GET['id'])) {
  $postid = $_GET['id'];

  $results = pg_query($dbConn, "SELECT id, title, content, cover, views, author FROM public.posts WHERE id=$postid");

  $row = pg_fetch_assoc($results);

  $views = $row['views'];

  $newViews = $views + 1;

  $cover = $row['cover'];
  $authorid = $row['author'];

  $getAuthor = pg_query($dbConn, "SELECT username FROM public.users WHERE id = '$authorid'");

  $cardAuthor = pg_fetch_assoc($getAuthor);

  pg_query($dbConn, "UPDATE public.posts SET views=$newViews WHERE id=$postid");

} else {
  return;
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MyWiki |
    <?php echo $row['title']; ?>
  </title>
  <link rel="icon" type="image/x-icon" href="assets/brand/wikiLogo.svg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

  <?php include('./components/navbar.php'); ?>

  <div class="container">
    <br>
    <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <img src="./img/<?php echo $row['cover']; ?>" class="rounded mx-auto d-block img-thumbnail"
            style="height: 13rem; object-fit: cover;" alt="./img/<?php echo $row['cover']; ?>"><br>
          <h1 class="fw-light">
            <?php echo $row['title']; ?> <a class="link-warning" href="edit.php?p=<?php echo $row['id']; ?>"><svg
                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil"
                viewBox="0 0 16 16">
                <path
                  d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
              </svg></a>
          </h1>
          <p class="lead text-muted">Author: <a class="link-warning" style="text-decoration: none;" href="home.php?authorid=<?php echo $row['author']; ?>">
              <?php echo $cardAuthor['username']; ?>
            </a></p>
        </div>
      </div>
    </section>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <?php
            include("./includes/parsedown-1.7.4/Parsedown.php");

            echo Parsedown::instance()
              ->setSafeMode(true)
              ->text($row['content']);
            ?>
          </td>
        </tr>
      </tbody>
    </table>
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