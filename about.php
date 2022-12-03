<?php
session_start();
include('./includes/connect.php');

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MyWiki | Über uns</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

  <?php include('./components/navbar.php'); ?>

  <br>

  <div class="container">

    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Wer sind wir?</h1>
        <p class="lead">Wir sind eine Gruppe aus Studenten der IU International University of Applied Science.</p>
      </div>
    </div>

    <div class="px-4 py-5 my-5 text-center">
      <img class="d-block mx-auto mb-4" src="./assets/brand/wikiLogo.svg" alt="" width="72" height="57">
      <h1 class="display-5 fw-bold"><span class="text-warning">my</span>Wiki</h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Bei <span class="text-warning">my</span>Wiki handelt es sich um unser Prüfungsprojekt.
          Nutzer*innen sollen die Möglichkeit haben, beliebige Wiki-Seiten zu eröffnen und hierauf Informationen und
          Bilder einstellen zu können. Die Software soll im Intranet zu einem besseren Informationsaustausch beitragen.
        </p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
          <a href="https://github.com/kev9euf3rois/Wiki" target="_blank"><button type="button"
              class="btn btn-outline-secondary btn-lg px-4">GitHub Repo</button></a>
        </div>
      </div>
    </div>

    <div class="container my-5">
      <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
        <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
          <h1 class="display-4 fw-bold lh-1">IU International University of Applied Science</h1>
          <p class="lead">Die IU Internationale Hochschule (bis 2021 IUBH Internationale Hochschule, bis 2017
            Internationale Hochschule Bad Honnef / Bonn) ist eine staatlich anerkannte private Fachhochschule mit Sitz
            in Erfurt und 28 Standorten in Deutschland.
            Sie bietet englischsprachige Präsenzstudiengänge, deutschsprachige duale Studienprogramme sowie
            Fernstudienangebote und Kombimodelle auf Deutsch und Englisch an. Mit über 100.000 Studierenden ist die IU
            Internationale Hochschule seit 2021 die größte Hochschule in Deutschland.</p>
          <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
            <a href="https://iu.de/" target="_blank"><button type="button"
                class="btn btn-outline-secondary btn-lg px-4">Zur Website</button></a>
          </div>
        </div>
        <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
          <img class="rounded-lg-3" src="./assets/brand/iulogo.jpg" alt="" width="350">
        </div>
      </div>
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