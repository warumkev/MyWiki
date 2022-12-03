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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

  <?php include('./components/navbar.php'); ?>

  <br>

  <div class="container">

    <div class="jumbotron">
      <h1 class="display-4">FAQ</h1>
      <p class="lead">Hier findest du häufig gestellte Fragen zu myWiki.</p>
      <hr class="my-4">
    </div>
    <div class="row align-items-md-stretch">
      <div class="col-md-6">
        <div class="h-100 p-5 bg-light rounded-3">
          <h2>Du hast eine Frage?</h2>
          <p>Wenn es ungeklärte Fragen deienrseits gibt, zögere nicht uns zu kontaktieren. Schreib uns eine Email mit
            deinem Anliegen und wir kommen so schnell wie möglich darauf zurück.</p>
          <a href="mailto:kevin.tamme@iu-study.org"><button class="btn btn-outline-dark" type="button">Jetzt
              kontaktieren</button></a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="h-100 p-5 text-bg-dark border rounded-3">
          <h2>Information</h2>
          <p>Wir arbeiten stets daran, die Benutzeroberfläche so einfach und verständlich wie möglich zu halten. Dennoch
            kommt es immer wieder zu Fragen. Die wichtigsten Antworten findest du unten aufgelistet in unserem FAQ.</p>
        </div>
      </div>
    </div>
    <br><br><br>
    <div class="accordion" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne">
            Warum finde ich meinen Beitrag nicht?
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
          data-bs-parent="#accordionExample">
          <div class="accordion-body">
            Versuche sicher zu stellen, dass du den richtigen Suchbegriff verwendet hast und der Beitrag noch existiert.
            Sollte es immer noch nicht funktionieren kontaktiere bitte unseren <a
              href="mailto:kevin.tamme@iu-study.org"><strong>Support</strong></a>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Wie kann ich Beiträge erstellen?
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
          data-bs-parent="#accordionExample">
          <div class="accordion-body">
            Um Beiträge bei myWiki zu erstellen,, musst du dich zunächst anmelden bzw. registrieren. Anschließend
            findest du in der Navigationsleiste den Abschnitt <strong>"Beitrag erstellen"</strong>.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Wo kann ich meinen Account löschen?
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
          data-bs-parent="#accordionExample">
          <div class="accordion-body">
            Um deinen Account zu löschen, bitte klicke <a href="delete.php"><strong>hier</strong></a>. <span
              class="badge bg-danger">Du musst angemeldet sein!</span>
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