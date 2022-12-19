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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
        <br><br>
        Our wiki is constantly growing and evolving, with new content being added and updated all the time. We encourage
        our employees to contribute and share their own knowledge and experiences. So don't be afraid to jump in and
        start
        editing – every contribution helps to make our wiki even better.

        Thank you for visiting and we hope you enjoy your time on our site!
      </p>
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
    <?php if ($chatError == True) { ?>

<div class="alert alert-warning" role="alert" style="width: 17rem; float: left;">
    <h4 class="alert-heading">Invalid input!</h4>
</div>

<?php } else{}
 if (isset($_SESSION['loggedin'])) { ?>
      <div class="container" style="width: 17rem; float: left; clear: both;">
        <form class="col-sm-18" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Write a message" aria-label="Message" aria-describedby="msgSend" name="msgContent" id="msgContent">
            <input class="btn btn-outline-dark" type="submit" name="msgSend" id="msgSend" value="Send">
          </div>
        </form>
      </div>
    <?php } else { ?>
      <div class="container" style="width: 17rem; float: left; clear: both;">
        <form class="col-sm-18" method="post" id="chatForm">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Join this conversation" aria-label="Message" aria-describedby="msgSend" name="msgContent" id="msgContent" disabled>
            <a href="login.php" class="btn btn-outline-dark" type="submit" name="msgSend" id="msgSend" value="" disabled>Log in</a>
          </div>
        </form>
      </div>
    <?php } ?>
    <div class="container" style="height: 30rem; width: 17rem; float: left; overflow-y: scroll; clear: both;" id="chatbox">
      <?php while ($msg = pg_fetch_assoc($chatMessages)) {

        $id = $msg['id'];
        $content = $msg['content'];
        $sender = $msg['sender'];
        $getSender = pg_query($dbConn, "SELECT username FROM public.users WHERE id = '$sender'");
        $getSender = pg_fetch_assoc($getSender);

      ?>
        <p><strong><?php echo $getSender['username']; ?>:</strong> <span class="text-muted"><?php echo $content; ?></span></p>
      <?php } ?>
    </div>

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
            <img src="./img/<?php echo $cover; ?>" class="card-img-top img-thumbnail bg-dark border-dark" style="height: 14rem; object-fit: cover;" alt="/img/<?php echo $cover; ?>">
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
  <script>
    // Aktualisiere nur den Div "chatbox" - Funktion
    function reloadChat() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("chatbox").innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", "./includes/ajax.php", true);
      xhttp.send();

    }

    // Chatbox aktualisieren - Intervall
    setInterval(function() {
      reloadChat();
    }, 250);

    // Automatisch an das Ende scrollen
    var elem = document.getElementById('chatbox');
    elem.scrollTop = elem.scrollHeight;

    // Position beim absenden der Nachricht merken & dahin zurück scrollen
    document.addEventListener("DOMContentLoaded", function(event) {
      var pagePosition = localStorage.getItem('scrollpos');
      if (pagePosition) window.scrollTo(0, pagePosition);
    });
    window.onbeforeunload = function(e) {
      localStorage.setItem('scrollpos', window.scrollY);
    };

  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>