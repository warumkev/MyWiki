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
          <img src="./assets/brand/wikiLogo.svg" class="rounded mx-auto d-block" height="100px"><br>
          <h1 class="fw-light">FAQ</h1>
          <p class="lead text-muted">Here you will find frequently asked questions about myWiki.</p>
        </div>
      </div>
    </section>
    <div class="row align-items-md-stretch">
      <div class="col-md-6">
        <div class="h-100 p-5 bg-light rounded-3">
          <h2>You have a question?</h2>
          <p>If you have any unresolved questions, do not hesitate to contact us. Send us an email with your concern and
            we will get back to you as soon as possible.</p>
          <a href="mailto:kevin.tamme@iu-study.org"><button class="btn btn-outline-dark" type="button">Contact
              now</button></a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="h-100 p-5 text-bg-dark border rounded-3">
          <h2>Information</h2>
          <p>"We are always working to keep the user interface as simple and understandable as possible. Nevertheless,
            questions always arise. You can find the most important answers listed below in our FAQ.</p>
        </div>
      </div>
    </div>
    <br><br><br>
    <div class="accordion" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne">
            Why can't I find a specific post?
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
          data-bs-parent="#accordionExample">
          <div class="accordion-body">
            Try to make sure you are using the correct search term and that the post still exists. If it still does not
            work, please contact our <a class="text-warning" style="text-decoration: none;"
              href="mailto:kevin.tamme@iu-study.org"><strong>support</strong></a>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            How do I create posts?
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
          data-bs-parent="#accordionExample">
          <div class="accordion-body">
            To create posts on myWiki, you must first log in or register. Afterwards, you will find the <strong>Create Post</strong>
            section in the navigation bar.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            How do i delete my account?
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
          data-bs-parent="#accordionExample">
          <div class="accordion-body">
          To delete your account, please click <a class="text-warning" style="text-decoration: none;"
              href="delete.php"><strong>here</strong></a>. <span class="badge bg-danger">You need to be logged in!</span>
          </div>
        </div>
      </div>
    </div>

    <?php include('./components/footer.php'); ?>

    <div>
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